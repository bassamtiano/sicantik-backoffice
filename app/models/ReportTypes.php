<?php

    class ReportTypes extends BaseModel {

        protected $table = 'report_types';

        public static function fetch_data_opsi() {
            return ReportTypes::get(['report_type_code', 'report_type_desc']);
        }

    }
