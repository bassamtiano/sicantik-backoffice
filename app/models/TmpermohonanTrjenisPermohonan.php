<?php
	class TmpermohonanTrjenispermohonan extends BaseModel{
		protected $table = "tmpermohonan_trjenis_permohonan";
		protected $guarded = ['id'];
		protected $fillable =['tmpermohonan_id','trjenis_permohonan_id'];

		public static function insert_data($tmpermohonan_id, $trjenis_permohonan_id) {
			TmpermohonanTrjenispermohonan::create(['tmpermohonan_id' => $tmpermohonan_id, 'trjenis_permohonan_id' => $trjenis_permohonan_id]);
		}
	}