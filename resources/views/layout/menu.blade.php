
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
              <a href="{{route('view_QLYC')}}" class="{{ (\Request::route()->getName() == 'view_QLYC') ? 'active' : '' }}" >
                <i class="fas fa-clipboard"></i><span>Quản lý yêu cầu</span>
              </a>
            </li>
            <li class="sub-menu">
              <a href="{{route('view_QLTD')}}" class="{{ (\Request::route()->getName() == 'view_QLTD') ? 'active' : '' }}" >
                <i class="fas fa-clipboard"></i><span>Quản lý tin đăng</span>
              </a>
            </li>
            <li class="sub-menu">
              <a  href="{{route('view_QLDAT')}}" class="{{ (\Request::route()->getName() == 'view_QLDAT') ? 'active' : '' }}">
                <i class="fas fa-map"></i><span>Quản lý đất</span>
              </a>
            </li>
            <li class="sub-menu">
              <a href="{{route('view_QLHD')}}" class="{{ (\Request::route()->getName() == 'view_QLHD') ? 'active' : '' }}" >
                <i class="fas fa-clipboard"></i><span>Quản lý hóa đơn</span>
              </a>
            </li>
            <li class="sub-menu">
              <a href="{{route('view_QLKH')}}" class="{{ (\Request::route()->getName() == 'view_QLKH') ? 'active' : '' }}" >
                <i class="fas fa-address-book"></i><span>Quản lý khách hàng</span>
              </a>
            </li>
            <li class="sub-menu">
              <a href="{{route('view_QLTK')}}" class="{{ (\Request::route()->getName() == 'view_QLTK') ? 'active' : '' }}">
                 <i class="fas fa-users"></i><span>Quản lý tài khoản</span>
              </a>

            </li>
            <li class="sub-menu">
                      <a href="javascript:;" >
                          <i class="fas fa-chart-bar"></i>
                          <span>Thống kê</span>
                      </a>
                      <ul class="sub">
                          <li><a  href="{{route('TKDT')}}">Thống kê doanh thu</a></li>
                          <li><a  href="{{route('TKGD')}}">Thống kê giao dịch</a></li>
                      </ul>
                  </li>

          </ul>
          <!-- sidebar menu end-->
        </div>
      </aside>
      <!--sidebar end-->