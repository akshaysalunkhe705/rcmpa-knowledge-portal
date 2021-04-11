<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>{{ $title }}</title>

    <!-- Prevent the demo from appearing in search engines -->
    <meta name="robots" content="noindex" />

    <link href="https://fonts.googleapis.com/css?family=Lato:400,700%7CRoboto:400,500%7CExo+2:600&amp;display=swap"
        rel="stylesheet" />
    <!-- Preloader -->
    <link type="text/css" href="{{ url('vendor/spinkit.css') }}" rel="stylesheet" />
    <!-- Perfect Scrollbar -->
    <link type="text/css" href="{{ url('vendor/perfect-scrollbar.css') }}" rel="stylesheet" />
    <!-- Material Design Icons -->
    <link type="text/css" href="{{ url('css/material-icons.css') }}" rel="stylesheet" />
    <!-- Font Awesome Icons -->
    <link type="text/css" href="{{ url('css/fontawesome.css') }}" rel="stylesheet" />
    <!-- Preloader -->
    <link type="text/css" href="{{ url('css/preloader.css') }}" rel="stylesheet" />
    <!-- App CSS -->
    <link type="text/css" href="{{ url('css/app.css') }}" rel="stylesheet" />

    <!-- jQuery -->
    <script src="{{ url('/vendor/jquery.min.js') }}"></script>

    <!-- CK Editor -->
    <script src="https://cdn.ckeditor.com/4.16.0/standard-all/ckeditor.js"></script>
</head>

