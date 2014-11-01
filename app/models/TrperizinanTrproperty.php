<?php

	class TrperizinanTrproperty extends BaseModel {

		protected $table = 'trperizinan_trproperty';

		public static function fetch_data() {
			return DB::table('trperizinan')
			->join('trkelompok_perizinan_trperizinan', 'trperizinan.id', '=', 'trkelompok_perizinan_trperizinan.trperizinan_id')
			->join('trkelompok_perizinan', 'trkelompok_perizinan_trperizinan.trkelompok_perizinan_id', '=', 'trkelompok_perizinan.id')
			->join('trperizinan_trproperty', 'trperizinan.id', '=', 'trperizinan_trproperty.trperizinan_id')
			->join('trproperty', 'trperizinan_trproperty.trproperty_id', '=', 'trproperty.id')
			->get([ 'trperizinan.id' ,'trperizinan.n_perizinan', 'trkelompok_perizinan.n_kelompok', 'trproperty.n_property']);
		}

	}