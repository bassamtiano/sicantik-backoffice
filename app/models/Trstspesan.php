<?php

	class Trstspesan extends BaseModel {

		protected $table = 'trstspesan';
		protected $guarded = ['id'];
		protected $fillable = ['n_sts_pesan', 'sts_pesan_id'];

		public static function fetch_data() {
			return Trstspesan::get(['sts_pesan_id', 'n_sts_pesan']);
		}

	}