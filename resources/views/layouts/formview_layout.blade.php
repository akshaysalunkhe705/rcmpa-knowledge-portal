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
            
            <div class="page-section page__container">
                <div class="shadow-sm p-3 bg-light">
                    <div class="row">
                        <div class="col-md-2"></div>
                        <div class="col-md-8" style="box-shadow: 0px 0px 5px grey">
                            @yield('main_container')
                        </div>
                    </div>
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
