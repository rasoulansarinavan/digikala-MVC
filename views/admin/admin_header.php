<!DOCTYPE html>
<html lang="en">
<head>
    <base href="<?= BASE ?>">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="public/images/favicon.ico">

    <title>Superieur Admin - Dashboard</title>
    <link rel="stylesheet" href="public/fonts/iranyekan/WebFonts/css/stylef.css">
    <!-- Bootstrap 4.0-->
    <link rel="stylesheet" href="public/assets/vendor_components/bootstrap/dist/css/bootstrap.css">

    <!-- Bootstrap extend-->
    <link rel="stylesheet" href="public/css/bootstrap-extend.css">
    <!-- Bootstrap select -->
    <link rel="stylesheet" href="public/assets/vendor_components/bootstrap-select/dist/css/bootstrap-select.css">
    <!--alerts CSS -->
    <link href="public/assets/vendor_components/sweetalert/sweetalert.css" rel="stylesheet" type="text/css">

    <!-- theme style -->
    <link rel="stylesheet" href="public/css/master_style.css">

    <!-- Superieur Admin skins -->
    <link rel="stylesheet" href="public/css/skins/_all-skins.css">

    <!-- Vector CSS -->
    <link href="public/assets/vendor_components/jvectormap/lib2/jquery-jvectormap-2.0.2.css" rel="stylesheet"/>
    <!-- Data Table-->
    <link rel="stylesheet" type="text/css" href="public/assets/vendor_components/datatable/datatables.min.css"/>

    <link rel="stylesheet" href="public/assets/vendor_plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.css">
    <script src="public/js/pages/editor.js"></script>


    <link rel="stylesheet" href="public/css/kamadatepicker.min.css">
    <script src="public/js/kamadatepicker.min.js"></script>


    <!-- Morris charts -->
    <link rel="stylesheet" href="public/assets/vendor_components/morris.js/morris.css">


    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->


</head>

