<?php

	class Trstspesan extends BaseModel {

		protected $table = 'trstspesan';
		protected $guarded = ['id'];
		protected $fillable = ['sts_pesan_id, n_sts_pesan'];

		public static function fetch_data() {
			return Trstspesan::get();
		}

		public static function insert_data($data) {
			Trstspesan::create($data);
		}

	}