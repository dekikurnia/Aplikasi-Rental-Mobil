@if (Auth::check())
    <!-- Left side column. contains the sidebar -->
    <aside class="main-sidebar">
      <!-- sidebar: style can be found in sidebar.less -->
      <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
          <div class="pull-left image">
            <img src="https://placeholdit.imgix.net/~text?txtsize=15&bg=00a65a&txtclr=ffffff&txt=160%C3%97160&w=160&h=160&text={{ Auth::user()->name[0] }}" class="img-circle" alt="User Image">
          </div>
          <div class="pull-left info">
            <p>{{ Auth::user()->name }}</p>
            <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
          </div>
        </div>
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu">
          <li class="header">{{ trans('backpack::base.administration') }}</li>
          <!-- ================================================ -->
          <!-- ==== Recommended place for admin menu items ==== -->
          <!-- ================================================ -->
          <li><a href="{{ url(config('backpack.base.route_prefix').'/dashboard') }}"><i class="fa fa-dashboard"></i> <span>{{ trans('backpack::base.dashboard') }}</span></a></li>
          <li class="header">MASTER DATA</li>
              
                  <li><a href="{{ route('merk.index') }}"><i class="fa fa-bars"></i><span>Merk</span></a></li>
                  <li><a href="{{ route('type.index') }}"><i class="fa fa-file"></i><span>Tipe</span></a></li>
                  <li><a href="{{ route('kendaraan.index') }}"><i class="fa fa-car"></i> <span>Kendaraan</span></a></li>
                  <li><a href="{{ route('pelanggan.index') }}"><i class="fa fa-user"></i> <span>Pelanggan</span></a></li>
                  <li><a href="#"><i class="fa fa-users"></i> <span>Karyawan</span></a></li>

          <li class="header">TRANSAKSI</li>
              
                  <li><a href="{{ route('peminjaman.index') }}"><i class="fa fa-cart-plus"></i><span>Peminjaman</span></a></li>
                  <li><a href="#"><i class="fa fa-arrow-left"></i><span>Pengembalian</span></a></li>
                  <li><a href="{{ route('pesan.send') }}"><i class="fa fa-mobile"></i><span>Kirim Pesan</span></a></li>
      
      
          <!-- ======================================= -->
          <li class="header">{{ trans('backpack::base.user') }}</li>
          <li><a href="{{ url(config('backpack.base.route_prefix').'/logout') }}"><i class="fa fa-sign-out"></i> <span>{{ trans('backpack::base.logout') }}</span></a></li>
        </ul>
      </section>
      <!-- /.sidebar -->
    </aside>
@endif
