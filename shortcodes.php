<?php
define("CSS_PATH", "css/");

$names = array(
    "Material icons", "Hotel pictograms", "Material design", "Linecons", "Sympletts",
    "Squared ui", "Soft icons", "Simpleicon communication",
    "Real estate", "Puppets", "Outicons", "Line ui",
    "Line icon set", "Justicons", "Icon works", "Great icon set",
    "Glypho", "Free chaos", "Flat icons set 2", "Fill round icons",
    "Dripicons", "Drawing tools", "Demo icons", "Crisp icons",
    "Continuous", "Clear icons", "Chapps", "Budicons launch", "Budicons free",
    "Bigmug line", "36 slim icons", "Beach icons", "Arrows", "Mercury icon pack", "Font awesome"
);

$packs = array(
    "material-icons", "hotel-icon", "material-design", "linecons", "fl-sympletts",
    "fl-squared-ui", "fl-soft-icons", "fl-simpleicon-communication",
    "fl-real-estate-3", "fl-puppets", "fl-outicons", "fl-line-ui",
    "fl-line-icon-set", "fl-justicons", "fl-icon-works", "fl-great-icon-set",
    "fl-glypho", "fl-free-chaos", "fl-flat-icons-set-2", "fl-fill-round-icons",
    "fl-dripicons", "fl-drawing-tools", "fl-demo-icons", "fl-crisp-icons",
    "fl-continuous", "fl-clear-icons", "fl-chapps", "fl-budicons-launch", "fl-budicons-free",
    "fl-bigmug-line", "fl-36-slim-icons", "beach-icons", "arrows", "mercury-icon", "fa"
);

$icons = array();

$di = new RecursiveDirectoryIterator(CSS_PATH);
$files = array();

foreach (new RecursiveIteratorIterator($di) as $filename => $file) {
    if (strpos($filename, ".css") > 0) {
        array_push($files, $filename);
    }
}

if (count($files) > 0) {
    foreach ($packs as $j => $pack) {

        $handle = fopen($filename, "r");
        $icons[$names[$j]] = array();

        while (($line = fgets($handle)) !== false) {
            if (preg_match("/\.(" . $pack . "-[\w\d_-]+)\:before\s*\{/i", $line, $result)) {
                array_push($icons[$names[$j]], $result[1]);
            }
        }

        $bp = ceil(count($icons[$names[$j]]) / 3);
        fclose($handle);
    }
}

?>

<!DOCTYPE html>
<html lang="en" class="wide wow-animation">
<head>
    <!-- Site Title -->
    <title>Shortcodes</title>
    <meta name="format-detection" content="telephone=no"/>
    <meta name="viewport"
          content="width=device-width, height=device-height, initial-scale=1.0, maximum-scale=1.0, user-scalable=0"/>

    <!-- Stylesheets -->
    <link rel="icon" href="images/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="css/style.css">

    <!--[if lt IE 10]>
    <div
        style='background: #212121; padding: 10px 0; box-shadow: 3px 3px 5px 0 rgba(0,0,0,.3); clear: both; text-align:center; position: relative; z-index:1;'>
        <a href="http://windows.microsoft.com/en-US/internet-explorer/..">
            <img src="images/ie8-panel/warning_bar_0000_us.jpg" border="0" height="42" width="820"
                 alt="You are using an outdated browser. For a faster, safer browsing experience, upgrade for free today."/>
        </a>
    </div>
    <script src="js/html5shiv.min.js"></script>
    <![endif]-->
