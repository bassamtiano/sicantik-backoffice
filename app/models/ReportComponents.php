<?php

	class ReportComponents extends BaseModel {

		public static function fetch_data($data) {
			return ReportComponents::get($data);
		}

	}