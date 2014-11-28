<?php

	class ReportGenerators extends BaseModel {
		protected $table = 'report_generators';
		protected $guarded = ['id'];
		protected $fillable = [];

		public static function fetch_data($data) {
			return ReportGenerators::get($data);
		}

		public static function find_data($id) {
			return ReportGenerators::where('id', '=', $id)->get(['id', 'report_code', 'short_desc', 'long_desc', 'layout', 'trperizinan_id', 'report_type']);
		}

		public static function fetch_with_report_group_datas($id, $type) {
			return DB::table('report_generators')
			->join('report_group_datas', 'report_generators.id', '=', 'report_group_datas.report_generator_id')
			->where('report_generators.report_type', '=', $type)
			->where('report_generators.trperizinan_id', '=', $id)
			->get(['report_generators.id', 'report_generators.layout', 'report_group_datas.type', 'report_group_datas.group_query', 'report_group_datas.report_group_code']);
		}

	}
