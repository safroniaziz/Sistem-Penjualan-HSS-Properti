<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Data Transaksi</title>
    <style>
        td{
            padding-right:15px 0px 15px 15px;
            padding-bottom: 3px;
        }

        @page {
margin:0px;
}
    </style>
</head>
<body>
    <h3 style="margin-left:30%;">Bukti Pemesanan HSS Properti</h3>
    <table style="width: 50%; margin:0 auto;  padding:12px;" >
        <tr>
            <td>Nama Konsumen</td>
            <td> : </td>
            <td>
                {{ $data->nm_konsumen }}
            </td>

        </tr>
        <tr>
            <td>Nama Properti</td>
            <td> : </td>
            <td>
                {{ $data->nm_properti }}
            </td>

            
        </tr>
        <tr>
            <td>Jenis Properti</td>
            <td> : </td>
            <td>
                {{ $data->jenis_properti }}
            </td>
        </tr>
        <tr>
            <td>Jumlah Booking</td>
            <td> : </td>
            <td>
                Rp.{{ number_format($data->booking) }}
            </td>
        </tr>
        <tr>
            <td>Harga </td>
            <td> : </td>
            <td>
                Rp.{{ number_format($data->harga) }}
            </td>
        </tr>
        <tr>
            <td>Sisa Pembayaran </td>
            <td> : </td>
            <td>
                Rp.{{ number_format($data->sisa_pembayaran) }}
            </td>
        </tr>
        <tr>
            <td>Jenis Pembayaran </td>
            <td> : </td>
            <td>
                {{$data->jenis_pembayaran }}
            </td>
        </tr>
     
        <tr>
            <td>Nomor Induk Keluarga</td>
            <td> : </td>
            <td>
                {{ $data->nik }}
            </td>

            
        </tr>
        <tr>
            <td>Alamat Properti</td>
            <td> : </td>
            <td>
                {{ $data->alamat }}
            </td>

            
        </tr>
        <tr>
            <td>Panjang Lahan</td>
            <td> : </td>
            <td>
                {{ $data->panjang }} Meter
            </td>
        </tr>
        <tr>
            <td>Lebar Lahan</td>
            <td> : </td>
            <td>
                {{ $data->lebar }} Meter
            </td>
        </tr>
        <tr>
            <td>Luas Lahan</td>
            <td> : </td>
            <td>
                {{ $data->luas }} Meter
            </td>
        </tr>
    </table>
    <br>
    <table style="width: 100%">
        <tr style="margin-top: 0px;">
            <td style="text-align: center" >Manajer</td>
            <td style="text-align: center">Admin</td>
        </tr>
        <tr>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td></td>
            <td></td>
       <tr>
            <td></td>
            <td></td>
        </tr><tr>
            <td></td>
            <td></td>
        </tr><tr>
            <td></td>
            <td></td>
        </tr><tr>
            <td></td>
            <td></td>
        </tr><tr>
            <td></td>
            <td></td>
        </tr><tr>
            <td></td>
            <td></td>
        </tr><tr>
            <td></td>
            <td></td>
        </tr><tr>
            <td></td>
            <td></td>
        </tr><tr>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td style="text-align: center">(&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;)</td>
            <td style="text-align: center">(&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;)</td>
        </tr>
    </table>

    ---------------------------------------------------------------------------------------------------------------------------------------
    <br>
    <br>
    <h3 style="margin-left:30%;">Bukti Pemesanan HSS Properti</h3>
    <table style="width: 50%; margin:0 auto;  padding:12px;" >
        <tr>
            <td>Nama Konsumen</td>
            <td> : </td>
            <td>
                {{ $data->nm_konsumen }}
            </td>

        </tr>
        <tr>
            <td>Nama Properti</td>
            <td> : </td>
            <td>
                {{ $data->nm_properti }}
            </td>

            
        </tr>
        <tr>
            <td>Jenis Properti</td>
            <td> : </td>
            <td>
                {{ $data->jenis_properti }}
            </td>
        </tr>
        <tr>
            <td>Jumlah Booking</td>
            <td> : </td>
            <td>
                Rp.{{ number_format($data->booking) }}
            </td>
        </tr>
        <tr>
            <td>Harga </td>
            <td> : </td>
            <td>
                Rp.{{ number_format($data->harga) }}
            </td>
        </tr>
        <tr>
            <td>Sisa Pembayaran </td>
            <td> : </td>
            <td>
                Rp.{{ number_format($data->sisa_pembayaran) }}
            </td>
        </tr>
        <tr>
            <td>Jenis Pembayaran </td>
            <td> : </td>
            <td>
                {{$data->jenis_pembayaran }}
            </td>
        </tr>
     
        <tr>
            <td>Nomor Induk Keluarga</td>
            <td> : </td>
            <td>
                {{ $data->nik }}
            </td>
        </tr>
        <tr>
            <td>Alamat Properti</td>
            <td> : </td>
            <td>
                {{ $data->alamat }}
            </td>
        </tr>
        <tr>
            <td>Panjang Lahan</td>
            <td> : </td>
            <td>
                {{ $data->panjang }} Meter
            </td>
        </tr>
        <tr>
            <td>Lebar Lahan</td>
            <td> : </td>
            <td>
                {{ $data->lebar }} Meter
            </td>
        </tr>
        <tr>
            <td>Luas Lahan</td>
            <td> : </td>
            <td>
                {{ $data->luas }} Meter
            </td>
        </tr>
    </table>
    <br>
    <table style="width: 100%">
        <tr style="margin-top: 0px;">
            <td style="text-align: center" >Manajer</td>
            <td style="text-align: center">Admin</td>
        </tr>
        <tr>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td></td>
            <td></td>
       <tr>
            <td></td>
            <td></td>
        </tr><tr>
            <td></td>
            <td></td>
        </tr><tr>
            <td></td>
            <td></td>
        </tr><tr>
            <td></td>
            <td></td>
        </tr><tr>
            <td></td>
            <td></td>
        </tr><tr>
            <td></td>
            <td></td>
        </tr><tr>
            <td></td>
            <td></td>
        </tr><tr>
            <td></td>
            <td></td>
        </tr><tr>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td style="text-align: center">(&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;)</td>
            <td style="text-align: center">(&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;)</td>
        </tr>
    </table>
</body>
</html>