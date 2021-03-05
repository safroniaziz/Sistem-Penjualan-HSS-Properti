@extends('layouts.layout')
@section('location','Dashboard')
@section('location2')
    <i class="fa fa-user"></i>&nbsp;Manajemen Data Transaksi
@endsection
@section('user-login','Operator')
@section('sidebar-menu')
    @include('operator/sidebar')
@endsection
@section('content')
    <div class="callout callout-info ">
        <h4>Perhatian!</h4>
        <p>
            Berikut adalah data transaksi yang saat ini tersedia, anda dapat menambahkan jika ada transaksi baru
            <br>
        </p>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title"><i class="fa fa-home"></i>&nbsp;Manajemen Data Transaksi</h3>
                    <div class="box-tools pull-right">
                        <button data-target="#tambahData" data-toggle="modal" class="btn btn-primary"><i class="fa fa-plus"></i>&nbsp; Tambah Transaksi</button>
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
                                <th>Waktu Transaksi</th>
                                <th>Nama Properti</th>
                                <th>Jenis Properti</th>
                                <th>Nama Konsumen </th>
                                <th>NIK</th>
                                <th>Pekerjaan</th>
                                <th>Alamat</th>
                                <th>No.HP</th>
                                <th>Booking</th>
                                <th>Sisa Pembayaran</th>
                                <th>Jenis Pembayaran</th>
                                <th>Cetak</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $no=1;
                            @endphp
                            @foreach ($transaksis as $transaksi)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>{{ $transaksi->created_at->diffForHumans() }}</td>
                                    <td>{{ $transaksi->nm_properti }}</td>
                                    <td>{{ $transaksi->jenis_properti }}</td>
                                    <td>{{ $transaksi->nm_konsumen }}</td>
                                    <td>{{ $transaksi->nik }}</td>
                                    <td>{{ $transaksi->pekerjaan }}</td>
                                    <td>{{ $transaksi->alamat }}</td>
                                    <td>{{ $transaksi->no_hp }}</td>
                                    <td>Rp.{{ number_format($transaksi->booking) }},-</td>
                                    <td>Rp.{{ number_format($transaksi->sisa_pembayaran) }},-</td>
                                    <td>
                                        @if ($transaksi->jenis_pembayaran == "cash")
                                            Bayar Cash
                                            @else
                                            Transfer Bank
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ route('operator.transaksi.laporan',[$transaksi->id]) }}" class="btn btn-primary btn-sm"><i class="fa fa-file-pdf-o"></i>&nbsp; Cetak</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                       
                    </table>
                    {{-- <div class="modal fade" id="deleteData">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span></button>
                                    <h4 class="modal-title"><i class="fa fa-info-circle"></i>&nbsp;Perhatian</h4>
                                </div>
                                <div class="modal-body">
                                    <p>Apakah anda yakin ingin menghapus data?</p>
                                </div>
                                <div class="modal-footer">
                                    <form method="POST" action="{{ route('operator.properti.delete') }}">
                                        {{ csrf_field() }}
                                        {{ method_field('DELETE') }}
                                        <input type="hidden" name="id" id="id_delete">
                                        <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal"><i class="fa fa-close"></i>&nbsp;Batalkan</button>
                                        <button type="submit" class="btn btn-primary btn-sm"><i class="fa fa-trash"></i>&nbsp;Ya, Hapus Data</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div> --}}
                </div>
                <div class="modal fade" id="tambahData" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <form method="POST" action="{{ route('operator.transaksi.post') }}">
                        {{ csrf_field() }} {{ method_field('POST') }}
                        <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel"><i class="fa fa-history"></i>&nbsp;Form Transaksi<b></b></h5>
                            </div>
                            <div class="modal-body">
                                    <div class="form-group">
                                        <label for="nama">Pilih Properti</label>
                                        <select name="properti_id" id="properti_id" class="form-control">
                                            <option disabled selected>-- pilih properti --</option>
                                            @foreach ($properties as $properti)
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
                                        <label for="exampleInputEmail1">Pilih No Kavling</label>
                                        <select name="properti_detail_id" class="form-control" id="properti_detail_id" required>
                                            <option value="" selected disabled>-- pilih nomor kavling --</option>
                                        </select>
                                        @error('properti_detail_id')
                                            <div class="text-danger">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="email">Nama Konsumen</label>
                                        <input type="text" class="form-control @error('nm_konsumen') is-invalid @enderror" name="nm_konsumen" value="{{ old('nm_konsumen') }}">
                                        @error('nm_konsumen')
                                            <div class="text-danger">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="username">No. Induk Keluarga</label>
                                        <input type="text" class="form-control @error('nik') is-invalid @enderror" name="nik" value="{{ old('nik') }}">
                                        @error('nik')
                                            <div class="text-danger">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="password">Pekerjaan</label>
                                        <input type="text" class="form-control @error('pekerjaan') is-invalid @enderror" name="pekerjaan" value="{{ old('pekerjaan') }}">
                                        @error('pekerjaan')
                                            <div class="text-danger">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="password">Alamat</label>
                                        <input type="text" class="form-control @error('alamat') is-invalid @enderror" name="alamat" value="{{ old('alamat') }}">
                                        @error('alamat')
                                            <div class="text-danger">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="password">No. HP</label>
                                        <input type="text" class="form-control @error('no_hp') is-invalid @enderror" name="no_hp" value="{{ old('no_hp') }}">
                                        @error('no_hp')
                                            <div class="text-danger">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="password">Booking</label>
                                        <input type="number" class="form-control @error('booking') is-invalid @enderror" name="booking" value="{{ old('booking') }}">
                                        @error('booking')
                                            <div class="text-danger">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="password">Sisa Pembayaran</label>
                                        <input type="number" class="form-control @error('sisa_pembayaran') is-invalid @enderror" name="sisa_pembayaran" value="{{ old('sisa_pembayaran') }}">
                                        @error('sisa_pembayaran')
                                            <div class="text-danger">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="password">Jenis Pembayaran</label>
                                        <select name="jenis_pembayaran" class="form-control" id="">
                                            <option disabled selected>-- pilih jenis pembayaran --</option>
                                            <option value="cash">Bayar Cash</option>
                                            <option value="bank">Transfer Bank</option>
                                        </select>
                                        @error('jenis_pembayaran')
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
        <form method="POST" action="{{ route('operator.properti.post') }}">
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
                            <input type="text" class="form-control @error('properti_id') is-invalid @enderror" name="properti_id_edit" id="properti_id_edit">
                            @error('properti_id')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Pilih Kavling</label>
                            <select name="properti_detail_id" class="form-control" id="properti_detail_id" required>
                                <option value="" selected disabled>-- pilih mata pelajaran --</option>

                            </select>
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

        $(document).ready(function(){
            $(document).on('change','#properti_id',function(){
                // alert('berhasil');
                var properti_id = $(this).val();
                var div = $(this).parent().parent();
                var op=" ";
                $.ajax({
                type :'get',
                url: "{{ url('operator/transaksi/cari_detail') }}",
                data:{'properti_id':properti_id},
                success:function(data){
                    op+='<option value="0" selected disabled>-- pilih  --</option>';
                    for(var i=0; i<data.length;i++){
                    op+='<option value="'+data[i].id+'">'+data[i].no_kavling+'</option>';
                    }

                    div.find('#properti_detail_id').html(" ");
                    div.find('#properti_detail_id').append(op);

                },
                error:function(){

                }
                });
            })
        });

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

        @if($errors->has('properti_id') || $errors->has('nm_konsumen')|| $errors->has('nik')|| $errors->has('pekerjaan')|| $errors->has('alamat')|| $errors->has('no_hp')|| $errors->has('booking')|| $errors->has('booking')|| $errors->has('sisa_pembayaran')|| $errors->has('jenis_pembayaran'))
            $('#tambahData').modal('show');
        @endif
    </script>
@endpush