<?php

	class Trkelompokperizinan extends BaseModel {

		protected $table = 'trkelompok_perizinan';
		protected $guarded = ['id'];
		protected $fillable = ['id, n_kelompok'];

		public static function fetch_data() {
			return Trkelompokperizinan::get();
		}

	}