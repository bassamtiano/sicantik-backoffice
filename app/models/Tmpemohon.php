<?php

    class Tmpemohon extends BaseModel {

        protected $table = 'tmpemohon';
        protected $fillable = ['n_pemohon'];
        protected $guarded = ['id'];


        # Modul Backoffice =========================================================================================================================================================================================

        public static function edit_pemohon_for_pendataan_entry_data_perizinan_data_awal($id, $data) {

            'tmpemohon.source', 'tmpemohon.no_referensi', 'tmpemohon.n_pemohon', 'tmpemohon.telp_pemohon';

            Tmpemohon::where('id', '=', $id)->update(['n_pemohon' => $data['n_pemohon']]);



        }


    }