</head>
<body>
<!-- The Main Wrapper -->
<div class="page">
    <!--========================================================
                              HEADER
    =========================================================-->
    <header class="page-header">
        <!-- RD Navbar -->
        <div class="rd-navbar-wrap">
            <nav class="rd-navbar">
                <div class="rd-navbar-inner">
                    <!-- RD Navbar Panel -->
                    <div class="rd-navbar-panel-canvas"></div>
                    <div class="rd-navbar-panel">
                        <!-- RD Navbar Toggle -->
                        <button class="rd-navbar-toggle" data-rd-navbar-toggle=".rd-navbar-nav-wrap"><span></span>
                        </button>
                        <!-- END RD Navbar Toggle -->

                        <!-- RD Navbar Brand -->
                        <a href="index.html" class="rd-navbar-brand">
                            <img src="images/logo-min.jpg" class="rd-navbar-brand-logo" alt="">
                            <span class="rd-navbar-brand-name">Timex</span>
                        </a>
                        <!-- END RD Navbar Brand -->
                    </div>
                    <!-- END RD Navbar Panel -->

                    <div class="rd-navbar-collapse-wrap">
                        <button class="rd-navbar-collapse-toggle"
                                data-rd-navbar-toggle=".rd-navbar-collapse"><span></span></button>
                        <ul class="rd-navbar-collapse">
                            <li>
                                <a href="#" class="fa-facebook"></a>
                            </li>
                            <li>
                                <a href="#" class="fa-twitter"></a>
                            </li>
                            <li>
                                <a href="#" class="fa-google-plus"></a>
                            </li>
                        </ul>
                    </div>

                    <div class="rd-navbar-nav-wrap">
                        <!-- RD Navbar Nav -->
                        <ul class="rd-navbar-nav">
                            <li>
                                <a href="index.html#home">
                                    <span class="material-icons-home"></span>
                                    <span class="tooltip">Get Started</span>
                                </a>
                            </li>
                            <li>
                                <a href="index.html#about">
                                    <span class="material-icons-terrain"></span>
                                    <span class="tooltip">Who we are</span>
                                </a>
                            </li>
                            <li>
                                <a href="index.html#services">
                                    <span class="material-icons-view_list"></span>
                                    <span class="tooltip">Our Services</span>
                                </a>
                            </li>
                            <li>
                                <a href="index.html#works">
                                    <span class="material-icons-photo_library"></span>
                                    <span class="tooltip">Latest works</span>
                                </a>
                            </li>
                            <li>
                                <a href="index.html#team">
                                    <span class="material-icons-supervisor_account"></span>
                                    <span class="tooltip">Our Team</span>
                                </a>
                            </li>
                            <li>
                                <a href="index.html#contacts">
                                    <span class="material-icons-forum"></span>
                                    <span class="tooltip">Contact us</span>
                                </a>
                            </li>
                        </ul>
                        <!-- END RD Navbar Nav -->
                    </div>
                </div>
            </nav>
        </div>
        <!-- END RD Navbar -->
    </header>
    <!--========================================================
                              CONTENT
    =========================================================-->
    <main class="page-content">
        <!-- Forms  -->
        <section class="well-md text-center">

            <div class="container">
                <h4>Contact Form</h4>

                <div class="row row-xs-center">
                    <div class="col-sm-8">


                        <!-- RD Mailform-->
                        <form data-result-class="rd-mailform-validate-3" data-form-type="contact" method="post" action="bat/rd-mailform.php" class="rd-mailform">
                            <fieldset>
                                <div class="row">
                                    <div class="col-md-4">
                                        <input type="text" name="name" data-constraints="@NotEmpty @LettersOnly" placeholder="YOUR NAME">
                                    </div>
                                    <div class="col-md-4">
                                        <input type="text" name="email" data-constraints="@NotEmpty @Email" placeholder="YOUR E-MAIL">
                                    </div>
                                    <div class="col-md-4">
                                        <input type="text" name="phone" data-constraints="@NumbersOnly" placeholder="YOUR Phone">
                                    </div>
                                </div>
                            </fieldset>
                            <fieldset>

                                <textarea name="message" data-constraints="@NotEmpty" placeholder="Message"></textarea>

                            </fieldset>
                            <fieldset>

                                <button class="btn btn-md btn-primary" type="submit">Submit</button>

                            </fieldset>
                    </div>

                    </form>
                    <!-- Rd Mailform result field-->
                    <div class="rd-mailform-validate-3"></div>
                    <!-- END RD Mailform-->

                </div>
            </div>

            <div class="container">
                <h4>Subscribe Form</h4>

                <div class="row">
                    <!-- RD Mailform-->
                    <form data-result-class="rd-mailform-validate-2" data-form-type="subscribe" method="post" action="bat/rd-mailform.php" class="rd-mailform">
                        <fieldset class="rd-mailform-inline text-center">
                            <div class="rd-mailform-item">
                                <input type="text" name="email" data-constraints="@NotEmpty @Email" placeholder="ENTER YOUR E-MAIL">
                            </div>
                            <div class="rd-mailform-item">
                                <button class="btn btn-md btn-primary" type="submit">get started</button>
                            </div>
                        </fieldset>
                    </form>
                    <!-- Rd Mailform result field-->
                    <div class="rd-mailform-validate-2"></div>
                    <!-- END RD Mailform-->
                </div>
            </div>

            <div class="container">
                <h4>Buttons Styles</h4>

                <div class="btn-group">
                    <div class="btn btn-sm btn-default fa-shopping-cart">Buy Now</div>
                    <div class="btn btn-sm btn-primary fa-shopping-cart">Buy Now</div>
                </div>
            </div>

            <div class="container">
                <h4>Buttons Sizing</h4>

                <div class="btn-group">
                    <div class="btn btn-xs btn-default fa-shopping-cart">Buy Now</div>
                    <div class="btn btn-sm btn-default fa-shopping-cart">Buy Now</div>
                    <div class="btn btn-md btn-default fa-shopping-cart">Buy Now</div>
                    <div class="btn btn-lg btn-default fa-shopping-cart">Buy Now</div>
                    <div class="btn btn-xl btn-default fa-shopping-cart">Buy Now</div>
                </div>
            </div>

            <div class="container text-center">
                <h4>Icon Styles</h4>

                <ul class="inline-list">
                    <li>
                        <div class="icon icon-md icon-default fa-gears"></div>
                    </li>
                    <li>
                        <div class="icon icon-md icon-primary fa-gears"></div>
                    </li>
                </ul>
            </div>

            <div class="container text-center">
                <h4>Icon Sizing</h4>

                <ul class="inline-list">
                    <li>
                        <div class="icon icon-xs icon-primary fa-gears"></div>
                    </li>
                    <li>
                        <div class="icon icon-sm icon-primary fa-gears"></div>
                    </li>
                    <li>
                        <div class="icon icon-md icon-primary fa-gears"></div>
                    </li>
                    <li>
                        <div class="icon icon-lg icon-primary fa-gears"></div>
                    </li>
                    <li>
                        <div class="icon icon-xl icon-primary fa-gears"></div>
                    </li>
                </ul>
            </div>
        </section>
        <!-- END RD Parallax-->
        <!-- Icons Fonts-->
        <section class="well-md bg-default-darken">
            <div class="container">

                <h2 class="text-center">Icon Fonts</h2>

                <div class="responsive-tabs responsive-tabs-variant-2">
                    <ul class="resp-tabs-list text-center">
                        <?php foreach ($icons as $i => $value) {
                            if (count($icons[$i]) > 0) { ?>
                                <li><span class="btn btn-sm btn-default"><?php echo $i; ?></span></li>
                            <?php }
                        } ?>
                    </ul>

                    <div class="resp-tabs-container">
                        <?php foreach ($icons as $i => $value) {
                            if (count($icons[$i]) > 0) { ?>
                                <div>
                                    <div class="row">
                                        <?php foreach ($icons[$i] as $j => $iconClass) { ?>
                                            <div class="col-xs-6 col-md-4 grid_4">
                                                <div class="icon-box <?php echo $iconClass; ?>"><?php echo $iconClass; ?></div>
                                            </div>
                                        <?php } ?>
                                    </div>
                                </div>
                            <?php }
                        } ?>
                    </div>
                </div>

            </div>
        </section>
        <!-- END Icons -->
    </main>

    <!--========================================================
                              FOOTER
    =========================================================-->
    <footer class="page-footer bg-default-darken well-sm text-center">
        <div class="container">
            <p>
                Timex &copy; <span id="copyright-year"></span>.
                All rights reserved
                <!-- {%FOOTER_LINK} -->
            </p>
        </div>
    </footer>
</div>

<!-- Core Scripts -->
<script src="js/core.min.js"></script>
<!-- Additional Functionality Scripts -->
<script src="js/script.js"></script>
</body>
</html>