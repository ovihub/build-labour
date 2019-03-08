<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo isset( $title ) ? $title : '' ?></title>

    <!-- Global stylesheets -->
    <!--<link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">-->
    <link href="/themes/limit/css/bootstrap.css" rel="stylesheet" type="text/css">
    <link href="/themes/limit/css/core.css" rel="stylesheet" type="text/css">
    <link href="/themes/limit/css/components.css" rel="stylesheet" type="text/css">
    <link href="/themes/limit/css/colors.css" rel="stylesheet" type="text/css">
    <link href="/themes/limit/css/icons/icomoon/styles.css" rel="stylesheet" type="text/css">
    <link href="/css/fa/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <!-- /global stylesheets -->
    <?php //echo \Helpers\Layout::instance()->renderPageStyles() ?>
    <style>
        [v-cloak] { display:none; },
    </style>
</head>

<body class="sidebar-xs sidebar-xs-indicator">

<!-- Main navbar -->
<div class="navbar navbar-inverse">
    <div class="navbar-header">
        <ul class="nav navbar-nav pull-left">
            <li><a class="sidebar-control sidebar-main-toggle hidden-xs">
                    <i class="icon-paragraph-justify3"></i></a>
            </li>
        </ul>
        <a class="navbar-brand"><b><?php echo isset( $header_tag )  ? $header_tag : env('SITE_NAME') ?></b></a>
        <!--
        <ul class="nav navbar-nav visible-xs-block">
            <li><a data-toggle="collapse" data-target="#navbar-mobile"><i class="icon-tree5"></i></a></li>
            <li><a class="sidebar-mobile-main-toggle"><i class="icon-paragraph-justify3"></i></a></li>
        </ul>
        -->
    </div>
    <div class="navbar-collapse collapse" id="navbar-mobile">

        <ul class="nav navbar-nav navbar-right">
            <li class="dropdown dropdown-user">
                <a class="dropdown-toggle" data-toggle="dropdown">
                    <img src="/images/logo1.png" alt="">
                    <span><?php //echo \Users\UserEntity::me()->displayName( 'abbr' ) ?></span>
                    <i class="caret"></i>
                </a>

                <ul class="dropdown-menu dropdown-menu-right">
                    <!--
                    <li><a href="#"><i class="icon-user-plus"></i> My profile</a></li>
                    <li><a href="#"><span class="badge badge-warning pull-right">58</span>
                            <i class="icon-comment-discussion"></i> Messages</a></li>
                    <li class="divider"></li>
                    <li><a href="#"><i class="icon-cog5"></i> Account settings</a></li>
                    -->
                    <?php  $client = \App\Models\Clients\Clients::instance(); ?>
                    <?php if( isset( $client->id ) ){ ?>
                        <li><a href="<?php echo Url('clients/change_password') ?>"><i class="icon-key"></i> Change Password</a></li>
                    <?php } ?>
                    <li><a href="<?php echo Url('logout') ?>"><i class="icon-switch2"></i> Logout</a></li>
                </ul>
            </li>
        </ul>
    </div>
</div>
<!-- /main navbar -->


<!-- Page container -->
<div class="page-container">

<!-- Page content -->
<div class="page-content">

<!-- Main sidebar -->
<div class="sidebar sidebar-main">
    <div class="sidebar-content">

        <!-- User menu -->
        <div class="sidebar-user">
            <div class="category-content">
                <div class="media">
                    <a href="#" class="media-left">
                        <img src="/images/logo1.png" class="img-circle img-sm" alt="">
                    </a>
                    <div class="media-body">
                        <span class="media-heading text-semibold"><?php //echo \App\Models\Users\UserEntity::me()->displayName('simplest') ?> Admin </span>
                    </div>


                </div>
            </div>
        </div>
        <!-- /user menu -->

        <!-- Main navigation -->
        <?php echo isset( $sidemenu ) ? $sidemenu    : ''  ?>
        <!-- /main navigation -->

    </div>
</div>
<!-- /main sidebar -->


<!-- Main content -->
<div class="content-wrapper">

<!-- Page header -->
<div class="page-header page-header-default">


    <div class="breadcrumb-line">
        <ul class="breadcrumb pull-right">

        </ul>
        <div class="" style="padding:2px">
            <h4><b> <?php echo isset( $content_title ) ? $content_title : '' ?> </b> </h4>
        </div>
        <ul class="breadcrumb-elements">
            <!--
            <li><a href="#"><i class="icon-comment-discussion position-left"></i>Messages</a></li>
            <li><a href="#"><i class="icon-earth position-left"></i>Notifications</a></li>
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    <i class="icon-gear position-left"></i>
                    Dropdown
                    <span class="caret"></span>
                </a>

                <ul class="dropdown-menu dropdown-menu-right">
                    <li><a href="#"><i class="icon-user-lock"></i> Account security</a></li>
                    <li><a href="#"><i class="icon-statistics"></i> Analytics</a></li>
                    <li><a href="#"><i class="icon-accessibility"></i> Accessibility</a></li>
                    <li class="divider"></li>
                    <li><a href="#"><i class="icon-gear"></i> All settings</a></li>
                </ul>
            </li>
            -->
        </ul>
    </div>
</div>
<!-- /page header -->


<!-- Content area -->
<div class="content">

<?php echo $content ?>

<!-- Footer -->
<div class="footer text-muted">
   &copy Safe Student App <?php echo date( 'Y' ) ?>
</div>
<!-- /footer -->

</div>
<!-- /content area -->

</div>
<!-- /main content -->

</div>
<!-- /page content -->

</div>


<!-- /page container -->
<!-- Core JS files -->
<script type="text/javascript" src="/plugins/jquery/jquery.min.js"></script>
<script type="text/javascript" src="/plugins/bootstrap/bootstrap.min.js"></script>
<script type="text/javascript" src="/plugins/vue/vue-2.4.4.js"></script>
<!-- /core JS files -->

<!-- Theme JS files -->
<script type="text/javascript" src="/themes/limit/js/app.js"></script>
<!-- /theme JS files -->
<?php //echo \Helpers\Layout::instance()->renderPageScripts() ?>


</body>
</html>


