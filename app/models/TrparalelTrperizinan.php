<?php

	class TrparalelTrperizinan extends Eloquent {

		protected $table = 'trparalel_trperizinan';
		protected $guarded = ['id'];
		protected $fillable = [			
			'trparalel_id',
			'trperizinan_id'
		];

		public static function insert_data($trparalel_id, $trperizinan_id) {
			return TrparalelTrperizinan::create(['trparalel_id' => $trparalel_id, 'trperizinan_id' => $trperizinan_id]);
		}

		

	}