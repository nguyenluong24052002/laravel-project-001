<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <title>PHP Project - SUNTECH</title>

    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/img/favicon.png') }}">

    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/css/font-awesome.min.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/css/feathericon.min.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/plugins/morris/morris.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
</head>

<body>

<div class="main-wrapper">
    <div class="header">
        <div class="header-left">
            <a href="{{ route('admin.dashboard') }}" class="logo">
                <img src="{{ asset('assets/img/logo.png') }}" alt="Logo">
            </a>
            <a href="{{ route('admin.dashboard') }}" class="logo logo-small">
                <img src="{{ asset('assets/img/logo-small.png') }}" alt="Logo" width="30" height="30">
            </a>
        </div>

        <a href="javascript:void(0);" id="toggle_btn">
            <i class="fe fe-text-align-left"></i>
        </a>
        <div class="top-nav-search">
            <form>
                <input type="text" class="form-control" placeholder="Search here">
                <button class="btn" type="submit"><i class="fa fa-search"></i></button>
            </form>
        </div>

        <a class="mobile_btn" id="mobile_btn">
            <i class="fa fa-bars"></i>
        </a>


        <ul class="nav user-menu">

            <li class="nav-item dropdown noti-dropdown">
                <a href="#" class="dropdown-toggle nav-link" data-bs-toggle="dropdown">
                    <i class="fa fa-bell"></i> <span class="badge badge-pill">3</span>
                </a>
                <div class="dropdown-menu notifications">
                    <div class="topnav-dropdown-header">
                        <span class="notification-title">Notifications</span>
                        <a href="javascript:void(0)" class="clear-noti"> Clear All </a>
                    </div>
                    <div class="noti-content">
                        <ul class="notification-list">
                            <li class="notification-message">
                                <a href="#">
                                    <div class="media d-flex">
                                            <span class="avatar avatar-sm flex-shrink-0">
                                                <img class="avatar-img rounded-circle" alt="User Image"
                                                     src="{{ asset('assets/img/profiles/avatar-02.jpg') }}">
                                            </span>
                                        <div class="media-body flex-grow-1">
                                            <p class="noti-details"><span class="noti-title">Carlson Tech</span> has
                                                approved <span class="noti-title">your estimate</span></p>
                                            <p class="noti-time"><span class="notification-time">4 mins ago</span>
                                            </p>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li class="notification-message">
                                <a href="#">
                                    <div class="media d-flex">
                                            <span class="avatar avatar-sm flex-shrink-0">
                                                <img class="avatar-img rounded-circle" alt="User Image"
                                                     src="{{ asset('assets/img/profiles/avatar-11.jpg') }}">
                                            </span>
                                        <div class="media-body flex-grow-1">
                                            <p class="noti-details"><span class="noti-title">International Software
                                                        Inc</span> has sent you a invoice in the amount of <span
                                                    class="noti-title">$218</span></p>
                                            <p class="noti-time"><span class="notification-time">6 mins ago</span>
                                            </p>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li class="notification-message">
                                <a href="#">
                                    <div class="media d-flex">
                                            <span class="avatar avatar-sm flex-shrink-0">
                                                <img class="avatar-img rounded-circle" alt="User Image"
                                                     src="{{ asset('assets/img/profiles/avatar-17.jpg') }}">
                                            </span>
                                        <div class="media-body flex-grow-1">
                                            <p class="noti-details"><span class="noti-title">John Hendry</span> sent
                                                a cancellation request <span class="noti-title">Apple iPhone
                                                        XR</span></p>
                                            <p class="noti-time"><span class="notification-time">8 mins ago</span>
                                            </p>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li class="notification-message">
                                <a href="#">
                                    <div class="media d-flex">
                                            <span class="avatar avatar-sm flex-shrink-0">
                                                <img class="avatar-img rounded-circle" alt="User Image"
                                                     src="{{ asset('assets/img/profiles/avatar-13.jpg') }}">
                                            </span>
                                        <div class="media-body flex-grow-1">
                                            <p class="noti-details"><span class="noti-title">Mercury Software
                                                        Inc</span> added a new product <span class="noti-title">Apple
                                                        MacBook Pro</span></p>
                                            <p class="noti-time"><span class="notification-time">12 mins ago</span>
                                            </p>
                                        </div>
                                    </div>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="topnav-dropdown-footer">
                        <a href="#">View all Notifications</a>
                    </div>
                </div>
            </li>


            <li class="nav-item dropdown has-arrow">
                <a href="#" class="dropdown-toggle nav-link" data-bs-toggle="dropdown">
                        <span class="user-img"><img class="rounded-circle" src="{{ asset('assets/img/profiles/avatar-01.jpg') }}"
                                                    width="31" alt="Seema Sisty"></span>
                </a>
                <div class="dropdown-menu">
                    <div class="user-header">
                        <div class="avatar avatar-sm">
                            <img src="{{ asset('assets/img/profiles/avatar-01.jpg') }}" alt="User Image"
                                 class="avatar-img rounded-circle">
                        </div>
                        <div class="user-text">
                            <h6>Seema Sisty</h6>
                            <p class="text-muted mb-0">Administrator</p>
                        </div>
                    </div>
                    <a class="dropdown-item" href="general.html">My Profile</a>
                    <a class="dropdown-item" href="general.html">Account Settings</a>
                    <a class="dropdown-item" href="login.html">Logout</a>
                </div>
            </li>

        </ul>

    </div>


    <div class="sidebar" id="sidebar">
        <div class="sidebar-inner slimscroll">
            <div id="sidebar-menu" class="sidebar-menu">
                <ul>
                    <li class="<?= request()->is('admin*') ? 'active' : false?>">
                        <a href="{{ route('admin.dashboard') }}"><i class="fe fe-home"></i> <span>Dashboard</span></a>
                    </li>
                    <li>
                        <a href="{{ route('admin.category.index') }}"><i class="fe fe-layout"></i> <span>Quản lý danh mục</span></a>
                    </li>
                    <li>
                        <a href="{{ route('admin.product.index') }}"><i class="fe fe-layout"></i> <span>Quản lý sản phẩm</span></a>
                    </li>
                    <li>
                        <a href="{{ route('admin.order.index') }}"><i class="fe fe-layout"></i> <span>Đơn đặt hàng</span></a>
                    </li>
                    <li>
                        <a href="{{ route('admin.customer.index') }}"><i class="fe fe-layout"></i> <span>Quản lý khách hàng</span></a>
                    </li>
                    <li class="submenu">
                        <a href=""><i class="fe fe-users"></i> <span> Tài khoản </span> <span
                                class="menu-arrow"></span></a>
                        <ul style="display: none;">
                            <li><a href="{{ route('admin.user.index') }}">Tài khoản quản trị</a></li>
                            <li><a href="blocked-users.html">Quản lý quyền hạn</a></li>
                        </ul>
                    </li>
                    <li class="submenu">
                        <a href=""><i class="fe fe-gear"></i> <span> Cài đặt chung </span> <span
                                class="menu-arrow"></span></a>
                        <ul style="display: none;">
                            <li><a href="{{ route('admin.setting.index') }}">Thông tin chung</a></li>
                            <li><a href="admob.html"> </a></li>
                            <li><a href="sinch-settings.html">Sinch Settings </a></li>
                            <li><a href="firebase-settings.html">Firebase Settings </a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </div>


    <div class="page-wrapper">
        <div class="content container-fluid">
            <div class="row">
                <div class="col-xl-3 col-sm-3 col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="dash-widget-header">
                                    <span class="dash-widget-icon bg-primary">
                                        <i class="fe fe-users"></i>
                                    </span>
                                <div class="dash-count">
                                    <a href="#" class="count-title">Thành viên</a>
                                    <a href="#" class="count"> 10,320</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-3 col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="dash-widget-header">
                                    <span class="dash-widget-icon bg-warning">
                                        <i class="fa fa-briefcase" aria-hidden="true"></i>
                                    </span>
                                <div class="dash-count">
                                    <a href="#" class="count-title">Danh mục</a>
                                    <a href="#" class="count"> 14,628</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-3 col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="dash-widget-header">
                                    <span class="dash-widget-icon bg-danger">
                                        <i class="fa fa-product-hunt" aria-hidden="true"></i>
                                    </span>
                                <div class="dash-count">
                                    <a href="#" class="count-title">Sản phẩm</a>
                                    <a href="#" class="count"> 2,980</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-3 col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="dash-widget-header">
                                    <span class="dash-widget-icon bg-info">
                                        <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                                    </span>
                                <div class="dash-count">
                                    <a href="#" class="count-title">Đơn đặt hàng</a>
                                    <a href="#" class="count"> 2,980</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 d-flex">

                    <div class="card card-table flex-fill">
                        <div class="card-header">
                            <h4 class="card-title float-start">Đơn đặt hàng mới nhất</h4>
                            <div class="table-search float-end">
                                <input type="text" class="form-control" placeholder="Search">
                                <button class="btn" type="submit"><i class="fa fa-search"></i></button>
                            </div>
                        </div>
                        <hr>
                        <div class="card-body">
                            <div class="table-responsive no-radius">
                                <table class="table table-hover table-center">
                                    <thead>
                                    <tr>
                                        <th>Mã đơn hàng</th>
                                        <th>Ngày đặt hàng</th>
                                        <th>Tên khách hàng</th>
                                        <th class="text-center">Số lượng sản phẩm</th>
                                        <th class="text-center">Tổng tiền</th>
                                        <th class="text-end">Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td class="text-nowrap">
                                            <div class="font-weight-600">06456546</div>
                                        </td>
                                        <td class="text-nowrap">
                                            <div class="font-weight-600">20-10-2021</div>
                                        </td>
                                        <td class="text-nowrap">Scott Albright</td>
                                        <td class="text-center">20 Jan 2019</td>
                                        <td class="text-center">
                                            15 mins ago
                                        </td>
                                        <td class="text-end">
                                            <div class="actions">
                                                <a href="#" class="btn btn-sm bg-success-light me-2">
                                                    <i class="fe fe-eye"></i>
                                                </a>
                                                <a href="#" class="btn btn-sm bg-danger-light">
                                                    <i class="fe fe-close"></i>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-nowrap">
                                            <div class="font-weight-600">06456546</div>
                                        </td>
                                        <td class="text-nowrap">
                                            <div class="font-weight-600">20-10-2021</div>
                                        </td>
                                        <td class="text-nowrap">Kevin Howard</td>
                                        <td class="text-center">10 Mar 2019</td>
                                        <td class="text-center">
                                            Just Now
                                        </td>
                                        <td class="text-end">
                                            <div class="actions">
                                                <a href="#" class="btn btn-sm bg-success-light me-2">
                                                    <i class="fe fe-eye"></i>
                                                </a>
                                                <a href="#" class="btn btn-sm bg-danger-light">
                                                    <i class="fe fe-close"></i>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-nowrap">
                                            <div class="font-weight-600">06456546</div>
                                        </td>
                                        <td class="text-nowrap">
                                            <div class="font-weight-600">20-10-2021</div>
                                        </td>
                                        <td class="text-nowrap">Eric Knight</td>
                                        <td class="text-center">
                                            24 Jun 2019</td>
                                        <td class="text-center">
                                            1 hr ago
                                        </td>
                                        <td class="text-end">
                                            <div class="actions">
                                                <a href="#" class="btn btn-sm bg-success-light me-2">
                                                    <i class="fe fe-eye"></i>
                                                </a>
                                                <a href="#" class="btn btn-sm bg-danger-light">
                                                    <i class="fe fe-close"></i>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-nowrap">
                                            <div class="font-weight-600">06456546</div>
                                        </td>
                                        <td class="text-nowrap">
                                            <div class="font-weight-600">20-10-2021</div>
                                        </td>
                                        <td class="text-nowrap">Irene Perkins</td>
                                        <td class="text-center">
                                            09 Sep 2019</td>
                                        <td class="text-center">
                                            3 mins ago
                                        </td>
                                        <td class="text-end">
                                            <div class="actions">
                                                <a href="#" class="btn btn-sm bg-success-light me-2">
                                                    <i class="fe fe-eye"></i>
                                                </a>
                                                <a href="#" class="btn btn-sm bg-danger-light">
                                                    <i class="fe fe-close"></i>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-nowrap">
                                            <div class="font-weight-600">06456546</div>
                                        </td>
                                        <td class="text-nowrap">
                                            <div class="font-weight-600">20-10-2021</div>
                                        </td>
                                        <td class="text-nowrap">Carol Andre</td>
                                        <td class="text-center">10 Oct 2020</td>
                                        <td class="text-center">
                                            1 day ago
                                        </td>
                                        <td class="text-end">
                                            <div class="actions">
                                                <a href="#" class="btn btn-sm bg-success-light me-2">
                                                    <i class="fe fe-eye"></i>
                                                </a>
                                                <a href="#" class="btn btn-sm bg-danger-light">
                                                    <i class="fe fe-close"></i>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

</div>


<script src="{{ asset('assets/js/jquery-3.6.0.min.js') }}"></script>

<script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>

<script src="{{ asset('assets/plugins/slimscroll/jquery.slimscroll.min.js') }}"></script>

<script src="{{ asset('assets/js/script.js') }}"></script>
</body>

</html>