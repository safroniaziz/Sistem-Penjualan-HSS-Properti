<li class="header" style="font-weight:bold;">MENU UTAMA</li>
<li class="{{ set_active('manajer.dashboard') }}">
    <a href="{{ route('manajer.dashboard') }}">
        <i class="fa fa-dashboard"></i> <span>Dashboard</span>
    </a>
</li>

<li class="treeview {{ set_active(['manajer.properti','manajer.properti_detail']) }}">
    <a href="#">
        <i class="fa fa-users"></i> <span>Manajemen Properti</span>
        <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
        </span>
    </a>
    <ul class="treeview-menu " style="padding-left:25px;">
        <li class="{{ set_active('manajer.properti') }}"><a href="{{ route('manajer.properti') }}"><i class="fa fa-home"></i>&nbsp;Data Properti</a></li>
        <li class="{{ set_active('manajer.properti_detail') }}"><a href="{{ route('manajer.properti_detail') }}"><i class="fa fa-info-circle"></i>&nbsp;Properti Detail (Kavling)</a></li>
    </ul>
</li>

<li class="{{ set_active('manajer.transaksi') }}">
    <a href="{{ route('manajer.transaksi') }}">
        <i class="fa fa-history"></i> <span>Transaksi</span>
    </a>
</li>

<li class="{{ set_active(['manajer.laporan','manajer.cari_laporan']) }}">
    <a href="{{ route('manajer.laporan') }}">
        <i class="fa fa-bar-chart"></i> <span>Laporan</span>
    </a>
</li>

<li class="{{ set_active('manajer.operator') }}">
    <a href="{{ route('manajer.operator') }}">
        <i class="fa fa-users"></i> <span>Manajemen Data Operator</span>
    </a>
</li>

<li class="">
    <a href="">
        <i class="fa fa-sign-out text-danger"></i> <span>Logout</span>
    </a>
</li>