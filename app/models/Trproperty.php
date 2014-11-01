<?php

	class Trproperty extends BaseController {

		protected $table = 'trproperty';

		# Modul Backoffice =========================================================================================================================================================================================

		public static function fetch_with_tmproperty_jenisperizinan($id) {
			return DB::table('trproperty')
			->join('tmproperty_jenisperizinan_trproperty', 'trproperty.id', '=', 'tmproperty_jenisperizinan_trproperty.trproperty_id')
			->select(['trproperty.id', 'trproperty.n_property'])
			->where('tmproperty_jenisperizinan_trproperty.tmproperty_jenisperizinan_id', '=', $id)
			->where('trproperty.n_property', '!=', 'Data Retribusi')
			->where('trproperty.n_property', '!=', 'Data Perusahaan')
			->where('trproperty.n_property', '!=', 'Data Teknis')
			->get();
		}


	}
