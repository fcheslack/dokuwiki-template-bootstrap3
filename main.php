<?php
/**
 * DokuWiki Bootstrap3 Template
 *
 * @link     http://dokuwiki.org/template:bootstrap3
 * @author   Giuseppe Di Terlizzi <giuseppe.diterlizzi@gmail.com>
 * @license  GPL 2 (http://www.gnu.org/licenses/gpl.html)
 */

if (!defined('DOKU_INC')) die(); /* must be run from within DokuWiki */

$baseDomain   = $conf['zotero_www_basedomain'];
$baseURL   = $conf['zotero_www_baseurl'];
$staticPath = $conf['zotero_www_staticPath'];
$staticServerPath = $conf['zotero_www_staticServerPath'];
$forumsURL = $conf['zotero_www_forumsurl'];

@require_once(dirname(__FILE__).'/tpl_functions.php'); /* include hook for template functions */
header('X-UA-Compatible: IE=edge,chrome=1');

include_once(dirname(__FILE__).'/tpl_global.php'); // Include template global variables

require "../../config/theme/vars.inc.php";
?>
<?php include '../../config/theme/head_start.php';?>
  <title><?php tpl_pagetitle() ?> [<?php echo strip_tags($conf['title']) ?>]</title>
  <script>(function(H){H.className=H.className.replace(/\bno-js\b/,'js')})(document.documentElement)</script>
  <meta name="viewport" content="width=device-width,initial-scale=1" />
  <?php// echo tpl_favicon(array('favicon', 'mobile')) ?>
  <?php tpl_includeFile('meta.html') ?>
  <?php foreach ($bootstrapStyles as  $bootstrapStyle): ?>
  <link type="text/css" rel="stylesheet" href="<?php echo $bootstrapStyle; ?>" />
  <?php endforeach; ?>
  <script type="text/javascript">/*<![CDATA[*/
    var TPL_CONFIG = <?php echo json_encode($tplConfigJSON); ?>;
  /*!]]>*/</script>
  <?php tpl_metaheaders() ?>
  <script type="text/javascript" src="<?php echo DOKU_TPL ?>assets/bootstrap/js/bootstrap.min.js"></script>
  <style type="text/css">
    body { padding-top: <?php echo (($fixedTopNavbar) ? '70' : '20'); ?>px; }
  </style>
  <!-- zotero.org head_end -->
    <!-- css -->
    <!-- fontawesome font CDN -->
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="<?=$staticUrl('/fonts/glyphicons/css/glyphicons.css')?>" rel="stylesheet">
    <link href="<?=$staticUrl('/fonts/glyphicons_halflings/css/glyphicons-halflings.css')?>" rel="stylesheet">
    
    <!-- theme_style.css, zotero_icons_sprite.css, and bootstrap_library_style.css are included in zorg_style via zorg.less -->
    <link rel="stylesheet" href="<?=$version("/css/zorg_style.css", $staticPath)?>"
        type="text/css" media="screen" charset="utf-8"/>
    <!-- css -->
    <?/*
    <script src="<?=$staticUrl('/library/modernizr/modernizr-1.7.min.js');?>"></script>
    <script type="text/javascript" charset="utf-8" src="<?=$version('/library/jquery/jquery-all.js', $staticPath);?>"></script>
    <script type="text/javascript" charset="utf-8" src="<?=$version('/js/compiled/_zoterowwwAll.bugly.js', $staticPath);?>"></script>
    */?>
    <?/*<script type="text/javascript" charset="utf-8" src="<?=$version('/library/bootstrap/js/bootstrap.min.js', $staticPath);?>"></script>*/?>
    <?/*
    <script type="text/javascript" charset="utf-8" src="<?=$version('/library/typeahead/typeahead.js', $staticPath);?>"></script>
    <script type="text/javascript" charset="utf-8">
        if(typeof zoteroData == 'undefined'){
            var zoteroData = {};
        }
        var baseURL = "<?=$baseUrl?>";
        var staticPath = "<?=$staticPath?>";
        var baseDomain = "<?=$baseDomain?>";
        var nonZendPage = true;
    </script>
    */?>
  <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script type="text/javascript" src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
  <script type="text/javascript" src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<?php tpl_flush() ?>
