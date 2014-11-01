<?php

	class ReportGenerators extends BaseModel {
		protected $table = 'report_generators';

		public static function fetch_data($data) {
			return ReportGenerators::get($data);
		}
	}