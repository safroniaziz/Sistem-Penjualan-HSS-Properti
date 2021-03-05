@extends('layouts.layout')
@section('location','Dashboard')
@section('location2')
    <i class="fa fa-user"></i>&nbsp;Laporan Transaksi
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
                    <h3 class="box-title"><i class="fa fa-bar-chart"></i>&nbsp;Laporan Transaksi</h3>
           
                </div>
                <!-- /.box-header -->
                <form action="{{ route('manajer.cari_laporan') }}" method="GET">
                    @csrf
                    <div>
                        <div class="col-md-12">
                            <label for="">Pilih Opsi Laporan</label>
                            <select name="laporan" class="form-control" id="">
                                <option disabled selected>-- pilih opsi --</option>
                                <option value="semua">Seluruh Laporan</option>
                                <option value="bulan_ini">Bulan Ini</option>
                            </select>
                        </div>
                        <div class="col-md-12" style="margin-top: 10px;">
                            <button type="submit" name="submit" class="btn btn-primary btn-sm"><i class="fa fa-search"></i>&nbsp; Lihat Laporan</button>
                        </div>
                    </div>
                </form>
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
                                <th>Nama Konsumen</th>
                                <th>Jenis Properti</th>
                                <th>No.Kavling</th>
                                <th>Harga</th>
                                <th>Panjang</th>
                                <th>Lebar</th>
                                <th>Luas</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $no=1;
                            @endphp
                            @if (isset($_GET['submit']))
                                @foreach ($datas as $data)
                                    <tr>
                                        <td>{{ $no++ }}</td>
                                        <td>{{ $data->nm_properti }}</td>
                                        <td>{{ $data->nm_konsumen }}</td>
                                        <td>{{ $data->jenis_properti }}</td>
                                        <td>{{ $data->no_kavling }}</td>
                                        <td>{{ $data->harga }}</td>
                                        <td>{{ $data->panjang }}</td>
                                        <td>{{ $data->lebar }}</td>
                                        <td>{{ $data->luas }}</td>
                                    </tr>
                                @endforeach
                            @endif
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
                                    <form method="POST" action="{{ route('manajer.properti.delete') }}">
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
                    <form method="POST" action="{{ route('manajer.properti.post') }}">
                        {{ csrf_field() }} {{ method_field('POST') }}
                        <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel"><i class="fa fa-history"></i>&nbsp;Form Transaksi<b></b></h5>
                            </div>
                            <div class="modal-body">
                                    <div class="form-group">
                                        <label for="nama">Pilih Properti</label>
                                        <select name="" id="" class="form-control">
                                            <option disabled selected>-- pilih properti --</option>
                                        </select>
                                        @error('nm_properti')
                                            <div class="text-danger">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="email">Nama Konsumen</label>
                                        <input type="text" class="form-control @error('jenis_properti') is-invalid @enderror" name="jenis_properti" value="{{ old('jenis_properti') }}">
                                        @error('jenis_properti')
                                            <div class="text-danger">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="username">No, Induk Keluarga</label>
                                        <input type="text" class="form-control @error('no_kavling') is-invalid @enderror" name="no_kavling" value="{{ old('no_kavling') }}">
                                        @error('no_kavling')
                                            <div class="text-danger">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="password">Pekerjaan</label>
                                        <input type="text" class="form-control @error('harga') is-invalid @enderror" name="harga" value="{{ old('harga') }}">
                                        @error('harga')
                                            <div class="text-danger">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="password">Alamat</label>
                                        <input type="text" class="form-control @error('panjang') is-invalid @enderror" name="panjang" value="{{ old('panjang') }}">
                                        @error('panjang')
                                            <div class="text-danger">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="password">No. HP</label>
                                        <input type="text" class="form-control @error('lebar') is-invalid @enderror" name="lebar" value="{{ old('lebar') }}">
                                        @error('lebar')
                                            <div class="text-danger">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="password">Booking</label>
                                        <input type="text" class="form-control @error('luas') is-invalid @enderror" name="luas" value="{{ old('luas') }}">
                                        @error('luas')
                                            <div class="text-danger">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="password">Sisa Pembayaran</label>
                                        <input type="text" class="form-control @error('luas') is-invalid @enderror" name="luas" value="{{ old('luas') }}">
                                        @error('luas')
                                            <div class="text-danger">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="password">Jenis Pembayaran</label>
                                        <input type="text" class="form-control @error('luas') is-invalid @enderror" name="luas" value="{{ old('luas') }}">
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
           <script src="https://cdn.datatables.net/buttons/1.5.6/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.flash.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.print.min.js"></script>
    <script>
        $('#administrator').DataTable({
            "oLanguage": {
              "sSearch": "Cari Data :",
              "sZeroRecords": "Tidak Ada Data Ditampilkan",
              "sProcessing": "<i class='fa fa-spinner fa-1x fa-fw' style='color:black !important;'></i>&nbsp; Memuat. Harap Tunggu.. !!",
              "sEmptyTable": 'Tidak Ada Data Yang Dimuat',
              "sLengthMenu": 'Menampikan: <select>'+
                '<option value="10">10</option>'+
                '<option value="50">50</option>'+
                '<option value="100">100</option>'+
                '<option value="-1">Semua</option>'+
                '</select> Data',
                "sInfoFiltered": " - Filter Dari _MAX_ Data",
                "sInfo": "Mendapatkan _START_ - _END_ Data Untuk Ditampilkan Dari Total _TOTAL_ Data",
                "sInfoEmpty": "Mendapatkan 0 Sampai 0 Dari 0Data ",
                "oPaginate": {
                    "sPrevious": "Sebelumnya", 
                    "sNext": "Selanjutnya", 
                }
            },
            dom: 'lBfrtip',
            buttons: [
                { extend:'excel', text:'<i class="fa fa-file-excel-o"></i>&nbsp;Export Excel', className:'btn-export-excel',
                    exportOptions: {
                        columns: [ 0, 1, 2, 3, 4,5,6,7,8 ],
                    },
                },
            ],
        });

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