<?php

	class Trkelompokperizinan extends BaseModel {

		protected $table = 'trkelompok_perizinan';

		public function fetch_data() {
			return Trkelompokperizinan::get();
		}

	}