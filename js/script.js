var isTouch = "ontouchstart" in window;

/**
 * @function      Include
 * @description   Includes an external scripts to the page
 * @param         {string} scriptUrl
 */
function include(scriptUrl) {
    document.write('<script src="' + scriptUrl + '"></script>');
}


/**
 * @function      isIE
 * @description   checks if browser is an IE
 * @returns       {number} IE Version
 */
function isIE() {
    var myNav = navigator.userAgent.toLowerCase();
    return (myNav.indexOf('msie') != -1) ? parseInt(myNav.split('msie')[1]) : false;
};


/**
 * @module       Copyright
 * @description  Evaluates the copyright year
 */
;
(function ($) {
    var currentYear = (new Date).getFullYear();
    $(document).ready(function () {
        $("#copyright-year").text((new Date).getFullYear());
    });
})(jQuery);


/**
 * @module       IE Fall&Polyfill
 * @description  Adds some loosing functionality to old IE browsers
 */
;
(function ($) {
    if (isIE() && isIE() < 11) {
        include('js/pointer-events.min.js');
        $('html').addClass('lt-ie11');
        $(document).ready(function () {
            PointerEventsPolyfill.initialize({});
        });
    }

    if (isIE() && isIE() < 10) {
        $('html').addClass('lt-ie10');
    }
})(jQuery);


/**
 * @module       WOW Animation
 * @description  Enables scroll animation on the page
 */
;
(function ($) {
    var o = $('html');
    if (o.hasClass('desktop') && o.hasClass("wow-animation") && $(".wow").length) {
        include('js/wow.min.js');

        $(document).ready(function () {
            new WOW().init();
        });
    }
})(jQuery);


/**
 * @module       Smoothscroll
 * @description  Enables smooth scrolling on the page
 */
;
(function ($) {
    if ($("html").hasClass("smoothscroll")) {
        include('js/smoothscroll.min.js');
    }
})(jQuery);

/**
 * @module       RD Smoothscroll
 * @description  Enables smooth scrolling on the page for all platforms
 */
;
(function ($) {
    if ($("html").hasClass("smoothscroll-all")) {
        include('js/rd-smoothscroll.min.js');
    }
})(jQuery);


/**
 * @module       Responsive Tabs
 * @description  Enables Easy Responsive Tabs Plugin
 */
;
(function ($) {
    var o = $('.responsive-tabs');
    if (o.length > 0) {
        include('js/jquery.easy-responsive-tabs.min.js');

        $(document).ready(function () {
            o.each(function () {
                var $this = $(this);
                $this.easyResponsiveTabs({
                    type: $this.attr("data-type") === "accordion" ? "accordion" : "default"
                });
            })
        });
    }
})(jQuery);

/**
 * @module       RD Google Map
 * @description  Enables RD Google Map Plugin
 */
;
(function ($) {
    var o = document.getElementById("google-map");
    if (o) {
        include('//maps.google.com/maps/api/js?sensor=false');
        include('js/jquery.rd-google-map.min.js');

        $(document).ready(function () {
            var o = $('#google-map');
            if (o.length > 0) {
                o.googleMap({
                    styles: []
                });
            }
        });
    }
})
(jQuery);


/**
 * @module       RD Navbar
 * @description  Enables RD Navbar Plugin
 */
;
(function ($) {
    var o = $('.rd-navbar'), scroll = 0, animated = false, ctx;
    if (o.length > 0) {
        include('js/jquery.rd-navbar.min.js');

        $(document).ready(function () {
            o.RDNavbar({
                layout: 'rd-navbar-sidebar',
                anchorNavSpeed: 800,
                stickUp: false,
                stickUpClone: false,
                anchorNavOffset: -1,
                responsive: {
                    0: {
                        layout: 'rd-navbar-fixed'
                    },
                    992: {
                        layout: 'rd-navbar-sidebar'
                    }
                }
            });
        });
    }
})(jQuery);


/**
 * @module       Vide
 * @description  Enables Vide.js Plugin
 */
