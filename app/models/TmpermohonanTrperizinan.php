<?php

	class TmpermohonanTrperizinan extends BaseModel {

		protected $table = 'tmpermohonan_trperizinan';
		protected $guarded = ['id'];
		protected $fillable = ['tmpermohonan_id', 'trperizinan_id'];

		public static function insert_data($tmpermohonan_id, $trperizinan_id) {
			TmpermohonanTrperizinan::create([ 'tmpermohonan_id' => $tmpermohonan_id, 'trperizinan_id' => $trperizinan_id]);
		}

		// public static function update_data($id, $data){
		// 	return TmperusahaanTrkelurahan::where('tmperusahaan_id', '=', $id)->update($data);
		// }

		// public static function delete_data($id){
		// 	return TmperusahaanTrkelurahan::where('tmperusahaan_id', '=', $id)->delete();
		// }

	}