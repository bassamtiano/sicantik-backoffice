<?php

	class TmpesanTrsumberpesan extends BaseModel {

		protected $table = 'tmpesan_trsumber_pesan';
		protected $guarded = ['id'];
		protected $fillable = ['tmpesan_id', 'trsumber_pesan_id'];

		public static function fetch_data() {
			return TmpesanTrsumberpesan::get();
		}

		public static function insert_data($tmpesan_id, $trsumber_pesan_id) {
			TmpesanTrsumberpesan::create(['tmpesan_id' => $tmpesan_id, 'trsumber_pesan_id' => $trsumber_pesan_id]);
		}

		public static function update_data($id, $data){	
			return TmpesanTrsumberpesan::where('tmpesan_id', '=', $id)->update($data);
		}

		public static function delete_data($id){
			return TmpesanTrsumberpesan::where('tmpesan_id', '=', $id)->delete();
		}

	}