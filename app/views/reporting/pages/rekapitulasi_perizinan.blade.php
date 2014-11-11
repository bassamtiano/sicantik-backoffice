@extends('layouts.table_content')

@section('table_style')
    <style type="text/css">
        .c_no {
            width:5%;
            text-align:center;
        }
        .c_jenis_izin {
            width:15%;
        }
        .c_izin_masuk {
            width:8%;
            text-align:center;
        }
        .c_izin_terbit_jumlah {
            width:10%;
            text-align:center;
        }
        .c_izin_terbit_diambil {
            width:10%;
            text-align:center;
        }
        .c_izin_terbit_belum_diambil {
            width:12%;
            text-align:center;
        }
        .c_izin_ditolak_jumlah {
            width:10%;
            text-align:center;
        }
        .c_izin_ditolak_diambil {
            width:10%;
            text-align:center;
        }
        .c_izin_ditolak_belum_diambil {
            width:13%;
            text-align:center;
        }
        .c_izin_diproses {
            width:10%;
            text-align:center;
        }
    </style>
@stop

@section('page_name')
    Reporting / Rekapitulasi Pendaftaran
@stop

@section('angular_controller_script')
    {{ HTML::script('assets/controllers/ReportingCtrl.js') }}
@stop

@section('angular_controller')
    ng-controller="ReportingRekapitulasiPerizinanCtrl"
@stop

@section('nav-menu-left')
    <!-- {{ HTML::linkRoute('reporting_realisasi_penerimaan_cetak', 'Print', [1,1],  ['class' => 'btn']) }}-->

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
    <a class="sub-nav-item" href="{{ URL::to('reporting/rekapitulasi_perizinan/cetak') }}/@{{ date.start }}/@{{ date.finish }}" ng-if="date.start !== 'undefined' && date.finish !== 'undefined'">Print</a>
@stop

@section('nav-menu-right')
@stop

@section('table_nav')
    <table class="table-double-row">
        <tr>
            <th class="c_no">No</th>
            <th class="c_jenis_izin">Jenis Izin</th>
            <th class="c_izin_masuk">Izin Masuk</th>
            <th class="c_izin_terbit_jumlah">Jumlah Izin Terbit </th>
            <th class="c_izin_terbit_diambil"> Izin Terbit Diambil</th>
            <th class="c_izin_terbit_belum_diambil"> Izin Terbit Belum Diambil</th>
            <th class="c_izin_ditolak_jumlah">Jumlah Izin Ditolak </th>
            <th class="c_izin_ditolak_diambil"> Izin Ditolak Diambil</th>
            <th class="c_izin_ditolak_belum_diambil"> Izin Ditolak Belum Diambil</th>
            <th class="c_izin_diproses">Izin Proses</th>
        </tr>
    </table>
@stop

@section('table_content')

    <table role="table-fluid">
        <tr ng-repeat="rrpd in reporting_rekapitulasi_perizinan | limitTo:displayed">


            <td class="c_no">@{{ $index+1 }}</td>
            <td class="c_jenis_izin"> @{{ rrpd.n_perizinan }} </td>
            <td class="c_izin_masuk"> @{{ rrpd.izin_masuk }} </td>
            <td class="c_izin_terbit_jumlah"> @{{ rrpd.terbit_jumlah }} </td>
            <td class="c_izin_terbit_diambil"> @{{ rrpd.terbit_diambil }} </td>
            <td class="c_izin_terbit_belum_diambil"> @{{ rrpd.terbit_belum_diambil }} </td>
            <td class="c_izin_ditolak_jumlah"> @{{ rrpd.tolak_jumlah }} </td>
            <td class="c_izin_ditolak_diambil"> @{{ rrpd.tolak_ambil }} </td>
            <td class="c_izin_ditolak_belum_diambil"> @{{ rrpd.tolak_belum_diambil }} </td>
            <td class="c_izin_diproses"> @{{ rrpd.izin_dalam_proses }} </td>
        </tr>
        <tr>
            <td colspan="10" style="text-align:center">
                <button ng-click="loadMore()" class="btn-load-more">Load More </button>
                <!-- ng-if="fetch_limit <= 0" -->
            </td>
        <tr>
    </table>
@stop
