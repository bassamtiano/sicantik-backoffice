<?php

	class TmpemohonTrkelurahan extends BaseModel {

		protected $table = 'tmpemohon_trkelurahan';
		protected $guarded = ['id'];
		protected $fillable = ['tmpemohon_id', 'trkelurahan_id'];

		public static function insert_data($tmpemohon_id, $trkelurahan_id) {
			TmpemohonTrkelurahan::create(['tmpemohon_id' => $tmpemohon_id, 'trkelurahan_id' => $trkelurahan_id]);
		}

		public static function update_data($id, $data){
			return TmpemohonTrkelurahan::where('tmpemohon_id', '=', $id)->update($data);
		}

		public static function delete_data($id){
			return TmpemohonTrkelurahan::where('tmpemohon_id', '=', $id)->delete();
		}

	}