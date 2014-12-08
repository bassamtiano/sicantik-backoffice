<?php
	class TmperusahaanTrkegiatan extends BaseModel {
		protected $table = "tmperusahaan_trkegiatan";
		protected $guarded = array('id');
		protected $fillable = array('tmperusahaan_id','trkegiatan_id');

		public static function insert_data($tmperusahaan_id, $trkegiatan_id) {
			TmperusahaanTrkegiatan::create(['tmperusahaan_id' => $tmperusahaan_id, 'trkegiatan_id' => $trkegiatan_id]);
		}
	}