<!DOCTYPE html>
<html class="no-js" lang="{{ app()->getLocale() }}">
    @include('partials.head')
    <style>
        .breadcrumbs li a:before {
            content: "" !important;
        }
    </style>
  <body>
    <!-- preloader area start -->
    <div id="preloader">
      <div class="loader"></div>
    </div>
    <!-- preloader area end -->
    <!-- page container area start -->
    <div class="page-container" style="padding-left: initial !important;">
      <!-- main content area start -->
      <div class="main-content">
        <!-- header area start -->
        <div class="header-area">
          <div class="row align-items-center">
            <!-- profile info & task notification -->
            <div class="col-md-12 col-sm-12 clearfix">
              <ul class="notification-area pull-right">
                <li id="full-view"><i class="ti-fullscreen"></i></li>
              </ul>
            </div>
          </div>
        </div>
        <!-- header area end -->
        <!-- page title area start -->
        <div class="page-title-area">
          <div class="row align-items-center">
            <div class="col-sm-6">
              <div class="breadcrumbs-area clearfix">
                <h4 class="page-title pull-left">Indicadores de Gestión</h4>
                <ul class="breadcrumbs pull-left">
                        @if (Route::has('login'))
                                @auth
                                    <li><a class="a-header" href="{{ url('/home') }}">Home</a></li>
                                @else
                                    <li><a class="a-header" href="{{ route('login') }}">Login</a></li>
                                @endauth
                        @endif
                </ul>
              </div>
            </div>
            <div class="col-sm-6 clearfix">
              <div class="user-profile pull-right">
                @if (Route::has('login'))
                    @if (Route::has('register'))
                        <a class="link-r" href="{{ route('register') }}">Register</a>
                    @endif
                @endif
              </div>
            </div>
          </div>
        </div>
        <!-- page title area end -->
        <div class="main-content-inner">
            @yield('content')  
        </div>
      </div>
      <!-- main content area end -->
     @include('partials.footer')
  </body>
</html>