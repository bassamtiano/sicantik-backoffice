<?php

	class TrkabupatenTrkecamatan extends BaseModel {

		protected $table = 'trkabupaten_trkecamatan';
		protected $guarded = ['id'];
		protected $fillable = ['trkabupaten_id', 'trkecamatan_id'];

		public static function insert_data($trkabupaten_id, $trkecamatan_id) {
			TrkabupatenTrkecamatan::create(['trkabupaten_id' => $trkabupaten_id, 'trkecamatan_id' => $trkecamatan_id]);
		}

	public static function update_data($id, $data){
		return TrkabupatenTrkecamatan::where('trkecamatan_id', '=', $id)->update($data);
	}

	public static function delete_data($id){
		return TrkabupatenTrkecamatan::where('trkecamatan_id', '=', $id)->delete();
	}

	}