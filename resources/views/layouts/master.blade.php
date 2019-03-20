<!DOCTYPE html>
<html lang="en">
<head>
    <title>Skill Jobs</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Main CSS-->
    <link rel="stylesheet" type="text/css" href="{{url('assets/vali/css/main.css')}}">
    <!-- Font-icon css-->
    <link rel="stylesheet" type="text/css"
          href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    @stack('style')
    <link rel="stylesheet" type="text/css" href="{{url('assets/vali/css/style.css')}}">
</head>
<body class="app sidebar-mini rtl">
<!-- Navbar-->
<header class="app-header"><a class="app-header__logo" href="index.html">Vali</a>
    <!-- Sidebar toggle button--><a class="app-sidebar__toggle" href="#" data-toggle="sidebar"
                                    aria-label="Hide Sidebar"></a>
    <!-- Navbar Right Menu-->
    <ul class="app-nav">
        <li class="app-search">
            <input class="app-search__input" type="search" placeholder="Search">
            <button class="app-search__button"><i class="fa fa-search"></i></button>
        </li>
        <!--Notification Menu-->
        <li class="dropdown"><a class="app-nav__item" href="#" data-toggle="dropdown" aria-label="Show notifications"><i
                        class="fa fa-bell-o fa-lg"></i></a>
            <ul class="app-notification dropdown-menu dropdown-menu-right">
                <li class="app-notification__title">You have 4 new notifications.</li>
                <div class="app-notification__content">
                    <li><a class="app-notification__item" href="javascript:;"><span class="app-notification__icon"><span
                                        class="fa-stack fa-lg"><i class="fa fa-circle fa-stack-2x text-primary"></i><i
                                            class="fa fa-envelope fa-stack-1x fa-inverse"></i></span></span>
                            <div>
                                <p class="app-notification__message">Lisa sent you a mail</p>
                                <p class="app-notification__meta">2 min ago</p>
                            </div>
                        </a></li>
                    <li><a class="app-notification__item" href="javascript:;"><span class="app-notification__icon"><span
                                        class="fa-stack fa-lg"><i class="fa fa-circle fa-stack-2x text-danger"></i><i
                                            class="fa fa-hdd-o fa-stack-1x fa-inverse"></i></span></span>
                            <div>
                                <p class="app-notification__message">Mail server not working</p>
                                <p class="app-notification__meta">5 min ago</p>
                            </div>
                        </a></li>
                    <li><a class="app-notification__item" href="javascript:;"><span class="app-notification__icon"><span
                                        class="fa-stack fa-lg"><i class="fa fa-circle fa-stack-2x text-success"></i><i
                                            class="fa fa-money fa-stack-1x fa-inverse"></i></span></span>
                            <div>
                                <p class="app-notification__message">Transaction complete</p>
                                <p class="app-notification__meta">2 days ago</p>
                            </div>
                        </a></li>
                    <div class="app-notification__content">
                        <li><a class="app-notification__item" href="javascript:;"><span
                                        class="app-notification__icon"><span class="fa-stack fa-lg"><i
                                                class="fa fa-circle fa-stack-2x text-primary"></i><i
                                                class="fa fa-envelope fa-stack-1x fa-inverse"></i></span></span>
                                <div>
                                    <p class="app-notification__message">Lisa sent you a mail</p>
                                    <p class="app-notification__meta">2 min ago</p>
                                </div>
                            </a></li>
                        <li><a class="app-notification__item" href="javascript:;"><span
                                        class="app-notification__icon"><span class="fa-stack fa-lg"><i
                                                class="fa fa-circle fa-stack-2x text-danger"></i><i
                                                class="fa fa-hdd-o fa-stack-1x fa-inverse"></i></span></span>
                                <div>
                                    <p class="app-notification__message">Mail server not working</p>
                                    <p class="app-notification__meta">5 min ago</p>
                                </div>
                            </a></li>
                        <li><a class="app-notification__item" href="javascript:;"><span
                                        class="app-notification__icon"><span class="fa-stack fa-lg"><i
                                                class="fa fa-circle fa-stack-2x text-success"></i><i
                                                class="fa fa-money fa-stack-1x fa-inverse"></i></span></span>
                                <div>
                                    <p class="app-notification__message">Transaction complete</p>
                                    <p class="app-notification__meta">2 days ago</p>
                                </div>
                            </a></li>
                    </div>
                </div>
                <li class="app-notification__footer"><a href="#">See all notifications.</a></li>
            </ul>
        </li>
        <!-- User Menu-->
        <li class="dropdown"><a class="app-nav__item" href="#" data-toggle="dropdown" aria-label="Open Profile Menu"><i
                        class="fa fa-user fa-lg"></i></a>
            <ul class="dropdown-menu settings-menu dropdown-menu-right">
                <li><a class="dropdown-item" href="page-user.html"><i class="fa fa-cog fa-lg"></i> Settings</a></li>
                <li><a class="dropdown-item" href="{{url('jobseeker/resume')}}"><i class="fa fa-user fa-lg"></i> Profile</a>
                </li>
                <li>

                    <a class="dropdown-item" href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                        <i class="fa fa-sign-out fa-lg"></i> {{ __('Logout') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>

                </li>
            </ul>
        </li>
    </ul>
</header>
<!-- Sidebar menu-->
<div class="app-sidebar__overlay" data-toggle="sidebar"></div>
<aside class="app-sidebar">
    <div class="app-sidebar__user"><img class="app-sidebar__user-avatar"
                                        src="https://s3.amazonaws.com/uifaces/faces/twitter/jsa/48.jpg"
                                        alt="User Image">
        <div>
            <p class="app-sidebar__user-name">Milton</p>
            <p class="app-sidebar__user-designation">Backend Developer</p>
        </div>
    </div>
    <ul class="app-menu">

        <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i
                        class="app-menu__icon fa fa-th-list"></i><span class="app-menu__label">Admin</span><i
                        class="treeview-indicator fa fa-angle-right"></i></a>
            <ul class="treeview-menu">
                <li><a class="treeview-item" href="{{url('admin/organization-type')}}"><i
                                class="icon fa fa-circle-o"></i>Organization Types</a></li>
                <li><a class="treeview-item" href="{{url('admin/industry-type')}}"><i class="icon fa fa-circle-o"></i>Industry
                        Types</a></li>
                <li><a class="treeview-item" href="{{url('admin/result-type')}}"><i class="icon fa fa-circle-o"></i>Result
                        Types</a></li>
                <li><a class="treeview-item" href="{{url('admin/education-level')}}"><i class="icon fa fa-circle-o"></i>Education
                        Level</a></li>
                <li><a class="treeview-item" href="{{url('admin/degree')}}"><i
                                class="icon fa fa-circle-o"></i>Degree</a></li>
                <li><a class="treeview-item" href="{{url('admin/company-size')}}"><i class="icon fa fa-circle-o"></i>Company
                        Size</a></li>
                <li><a class="treeview-item" href="{{url('admin/contact-type')}}"><i class="icon fa fa-circle-o"></i>Contact
                        Type</a></li>
                <li><a class="treeview-item" href="{{url('admin/currency')}}"><i class="icon fa fa-circle-o"></i>Currency</a>
                </li>
                <li><a class="treeview-item" href="{{url('admin/institute')}}"><i class="icon fa fa-circle-o"></i>Institute</a>
                </li>
                <li><a class="treeview-item" href="{{url('admin/skill')}}"><i class="icon fa fa-circle-o"></i>Skill</a>
                </li>
                <li><a class="treeview-item" href="{{url('admin/job-level')}}"><i class="icon fa fa-circle-o"></i>Job
                        Level</a></li>
                <li><a class="treeview-item" href="{{url('admin/subject')}}"><i class="icon fa fa-circle-o"></i>Subject</a>
                </li>
                <li><a class="treeview-item" href="{{url('admin/expert-status')}}"><i class="icon fa fa-circle-o"></i>Expert
                        Status</a></li>
                <li><a class="treeview-item" href="{{url('admin/reference-type')}}"><i class="icon fa fa-circle-o"></i>Reference
                        Type</a></li>
            </ul>
        </li>
        <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i
                        class="app-menu__icon fa fa-th-list"></i><span class="app-menu__label">Job Seeker</span><i
                        class="treeview-indicator fa fa-angle-right"></i></a>
            <ul class="treeview-menu">
                <li><a class="treeview-item" href="{{url('jobseeker/education')}}"><i class="icon fa fa-circle-o"></i>Education</a>
                </li>
                <li><a class="treeview-item" href="{{url('jobseeker/training')}}"><i class="icon fa fa-circle-o"></i>Training</a>
                </li>
                <li><a class="treeview-item" href="{{url('jobseeker/experience')}}"><i class="icon fa fa-circle-o"></i>Experience</a>
                </li>
                <li><a class="treeview-item" href="{{url('jobseeker/certification')}}"><i
                                class="icon fa fa-circle-o"></i>Certification</a></li>
                <li><a class="treeview-item" href="{{url('jobseeker/reference')}}"><i class="icon fa fa-circle-o"></i>Reference</a>
                </li>
                <li><a class="treeview-item" href="{{url('jobseeker/expertise')}}"><i class="icon fa fa-circle-o"></i>Expertise</a>
                </li>
                <li><a class="treeview-item" href="{{url('jobseeker/cv-objective')}}"><i
                                class="icon fa fa-circle-o"></i>Carrier Objective</a></li>

            </ul>
        </li>


    </ul>
</aside>
<main class="app-content">
    <div class="app-title">
        <div>
            <h1><i class="fa fa-dashboard"></i> Dashboard</h1>
            <p>A free and open source Bootstrap 4 admin template</p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
        </ul>
    </div>
    @yield('content')
</main>
<!-- Essential javascripts for application to work-->
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script src="{{url('assets/vali/js/popper.min.js')}}"></script>
<script src="{{url('assets/vali/js/bootstrap.min.js')}}"></script>
<script src="{{url('assets/vali/js/main.js')}}"></script>
<!-- The javascript plugin to display page loading on top-->
<script src="{{url('assets/vali/js/plugins/pace.min.js')}}"></script>
@stack('script')
</body>
</html>