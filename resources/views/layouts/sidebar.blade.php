<section class="sidebar">
      <!-- Sidebar user panel -->
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">

        @if(\Auth::user()->role == 1)
        <li class="menu-sidebar"><a href="{{ url('/karyawan') }}"><span class="fa fa-users"></span>Karyawan</span></a></li>
        @endif

        @if(\Auth::user()->role == 2)
        <li class="menu-sidebar"><a href="{{ url('/karyawan') }}"><span class="fa fa-users"></span>Karyawan</span></a></li>
        <li class="menu-sidebar"><a href="{{ url('/announcement') }}"><span class="fa fa-bullhorn"></span>Announcement</span></a></li>
        <li class="menu-sidebar"><a href="{{ url('/cuti') }}"><span class="fa fa-calendar"></span>Cuti</span></a></li>
        <li class="menu-sidebar"><a href="{{ url('/lembur') }}"><span class="fa fa-paperclip"></span>Lembur</span></a></li>
        <li class="menu-sidebar"><a href="{{ url('/absen') }}"><span class="fa fa-google-wallet"></span>Absen</span></a></li>
        @endif

        

        <li class="menu-sidebar"><a href="{{ url('/keluar') }}"><span class="glyphicon glyphicon-log-out"></span> Logout</span></a></li>


      </ul>
    </section>