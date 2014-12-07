<?php

	class TmpesanTrstspesan extends BaseModel {

		protected $table = 'tmpesan_trstspesan';
		protected $guarded = ['id'];
		protected $fillable = ['tmpesan_id', 'trstspesan_id'];

		public static function fetch_data() {
			return TmpesanTrstspesan::get();
		}

		public static function insert_data($tmpesan_id, $trstspesan_id) {
			TmpesanTrstspesan::create(['tmpesan_id' => $tmpesan_id, 'trstspesan_id' => $trstspesan_id]);
		}

		public static function update_data($id, $data){	
			return TmpesanTrstspesan::where('tmpesan_id', '=', $id)->update($data);
		}

		public static function delete_data($id){
			return TmpesanTrstspesan::where('tmpesan_id', '=', $id)->delete();
		}

	}