<body class="layout-app">
    <div class="preloader">
        <div class="sk-chase">
            <div class="sk-chase-dot"></div>
            <div class="sk-chase-dot"></div>
            <div class="sk-chase-dot"></div>
            <div class="sk-chase-dot"></div>
            <div class="sk-chase-dot"></div>
            <div class="sk-chase-dot"></div>
        </div>
    </div>

    <!-- Drawer Layout -->
    <div class="mdk-drawer-layout js-mdk-drawer-layout" data-push data-responsive-width="992px">
        <div class="mdk-drawer-layout__content page-content">
            <!-- Header -->

            <!-- Navbar -->
            <div class="navbar navbar-expand pr-0 navbar-light border-bottom-2" id="default-navbar" data-primary>
                <!-- Navbar Toggler -->
                <button class="navbar-toggler w-auto mr-16pt d-block d-lg-none rounded-0" type="button"
                    data-toggle="sidebar">
                    <span class="material-icons">short_text</span>
                </button>
                <!-- // END Navbar Toggler -->

                <!-- Navbar Brand -->
                <a href="index.html" class="navbar-brand mr-16pt d-lg-none">
                    <span class="avatar avatar-sm navbar-brand-icon mr-0 mr-lg-8pt">
                        <span class="avatar-title rounded bg-primary">
                            <img src="{{ url('website-images/logo.jpeg') }}" alt="logo" class="img-fluid" /></span>
                    </span>

                    <span class="d-none d-lg-block">Luma</span>
                </a>

                <!-- // END Navbar Brand -->

                <div class="flex"></div>

                <!-- Switch Layout -->

                <a href="https://luma.humatheme.com/Demos/Compact_App_Layout/billing.html"
                    class="navbar-toggler navbar-toggler-custom align-items-center justify-content-center d-none d-lg-flex"
                    data-toggle="tooltip" data-title="Switch to Compact Layout" data-placement="bottom"
                    data-boundary="window">
                    <span class="material-icons">swap_horiz</span>
                </a>

                <!-- // END Switch Layout -->

                <!-- Navbar Menu -->

                {{-- <div class="nav navbar-nav flex-nowrap d-flex mr-16pt">
                    <!-- Notifications dropdown -->
                    <div class="nav-item dropdown dropdown-notifications dropdown-xs-down-full" data-toggle="tooltip"
                        data-title="Messages" data-placement="bottom" data-boundary="window">
                        <button class="nav-link btn-flush dropdown-toggle" type="button" data-toggle="dropdown"
                            data-caret="false">
                            <i class="material-icons icon-24pt">mail_outline</i>
                        </button>
                        <div class="dropdown-menu dropdown-menu-right">
                            <div data-perfect-scrollbar class="position-relative">
                                <div class="dropdown-header"><strong>Messages</strong></div>
                                <div class="list-group list-group-flush mb-0">
                                    <a href="javascript:void(0);" class="list-group-item list-group-item-action unread">
                                        <span class="d-flex align-items-center mb-1">
                                            <small class="text-black-50">5 minutes ago</small>

                                            <span class="ml-auto unread-indicator bg-accent"></span>
                                        </span>
                                        <span class="d-flex">
                                            <span class="avatar avatar-xs mr-2">
                                                <img src="./images/people/110/woman-5.jpg" alt="people"
                                                    class="avatar-img rounded-circle" />
                                            </span>
                                            <span class="flex d-flex flex-column">
                                                <strong class="text-black-100">Michelle</strong>
                                                <span class="text-black-70">Clients loved the new design.</span>
                                            </span>
                                        </span>
                                    </a>

                                    <a href="javascript:void(0);" class="list-group-item list-group-item-action">
                                        <span class="d-flex align-items-center mb-1">
                                            <small class="text-black-50">5 minutes ago</small>
                                        </span>
                                        <span class="d-flex">
                                            <span class="avatar avatar-xs mr-2">
                                                <img src="./images/people/110/woman-5.jpg" alt="people"
                                                    class="avatar-img rounded-circle" />
                                            </span>
                                            <span class="flex d-flex flex-column">
                                                <strong class="text-black-100">Michelle</strong>
                                                <span class="text-black-70">🔥 Superb job..</span>
                                            </span>
                                        </span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- // END Notifications dropdown -->

                    <!-- Notifications dropdown -->
                    <div class="nav-item ml-16pt dropdown dropdown-notifications dropdown-xs-down-full"
                        data-toggle="tooltip" data-title="Notifications" data-placement="bottom" data-boundary="window">
                        <button class="nav-link btn-flush dropdown-toggle" type="button" data-toggle="dropdown"
                            data-caret="false">
                            <i class="material-icons">notifications_none</i>
                            <span class="badge badge-notifications badge-accent">2</span>
                        </button>
                        <div class="dropdown-menu dropdown-menu-right">
                            <div data-perfect-scrollbar class="position-relative">
                                <div class="dropdown-header"><strong>System notifications</strong></div>
                                <div class="list-group list-group-flush mb-0">
                                    <a href="javascript:void(0);" class="list-group-item list-group-item-action unread">
                                        <span class="d-flex align-items-center mb-1">
                                            <small class="text-black-50">3 minutes ago</small>

                                            <span class="ml-auto unread-indicator bg-accent"></span>
                                        </span>
                                        <span class="d-flex">
                                            <span class="avatar avatar-xs mr-2">
                                                <span class="avatar-title rounded-circle bg-light">
                                                    <i
                                                        class="material-icons font-size-16pt text-accent">account_circle</i>
                                                </span>
                                            </span>
                                            <span class="flex d-flex flex-column">
                                                <span class="text-black-70">Your profile information has not been synced
                                                    correctly.</span>
                                            </span>
                                        </span>
                                    </a>

                                    <a href="javascript:void(0);" class="list-group-item list-group-item-action">
                                        <span class="d-flex align-items-center mb-1">
                                            <small class="text-black-50">5 hours ago</small>
                                        </span>
                                        <span class="d-flex">
                                            <span class="avatar avatar-xs mr-2">
                                                <span class="avatar-title rounded-circle bg-light">
                                                    <i class="material-icons font-size-16pt text-primary">group_add</i>
                                                </span>
                                            </span>
                                            <span class="flex d-flex flex-column">
                                                <strong class="text-black-100">Adrian. D</strong>
                                                <span class="text-black-70">Wants to join your private group.</span>
                                            </span>
                                        </span>
                                    </a>

                                    <a href="javascript:void(0);" class="list-group-item list-group-item-action">
                                        <span class="d-flex align-items-center mb-1">
                                            <small class="text-black-50">1 day ago</small>
                                        </span>
                                        <span class="d-flex">
                                            <span class="avatar avatar-xs mr-2">
                                                <span class="avatar-title rounded-circle bg-light">
                                                    <i class="material-icons font-size-16pt text-warning">storage</i>
                                                </span>
                                            </span>
                                            <span class="flex d-flex flex-column">
                                                <span class="text-black-70">Your deploy was successful.</span>
                                            </span>
                                        </span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- // END Notifications dropdown --> --}}
                <div class="nav navbar-nav flex-nowrap d-flex mr-16pt">
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link d-flex align-items-center dropdown-toggle" data-toggle="dropdown"
                            data-caret="false">
                            <span class="avatar avatar-sm mr-8pt2">
                                <span class="avatar-title rounded-circle bg-primary"><i
                                        class="material-icons">account_box</i></span>
                            </span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            {{-- <div class="dropdown-header"><strong>Account</strong></div> --}}
                            {{-- <a class="dropdown-item" href="{{ url('/') }}">Edit Account</a>
                            <a class="dropdown-item active" href="{{ url('/') }}">Billing</a>
                            <a class="dropdown-item" href="{{ url('/') }}">Payments</a> --}}
                            <a class="dropdown-item active" href="{{ url('/logout') }}">Logout</a>
                        </div>
                    </div>
                </div>

                <!-- // END Navbar Menu -->
            </div>

            <!-- // END Navbar -->

            <!-- // END Header -->

            <div class="pt-12pt">
                <div
                    class="container page__container d-flex flex-column flex-md-row align-items-center text-center text-sm-left">
                    <div class="flex d-flex flex-column flex-sm-row align-items-center">
                        <div class="mb-24pt mb-sm-0 mr-sm-24pt">
                            <h2 class="mb-0">{{ $heading }}</h2>
                            <ol class="breadcrumb p-0 m-0">
                                <li class="breadcrumb-item">Home</li>
                                <li class="breadcrumb-item">{{ $breadcrumb1 }}</li>
                                <li class="breadcrumb-item active">{{ $breadcrumb2 }}</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>

            <!-- BEFORE Page Content -->

            <!-- // END BEFORE Page Content -->

            <!-- Page Content -->

            <div class="page-section page__container">
                <div class="shadow-sm p-3 bg-light">
                    @yield('main_container')
                </div>
            </div>

            <!-- // END Page Content -->

            <!-- Footer -->

            <div class="bg-white border-top-2 mt-auto">
                <div class="container page__container d-flex flex-column" style="padding: 1rem;">
                    <p class="text-50 small mt-n1 mb-0">
                        <a href="#" class="text-70 text-underline mr-8pt small">Terms</a>
                        <a href="#" class="text-70 text-underline mr-8pt small">Privacy policy</a>
                        Copyright <?= date('Y') ?> &copy; All rights reserved.</p>
          </div>
        </div>
        <!-- // END Footer -->
      </div>

      <!-- // END drawer-layout__content -->

      <!-- Drawer -->

      <div class="mdk-drawer js-mdk-drawer" id="default-drawer">
        <div class="mdk-drawer__content">
          <div class="sidebar sidebar-dark-pickled-bluewood sidebar-left" data-perfect-scrollbar>
            <!-- Sidebar Content -->
            <a href="index.html" class="sidebar-brand" style="padding:1rem 0;">
              <span class="avatar avatar-xl sidebar-brand-icon h-auto">
                <span class="avatar-title rounded bg-primary"
                  ><img
                    src="{{ url('website-images/logso.png') }}"
                    class="img-fluid"
                    alt="logo"
                /></span>
              </span>
              <span>RCMPA</span>
            </a>

            <div class="sidebar-heading">Navigation</div>
            <ul class="sidebar-menu">

                @if (Auth::user()->navigation_type == 'ADMIN')
                    @include('layouts.navs.admin')
                @endif
                @if (Auth::user()->navigation_type == 'HOD')
                    @include('layouts.navs.hod')
                @endif
                @if (Auth::user()->navigation_type == 'USER')
                    @include('layouts.navs.user')
                @endif
            </ul>
            </div>
        </div>
      </div>

      <!-- // END Drawer -->
    </div>

    <!-- // END Drawer Layout -->

    <!-- Bootstrap -->
    <script src="{{ url('/vendor/popper.min.js') }}"></script>
    <script src="{{ url('/vendor/bootstrap.min.js') }}"></script>
    <!-- Perfect Scrollbar -->
    <script src="{{ url('/vendor/perfect-scrollbar.min.js') }}"></script>
    <!-- DOM Factory -->
    <script src="{{ url('/vendor/dom-factory.js') }}"></script>
    <!-- MDK -->
    <script src="{{ url('/vendor/material-design-kit.js') }}"></script>
    <!-- App JS -->
    <script src="{{ url('/js/app.js') }}"></script>
    <!-- Preloader -->
    <script src="{{ url('/js/preloader.js') }}"></script>

    <style>
      .flex.justify-between.flex-1{
        display: none;
      }
      .w-5.h-5{
        width: 35px;
      }
    </style>
  </body>
</html>
