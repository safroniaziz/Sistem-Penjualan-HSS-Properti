<li class="header" style="font-weight:bold;">MENU UTAMA</li>
<li class="{{ set_active('admin.dashboard') }}">
    <a href="{{ route('admin.dashboard') }}">
        <i class="fa fa-dashboard"></i> <span>Dashboard</span>
    </a>
</li>

<li class="treeview {{ set_active(['admin.properti','admin.properti_detail']) }}">
    <a href="#">
        <i class="fa fa-users"></i> <span>Manajemen Properti</span>
        <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
        </span>
    </a>
    <ul class="treeview-menu " style="padding-left:25px;">
        <li class="{{ set_active('admin.properti') }}"><a href="{{ route('admin.properti') }}"><i class="fa fa-home"></i>&nbsp;Data Properti</a></li>
        <li class="{{ set_active('admin.properti_detail') }}"><a href="{{ route('admin.properti_detail') }}"><i class="fa fa-info-circle"></i>&nbsp;Properti Detail (Kavling)</a></li>
    </ul>
</li>

<li class="{{ set_active('admin.transaksi') }}">
    <a href="{{ route('admin.transaksi') }}">
        <i class="fa fa-history"></i> <span>Transaksi</span>
    </a>
</li>

<li class="{{ set_active('admin.laporan') }}">
    <a href="{{ route('admin.laporan') }}">
        <i class="fa fa-bar-chart"></i> <span>Laporan</span>
    </a>
</li>

<li class="treeview {{ set_active(['admin.manajer','admin.operator','admin.administrator']) }}">
    <a href="#">
        <i class="fa fa-users"></i> <span>Manajemen User</span>
        <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
        </span>
    </a>
    <ul class="treeview-menu " style="padding-left:25px;">
        <li class="{{ set_active('admin.manajer') }}"><a href="{{ route('admin.manajer') }}"><i class="fa fa-user"></i>&nbsp;Manajer</a></li>
        <li class="{{ set_active('admin.operator') }}"><a href="{{ route('admin.operator') }}"><i class="fa fa-user"></i>&nbsp;Operator</a></li>
        <li class="{{ set_active('admin.administrator') }}"><a href="{{ route('admin.administrator') }}"><i class="fa fa-user"></i>&nbsp;Direktur</a></li>
    </ul>
</li>

<li class="">
    <a href="">
        <i class="fa fa-sign-out text-danger"></i> <span>Logout</span>
    </a>
</li>