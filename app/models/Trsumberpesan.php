<?php

	class Trsumberpesan extends BaseModel {

		protected $table = 'trsumber_pesan';
		protected $guarded = ['id'];
		protected $fillable = ['name, sop'];

		public static function fetch_data() {
			return Trsumberpesan::get();
		}

		public static function insert_data($data) {
			Trsumberpesan::create($data);
		}

	}