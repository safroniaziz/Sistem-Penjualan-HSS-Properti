<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect()->route('login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix' => 'operator', 'middleware'   =>  ['auth', 'role:operator']], function()
{
    Route::get('/dashboard','Operator\DashboardController@operatorDashboard')->name('operator.dashboard');

    Route::group(['prefix' => 'properti'], function(){
        Route::get('/','Operator\PropertiController@index')->name('operator.properti');
        Route::post('/','Operator\PropertiController@post')->name('operator.properti.post');
    });

    Route::group(['prefix' => 'properti_detail'], function(){
        Route::get('/','Operator\PropertiDetailController@index')->name('operator.properti_detail');
        Route::post('/','Operator\PropertiDetailController@post')->name('operator.properti_detail.post');
    });

    Route::group(['prefix' => 'transaksi'], function(){
        Route::get('/','Operator\TransaksiController@index')->name('operator.transaksi');
        Route::post('/','Operator\TransaksiController@post')->name('operator.transaksi.post');
        Route::get('/cari_detail','Operator\TransaksiController@cariDetail')->name('operator.transaksi.cari_detail');
        Route::get('/cetak_laporan/{id}','Operator\TransaksiController@cetakLaporan')->name('operator.transaksi.laporan');
    });

    Route::group(['prefix' => 'laporan'], function(){
        Route::get('/','Operator\LaporanController@index')->name('operator.laporan');
        Route::post('/','Operator\LaporanController@post')->name('operator.laporan.post');
        Route::delete('/delete','Operator\LaporanController@delete')->name('operator.laporan.delete');
        Route::get('/{id}/edit','Operator\LaporanController@edit')->name('operator.laporan.edit');
        Route::get('/cari_laporan','Operator\LaporanController@cariLaporan')->name('operator.cari_laporan');
    });
});

Route::group(['prefix' => 'manajer', 'middleware'   =>  ['auth', 'role:manajer']], function()
{
    Route::get('/dashboard','Manajer\DashboardController@manajerDashboard')->name('manajer.dashboard');

    Route::group(['prefix' => 'properti'], function(){
        Route::get('/','Manajer\PropertiController@index')->name('manajer.properti');
        Route::post('/','Manajer\PropertiController@post')->name('manajer.properti.post');
    });

    Route::group(['prefix' => 'properti_detail'], function(){
        Route::get('/','Manajer\PropertiDetailController@index')->name('manajer.properti_detail');
        Route::post('/','Manajer\PropertiDetailController@post')->name('manajer.properti_detail.post');
    });

    Route::group(['prefix' => 'transaksi'], function(){
        Route::get('/','Manajer\TransaksiController@index')->name('manajer.transaksi');
        Route::post('/','Manajer\TransaksiController@post')->name('manajer.transaksi.post');
        Route::get('/cari_detail','Manajer\TransaksiController@cariDetail')->name('manajer.transaksi.cari_detail');
        Route::get('/cetak_laporan/{id}','Manajer\TransaksiController@cetakLaporan')->name('manajer.transaksi.laporan');

    });

    Route::get('/cari_laporan','Manajer\LaporanController@cariLaporan')->name('manajer.cari_laporan');

    Route::group(['prefix'  => '/data_operator'], function () {
        Route::get('/', 'Manajer\OperatorController@index')->name('manajer.operator');
        Route::get('/tambah_operator', 'Manajer\OperatorController@add')->name('manajer.operator.add');
        Route::post('/tambah_operator', 'Manajer\OperatorController@post')->name('manajer.operator.post');
        Route::patch('/aktifkan_status/{id}', 'Manajer\OperatorController@aktifkanStatus')->name('manajer.operator.aktifkan_status');
        Route::patch('/non_aktifkan_status/{id}', 'Manajer\OperatorController@nonAktifkanStatus')->name('manajer.operator.non_aktifkan_status');
    });

    Route::group(['prefix' => 'laporan'], function(){
        Route::get('/','Manajer\LaporanController@index')->name('manajer.laporan');
        Route::post('/','Manajer\LaporanController@post')->name('manajer.laporan.post');
        Route::delete('/delete','Manajer\LaporanController@delete')->name('manajer.laporan.delete');
        Route::get('/{id}/edit','Manajer\LaporanController@edit')->name('manajer.laporan.edit');
    });
});

