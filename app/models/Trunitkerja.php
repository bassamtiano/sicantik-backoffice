<?php

	class Trunitkerja extends BaseModel {

		protected $table = 'trunitkerja';

		public static function fetch_data() {
			return Trunitkerja::get();
		}

		public static function search_data($id) {
			return Trunitkerja::where('id', '=', $id)->get();
		}

	}