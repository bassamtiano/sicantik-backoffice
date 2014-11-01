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
        .c_tanggal_daftar {
            width:12%;
            text-align:center;
        }
        .c_tanggal_peninjauan {
            width:12%;
            text-align:center;
        }
        .c_nama_dan_alamat_pemohon {
            width:24%;

        }
        .c_jenis_izin {
            width:12%;
            text-align:center;
        }
        .c_nama_dan_lokasi_izin_perusahaan {
            width:25%;
        }
    </style>
@stop

@section('page_name')
    Reporting / Rekapitulasi Tinjauan Lapangan
@stop

@section('angular_controller_script')
    {{ HTML::script('assets/controllers/ReportingCtrl.js') }}
@stop

@section('angular_controller')
    ng-controller="RekapitulasiTinjauanLapanganCtrl"
@stop

@section('nav-menu-left')
    {{ HTML::linkRoute('reporting_realisasi_penerimaan_cetak', 'Print', [1,1], ['class' => 'btn']) }}
@stop

@section('nav-menu-right')
    <form>
        <div class="table-form-content">
            <div class="form-item">
                &nbsp;
            </div>
            <div class="form-item">
                &nbsp;
            </div>
            <div class="form-item wide">
                <input type="text" placeholder="Kata Kunci" ng-model="search">
            </div>
        </div>
    </form>
@stop

@section('table_nav')
    <table>
        <tr>
            <th class="c_no">No</th>
            <th class="c_no_pendaftaran">No Pendaftaran</th>
            <th class="c_tanggal_daftar">Tanggal Daftar</th>
            <th class="c_tanggal_peninjauan">Tanggal Peninjauan</th>
            <th class="c_nama_dan_alamat_pemohon">Nama & Alamat Pemohon</th>
            <th class="c_jenis_izin">Jenis Izin</th>
            <th class="c_nama_dan_lokasi_izin_perusahaan">Nama & Lokasi Izin Perusahaan</th>
        </tr>
    </table>
@stop

@section('table_content')


    <table role="table-fluid">
        <tr ng-repeat="rtld in rekapitulasi_tinjauan_lapangan_data | orderBy:predicate:reverse | filter:search | limitTo:displayed ">
            <td class="c_no">@{{ $index+1 }}</td>
            <td class="c_no_pendaftaran">@{{ rtld.pendaftaran_id }}</td>
            <td class="c_tanggal_daftar">@{{ rtld.d_terima_berkas }}</td>
            <td class="c_tanggal_peninjauan">@{{ rtld.d_survey }}</td>
            <td class="c_nama_dan_alamat_pemohon">
                @{{ rtld.n_pemohon }} <br>
                @{{ rtld.a_pemohon }}
            </td>
            <td class="c_jenis_izin">@{{ rtld.n_perizinan }}</td>
            <td class="c_nama_dan_lokasi_izin_perusahaan">
                @{{ rtld.n_perusahaan }} <br>
                @{{ rtld.a_izin }}
            </td>
        </tr>
        <tr>
            <td colspan="8" style="text-align:center">
                <button ng-click="loadMore()" class="btn-load-more">Load More @{{  }} </button>
                <!-- ng-if="fetch_limit <= 0" -->
            </td>
        <tr>
    </table>
@stop
