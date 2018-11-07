<section id="container" >
      <!-- **********************************************************************************************************************************************************
      TOP BAR CONTENT & NOTIFICATIONS
      *********************************************************************************************************************************************************** -->
      <!--header start-->
      <header class="header black-bg">
        <div class="sidebar-toggle-box">
          <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
        </div>
        <!--logo start-->
        <a href="{{route('view_trangchu')}}" class="logo"><b>LightZ Real Esate</b></a>
        <!--logo end-->
        <div class="top-menu">
          <ul class="nav pull-right top-menu">
            <li><a class="logout" href="../page/dangxuat"><i class="fas fa-sign-out-alt"></i> Đăng xuất</a></li>
          </ul>
          <ul class="nav pull-right top-menu">
            <li><a class="logout" href="{{route('view_SuaMK')}}"><i class="fas fa-key"></i> Đổi mật khẩu</a></li>
          </ul>
        </div>
      </header>
      <!--header end-->
      
      <!-- **********************************************************************************************************************************************************
      MAIN SIDEBAR MENU
      *********************************************************************************************************************************************************** -->
      <!--sidebar start-->
      <aside>
        <div id="sidebar"  class="nav-collapse ">
          <!-- sidebar menu start-->
          <ul class="sidebar-menu" id="nav-accordion">
           <li class="sub-menu">
            <a  href="{{route('index_sub')}}" class="{{ (\Request::route()->getName() == 'index_sub') ? 'active' : '' }}">
              <i class="fas fa-home"></i></i><span>Trang chủ</span>
            </a>
          </li>
          <li class="sub-menu">
            <li><a href="{{route('view_QLCT')}}" class="{{ (\Request::route()->getName() == 'view_QLCT') ? 'active' : '' }}" >
              <i class="fas fa-clipboard-list"></i>
              <span>Quản lý công ty</span>
            </a>
          </li>
     </ul>
     <!-- sidebar menu end-->
   </div>
 </aside>
      <!--sidebar end-->