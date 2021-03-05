<li class="header" style="font-weight:bold;">MENU UTAMA</li>
<li class="{{ set_active('operator.dashboard') }}">
    <a href="{{ route('operator.dashboard') }}">
        <i class="fa fa-dashboard"></i> <span>Dashboard</span>
    </a>
</li>

<li class="treeview {{ set_active(['operator.properti','operator.properti_detail']) }}">
    <a href="#">
        <i class="fa fa-users"></i> <span>Manajemen Properti</span>
        <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
        </span>
    </a>
    <ul class="treeview-menu " style="padding-left:25px;">
        <li class="{{ set_active('operator.properti') }}"><a href="{{ route('operator.properti') }}"><i class="fa fa-home"></i>&nbsp;Data Properti</a></li>
        <li class="{{ set_active('operator.properti_detail') }}"><a href="{{ route('operator.properti_detail') }}"><i class="fa fa-info-circle"></i>&nbsp;Properti Detail (Kavling)</a></li>
    </ul>
</li>

<li class="{{ set_active('operator.transaksi') }}">
    <a href="{{ route('operator.transaksi') }}">
        <i class="fa fa-history"></i> <span>Transaksi</span>
    </a>
</li>

<li class="{{ set_active('operator.laporan') }}">
    <a href="{{ route('operator.laporan') }}">
        <i class="fa fa-bar-chart"></i> <span>Laporan</span>
    </a>
</li>

<li class="">
    <a href="">
        <i class="fa fa-sign-out text-danger"></i> <span>Logout</span>
    </a>
</li>