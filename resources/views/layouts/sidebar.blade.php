<section class="sidebar">
      <!-- Sidebar user panel -->
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">

        @if(\Auth::user()->role == 1)
        <li class="menu-sidebar"><a href="{{ url('/karyawan') }}"><span class="fa fa-firefox"></span>Karyawan</span></a></li>
        @endif

        @if(\Auth::user()->role == 2)
        <li class="menu-sidebar"><a href="{{ url('/karyawan') }}"><span class="fa fa-firefox"></span>Karyawan</span></a></li>
<<<<<<< HEAD
        <li class="menu-sidebar"><a href="{{ url('/anouncement') }}"><span class="fa fa-google-wallet"></span>Anouncement</span></a></li>
        <li class="menu-sidebar"><a href="{{ url('/cuti') }}"><span class="fa fa-firefox"></span>Cuti</span></a></li>
=======
        <li class="menu-sidebar"><a href="{{ url('/announcement') }}"><span class="fa fa-google-wallet"></span>Announcement</span></a></li>
        <li class="menu-sidebar"><a href="{{ url('/cuti') }}"><span class="fa fa-google-wallet"></span>Cuti</span></a></li>
>>>>>>> origin/DevaHRD
        <li class="menu-sidebar"><a href="{{ url('/lembur') }}"><span class="fa fa-google-wallet"></span>Lembur</span></a></li>
        @endif

        <li class="menu-sidebar"><a href="{{ url('/keluar') }}"><span class="glyphicon glyphicon-log-out"></span> Logout</span></a></li>


      </ul>
    </section>