<body class="<?php echo (($bootstrapTheme == 'bootswatch') ? $bootswatchTheme : $bootstrapTheme) . ($pageOnPanel ? ' page-on-panel' : ''); ?> full-width">
  <!--[if lte IE 7 ]><div id="IE7"><![endif]--><!--[if IE 8 ]><div id="IE8"><![endif]-->
  <!-- Header -->
  <!-- zotero.org body_start -->
        <nav id="primarynav" class="navbar navbar-default" role="navigation" style="margin-bottom:20px;">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#primary-nav-linklist">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="glyphicons fonticon glyphicons-menu-hamburger"></span>
                    </button>
                    <a class="navbar-brand hidden-sm hidden-xs" href="<?=$baseUrl;?>/"><img src="<?=$staticUrl('/images/theme/zotero.png');?>" alt="Zotero" height="20px"></a>
                    <a class="navbar-brand visible-sm-block visible-xs-block" href="<?=$baseUrl;?>/"><img src="<?=$staticUrl('/images/theme/zotero_theme/zotero_48.png');?>" alt="Zotero" height="24px"></a>
                </div>

                <div class="collapse navbar-collapse" id="primary-nav-linklist">
                  <ul class="nav navbar-nav">
                      <li><a href="<?=$groupsUrl?>" class="groups">Groups</a></li>
                      <li <?=$documentationActive ? "class='active'" : "";?>><a href="<?=$documentationUrl?>" class="documentation">Documentation</a></li>
                      <li <?=$forumsActive ? "class='active'" : "";?>><a href="<?=$forumsUrl?>" class="forums">Forums</a></li>
                      <li><a href="<?=$getinvolvedUrl?>" class="getinvolved">Get Involved</a></li>
                  </ul>
                  <?php
                      $searchID = 'simple-search';
                      $searchPlaceholderText = 'Search Support';
                  ?>
                  <form class="navbar-form navbar-left" role="search" action="<?=($baseUrl . '/search')?>" id="<?=$searchID;?>">
                      <div class="input-group">
                          <input type="text" class="form-control" placeholder="<?=$searchPlaceholderText;?>">
                          <span class="input-group-btn">
                              <button type="submit" class="btn btn-default"><span class="glyphicons fonticon glyphicons-search"></span></button>
                          </span>
                      </div>
                  </form>
              
                  <!-- DOKUWIKI CONTROLS -->
                    <?php
                      include_once(dirname(__FILE__).'/tpl_tools_menu.php');
                      include_once(dirname(__FILE__).'/tpl_theme_switcher.php');
                      @include_once(dirname(__FILE__).'/tpl_translation.php');
                    ?>
                  <!-- /DOKUWIKI CONTROLS -->
                  <ul class="nav navbar-nav navbar-right">
                  <? if ($userInfo): ?>
                      <button type="button" href="#" class="btn btn-default navbar-btn dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                          <?=htmlspecialchars($displayName)?> <span class="glyphicons fonticon glyphicons-menu-hamburger"></span>
                      </button>
                      <ul class="dropdown-menu" role="menu">
                          <li><a href="<?=$settingsUrl?>">Settings</a></li>
                          <li><a href="<?=$inboxUrl?>">Inbox</a></li>
                          <li><a href="<?=$downloadUrl?>">Download</a></li>
                          <?php if($userIsAdmin):?>
                              <li><a href="<?=$dashboardUrl?>">Admin Dashboard</a></li>
                          <?php endif;?>
                          <li class="divider"></li>
                          <li><a href="<?=$documentationUrl;?>" class="documentation">Documentation</a></li>
                          <li><a href="<?=$forumsUrl?>/categories/" class="forums">Forums</a></li>
                          <li class="divider"></li>
                          <li><a href="<?=$logoutUrl?>">Log Out</a></li>
                      </ul>
                  <?else:?>
                      <button type="button" href="#" class="btn btn-default navbar-btn dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                          <span class="glyphicons fonticon glyphicons-menu-hamburger"></span>
                      </button>
                      <ul class="dropdown-menu" role="menu">
                          <li><a href="<?=$loginUrl?>">Log In</a></li>
                          <li><a href="<?=$downloadUrl?>">Download</a></li>
                          <li class="divider"></li>
                          <li><a href="<?=$documentationUrl?>" class="documentation">Documentation</a></li>
                          <li><a href="<?=$forumsUrl?>/categories/" class="forums">Forums</a></li>
                      </ul>
                  <?endif;?>
                </ul>
              </div>
            </div>
        </nav>


        <div id="content" class="container-fluid">
            <?if($outdatedVersion()):?>
                <div id="outdated-version-notification" style="background-color:#FFFECC; text-align:left; border:1px solid #FAEBB1; padding:5px 20px; margin-bottom:10px;">
                <p style="margin: 0; text-align: center;">Your version of Zotero for Firefox is out of date. <a href="https://www.zotero.org/download">Download the latest version.</a></p>
                </div>
                <?error_log($_SERVER['HTTP_X_ZOTERO_VERSION']);?>
            <?endif;?>
            
            <div class="row">
  <!-- end zotero.org body_start -->

  <div id="dokuwiki__site" class="container<?php echo ($fluidContainer) ? '-fluid' : '' ?>">
    <div id="dokuwiki__top" class="site <?php echo tpl_classes(); ?> <?php echo ($showSidebar) ? 'hasSidebar' : ''; ?>">

      <?php tpl_includeFile('topheader.html') ?>

      <!-- header -->
      <div id="dokuwiki__header">
        <?php //@require_once('tpl_navbar.php'); ?>
      </div>
      <!-- /header -->

      <?php tpl_includeFile('header.html') ?>

      <?php if ($conf['youarehere'] || $conf['breadcrumbs']): ?>
      <div id="dw__breadcrumbs">
        <hr/>
        <?php if($conf['youarehere']): ?>
        <div class="breadcrumb"><?php tpl_youarehere() ?></div>
        <?php endif; ?>
        <?php if($conf['breadcrumbs']): ?>
        <div class="breadcrumb hidden-print"><?php tpl_breadcrumbs() ?></div>
        <?php endif; ?>
        <hr/>
      </div>
      <?php endif ?>

      <p class="pageId text-right">
        <span class="label label-default"><?php echo hsc($ID) ?></span>
      </p>

      <?php html_msgarea() ?>

      <main class="main row" role="main">

        <?php if ($showSidebar && $sidebarPosition == 'left') _tpl_sidebar($conf['sidebar'], 'dokuwiki__aside', 'sidebarheader.html', 'sidebarfooter.html'); ?>

        <!-- ********** CONTENT ********** -->
        <article id="dokuwiki__content" class="<?php echo $contentClass ?>" <?php echo (($semantic) ? 'itemscope itemtype="http://schema.org/'.$schemaOrgType.'"' : '') ?>>

          <div class="<?php echo ($pageOnPanel ? 'panel panel-default' : 'no-panel') ?>" <?php echo (($semantic) ? 'itemprop="articleBody"' : '') ?>> 
            <div class="page group <?php echo ($pageOnPanel ? 'panel-body' : '') ?>">

              <?php tpl_flush() /* flush the output buffer */ ?>
              <?php tpl_includeFile('pageheader.html') ?>
              <?php
                // render the content into buffer for later use
                ob_start();
                tpl_content(false);
                $content = ob_get_clean();
              ?>

              <div class="pull-right hidden-print" data-spy="affix" data-offset-top="150" style="z-index:1024; top:<?php echo (($fixedTopNavbar) ? '60' : '10'); ?>px; right:10px;">
                <?php tpl_toc()?>
              </div>

              <!-- wikipage start -->
              <?php echo $content; ?>
              <!-- wikipage stop -->

              <?php tpl_flush() ?>
              <?php tpl_includeFile('pagefooter.html') ?>

            </div>
          </div>

        </article>

        <?php
          if ($showSidebar && $sidebarPosition == 'right') {
            _tpl_sidebar($conf['sidebar'], 'dokuwiki__aside',
                         'sidebarheader.html', 'sidebarfooter.html');
          }
          if ($showSidebar && $showRightSidebar && $sidebarPosition == 'left') {
            _tpl_sidebar($rightSidebar, 'dokuwiki__rightaside',
                         'rightsidebarheader.html', 'rightsidebarfooter.html');
          }
        ?>

      </main>

      <footer id="dokuwiki__footer" class="small hidden-print">

        <a href="javascript:void(0)" class="back-to-top hidden-print btn btn-default btn-sm" title="<?php echo $lang['skip_to_content'] ?>>" id="back-to-top"><i class="glyphicon glyphicon-chevron-up"></i></a>

        <?php if ($showPageInfo): ?>
        <div class="text-right">
          <p class="docInfo">
            <?php tpl_pageinfo() /* 'Last modified' etc */ ?>
          </p>
        </div>
        <?php endif ?>
        <div class="text-center">
          <p id="dw__license">
            <?php 
              tpl_license('');
              $target = ($conf['target']['extern']) ? 'target="'.$conf['target']['extern'].'"' : '';
            ?>
          </p>
          <?php if($showBadges): ?>
          <p id="dw__badges">
            <?php tpl_license('button', true, false, false); // license button, no wrapper ?>
            <a href="http://getbootstrap.com" title="Built with Bootstrap 3" <?php echo $target?>>
              <img src="<?php echo tpl_basedir(); ?>images/button-bootstrap3.png" width="80" height="15" alt="Built with Bootstrap 3" />
            </a>
            <a href="http://www.php.net" title="Powered by PHP" <?php echo $target?>>
              <img src="<?php echo dirname(tpl_basedir()); ?>/dokuwiki/images/button-php.gif" width="80" height="15" alt="Powered by PHP" />
            </a>
            <a href="http://validator.w3.org/check/referer" title="Valid HTML5" <?php echo $target?>>
              <img src="<?php echo dirname(tpl_basedir()); ?>/dokuwiki/images/button-html5.png" width="80" height="15" alt="Valid HTML5" />
            </a>
            <a href="http://jigsaw.w3.org/css-validator/check/referer?profile=css3" title="Valid CSS" <?php echo $target?>>
              <img src="<?php echo dirname(tpl_basedir()); ?>/dokuwiki/images/button-css.png" width="80" height="15" alt="Valid CSS" />
            </a>
            <a href="http://dokuwiki.org/" title="Driven by DokuWiki" <?php echo $target?>>
              <img src="<?php echo dirname(tpl_basedir()); ?>/dokuwiki/images/button-dw.png" width="80" height="15" alt="Driven by DokuWiki" />
            </a>
          </p>
          <?php endif ?>
        </div>
      </footer>

      <?php tpl_includeFile('footer.html') ?>

    </div><!-- /site -->

    <div class="no"><?php tpl_indexerWebBug() ?></div>
    <div id="screen__mode" class="no">
      <span class="visible-xs"></span>
      <span class="visible-sm"></span>
      <span class="visible-md"></span>
      <span class="visible-lg"></span>
    </div>
  </div>
  <!--[if ( lte IE 7 | IE 8 ) ]></div><![endif]-->
<?php include '../../config/theme/body_end.php'; ?>