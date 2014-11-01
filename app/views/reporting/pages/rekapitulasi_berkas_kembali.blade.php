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
        .c_tanggal_peninjauan {
            width:10%;
            text-align:center;
        }
        .c_nama_dan_alamat_pemohon {
            width:20%;
        }
        .c_nama_dan_lokasi_izin_perusahaan {
            width:20%;
        }
        .c_alasan_kembali {
            width:10%;
            text-align:center;
        }
        .c_tanggal_pengembalian {
            width:12%;
            text-align:center;
        }
        .c_jenis_izin {
            width:13%;
            text-align:center;
        }
    </style>
@stop

@section('page_name')
    Reporting / Rekapitulasi Berkas Kembali
@stop

@section('angular_controller_script')
    {{ HTML::script('assets/controllers/ReportingCtrl.js') }}
@stop

@section('angular_controller')
    ng-controller="ReportingBerkasKembaliCtrl"
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
            <th class="c_tanggal_peninjauan">Tanggal Peninjauan</th>
            <th class="c_nama_dan_alamat_pemohon">Nama & Alamat Pemohon</th>
            <th class="c_nama_dan_lokasi_izin_perusahaan">Nama & Lokasi Izin Perusahaan</th>
            <th class="c_alasan_kembali">Alasan Kembali</th>
            <th class="c_tanggal_pengembalian">Tanggal Pengembalian</th>
            <th class="c_jenis_izin">Jenis Izin</th>
        </tr>
    </table>
@stop

@section('table_content')


    <table role="table-fluid">
        <tr ng-repeat="rbkd in rekapitulasi_berkas_kembali_data | orderBy:predicate:reverse | filter:search | limitTo:displayed ">
            <td class="c_no">@{{ $index+1 }}</td>
            <td class="c_no_pendaftaran">@{{ rbkd.pendaftaran_id }}</td>
            <td class="c_tanggal_peninjauan"> @{{ rbkd.d_survey }} </td>
            <td class="c_nama_dan_alamat_pemohon"> @{{ rbkd.n_pemohon }} <br> @{{ rbkd.a_pemohon }} </td>
            <td class="c_nama_dan_lokasi_izin_perusahaan">@{{ rbkd.n_perusahaan }} <br> @{{ rbkd.a_izin }}</td>
            <td class="c_alasan_kembali"> @{{ rbkd.c_pesan }} </td>
            <td class="c_tanggal_pengembalian"> @{{ rbkd.d_ambil_izin }} </td>
            <td class="c_jenis_izin"> @{{ rbkd.n_perizinan }} </td>
        </tr>
        <tr>
            <td colspan="8" style="text-align:center">
                <button ng-click="loadMore()" class="btn-load-more">Load More @{{  }} </button>
                <!-- ng-if="fetch_limit <= 0" -->
            </td>
        <tr>
    </table>
@stop
