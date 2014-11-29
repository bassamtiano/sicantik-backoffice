<?php
	class TmperusahaanTrinvestasi extends BaseModel{
		protected $table = "tmperusahaan_trinvestasi";
		protected $guarded = array('id');
		protected $fillable = array('tmperusahaan_id','trinvestasi_id');

		public static function insert_data($tmperusahaan_id, $trinvestasi_id) {
			TmperusahaanTrinvestasi::create(['tmperusahaan_id' => $tmperusahaan_id, 'trinvestasi_id' => $trinvestasi_id]);
		}
	}