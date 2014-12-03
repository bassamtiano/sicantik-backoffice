<?php

	class TmpermohonanTrjenispermohonan extends BaseModel {

		protected $table = 'tmpermohonan_trjenis_permohonan';
		protected $guarded = ['id'];
		protected $fillable = ['trjenis_permohonan_id', 'tmpermohonan_id'];

		public static function insert_data($tmpermohonan_id, $trjenis_permohonan_id) {
			TmpermohonanTrjenispermohonan::create(['tmpermohonan_id' => $tmpermohonan_id, 'trjenis_permohonan_id' => $trjenis_permohonan_id]);
		}

		// public static function update_data($id, $data){
		// 	return TmperusahaanTrkelurahan::where('tmperusahaan_id', '=', $id)->update($data);
		// }

		// public static function delete_data($id){
		// 	return TmperusahaanTrkelurahan::where('tmperusahaan_id', '=', $id)->delete();
		// }

	}