<?php

    /**
     *
     */

    class Tmpermohonansementara extends BaseModel {

        protected $table = "tmpermohonan_sementara";
        protected $guarded = ['id'];
        protected $fillable = [];


        # Modul Pelayanan ==========================================================================================================================================================================================

        public static function fetch_with_tmpemohon_sementara_tmpermohonan_for_pendaftaran_permohonan_sementara(){
            return DB::table('tmpermohonan')
            ->join('tmpemohon_sementara_tmpermohonan', 'tmpermohonan.id', '=', 'tmpemohon_sementara_tmpermohonan.tmpermohonan_id')
            ->join('tmpemohon_sementara', 'tmpemohon_sementara_tmpermohonan.tmpemohon_sementara_id', '=', 'tmpemohon_sementara.id')
            ->join('tmpermohonan_trperizinan', 'tmpermohonan.id', '=', 'tmpermohonan_trperizinan.tmpermohonan_id')
            ->join('trperizinan', 'trperizinan.id', '=', 'tmpermohonan_trperizinan.trperizinan_id')
            ->select(DB::raw('tmpermohonan.id, tmpermohonan.pendaftaran_id, tmpemohon_sementara.no_referensi, tmpemohon_sementara.n_pemohon, trperizinan.n_perizinan, tmpemohon_sementara.a_pemohon, tmpermohonan.d_terima_berkas'))
            ->where('tmpermohonan.c_pendaftaran', '=', '2')
            ->groupBy('tmpermohonan.id')
            ->orderBy('tmpermohonan.id')
            ->get();
        }


    }



?>
