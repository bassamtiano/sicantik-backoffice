<?php

	class Testpost extends BaseModel {

		protected $table = 'bassam_test';
		protected $fillable = ['id', 'nama'];

		public static function post($data) {
			Testpost::insert($data);
		}

	}