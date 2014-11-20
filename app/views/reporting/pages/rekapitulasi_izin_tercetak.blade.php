@extends('layouts.table_content')

@section('table_style')
    <style type="text/css">
        .c_no {
            width:5%;
            text-align:center;
        }
        .c_no_pendaftaran {
            width:10%;
            text-align:center;
        }
        .c_tanggal_penetapan {
            width:12%;
            text-align:center;
        }
        .c_nama_dan_alamat_pemohon {
            width:25%;
        }
        .c_nama_dan_lokasi_izin_perusahaan {
            width:25%;
        }
        .c_dicetak {
            width:10%;
            text-align:center;
        }
        .c_jenis_izin {
            width:10%;
            text-align:center;
        }
    </style>
@stop

@section('page_name')
    Reporting / Rekapitulasi Izin Tercetak
@stop

@section('angular_controller_script')
    {{ HTML::script('assets/controllers/ReportingCtrl.js') }}
@stop

@section('angular_controller')
    ng-controller="ReportingRekapitulasiIzinTercetakCtrl"
@stop

@section('nav-menu-left')
        <form ng-submit="filter_date()">
        <div class="table-form-content">
            <div class="form-item">
                <input type="text" data-provide="datepicker" class="tanggal_input" ng-model="date.start" placeholder="Tanggal Awal">
            </div>
            <div class="form-item">
                <input type="text" data-provide="datepicker" class="tanggal_input" ng-model="date.finish" placeholder="Tanggal Akhir">
            </div>
            <div class="form-item">
                <input type="submit" value="Filter">
            </div>
        </div>
    </form>
@stop

@section('nav-menu-right')
   <a class="sub-nav-item" href="{{ URL::to('reporting/rekapitulasi_izin_tercetak/cetak') }}/@{{ date.start }}/@{{ date.finish }}" ng-if="date.start.length > 0 && date.finish.length > 0"> Print</a>
@stop

@section('table_nav')
    <table>
        <tr>
            <th class="c_no">No</th>
            <th class="c_no_pendaftaran">No Pendaftaran</th>
            <th class="c_tanggal_penetapan">Tanggal Penetapan</th>
            <th class="c_nama_dan_alamat_pemohon">Nama & Alamat Pemohon</th>
            <th class="c_nama_dan_lokasi_izin_perusahaan">Nama & Lokasi Izin Perusahaan</th>
            <th class="c_dicetak">Dicetak</th>
            <th class="c_jenis_izin">Jenis Izin</th>
        </tr>
    </table>
@stop

@section('table_content')


    <table role="table-fluid">
        <tr ng-repeat="ritd in rekapitulasi_izin_tercetak_data | orderBy:predicate:reverse | filter:search | limitTo:displayed ">
            <td class="c_no"> @{{ $index+1 }}</td>
            <td class="c_no_pendaftaran">@{{ ritd.pendaftaran_id }}</td>
            <td class="c_tanggal_penetapan"> @{{ ritd.tanggal_peninjauan }} </td>
            <td class="c_nama_dan_alamat_pemohon">@{{ ritd.n_pemohon }} <br> @{{ ritd.a_pemohon }}</td>
            <td class="c_nama_dan_lokasi_izin_perusahaan">@{{ ritd.n_perusahaan }} <br> @{{ ritd.a_izin }}</td>
            <td class="c_dicetak"> @{{ ritd.c_cetak }} kali</td>
            <td class="c_jenis_izin"> @{{ ritd.n_perizinan }}</td>
        </tr>
        <tr>
            <td colspan="8" style="text-align:center">
                <button ng-click="loadMore()" class="btn-load-more">Load More @{{  }} </button>
                <!-- ng-if="fetch_limit <= 0" -->
            </td>
        <tr>
    </table>
@stop
