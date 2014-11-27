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

	}