<body class="hold-transition skin-info-light sidebar-mini fixed rtl">
<div class="wrapper">

    <header class="main-header">
        <!-- Logo -->
        <a href="index.html" class="logo">
            <!-- mini logo -->
            <div class="logo-mini">
                <span class="light-logo"><img src="public/images/logo-light.png" alt="logo"></span>
                <span class="dark-logo"><img src="public/images/logo-dark.png" alt="logo"></span>
            </div>
            <!-- logo-->
            <div class="logo-lg">
                <span class="light-logo"><img src="public/images/logo-light-text.png" alt="logo"></span>
                <span class="dark-logo"><img src="public/images/logo-dark-text.png" alt="logo"></span>
            </div>
        </a>
        <!-- Header Navbar -->
        <nav class="navbar navbar-static-top">
            <!-- Sidebar toggle button-->
            <div>
                <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                    <span class="sr-only">Toggle navigation</span>
                </a>
            </div>
            <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">

                    <li class="search-box">
                        <a class="nav-link hidden-sm-down" href="javascript:void(0)"><i class="mdi mdi-magnify"></i></a>
                        <form class="app-search" style="display: none;">
                            <input type="text" class="form-control" placeholder="Search &amp; enter"> <a
                                    class="srh-btn"><i class="ti-close"></i></a>
                        </form>
                    </li>
                    <!-- User Account-->
                    <li class="dropdown user user-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <img src="public/images/avatar/7.jpg" class="user-image rounded-circle" alt="User Image">
                        </a>
                        <ul class="dropdown-menu animated flipInY">
                            <!-- User image -->
                            <li class="user-header bg-img" style="background-image: url(../images/user-info.jpg)"
                                data-overlay="3">
                                <div class="flexbox align-self-center">
                                    <img src="public/images/avatar/7.jpg" class="float-left rounded-circle"
                                         alt="User Image">
                                    <h4 class="user-name align-self-center">
                                        <span>Samuel Brus</span>
                                        <small>samuel@gmail.com</small>
                                    </h4>
                                </div>
                            </li>
                            <!-- Menu Body -->
                            <li class="user-body">
                                <a class="dropdown-item" href="javascript:void(0)"><i class="ion ion-person"></i> My
                                    Profile</a>
                                <a class="dropdown-item" href="javascript:void(0)"><i class="ion ion-bag"></i> My
                                    Balance</a>
                                <a class="dropdown-item" href="javascript:void(0)"><i class="ion ion-email-unread"></i>
                                    Inbox</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="javascript:void(0)"><i class="ion ion-settings"></i>
                                    Account Setting</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="javascript:void(0)"><i class="ion-log-out"></i>
                                    Logout</a>
                                <div class="dropdown-divider"></div>
                                <div class="p-10"><a href="javascript:void(0)"
                                                     class="btn btn-sm btn-rounded btn-success">View Profile</a></div>
                            </li>
                        </ul>
                    </li>

                    <!-- Messages -->
                    <li class="dropdown messages-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="mdi mdi-email"></i>
                        </a>
                        <ul class="dropdown-menu animated fadeInDown">

                            <li class="header">
                                <div class="bg-img text-white p-20"
                                     style="background-image: url(../images/user-info.jpg)" data-overlay="5">
                                    <div class="flexbox">
                                        <div>
                                            <h3 class="mb-0 mt-0">5 New</h3>
                                            <span class="font-light">Messages</span>
                                        </div>
                                        <div class="font-size-40">
                                            <i class="mdi mdi-email-alert"></i>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <!-- inner menu: contains the actual data -->
                                <ul class="menu sm-scrol">
                                    <li><!-- start message -->
                                        <a href="#">
                                            <div class="pull-left">
                                                <img src="public/images/user2-160x160.jpg" class="rounded-circle"
                                                     alt="User Image">
                                            </div>
                                            <div class="mail-contnet">
                                                <h4>
                                                    Lorem Ipsum
                                                    <small><i class="fa fa-clock-o"></i> 15 mins</small>
                                                </h4>
                                                <span>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</span>
                                            </div>
                                        </a>
                                    </li>
                                    <!-- end message -->
                                    <li>
                                        <a href="#">
                                            <div class="pull-left">
                                                <img src="public/images/user3-128x128.jpg" class="rounded-circle"
                                                     alt="User Image">
                                            </div>
                                            <div class="mail-contnet">
                                                <h4>
                                                    Nullam tempor
                                                    <small><i class="fa fa-clock-o"></i> 4 hours</small>
                                                </h4>
                                                <span>Curabitur facilisis erat quis metus congue viverra.</span>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <div class="pull-left">
                                                <img src="public/images/user4-128x128.jpg" class="rounded-circle"
                                                     alt="User Image">
                                            </div>
                                            <div class="mail-contnet">
                                                <h4>
                                                    Proin venenatis
                                                    <small><i class="fa fa-clock-o"></i> Today</small>
                                                </h4>
                                                <span>Vestibulum nec ligula nec quam sodales rutrum sed luctus.</span>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <div class="pull-left">
                                                <img src="public/images/user3-128x128.jpg" class="rounded-circle"
                                                     alt="User Image">
                                            </div>
                                            <div class="mail-contnet">
                                                <h4>
                                                    Praesent suscipit
                                                    <small><i class="fa fa-clock-o"></i> Yesterday</small>
                                                </h4>
                                                <span>Curabitur quis risus aliquet, luctus arcu nec, venenatis neque.</span>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <div class="pull-left">
                                                <img src="public/images/user4-128x128.jpg" class="rounded-circle"
                                                     alt="User Image">
                                            </div>
                                            <div class="mail-contnet">
                                                <h4>
                                                    Donec tempor
                                                    <small><i class="fa fa-clock-o"></i> 2 days</small>
                                                </h4>
                                                <span>Praesent vitae tellus eget nibh lacinia pretium.</span>
                                            </div>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="footer">
                                <a href="#" class="text-white bg-info">See all e-Mails</a></li>
                        </ul>
                    </li>
                    <!-- Notifications -->
                    <li class="dropdown notifications-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="mdi mdi-bell"></i>
                        </a>
                        <ul class="dropdown-menu animated fadeInDown">

                            <li class="header">
                                <div class="bg-img text-white p-20"
                                     style="background-image: url(../images/user-info.jpg)" data-overlay="5">
                                    <div class="flexbox">
                                        <div>
                                            <h3 class="mb-0 mt-0">7 New</h3>
                                            <span class="font-light">Notifications</span>
                                        </div>
                                        <div class="font-size-40">
                                            <i class="mdi mdi-message-alert"></i>
                                        </div>
                                    </div>
                                </div>
                            </li>

                            <li>
                                <!-- inner menu: contains the actual data -->
                                <ul class="menu sm-scrol">
                                    <li>
                                        <a href="#">
                                            <i class="fa fa-users text-info"></i> Curabitur id eros quis nunc suscipit
                                            blandit.
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="fa fa-warning text-warning"></i> Duis malesuada justo eu sapien
                                            elementum, in semper diam posuere.
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="fa fa-users text-danger"></i> Donec at nisi sit amet tortor
                                            commodo porttitor pretium a erat.
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="fa fa-shopping-cart text-success"></i> In gravida mauris et nisi
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="fa fa-user text-danger"></i> Praesent eu lacus in libero dictum
                                            fermentum.
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="fa fa-user text-primary"></i> Nunc fringilla lorem
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="fa fa-user text-success"></i> Nullam euismod dolor ut quam
                                            interdum, at scelerisque ipsum imperdiet.
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="footer"><a href="#" class="text-white bg-danger">View all</a></li>
                        </ul>
                    </li>
                    <!-- Tasks-->
                    <li class="dropdown tasks-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="mdi mdi-bulletin-board"></i>
                        </a>
                        <ul class="dropdown-menu animated fadeInDown">

                            <li class="header">
                                <div class="bg-img text-white p-20"
                                     style="background-image: url(../images/user-info.jpg)" data-overlay="5">
                                    <div class="flexbox">
                                        <div>
                                            <h3 class="mb-0 mt-0">6 New</h3>
                                            <span class="font-light">Tasks</span>
                                        </div>
                                        <div class="font-size-40">
                                            <i class="mdi mdi-bulletin-board"></i>
                                        </div>
                                    </div>
                                </div>
                            </li>

                            <li>
                                <!-- inner menu: contains the actual data -->
                                <ul class="menu sm-scrol">
                                    <li><!-- Task item -->
                                        <a href="#">
                                            <h3>
                                                Lorem ipsum dolor sit amet
                                                <small class="pull-right">30%</small>
                                            </h3>
                                            <div class="progress xs">
                                                <div class="progress-bar progress-bar-danger" style="width: 30%"
                                                     role="progressbar"
                                                     aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                                                    <span class="sr-only">30% Complete</span>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    <!-- end task item -->
                                    <li><!-- Task item -->
                                        <a href="#">
                                            <h3>
                                                Vestibulum nec ligula
                                                <small class="pull-right">20%</small>
                                            </h3>
                                            <div class="progress xs">
                                                <div class="progress-bar progress-bar-info" style="width: 20%"
                                                     role="progressbar"
                                                     aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                                                    <span class="sr-only">20% Complete</span>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    <!-- end task item -->
                                    <li><!-- Task item -->
                                        <a href="#">
                                            <h3>
                                                Donec id leo ut ipsum
                                                <small class="pull-right">70%</small>
                                            </h3>
                                            <div class="progress xs">
                                                <div class="progress-bar progress-bar-success" style="width: 70%"
                                                     role="progressbar"
                                                     aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                                                    <span class="sr-only">70% Complete</span>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    <!-- end task item -->
                                    <li><!-- Task item -->
                                        <a href="#">
                                            <h3>
                                                Praesent vitae tellus
                                                <small class="pull-right">40%</small>
                                            </h3>
                                            <div class="progress xs">
                                                <div class="progress-bar progress-bar-warning" style="width: 40%"
                                                     role="progressbar"
                                                     aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                                                    <span class="sr-only">40% Complete</span>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    <!-- end task item -->
                                    <li><!-- Task item -->
                                        <a href="#">
                                            <h3>
                                                Nam varius sapien
                                                <small class="pull-right">80%</small>
                                            </h3>
                                            <div class="progress xs">
                                                <div class="progress-bar progress-bar-primary" style="width: 80%"
                                                     role="progressbar"
                                                     aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                                                    <span class="sr-only">80% Complete</span>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    <!-- end task item -->
                                    <li><!-- Task item -->
                                        <a href="#">
                                            <h3>
                                                Nunc fringilla
                                                <small class="pull-right">90%</small>
                                            </h3>
                                            <div class="progress xs">
                                                <div class="progress-bar progress-bar-info" style="width: 90%"
                                                     role="progressbar"
                                                     aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                                                    <span class="sr-only">90% Complete</span>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    <!-- end task item -->
                                </ul>
                            </li>
                            <li class="footer"><a href="#" class="text-white bg-warning">View all tasks</a></li>
                        </ul>
                    </li>
                    <!-- Control Sidebar Toggle Button -->
                    <li>
                        <a href="#" data-toggle="control-sidebar"><i class="fa fa-cog fa-spin"></i></a>
                    </li>
                </ul>
            </div>
        </nav>
    </header>

    <!-- Left side column. contains the logo and sidebar -->
    <aside class="main-sidebar">
        <!-- sidebar-->
        <section class="sidebar">

            <!-- sidebar menu-->
            <ul class="sidebar-menu" data-widget="tree">
                <li class="user-profile treeview">
                    <a href="index.html">
                        <img src="public/images/avatar/7.jpg" alt="user">
                        <span>
				<span class="d-block font-weight-600 font-size-16">Samuel Brus</span>
				<span class="email-id">samuel@gmail.com</span>
			  </span>
                        <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="javascript:void()"><i class="fa fa-user mr-5"></i>My Profile </a></li>
                        <li><a href="javascript:void()"><i class="fa fa-money mr-5"></i>My Balance</a></li>
                        <li><a href="javascript:void()"><i class="fa fa-envelope-open mr-5"></i>Inbox</a></li>
                        <li><a href="javascript:void()"><i class="fa fa-cog mr-5"></i>Account Setting</a></li>
                        <li><a href="javascript:void()"><i class="fa fa-power-off mr-5"></i>Logout</a></li>
                    </ul>
                </li>
                <li class="header nav-small-cap"><i class="mdi mdi-drag-horizontal mr-5"></i>PERSONAL</li>


                <li class="treeview active">
                    <a href="#">
                        <i class="mdi mdi-view-dashboard"></i>
                        <span>مربوط به محصولات</span>
                        <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="adminProduct/index"><i class="mdi mdi-toggle-switch-off"></i>مدیریت محصولات</a></li>
                        <li><a href="adminProduct/addProduct"><i class="mdi mdi-toggle-switch-off"></i>ایجاد محصول جدید</a></li>
                        <li><a href="adminProduct/special"><i class="mdi mdi-toggle-switch-off"></i>محصولات شگفت انگیز</a></li>
                    </ul>
                </li>
                <li class="treeview">
                    <a href="#">
                        <i class="mdi mdi-view-dashboard"></i>
                        <span>مربوط به دسته بندی ها</span>
                        <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="adminCategory/index"><i class="mdi mdi-toggle-switch-off"></i>مدیریت دسته بندی
                                ها</a></li>
                    </ul>
                </li>

                <li class="treeview">
                    <a href="#">
                        <i class="mdi mdi-content-copy"></i>
                        <span>مربوط به سفارشات</span>
                        <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="adminOrder/index"><i class="mdi mdi-toggle-switch-off"></i>مدیریت سفارشات</a></li>
                    </ul>
                </li>

                <li class="treeview">
                    <a href="#">
                        <i class="mdi mdi-tune-vertical"></i>
                        <span>گزارش گیری</span>
                        <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="adminReports/index"><i
                                        class="mdi mdi-toggle-switch-off"></i>گزارشات فروش</a>

                    </ul>
                </li>
                <li class="treeview">
                    <a href="#">
                        <i class="mdi mdi-tune-vertical"></i>
                        <span>کاربران</span>
                        <span class="pull-right-container"><i class="fa fa-angle-right pull-right"></i></span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="adminUsers/index"><i class="mdi mdi-toggle-switch-off"></i>مدیریت کاربران</a>
                    </ul>
                </li>

                <li class="treeview">
                    <a href="#">
                        <i class="mdi mdi-tune-vertical"></i>
                        <span>پرسش و پاسخ</span>
                        <span class="pull-right-container"><i class="fa fa-angle-right pull-right"></i></span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="adminQuestions/index"><i class="mdi mdi-toggle-switch-off"></i>مدیریت پرسشها و
                                پاسخها</a>
                    </ul>
                </li>

                <li class="header nav-small-cap"><i class="mdi mdi-drag-horizontal mr-5"></i>APPS</li>

                <li class="treeview">
                    <a href="#">
                        <i class="mdi mdi-mailbox"></i> <span>Mailbox</span>
                        <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="pages/mailbox_inbox.html"><i class="mdi mdi-toggle-switch-off"></i>Inbox</a></li>
                        <li><a href="pages/mailbox_compose.html"><i class="mdi mdi-toggle-switch-off"></i>Compose</a>
                        </li>
                        <li><a href="pages/mailbox_read_mail.html"><i class="mdi mdi-toggle-switch-off"></i>Read</a>
                        </li>
                    </ul>
                </li>

                <li class="treeview">
                    <a href="#">
                        <i class="mdi mdi-contacts"></i>
                        <span>Contact</span>
                        <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="pages/contact_app_chat.html"><i class="mdi mdi-toggle-switch-off"></i>Chat app</a>
                        </li>
                        <li><a href="pages/contact_app.html"><i class="mdi mdi-toggle-switch-off"></i>Contact / Employee</a>
                        </li>
                        <li><a href="pages/contact_userlist_grid.html"><i class="mdi mdi-toggle-switch-off"></i>Userlist
                                Grid</a></li>
                        <li><a href="pages/contact_userlist.html"><i class="mdi mdi-toggle-switch-off"></i>Userlist</a>
                        </li>
                    </ul>
                </li>

                <li class="treeview">
                    <a href="#">
                        <i class="mdi mdi-apps"></i>
                        <span>Extra</span>
                        <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="pages/extra_app_ticket.html"><i class="mdi mdi-toggle-switch-off"></i>Support
                                Ticket</a></li>
                        <li><a href="pages/extra_calendar.html"><i class="mdi mdi-toggle-switch-off"></i>Calendar</a>
                        </li>
                        <li><a href="pages/extra_profile.html"><i class="mdi mdi-toggle-switch-off"></i>Profile</a></li>
                        <li><a href="pages/extra_taskboard.html"><i class="mdi mdi-toggle-switch-off"></i>Project
                                DashBoard</a></li>
                    </ul>
                </li>


                <li class="header nav-small-cap"><i class="mdi mdi-drag-horizontal mr-5"></i>UI</li>


                <li class="treeview">
                    <a href="#">
                        <i class="mdi mdi-widgets"></i>
                        <span>UI Elements</span>
                        <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="pages/ui_badges.html"><i class="mdi mdi-toggle-switch-off"></i>Badges</a></li>
                        <li><a href="pages/ui_border_utilities.html"><i class="mdi mdi-toggle-switch-off"></i>Border</a>
                        </li>
                        <li><a href="pages/ui_buttons.html"><i class="mdi mdi-toggle-switch-off"></i>Buttons</a></li>
                        <li><a href="pages/ui_color_utilities.html"><i class="mdi mdi-toggle-switch-off"></i>Color</a>
                        </li>
                        <li><a href="pages/ui_dropdown.html"><i class="mdi mdi-toggle-switch-off"></i>Dropdown</a></li>
                        <li><a href="pages/ui_dropdown_grid.html"><i class="mdi mdi-toggle-switch-off"></i>Dropdown Grid</a>
                        </li>
                        <li><a href="pages/ui_typography.html"><i class="mdi mdi-toggle-switch-off"></i>Typography</a>
                        </li>
                        <li><a href="pages/ui_progress_bars.html"><i class="mdi mdi-toggle-switch-off"></i>Progress Bars</a>
                        </li>
                        <li><a href="pages/ui_grid.html"><i class="mdi mdi-toggle-switch-off"></i>Grid</a></li>
                        <li><a href="pages/ui_ribbons.html"><i class="mdi mdi-toggle-switch-off"></i>Ribbons</a></li>
                        <li><a href="pages/ui_sliders.html"><i class="mdi mdi-toggle-switch-off"></i>Sliders</a></li>
                        <li><a href="pages/ui_tab.html"><i class="mdi mdi-toggle-switch-off"></i>Tabs</a></li>
                        <li><a href="pages/ui_timeline.html"><i class="mdi mdi-toggle-switch-off"></i>Timeline</a></li>
                        <li><a href="pages/ui_timeline_horizontal.html"><i class="mdi mdi-toggle-switch-off"></i>Horizontal
                                Timeline</a></li>
                    </ul>
                </li>

                <li class="treeview">
                    <a href="#">
                        <i class="mdi mdi-chemical-weapon"></i>
                        <span>Icons</span>
                        <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="pages/icons_fontawesome.html"><i class="mdi mdi-toggle-switch-off"></i>Font Awesome</a>
                        </li>
                        <li><a href="pages/icons_glyphicons.html"><i
                                        class="mdi mdi-toggle-switch-off"></i>Glyphicons</a></li>
                        <li><a href="pages/icons_material.html"><i class="mdi mdi-toggle-switch-off"></i>Material Icons</a>
                        </li>
                        <li><a href="pages/icons_themify.html"><i class="mdi mdi-toggle-switch-off"></i>Themify
                                Icons</a></li>
                        <li><a href="pages/icons_simpleline.html"><i class="mdi mdi-toggle-switch-off"></i>Simple Line
                                Icons</a></li>
                        <li><a href="pages/icons_cryptocoins.html"><i class="mdi mdi-toggle-switch-off"></i>Cryptocoins
                                Icons</a></li>
                    </ul>
                </li>

                <li class="treeview">
                    <a href="#">
                        <i class="mdi mdi-cube"></i>
                        <span>Components</span>
                        <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="pages/component_bootstrap_switch.html"><i class="mdi mdi-toggle-switch-off"></i>Bootstrap
                                Switch</a></li>
                        <li><a href="pages/component_date_paginator.html"><i class="mdi mdi-toggle-switch-off"></i>Date
                                Paginator</a></li>
                        <li><a href="pages/component_media_advanced.html"><i class="mdi mdi-toggle-switch-off"></i>Advanced
                                Medias</a></li>
                        <li><a href="pages/component_modals.html"><i class="mdi mdi-toggle-switch-off"></i>Modals</a>
                        </li>
                        <li><a href="pages/component_nestable.html"><i
                                        class="mdi mdi-toggle-switch-off"></i>Nestable</a></li>
                        <li><a href="pages/component_notification.html"><i class="mdi mdi-toggle-switch-off"></i>Notification</a>
                        </li>
                        <li><a href="pages/component_portlet_draggable.html"><i class="mdi mdi-toggle-switch-off"></i>Draggable
                                Portlets</a></li>
                        <li><a href="pages/component_sweatalert.html"><i class="mdi mdi-toggle-switch-off"></i>Sweet
                                Alert</a></li>
                    </ul>
                </li>

                <li class="treeview">
                    <a href="#">
                        <i class="mdi mdi-checkerboard"></i>
                        <span>Box Cards</span>
                        <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="pages/box_cards.html"><i class="mdi mdi-toggle-switch-off"></i>User Card</a></li>
                        <li><a href="pages/box_advanced.html"><i class="mdi mdi-toggle-switch-off"></i>Advanced Card</a>
                        </li>
                        <li><a href="pages/box_basic.html"><i class="mdi mdi-toggle-switch-off"></i>Basic Card</a></li>
                        <li><a href="pages/box_color.html"><i class="mdi mdi-toggle-switch-off"></i>Card Color</a></li>
                        <li><a href="pages/box_group.html"><i class="mdi mdi-toggle-switch-off"></i>Card Group</a></li>
                    </ul>
                </li>

                <li class="treeview">
                    <a href="#">
                        <i class="mdi mdi-waves"></i>
                        <span>Widgets</span>
                        <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="pages/widgets_blog.html"><i class="mdi mdi-toggle-switch-off"></i>Blog</a></li>
                        <li><a href="pages/widgets_chart.html"><i class="mdi mdi-toggle-switch-off"></i>Chart</a></li>
                        <li><a href="pages/widgets_list.html"><i class="mdi mdi-toggle-switch-off"></i>List</a></li>
                        <li><a href="pages/widgets_social.html"><i class="mdi mdi-toggle-switch-off"></i>Social</a></li>
                        <li><a href="pages/widgets_statistic.html"><i
                                        class="mdi mdi-toggle-switch-off"></i>Statistic</a></li>
                        <li><a href="pages/widgets_weather.html"><i class="mdi mdi-toggle-switch-off"></i>Weather</a>
                        </li>
                        <li><a href="pages/widgets.html"><i class="mdi mdi-toggle-switch-off"></i>Widgets</a></li>
                    </ul>
                </li>


                <li class="header nav-small-cap"><i class="mdi mdi-drag-horizontal mr-5"></i>FORMS And TABLES</li>


                <li class="treeview">
                    <a href="#">
                        <i class="mdi mdi-receipt"></i>
                        <span>Forms</span>
                        <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="pages/forms_advanced.html"><i class="mdi mdi-toggle-switch-off"></i>Advanced
                                Elements</a></li>
                        <li><a href="pages/forms_code_editor.html"><i class="mdi mdi-toggle-switch-off"></i>Code Editor</a>
                        </li>
                        <li><a href="pages/forms_editor_markdown.html"><i class="mdi mdi-toggle-switch-off"></i>Markdown</a>
                        </li>
                        <li><a href="pages/forms_editors.html"><i class="mdi mdi-toggle-switch-off"></i>Editors</a></li>
                        <li><a href="pages/forms_validation.html"><i class="mdi mdi-toggle-switch-off"></i>Form
                                Validation</a></li>
                        <li><a href="pages/forms_wizard.html"><i class="mdi mdi-toggle-switch-off"></i>Form Wizard</a>
                        </li>
                        <li><a href="pages/forms_general.html"><i class="mdi mdi-toggle-switch-off"></i>General Elements</a>
                        </li>
                        <li><a href="pages/forms_mask.html"><i class="mdi mdi-toggle-switch-off"></i>Formatter</a></li>
                        <li><a href="pages/forms_xeditable.html"><i class="mdi mdi-toggle-switch-off"></i>Xeditable
                                Editor</a></li>
                    </ul>
                </li>

                <li class="treeview">
                    <a href="#">
                        <i class="mdi mdi-table"></i>
                        <span>Tables</span>
                        <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="pages/tables_simple.html"><i class="mdi mdi-toggle-switch-off"></i>Simple
                                tables</a></li>
                        <li><a href="pages/tables_data.html"><i class="mdi mdi-toggle-switch-off"></i>Data tables</a>
                        </li>
                        <li><a href="pages/tables_editable.html"><i class="mdi mdi-toggle-switch-off"></i>Editable
                                Tables</a></li>
                        <li><a href="pages/tables_color.html"><i class="mdi mdi-toggle-switch-off"></i>Table Color</a>
                        </li>
                    </ul>
                </li>


                <li class="header nav-small-cap"><i class="mdi mdi-drag-horizontal mr-5"></i>CHARTS</li>

                <li class="treeview">
                    <a href="#">
                        <i class="mdi mdi-chart-bar"></i>
                        <span>Chart</span>
                        <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="pages/charts_chartjs.html"><i class="mdi mdi-toggle-switch-off"></i>ChartJS</a>
                        </li>
                        <li><a href="pages/charts_flot.html"><i class="mdi mdi-toggle-switch-off"></i>Flot</a></li>
                        <li><a href="pages/charts_inline.html"><i class="mdi mdi-toggle-switch-off"></i>Inline
                                charts</a></li>
                        <li><a href="pages/charts_morris.html"><i class="mdi mdi-toggle-switch-off"></i>Morris</a></li>
                        <li><a href="pages/charts_peity.html"><i class="mdi mdi-toggle-switch-off"></i>Peity</a></li>
                        <li><a href="pages/charts_chartist.html"><i class="mdi mdi-toggle-switch-off"></i>Chartist</a>
                        </li>
                    </ul>
                </li>


                <li class="header nav-small-cap"><i class="mdi mdi-drag-horizontal mr-5"></i>EXTRA COMPONENTS</li>

                <li>
                    <a href="pages/email_index.html">
                        <i class="mdi mdi-email"></i>
                        <span>Emails</span>
                    </a>
                </li>

                <li class="treeview">
                    <a href="#">
                        <i class="mdi mdi-map-marker"></i>
                        <span>Map</span>
                        <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="pages/map_google.html"><i class="mdi mdi-toggle-switch-off"></i>Google Map</a></li>
                        <li><a href="pages/map_vector.html"><i class="mdi mdi-toggle-switch-off"></i>Vector Map</a></li>
                    </ul>
                </li>
                <li class="treeview">
                    <a href="#">
                        <i class="mdi mdi-gradient"></i>
                        <span>Extension</span>
                        <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="pages/extension_fullscreen.html"><i class="mdi mdi-toggle-switch-off"></i>Fullscreen</a>
                        </li>
                        <li><a href="pages/extension_pace.html"><i class="mdi mdi-toggle-switch-off"></i>Pace</a></li>
                    </ul>
                </li>


                <li class="header nav-small-cap"><i class="mdi mdi-drag-horizontal mr-5"></i>SAMPLE PAGES</li>


                <li class="treeview">
                    <a href="#">
                        <i class="mdi mdi-cart-outline"></i>
                        <span>Ecommerce Pages</span>
                        <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="pages/ecommerce_products.html"><i
                                        class="mdi mdi-toggle-switch-off"></i>Products</a></li>
                        <li><a href="pages/ecommerce_cart.html"><i class="mdi mdi-toggle-switch-off"></i>Products
                                Cart</a></li>
                        <li><a href="pages/ecommerce_products_edit.html"><i class="mdi mdi-toggle-switch-off"></i>Products
                                Edit</a></li>
                        <li><a href="pages/ecommerce_details.html"><i class="mdi mdi-toggle-switch-off"></i>Product
                                Details</a></li>
                        <li><a href="pages/ecommerce_orders.html"><i class="mdi mdi-toggle-switch-off"></i>Product
                                Orders</a></li>
                        <li><a href="pages/ecommerce_checkout.html"><i class="mdi mdi-toggle-switch-off"></i>Products
                                Checkout</a></li>
                    </ul>
                </li>

                <li class="treeview">
                    <a href="#">
                        <i class="mdi mdi-account-circle"></i>
                        <span>Authentication</span>
                        <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="pages/auth_login.html"><i class="mdi mdi-toggle-switch-off"></i>Login</a></li>
                        <li><a href="pages/auth_login2.html"><i class="mdi mdi-toggle-switch-off"></i>Login 2</a></li>
                        <li><a href="pages/auth_register.html"><i class="mdi mdi-toggle-switch-off"></i>Register</a>
                        </li>
                        <li><a href="pages/auth_register2.html"><i class="mdi mdi-toggle-switch-off"></i>Register 2</a>
                        </li>
                        <li><a href="pages/auth_lockscreen.html"><i class="mdi mdi-toggle-switch-off"></i>Lockscreen</a>
                        </li>
                        <li><a href="pages/auth_user_pass.html"><i class="mdi mdi-toggle-switch-off"></i>Recover
                                password</a></li>
                    </ul>
                </li>

                <li class="treeview">
                    <a href="#">
                        <i class="mdi mdi-ungroup"></i>
                        <span>Invoice</span>
                        <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="pages/invoice.html"><i class="mdi mdi-toggle-switch-off"></i>Invoice</a></li>
                        <li><a href="pages/invoicelist.html"><i class="mdi mdi-toggle-switch-off"></i>Invoice List</a>
                        </li>
                    </ul>
                </li>

                <li class="treeview">
                    <a href="#">
                        <i class="mdi mdi-alert-box"></i>
                        <span>Error Pages</span>
                        <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="pages/error_400.html"><i class="mdi mdi-toggle-switch-off"></i>Error 400</a></li>
                        <li><a href="pages/error_403.html"><i class="mdi mdi-toggle-switch-off"></i>Error 403</a></li>
                        <li><a href="pages/error_404.html"><i class="mdi mdi-toggle-switch-off"></i>Error 404</a></li>
                        <li><a href="pages/error_500.html"><i class="mdi mdi-toggle-switch-off"></i>Error 500</a></li>
                        <li><a href="pages/error_503.html"><i class="mdi mdi-toggle-switch-off"></i>Error 503</a></li>
                        <li><a href="pages/error_maintenance.html"><i class="mdi mdi-toggle-switch-off"></i>Maintenance</a>
                        </li>
                    </ul>
                </li>

                <li class="treeview">
                    <a href="#">
                        <i class="mdi mdi-file"></i>
                        <span>Sample Pages</span>
                        <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="pages/sample_blank.html"><i class="mdi mdi-toggle-switch-off"></i>Blank</a></li>
                        <li><a href="pages/sample_coming_soon.html"><i class="mdi mdi-toggle-switch-off"></i>Coming Soon</a>
                        </li>
                        <li><a href="pages/sample_custom_scroll.html"><i class="mdi mdi-toggle-switch-off"></i>Custom
                                Scrolls</a></li>
                        <li><a href="pages/sample_faq.html"><i class="mdi mdi-toggle-switch-off"></i>FAQ</a></li>
                        <li><a href="pages/sample_gallery.html"><i class="mdi mdi-toggle-switch-off"></i>Gallery</a>
                        </li>
                        <li><a href="pages/sample_lightbox.html"><i class="mdi mdi-toggle-switch-off"></i>Lightbox Popup</a>
                        </li>
                        <li><a href="pages/sample_pricing.html"><i class="mdi mdi-toggle-switch-off"></i>Pricing</a>
                        </li>
                    </ul>
                </li>


                <li class="header nav-small-cap"><i class="mdi mdi-drag-horizontal mr-5"></i>EXTRA</li>

                <li class="treeview">
                    <a href="#">
                        <i class="mdi mdi-notification-clear-all"></i>
                        <span>Multilevel</span>
                        <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="#">Level One</a></li>
                        <li class="treeview">
                            <a href="#">Level One
                                <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="#">Level Two</a></li>
                                <li class="treeview">
                                    <a href="#">Level Two
                                        <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
                                    </a>
                                    <ul class="treeview-menu">
                                        <li><a href="#">Level Three</a></li>
                                        <li><a href="#">Level Three</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li><a href="#">Level One</a></li>
                    </ul>
                </li>

                <li>
                    <a href="pages/auth_login.html">
                        <i class="mdi mdi-directions"></i>
                        <span>Log Out</span>
                    </a>
                </li>

            </ul>
        </section>
    </aside>

