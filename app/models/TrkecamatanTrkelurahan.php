<?php

	class TrkecamatanTrkelurahan extends BaseModel {

		protected $table = 'trkecamatan_trkelurahan';
		protected $guarded = ['id'];
		protected $fillable = ['trkecamatan_id', 'trkelurahan_id'];

		public static function insert_data($trkecamatan_id, $trkelurahan_id) {
			TrkecamatanTrkelurahan::create(['trkecamatan_id' => $trkecamatan_id, 'trkelurahan_id' => $trkelurahan_id]);
		}

		public static function update_data($id, $data){
		return TrkecamatanTrkelurahan::where('trkelurahan_id', '=', $id)->update($data);
	}

	public static function delete_data($id){
		return TrkecamatanTrkelurahan::where('trkelurahan_id', '=', $id)->delete();
	}

	}