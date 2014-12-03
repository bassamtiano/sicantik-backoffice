<?php

	class TmperusahaanTrkelurahan extends BaseModel {

		protected $table = 'tmperusahaan_trkelurahan';
		protected $guarded = ['id'];
		protected $fillable = ['tmperusahaan_id', 'trkelurahan_id'];

		public static function insert_data($tmperusahaan_id, $trkelurahan_id) {
			TmperusahaanTrkelurahan::create(['tmperusahaan_id' => $tmperusahaan_id, 'trkelurahan_id' => $trkelurahan_id]);
		}

		public static function update_data($id, $data){
			return TmperusahaanTrkelurahan::where('tmperusahaan_id', '=', $id)->update($data);
		}

		public static function delete_data($id){
			return TmperusahaanTrkelurahan::where('tmperusahaan_id', '=', $id)->delete();
		}

	}