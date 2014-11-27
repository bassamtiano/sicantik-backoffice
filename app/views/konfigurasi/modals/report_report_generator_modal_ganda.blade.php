<form id="form_data_awal" method="post" target="target_ganda" action="{{ URL::to('konfigurasi/report/report_generator/ganda') }}">
<!-- <form id="form_data_awal" method="post" action="{{ URL::to('konfigurasi/report/report_generator/ganda') }}"> -->


<input type="hidden" name="id" value="@{{entry_data_perizinan_data_awal_data.id}}">

<div class="modal" ng-show={{ $modal_name }}>

    <div class="modal-container large">
        <div class="modal-header update">
            <h2>Gandakan Report Generator</h2><a class="button-close" href ng-click="close_modal('modal_ganda')">x</a>
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
                                <div class="content-form-input"><input type="text" name="report_code" ng-model="report_generator_edit_data.report_code"></div>
                            </div>
                            <div class="tab-content-form">
                                <div class="content-form-label">Deskripsi Singkat</div>
                                <div class="content-form-input"><input type="text" name="short_desc" ng-model="report_generator_edit_data.short_desc"></div>
                            </div>
                            <div class="tab-content-form">
                                <div class="content-form-label">Deskripsi Lengkap</div>
                                <div class="content-form-input"><input type="text" name="long_desc" ng-model="report_generator_edit_data.long_desc"></div>
                            </div>
                            <div class="tab-content-form">
                                <div class="content-form-label">Rancangan Laporan</div>
                                <div class="content-form-input"><input type="text" name="layout" ng-model="report_generator_edit_data.layout"></div>
                            </div>
                        </div>

                        <div class="tab-content-right">
                            <div class="tab-content-form">
                                <div class="content-form-label">Perizinan</div>
                                <div class="content-form-input">
                                    <select name="trperizinan_id" >
                                        <option ng-repeat="tp in trperizinan"  ng-if="tp.selected == true" selected ng-value="tp.id" >@{{ tp.n_perizinan }}</option>
                                        <option ng-repeat="tp in trperizinan"  ng-if="tp.selected == false" ng-value="tp.id" >@{{ tp.n_perizinan }}</option>
                                    </select>
                                </div>
                            </div>
                            <div class="tab-content-form">
                                <div class="content-form-label">Tipe Laporan</div>
                                <div class="content-form-input">
                                    <select name="report_type" >
                                        <option ng-repeat="rt in report_types"  ng-if="rt.selected == true" selected ng-value="rt.report_type_code" >@{{ rt.report_type_desc }}</option>
                                        <option ng-repeat="rt in report_types"  ng-if="rt.selected == false" ng-value="rt.report_type_code" >@{{ rt.report_type_desc }}</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>



            </div>

        </div>

        <div class="modal-footer">
            <div class="modal-footer-left">
                &nbsp;
            </div>
            <div class="modal-footer-right">
                <input type="submit" value="Simpan" class="btn button-green" ng-click="modal_ganda_submit()"/>
                <a class="btn button-red" ng-click="close_modal('modal_ganda')">Batal</a>
            </div>
        </div>

    </div>



<iframe id="target_ganda" name="target_ganda" style="width:100; height:100; visibility:hidden; position:relative; background:#fff;">

</iframe>

</div>

</form>
