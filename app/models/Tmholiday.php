<?php

	class Tmholiday extends BaseModel {

		protected $table = 'tmholiday';
		protected $fillable = ['date', 'description', 'holiday_type'];
		protected $guarded = ['id'];
		//public $timestamps = false;

		public static function fetch_data() {
			return Tmholiday::get();
		}

		public static function search_data($id) {
			return Tmholiday::where('id', '=', $id)->get();
		}

		public static function insert_data($data) {
			print_r($data);
			Tmholiday::create($data);
			// Tmholiday::create($data);
		}

	}