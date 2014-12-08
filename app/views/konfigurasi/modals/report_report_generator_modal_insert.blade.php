<!-- <form enctype="multipart/form-data" method="post" target="target_insert" action="{{ URL::to('konfigurasi/report/report_generator/insert') }}"> -->
<form enctype="multipart/form-data" method="post" target="target_insert" action="{{ URL::to('konfigurasi/report/report_generator/insert') }}">


<input type="hidden" name="id" value="@{{entry_data_perizinan_data_awal_data.id}}">

<div class="modal" ng-show={{ $modal_name }}>

    <div class="modal-container large">
        <div class="modal-header update">
            <h2>Buat Report Generator</h2><a class="button-close" href ng-click="close_modal('modal_insert')">x</a>
        </div>
        <div class="modal-body">
            <div class="body-tab-wrapper">
                <div class="tab-nav">
                    <ul class="tab-nav-wrapper">
                        <li class="tab-nav-item enable" id="tab_nav_report_generator">Report Generator</li>
                    <ul>
                </div>

                <div class="tab-content-wrapper">

                    <div class="tab-content">

                        <div class="tab-content-left">
                            <div class="tab-content-form">
                                <div class="content-form-label">ID Laporan</div>
                                <div class="content-form-input">
                                    <input type="text" name="report_code" >
                                </div>
                            </div>
                            <div class="tab-content-form">
                                <div class="content-form-label">Deskripsi Singkat</div>
                                <div class="content-form-input"><input type="text" name="short_desc"></div>
                            </div>
                            <div class="tab-content-form">
                                <div class="content-form-label">Deskripsi Lengkap</div>
                                <div class="content-form-input"><input type="text" name="long_desc" ></div>
                            </div>
                            <div class="tab-content-form">
                                <div class="content-form-label">Rancangan Laporan</div>
                                <div class="content-form-input"><input type="file" name="layout"></div>
                            </div>
                        </div>

                        <div class="tab-content-right">
                            <div class="tab-content-form">
                                <div class="content-form-label">Perizinan</div>
                                <div class="content-form-input">
                                    <select name="trperizinan_id" ng-model="trperizinan_id" ng-options="tpi.n_perizinan for tpi in trperizinan_insert track by tpi.id">
                                        <option value="">Pilih Perizinan</option>
                                    </select>
                                </div>
                            </div>
                            <div class="tab-content-form">
                                <div class="content-form-label">Tipe Laporan</div>
                                <div class="content-form-input">
                                    <select name="report_type" ng-model="report_type" ng-options="rti.report_type_desc for rti in report_types_insert track by rti.report_type_code">
                                        <option value="">Pilih Tipe Laporan</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                    </div>

                    <!-- <div class="tab-content" ng-show="tab.edit_tab_report_group_data">
                        <div class="tab-content-table">

                            <style>
                                .c_modal_no {
                                    width:10%;
                                    text-align:center;
                                }
                                .c_modal_group_code {
                                    width:20%;
                                }
                                .c_modal_short_desc {
                                    width:20%;
                                }
                                .c_modal_type {
                                    width:10%;
                                }
                                .c_modal_query {
                                    width:30%;
                                }
                                .c_modal_aksi {
                                    width:30%;
                                }
                            </style>

                            <table>
                                <tr class="table-legend">
                                    <th class="c_modal_no" >No</th>
                                    <th class="c_modal_group_code" >Group Code</th>
                                    <th class="c_modal_short_desc" >Short Desc</th>
                                    <th class="c_modal_type" >Type</th>
                                    <th class="c_modal_query" >Query</th>
                                    <th class="c_modal_aksi" >Aksi</th>
                                </tr>

                                <tr ng-repeat="rgd in report_generator_edit_data.report_group_data">
                                    <td class="c_modal_no" >@{{$index+1}}</td>
                                    <td class="c_group_code" >
                                        <input type="text" value="@{{ rgd.report_group_code }}" />
                                    </td>
                                    <td class="c_modal_short_desc" >
                                        <input type="text" value="@{{ rgd.short_desc }}" />
                                    </td>
                                    <td class="c_modal_type" >
                                        <input type="text" value="@{{ rgd.type }}" />
                                    </td>
                                    <td class="c_modal_query" >
                                        <textarea>@{{ rgd.group_query }}</textarea>
                                    </td>
                                    <td class="c_modal_aksi" >
                                        <input type="text" value="@{{ rgd.id }}" />
                                    </td>
                                </tr>
                            </table>
                        </div>

                    </div> -->

                </div>



            </div>

        </div>

        <div class="modal-footer">
            <div class="modal-footer-left">
                &nbsp;
            </div>
            <div class="modal-footer-right">
                <input type="submit" value="Simpan" class="btn button-green" ng-click="modal_insert_submit()"/>
                <a class="btn button-red" ng-click="close_modal('modal_insert')">Batal</a>
            </div>
        </div>

    </div>



<iframe id="target_insert" name="target_insert" style="width:100; height:100; visibility:hidden; position:relative; background:#fff;">

</iframe>

</div>

</form>
