@extends('layouts.layout')
@section('location','Dashboard')
@section('location2')
    <i class="fa fa-user"></i>&nbsp;Manajemen Data Manajer
@endsection
@section('user-login','Direktur')
@section('sidebar-menu')
    @include('admin/sidebar')
@endsection
@section('content')
    <section class="panel" style="margin-bottom:20px;">
        <header class="panel-heading" style="color: #ffffff;background-color: #074071;border-color: #fff000;border-image: none;border-style: solid solid none;border-width: 4px 0px 0;border-radius: 0;font-size: 14px;font-weight: 700;padding: 15px;">
            <i class="fa fa-tasks"></i>&nbsp;Manajemen User Manajer
        </header>
        <div class="panel-body" style="border-top: 1px solid #eee; padding:15px; background:white;">
            <form action="{{ route('admin.manajer.post') }}" method="POST">
                {{ csrf_field() }} {{ method_field('POST') }}
                <div class="row">
                    <div class="col-md-12">
                        <div class="alert alert-info alert-block">
                            <i class="fa fa-info-circle"></i>&nbsp; Silahkan tambahkan manajer baru jika diperlukan.
                        </div>
                    </div>

                    <div class="col-md-4">
                        <label>Nama Manajer</label>
                        <input type="name" name="name"  class="form-control @error('name') is-invalid @enderror" id=""></textarea>
                        @error('name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="col-md-4">
                        <label>Email</label>
                        <input type="email" name="email"  class="form-control @error('email') is-invalid @enderror" id=""></textarea>
                        @error('email')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="col-md-4">
                        <label>Password</label>
                        <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" id=""></textarea>
                        @error('password')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="row text-center" style="margin-top: 10px; margin-bottom:1px;">
                    <div class="col-md-12" >
                        <button type="reset" name="reset" class="btn btn-warning btn-sm"><i class="fa fa-refresh"></i>&nbsp; Ulangi</button>
                        <button type="submit" name="submit" class="btn btn-primary btn-sm"><i class="fa fa-check-circle"></i>&nbsp; Simpan</button>
                    </div>
                </div>
            </form>
           <div class="row">
               <div class="col-md-12">
                   <table class="table table-hover table-bordered" id="table">
                       <thead>
                           <tr>
                               <th>No</th>
                               <th>Nama Manajer</th>
                               <th>Email</th>
                               <th>Status</th>
                           </tr>
                       </thead>
                       <tbody>
                           @php
                               $no=1;
                           @endphp
                           @foreach ($manajers as $manajer)
                               <tr>
                                   <td>{{ $no++ }}</td>
                                   <td>{{ $manajer->name }}</td>
                                   <td>{{ $manajer->email }}</td>
                                   <td>Manajer</td>
                              
                               </tr>
                           @endforeach
                       </tbody>
                   </table>
               </div>
           </div>
        </div>
    </section>
@endsection
@push('scripts')
    <script type="text/javascript">
        $(document).ready(function() {
            $("table[id^='table']").DataTable({
                responsive : true,
                "ordering": true,
            });
        } );
    </script>
@endpush