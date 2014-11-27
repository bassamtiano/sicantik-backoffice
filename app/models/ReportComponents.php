<?php

	class ReportComponents extends BaseModel {

		protected $table = 'report_components';
		protected $guarded = ['id'];
		protected $fillable = [];

		public static function fetch_data($data) {
			return ReportComponents::get($data);
		}

		public static function find_data($id) {
			return DB::table('report_components')
			->join('trperizinan', 'report_components.trperizinan_id', '=','trperizinan.id')
			->join('report_types', 'report_components.report_type', '=', 'report_type_code')
			->select(['report_components.id', 'report_components.report_component_code', 'report_components.short_desc', 'report_components.format_nomor', 'report_components.last_num_seq', 'report_components.nama_penandatangan', 'report_components.jabatan', 'report_components.nama_kantor', 'report_components.nip', 'report_components.trperizinan_id as trperizinan_id', 'trperizinan.n_perizinan', 'report_components.report_type',  'report_types.report_type_desc', 'report_components.del_flag'])
			->where('report_components.id', '=', $id)
			->get();
		}



	}
