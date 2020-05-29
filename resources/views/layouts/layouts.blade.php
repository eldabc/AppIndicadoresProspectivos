<!DOCTYPE html>
<html class="no-js" lang="{{ app()->getLocale() }}">
    @include('partials.head')
  <body>
    <!-- preloader area start -->
    <div id="preloader">
      <div class="loader"></div>
    </div>
    <!-- preloader area end -->
    <!-- page container area start -->
    <div class="page-container">
      <!-- sidebar menu area start -->
      <div class="sidebar-menu">
        <div class="sidebar-header">
          <div class="logo">
            <a href="#" style="text-align: center; color: white;"
              >
              <h4>Indicadores</h4>
              <!-- <img src="assets/images/icon/logo.png" alt="logo"/> -->
            </a>
          </div>
        </div>
        <div class="main-menu">
          <div class="menu-inner">
            <nav>
              <ul class="metismenu" id="menu">
                <li class="active">
                  <a href="{{ route('micmac.index') }}"
                    ><i class="ti-dashboard"></i><span>MICMAC</span></a
                  >
                </li>
                <li>
                  <a href="#"
                    ><i class="ti-map-alt"></i> <span>MACTOR</span></a
                  >
                </li>
                <li>
                  <a href="#"
                    ><i class="ti-receipt"></i> <span>SMIC-PRO EXPERT</span></a
                  >
                </li>
                <li>
                  <a href="#"
                    ><i class="ti-layers-alt"></i> <span>MORPHOL</span></a
                  >
                </li>
                <li>
                  <a href="#"
                    ><i class="fa fa-exclamation-triangle"></i>
                    <span>MULTIPOL</span></a
                  >
                </li>
                <li>
                  <a href="{{ route('logout') }}" class="dropdown-item" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <i class="fa fa-exclamation-triangle"></i>
                    <span>{{ __('Salir') }}</span>
                  </a>
                  
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                      @csrf
                  </form>
                </li>
              </ul>
            </nav>
          </div>
        </div>
      </div>
      <!-- sidebar menu area end -->
      <!-- main content area start -->
      <div class="main-content">
        <!-- header area start -->
        <div class="header-area">
          <div class="row align-items-center">
            <!-- nav and search button -->
            <div class="col-md-6 col-sm-8 clearfix">
              <div class="nav-btn pull-left">
                <span></span>
                <span></span>
                <span></span>
              </div>
            </div>
            <!-- profile info & task notification -->
            <div class="col-md-6 col-sm-4 clearfix">
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
                <h4 class="page-title pull-left">MICMAC</h4>
                <ul class="breadcrumbs pull-left">
                  <li><a href="#">Home</a></li>
                  <li><span>MICMAC</span></li>
                </ul>
              </div>
            </div>
            <div class="col-sm-6 clearfix">
              <div class="user-profile pull-right">
                <img
                  class="avatar user-thumb"
                  src="{{ asset('img/avatar.png') }}"
                  alt="avatar"
                />
                <h4 class="user-name dropdown-toggle">
                  {{ auth()->user()->name }}
                </h4>
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