;
(function ($) {
    var o = $(".vide");
    if (o.length) {
        include('js/jquery.vide.min.js');

        $(document).ready(function () {
            o.wrapInner('<div class="vide__body"></div>');
        });

        $(window).on('scroll', function () {
            o.each(function () {
                var $this = $(this),
                    off = $this.parent().offset().top,
                    h = $this.parent().height(),
                    st = $(document).scrollTop(),
                    wh = $(window).height(),
                    video = $this.find('video');

                if (video.length) {
                    if (st + wh >= off && st <= off + h) {
                        if (video.get(0).paused) {
                            video.get(0).play();
                        }
                    }
                    else {
                        if (!video.get(0).paused) {
                            video.get(0).pause();
                        }
                    }
                }
            });
        }).trigger("scroll");
    }
})(jQuery);

/**
 * @module       RD Parallax 3
 * @description  Enables RD Parallax 3 Plugin
 */
;
(function ($) {
    include('js/jquery.rd-parallax.min.js');

    $(document).ready(function () {
        $.RDParallax();

        $("a[href='#']").on("click", function (e) {
          setTimeout(function () {
            $(window)
                .trigger("resize")
                .trigger("scroll");
          }, 200);
        });
    });
})(jQuery);

/**
 * Custom Waypoints
 */
;
(function ($) {
    var $waypointTo = $('[data-waypoint-to]');
    if ($waypointTo.length) {
        $(document).ready(function () {
            $waypointTo.each(function () {
                var $this = $(this);
                $this.on('click', function (e) {
                    e.preventDefault();
                    $("body, html").stop().animate({
                        scrollTop: $($this.attr('data-waypoint-to')).offset().top
                    }, 800);
                });
            })
        });
    }
})(jQuery);



/**
 * @module       Magnific Popup
 * @description  Enables Magnific Popup Plugin
 */
;
(function ($) {
    var o = $('[data-lightbox]').not('[data-lightbox="gallery"] [data-lightbox]'),
        g = $('[data-lightbox^="gallery"]');
    if (o.length > 0 || g.length > 0) {
        include('js/jquery.magnific-popup.min.js');

        function preventScroll(e) {
            e.preventDefault();
        }

        $(document).ready(function () {
            if (o.length) {
                o.each(function () {
                    var $this = $(this);


                    $this.magnificPopup({
                        type: $this.attr("data-lightbox"),
                        callbacks: {
                            open: function () {
                                if (isTouch) {
                                    $(document).on("touchmove", preventScroll);
                                    $(document).swipe({
                                        swipeDown: function () {
                                            $.magnificPopup.close();
                                        }
                                    });
                                }


                            },
                            close: function () {
                                if (isTouch) {
                                    $(document).off("touchmove", preventScroll);
                                    $(document).swipe("destroy");
                                }
                            }
                        }
                    });
                })
            }

            if (g.length) {
                g.each(function () {
                    var $gallery = $(this);
                    $gallery
                        .find('[data-lightbox]').each(function () {
                            var $item = $(this);
                            $item.addClass("mfp-" + $item.attr("data-lightbox"));
                        })
                        .end()
                        .magnificPopup({
                            delegate: '[data-lightbox]',
                            type: "image",
                            gallery: {
                                enabled: true
                            },
                            callbacks: {
                                open: function () {
                                    if (isTouch) {
                                        $(document).on("touchmove", preventScroll);
                                        $(document).swipe({
                                            swipeDown: function () {
                                                $.magnificPopup.close();
                                            }
                                        });
                                    }
                                },
                                close: function () {
                                    if (isTouch) {
                                        $(document).off("touchmove", preventScroll);
                                        $(document).swipe("destroy");
                                    }
                                }
                            }
                        });
                })
            }
        });
    }
})(jQuery);


/**
 * @module       RD Video Player
 * @description  Enables RD Video Player Plugin
 */
