<?php

    class TmperusahaanTrkelurahan extends BaseModel {

        protected $table = 'tmperusahaan_trkelurahan';
        protected $guarded = ['id'];
        protected $fillable = ['tmperusahaan_id','trkelurahan_id'];

        public static function insert_data($tmperusahaan_id, $trkelurahan_id) {
			TmperusahaanTrkelurahan::create(['tmperusahaan_id' => $tmperusahaan_id, 'trkelurahan_id' => $trkelurahan_id]);
		}
    }