Route::group(['prefix' => 'direktur', 'middleware'   =>  ['auth', 'role:administrator']], function()
{
    Route::get('/dashboard','DashboardController@adminDashboard')->name('admin.dashboard');

    Route::group(['prefix' => 'properti'], function(){
        Route::get('/','PropertiController@index')->name('admin.properti');
        Route::post('/','PropertiController@post')->name('admin.properti.post');
        Route::delete('/delete','PropertiController@delete')->name('admin.properti.delete');
        Route::get('/{id}/edit','PropertiController@edit')->name('admin.properti.edit');
    });

    Route::group(['prefix' => 'properti_detail'], function(){
        Route::get('/','PropertiDetailController@index')->name('admin.properti_detail');
        Route::post('/','PropertiDetailController@post')->name('admin.properti_detail.post');
    });

    Route::group(['prefix' => 'transaksi'], function(){
        Route::get('/','TransaksiController@index')->name('admin.transaksi');
        Route::post('/','TransaksiController@post')->name('admin.transaksi.post');
        Route::delete('/delete','TransaksiController@delete')->name('admin.transaksi.delete');
        Route::get('/{id}/edit','TransaksiController@edit')->name('admin.transaksi.edit');
        Route::get('/cari_detail','TransaksiController@cariDetail')->name('admin.transaksi.cari_detail');
        Route::get('/cetak_laporan/{id}','TransaksiController@cetakLaporan')->name('admin.transaksi.laporan');
    });

    Route::get('/cari_laporan','LaporanController@cariLaporan')->name('admin.cari_laporan');

    Route::group(['prefix'  => '/data_manajer'], function () {
        Route::get('/', 'ManajerController@index')->name('admin.manajer');
        Route::get('/tambah_manajer', 'ManajerController@add')->name('admin.manajer.add');
        Route::post('/tambah_manajer', 'ManajerController@post')->name('admin.manajer.post');
        Route::patch('/aktifkan_status/{id}', 'ManajerController@aktifkanStatus')->name('admin.manajer.aktifkan_status');
        Route::patch('/non_aktifkan_status/{id}', 'ManajerController@nonAktifkanStatus')->name('admin.manajer.non_aktifkan_status');
    });

    Route::group(['prefix'  => '/data_operator'], function () {
        Route::get('/', 'OperatorController@index')->name('admin.operator');
        Route::get('/tambah_operator', 'OperatorController@add')->name('admin.operator.add');
        Route::post('/tambah_operator', 'OperatorController@post')->name('admin.operator.post');
        Route::patch('/aktifkan_status/{id}', 'OperatorController@aktifkanStatus')->name('admin.operator.aktifkan_status');
        Route::patch('/non_aktifkan_status/{id}', 'OperatorController@nonAktifkanStatus')->name('admin.operator.non_aktifkan_status');
    });

    Route::group(['prefix'  => '/data_administrator'], function () {
        Route::get('/', 'AdministratorController@index')->name('admin.administrator');
        Route::get('/tambah_administrator', 'AdministratorController@add')->name('admin.administrator.add');
        Route::post('/tambah_administrator', 'AdministratorController@post')->name('admin.administrator.post');
        Route::patch('/aktifkan_status/{id}', 'AdministratorController@aktifkanStatus')->name('admin.administrator.aktifkan_status');
        Route::patch('/non_aktifkan_status/{id}', 'AdministratorController@nonAktifkanStatus')->name('admin.administrator.non_aktifkan_status');
    });

    Route::group(['prefix' => 'laporan'], function(){
        Route::get('/','LaporanController@index')->name('admin.laporan');
        Route::post('/','LaporanController@post')->name('admin.laporan.post');
        Route::delete('/delete','LaporanController@delete')->name('admin.laporan.delete');
        Route::get('/{id}/edit','LaporanController@edit')->name('admin.laporan.edit');
    });
});