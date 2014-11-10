<?php

	class Trunitkerja extends BaseModel {

		protected $table = 'trunitkerja';
		protected $guarded = ['id'];
		protected $fillable = ['id, n_unitkerja'];

		public static function fetch_data() {
			return Trunitkerja::get();
		}

		public static function search_data($id) {
			return Trunitkerja::where('id', '=', $id)->get();
		}

	}