<?php 
    use App\PropertiDetail;
?>
@extends('layouts.layout')
@section('location','Dashboard')
@section('location2')
    <i class="fa fa-user"></i>&nbsp;Manajemen Data Properti
@endsection
@section('user-login','Manajer')
@section('sidebar-menu')
    @include('manajer/sidebar')
@endsection
@section('content')
    <div class="callout callout-info ">
        <h4>Perhatian!</h4>
        <p>
            Berikut adalah data propererti yang saat ini tersedia, anda dapat menambahkan jika ada properti baru
            <br>
        </p>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title"><i class="fa fa-home"></i>&nbsp;Manajemen Data Properti</h3>
                    <div class="box-tools pull-right">
                        <button data-target="#tambahData" data-toggle="modal" class="btn btn-primary"><i class="fa fa-plus"></i>&nbsp; Tambah Data</button>
                    </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body table-responsive">
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success alert-block">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                            <i class="fa fa-success-circle"></i><strong>Berhasil :</strong> {{ $message }}
                        </div>
                    @endif
                    <table class="table table-bordered table-hover" id="administrator">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Properti</th>
                                <th>Jenis Properti</th>
                                <th>Alamat</th>
                                <th>Jumlah Kavling</th>
                                <th>Sisa Kavling</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $no=1;
                            @endphp
                            @foreach ($properties as $properti)
                                <?php 
                                    $sisah = PropertiDetail::select(DB::raw('count(properti_details.id) as sisa_kavling'))->where('properti_id',$properti->id)->where('status','tersedia')->groupBy('properti_id')->get();
                                ?>
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>{{ $properti->nm_properti }}</td>
                                    <td>{{ $properti->jenis_properti }}</td>
                                    <td>{{ $properti->alamat }}</td>
                                    <td>{{ $properti->jumlah_kavling }} Kavling</td>
                                    <td>
                                        @if (count($sisah) <1)
                                            <span style="color: red;"><i class="fa fa-close"></i>&nbsp; Kosong</span>
                                            @else
                                            <span style="color: green;"><i class="fa fa-check-circle"></i>&nbsp; Tersisa {{ $sisah[0]['sisa_kavling'] }} Kavling</span>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                       
                    </table>
                </div>
                <div class="modal fade" id="tambahData" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <form method="POST" action="{{ route('manajer.properti.post') }}">
                        {{ csrf_field() }} {{ method_field('POST') }}
                        <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel"><i class="fa fa-home"></i>&nbsp;Tambah Data Properti<b></b></h5>
                            </div>
                            <div class="modal-body">
                                <div class="form-group">
                                    <label for="nama">Nama Properti</label>
                                    <input type="text" class="form-control @error('nm_properti') is-invalid @enderror" name="nm_properti" value="{{ old('nm_properti') }}">
                                    @error('nm_properti')
                                        <div class="text-danger">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="email">Jenis Properti</label>
                                    <input type="text" class="form-control @error('jenis_properti') is-invalid @enderror" name="jenis_properti" value="{{ old('jenis_properti') }}">
                                    @error('jenis_properti')
                                        <div class="text-danger">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="username">Alamat Lengkap</label>
                                    <input type="text" class="form-control @error('alamat') is-invalid @enderror" name="alamat" value="{{ old('alamat') }}">
                                    @error('alamat')
                                        <div class="text-danger">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="password">Jumlah Kavling</label>
                                    <input type="text" class="form-control @error('jumlah_kavling') is-invalid @enderror" name="jumlah_kavling" value="{{ old('jumlah_kavling') }}">
                                    @error('jumlah_kavling')
                                        <div class="text-danger">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-close"></i>&nbsp;Batalkan</button>
                                <button type="submit" class="btn btn-primary"><i class="fa fa-check-circle"></i>&nbsp;Simpan</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="editData" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <form method="POST" action="{{ route('manajer.properti.post') }}">
            {{ csrf_field() }} {{ method_field('POST') }}
            <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"><i class="fa fa-home"></i>&nbsp;Ubah Data Properti<b></b></h5>
                </div>
                <div class="modal-body">
                        <div class="form-group">
                            <input type="hidden" name="id" id="id_edit">
                            <label for="nama">Nama Properti</label>
                            <input type="text" class="form-control @error('nm_properti') is-invalid @enderror" name="nm_properti_edit" id="nm_properti_edit">
                            @error('nm_properti')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="email">Jenis Properti</label>
                            <input type="text" class="form-control @error('jenis_properti') is-invalid @enderror" name="jenis_properti_edit" id="jenis_properti_edit">
                            @error('jenis_properti')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="username">No. Kavling</label>
                            <input type="text" class="form-control @error('no_kavling') is-invalid @enderror" name="no_kavling_edit" id="no_kavling_edit">
                            @error('no_kavling')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="password">Harga Properti</label>
                            <input type="text" class="form-control @error('harga') is-invalid @enderror" name="harga_edit" id="harga_edit">
                            @error('harga')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="password">Panjang Properti</label>
                            <input type="text" class="form-control @error('panjang') is-invalid @enderror" name="panjang_edit" id="panjang_edit">
                            @error('panjang')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="password">Lebar Properti</label>
                            <input type="text" class="form-control @error('lebar') is-invalid @enderror" name="lebar_edit" id="lebar_edit">
                            @error('lebar')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="password">Luas Properti</label>
                            <input type="text" class="form-control @error('luas') is-invalid @enderror" name="luas_edit" id="luas_edit">
                            @error('luas')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-close"></i>&nbsp;Batalkan</button>
                    <button type="submit" class="btn btn-primary"><i class="fa fa-check-circle"></i>&nbsp;Simpan</button>
                </div>
            </div>
        </form>
    </div>
@endsection

@push('scripts')
    <script>
        $(document).ready( function () {
            $('#administrator').DataTable();
        } );

        function deleteData(id) {
            $('#deleteData').modal('show');
            $('#id_delete').val(id);
               
        }

        function editData(id){
            $.ajax({
                url: "{{ url('admin/properti') }}"+'/'+ id + "/edit",
                type: "GET",
                dataType: "JSON",
                success: function(data){
                    $('#editData').modal('show');
                    $('#id_edit').val(data.id);
                    $('#nm_properti_edit').val(data.nm_properti);
                    $('#jenis_properti_edit').val(data.jenis_properti);
                    $('#no_kavling_edit').val(data.no_kavling);
                    $('#harga_edit').val(data.harga);
                    $('#panjang_edit').val(data.panjang);
                    $('#lebar_edit').val(data.lebar);
                    $('#luas_edit').val(data.luas);
                },
                error:function(){
                    alert("Nothing Data");
                }
            });
        }

        @if($errors->has('nm_properti') || $errors->has('jenis_properti')|| $errors->has('no_kavling')|| $errors->has('harga')|| $errors->has('panjang')|| $errors->has('lebar')|| $errors->has('luas'))
            $('#tambahData').modal('show');
        @endif
    </script>
@endpush