@extends('layouts.layout')
@section('location','Dashboard')
@section('location2')
    <i class="fa fa-user"></i>&nbsp;Manajemen Data Detail Properti
@endsection
@section('user-login','Direktur')
@section('sidebar-menu')
    @include('admin/sidebar')
@endsection
@section('content')
    <div class="callout callout-info ">
        <h4>Perhatian!</h4>
        <p>
            Berikut adalah data detail properti yang saat ini tersedia, anda dapat menambahkan jika ada detail kavling properti baru
            <br>
        </p>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title"><i class="fa fa-home"></i>&nbsp;Manajemen Data Detail Properti</h3>
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
                                <th>Harga</th>
                                <th>Panjang (m)</th>
                                <th>Lebar (m)</th>
                                <th>Luas (m&sup2;)</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $no=1;
                            @endphp
                            @foreach ($details as $detail)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>{{ $detail->nm_properti }}</td>
                                    <td>{{ $detail->jenis_properti }}</td>
                                    <td>{{ $detail->alamat }}</td>
                                    <td>{{ $detail->harga }}</td>
                                    <td>{{ $detail->panjang }}</td>
                                    <td>{{ $detail->lebar }}</td>
                                    <td>{{ $detail->luas }}</td>
                                    <td>
                                        @if ($detail->status == "tersedia")
                                            <span style="color: green;"><i class="fa fa-check-circle"></i>&nbsp; Tersedia</span>
                                            @else
                                            <span style="color: red;"><i class="fa fa-close"></i>&nbsp; Terjual</span>
                                        @endif
                                    </td>
                                  
                                </tr>
                            @endforeach
                        </tbody>
                       
                    </table>
                </div>
                <div class="modal fade" id="tambahData" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <form method="POST" action="{{ route('admin.properti_detail.post') }}">
                        {{ csrf_field() }} {{ method_field('POST') }}
                        <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel"><i class="fa fa-home"></i>&nbsp;Tambah Data Properti<b></b></h5>
                            </div>
                            <div class="modal-body">
                                <div class="form-group">
                                    <label for="nama">Nama Properti</label>
                                    <select name="properti_id" class="form-control" id="">
                                        <option disabled selected>-- pilih properti --</option>
                                        @foreach ($propertis as $properti)
                                            <option {{ old('properti_id') == $properti->id ? 'selected' : '' }} value="{{ $properti->id }}">{{ $properti->nm_properti }}</option>
                                        @endforeach
                                    </select>
                                    @error('properti_id')
                                        <div class="text-danger">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="email">No. Kavling</label>
                                    <input type="number" class="form-control @error('no_kavling') is-invalid @enderror" name="no_kavling" value="{{ old('no_kavling') }}">
                                    @error('no_kavling')
                                        <div class="text-danger">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="email">Harga Lahan</label>
                                    <input type="number" class="form-control @error('harga') is-invalid @enderror" name="harga" value="{{ old('harga') }}">
                                    @error('harga')
                                        <div class="text-danger">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="username">Panjang Lahan (m)</label>
                                    <input type="number" class="form-control @error('panjang') is-invalid @enderror" name="panjang" value="{{ old('panjang') }}">
                                    @error('panjang')
                                        <div class="text-danger">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="password">Lebar Lahan (m)</label>
                                    <input type="number" class="form-control @error('lebar') is-invalid @enderror" name="lebar" value="{{ old('lebar') }}">
                                    @error('lebar')
                                        <div class="text-danger">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="password">Luas Lahan (m&sup2;)</label>
                                    <input type="number" class="form-control @error('luas') is-invalid @enderror" name="luas" value="{{ old('luas') }}">
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
            </div>
        </div>
    </div>
    <div class="modal fade" id="editData" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <form method="POST" action="{{ route('admin.properti_detail.post') }}">
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

        @if($errors->has('properti_id') || $errors->has('harga')|| $errors->has('panjang')|| $errors->has('lebar')|| $errors->has('luas'))
            $('#tambahData').modal('show');
        @endif
    </script>
@endpush