<section class="sidebar">
      <!-- Sidebar user panel -->
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">

        @if(\Auth::user()->role == 1)
        <li class="menu-sidebar"><a href="{{ url('/paket-laundry') }}"><span class="fa fa-firefox"></span> Paket Laundry</span></a></li>

        <li class="menu-sidebar"><a href="{{ url('/customer') }}"><span class="fa fa-user"></span> Customer</span></a></li>

        <li class="menu-sidebar"><a href="{{ url('/karyawan') }}"><span class="fa fa-users"></span> Karyawan</span></a></li>

        <li class="menu-sidebar"><a href="{{ url('/status-pesanan') }}"><span class="fa fa-reorder"></span> Status Pesanan</span></a></li>

        <li class="menu-sidebar"><a href="{{ url('/status-pembayaran') }}"><span class="fa fa-rocket"></span> Status Pembayaran</span></a></li>
        @endif

        <li class="menu-sidebar"><a href="{{ url('/transaksi-pesanan') }}"><span class="fa fa-google-wallet"></span> Transaksi Pesanan</span></a></li>
        

        <li class="header">OTHER</li>

        @if(\Auth::user()->name == 'Admin')
        <li class="menu-sidebar"><a href="{{ url('/reset-password') }}"><span class="glyphicon glyphicon-log-out"></span> Reset Password</span></a></li>
        @endif

        <li class="menu-sidebar"><a href="{{ url('/keluar') }}"><span class="glyphicon glyphicon-log-out"></span> Logout</span></a></li>


      </ul>
    </section>