;
(function ($) {
  $(document).ready(function () {
    var o = $(".rd-video-player");

    if (o.length) {
      o.RDVideoPlayer({}); // Additional options

      var volumeWrap = $('.rd-video-volume-wrap');

      volumeWrap.on('mouseenter', function () {
        $(this).addClass('hover')
      });

      volumeWrap.on('mouseleave', function () {
        $(this).removeClass('hover')
      });

      if (isTouch) {
        volumeWrap.find('.rd-video-volume').on('click', function () {
          $(this).toggleClass('hover')
        });
        $(document).on('click', function (e) {
          if (!$(e.target).is(volumeWrap) && $(e.target).parents(volumeWrap).length == 0) {
            volumeWrap.find('.rd-video-volume').removeClass('hover')
          }
        })
      }
    }

    var onHover = $(".play-on-hover");
    if (onHover.length) {

      var played = false;

      function playVideo($_this) {
        $_this.find('video')[0].play();
        $_this.toggleClass('hovered');
        played = true;
      }

      function stopVideo($_this) {
        $_this.removeClass('hovered');
        $_this.find('video')[0].pause();
        played = false;
      }

      function stopVideoOnDevice(played, removeClass, $_this){
        if (played && removeClass) {
          stopVideo($_this);
        }
      }

      if (isTouch) {
        onHover.each(function () {
          var $this = $(this),
              removeClass = true;

          $this.on('touchend', function () {
            if (!played) {
              playVideo($(this));
            }
            removeClass = false;
          });

          $("html").on('touchend', function () {
            stopVideoOnDevice(played, removeClass, $(this));
            removeClass = true;
          });

          $("html").on('touchmove', function () {
            stopVideoOnDevice(played, removeClass, $(this));
            removeClass = true;
          });
        });

      } else {
        onHover.each(function () {
          var $this = $(this);

          $this.on('mouseenter', function () {
            playVideo($(this));
          });

          $this.on('mouseleave', function () {
            stopVideo($(this));
          });
        });
      }
    }

    //open video popUp
    var video1 = $(".rd-video-1");
    if (video1.length) {
      video1.each(function () {
        var $this = $(this);

        $('.play-video').on('click', function (e) {
          e.preventDefault();

          $('.video-overlay').addClass('video-open');
          o.addClass('active');

          setTimeout(function () {
            $this.find('video')[0].play();
          }, 1000);
        });

        $('.video-overlay').on('click', function (e) {
          $this.find('video')[0].pause();
          $(this).removeClass('video-open');
          o.removeClass('active');
        });
      });
    }
  });
})(jQuery);


/**
 * @module       RD Validator
 * @author       Aleksey Patsurkovskiy
 * @version      1.0.0
 * @license      MIT License
 * @link         http://cms.devoffice.com/coding-demo/mnemon1k/rd-validation/demo/
 */
var $mailForm = $('.rd-mailform');

if ($mailForm.length) {
  if ("RDValidator" in jQuery.fn) {
    $mailForm.each(function () {
      var $this = $(this),
          mailFormSettings = {
            formType: $this.data("form-type"),
            resultPanelClass: $this.data("result-class"),
            msg: {
              'MF000': 'Successfully sent!',
              'MF001': 'Recipients are not set!',
              'MF002': 'Form will not work locally!',
              'MF003': 'Please, define email field in your form!',
              'MF004': 'Please, define type of your form!',
              'MF254': 'Something went wrong with PHPMailer!',
              'MF255': 'Aw, snap! Something went wrong.'
            }
          },
          resultPanel = $('.' + mailFormSettings.resultPanelClass),
          mailFormOptions = {
            data: {"form-type": mailFormSettings.formType},
            error: function (result) {
              resultPanel.text(mailFormSettings.msg[result]);
            },
            success: function (result) {
              result = result.length == 5 ? result : 'MF255';
              resultPanel.text(mailFormSettings.msg[result]);
              if (result === "MF000") {
                resultPanel[0].classList.add("success");
                setTimeout(function () {
                  resultPanel[0].classList.remove("success");
                  $mailForm.clearForm();
                }, 2500);
              } else {
                resultPanel[0].classList.add("error");
                setTimeout(function () {
                  resultPanel[0].classList.remove("error");
                }, 4000);
              }
            }
          };

      $this.RDValidator({
        constraints: {
          "@Time": {
            rule: /^(1[012]|[1-9]):[0-5]\d\s[ap]\.?m\.?$/i,
            message: 'Enter valid time format!'
          }
        }
      });
      $this.ajaxForm(mailFormOptions);
    });
  }
}
