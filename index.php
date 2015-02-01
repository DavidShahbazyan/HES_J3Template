<?php
/**
 * @package		com.davsoft.joomla.templates
 * @subpackage	HydroEngineringService
 * @author      DavSoft [David Shahbazyan]
 * @author      Wingsitive [Tatevik Petrosyan]
 * @copyright	Copyright (C) 2014 - 2050 DavSoft & Wingsitive. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 * @date        17.12.2014
 */

// No direct access.
defined('_JEXEC') or die;

// Getting params from template
$params = JFactory::getApplication()->getTemplate(true)->params;

$app = JFactory::getApplication();
$doc = JFactory::getDocument();
$menu = $app->getMenu();
$this->language = $doc->language;
$this->direction = $doc->direction;

$isFrontPage = $menu->getActive() == $menu->getDefault();
// TODO: Implement dynamic columns
// check modules
$showContentTopLeft = ($this->countModules('content-top-left'));
$showContentTopRight = ($this->countModules('content-top-right'));
$showComponent = (!$isFrontPage);
$showContentMiddleRight = ($this->countModules('content-middle-right'));
$showContentBottomLeft = ($this->countModules('content-bottom-left'));
$showContentBottomRight = ($this->countModules('content-bottom-right'));
$showBottomLeft = ($this->countModules('bottom-left'));
$showBottomMiddle = ($this->countModules('bottom-middle'));
$showBottomRight = ($this->countModules('bottom-right'));
$showFooterLeft = ($this->countModules('footer-left'));
$showFooterRight = ($this->countModules('footer-right'));

?>
<?php echo '<?'; ?>xml version="1.0" encoding="<?php echo $this->_charset; ?>"?>
<!doctype html>
<html xmlns:jdoc="http://api.joomla.org/" class="" lang="<?php echo $this->language; ?>">
    <head>
        <jdoc:include type="head"/>
        <meta charset="UTF-8">
        <meta name="" content="">

        <link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template; ?>/css/style.css" type="text/css">
        <link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template; ?>/dist/css/bootstrap.css">
        <link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template; ?>/dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template; ?>/basic-jquery-slider-master/bjqs.css">
        <link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template; ?>/basic-jquery-slider-master/demo.css">
        <script src="<?php echo $this->baseurl ?>/templates/<?php echo $this->template; ?>/js/jquery-2.1.1.min.js"></script>
        <script src="<?php echo $this->baseurl ?>/templates/<?php echo $this->template; ?>/dist/js/bootstrap.min.js"></script>
        <script src="<?php echo $this->baseurl ?>/templates/<?php echo $this->template; ?>/basic-jquery-slider-master/js/bjqs-1.3.min.js"></script>
    </head>
    <body>
        <div class="container main-cont">
            <header role="header">
                <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
                    <div class="">
                        <div class="search-frame float-right">
                            <jdoc:include type="modules" name="search"/>
                        </div>
                        <div class="navbar-header">
                            <button class="navbar-toggle collapsed" type="button" data-toggle="collapse" data-target=".navbar-collapse" role="button">
                                <span class="sr-only">Toggle Navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                            <a href="/" class="navbar-brand">Hes</a>
                        </div>
                        <div class="clear"></div>
                        <div class="navbar-collapse collapse" aria-expanded="false" style="height: 1.11111116409302px;">
                            <jdoc:include type="modules" name="menu-top"/>
                        </div>
                    </div>
                </nav>
            </header>
            <div class="clear"></div>
            <div class="main-content">
                <?php if ($showContentTopLeft || $showContentTopRight) { ?>
                    <div class="main-top">
                        <div class="col-xs-12 col-sm-6 col-md-6 pddr10">
                            <jdoc:include type="modules" name="content-top-left"/>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-6 pddl10">
                            <jdoc:include type="modules" name="content-top-right"/>
                        </div>
                        <div class="clear"></div>
                    </div>
                <?php } ?>

                <div class="main-content">
                    <?php if ($showContentMiddleRight) { ?>
                        <div class="col-xs-12 col-sm-8 col-sm-8 pddr10 left-section">
                            <jdoc:include type="component"/>
                        </div>
                        <div class="col-xs-12 col-sm-4 col-sm-4 right-section">
                            <jdoc:include type="modules" name="content-middle-right"/>
                        </div>
                    <?php } else { ?>
                        <?php if ($showComponent): ?>
                            <div class="col-xs-12 col-sm-12 col-sm-12">
                                <jdoc:include type="component"/>
                            </div>
                        <?php endif; ?>
                    <?php } ?>
                    <div class="clear"></div>
                </div>

                <?php if ($showContentBottomLeft || $showContentBottomRight) { ?>
                    <div class="main-top">
                        <div class="col-xs-12 col-sm-6 col-md-6 pddr10">
                            <jdoc:include type="modules" name="content-bottom-left"/>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-6 pddl10">
                            <jdoc:include type="modules" name="content-bottom-right"/>
                        </div>
                        <div class="clear"></div>
                    </div>
                <?php } ?>
            </div>
            <div class="clear"></div>
            <hr class="sp-content">

            <div class="col-xs-12 col-sm-6 col-sm-4  mrgb20">
                <jdoc:include type="modules" name="bottom-left"/>
            </div>
            <div class="col-xs-12 col-sm-6 col-sm-4 mrgb20">
                <jdoc:include type="modules" name="bottom-middle"/>
            </div>
            <div class="col-xs-12 col-sm-6 col-sm-4 mrgb20">
                <jdoc:include type="modules" name="bottom-right"/>
            </div>

            <div class="clear"></div>
            <footer id="footer">
                <div class="container">
                    <div class="float-left">
                        <jdoc:include type="modules" name="footer-left"/>
                    </div>
                    <div class="copy float-right">
                        <jdoc:include type="modules" name="footer-right"/>
                    </div>
                </div>
                <div class="clear"></div>
            </footer>
        </div>

        <script>
            $(function () {
                $('.js-nav a, .js-connect').click(function (e) {
                    e.preventDefault();
                    $('body, html').animate({
                        scrollTop: $($.attr(this, 'href')).offset().top
                    }, 750);
                });
            });
        </script>
    </body>
</html>