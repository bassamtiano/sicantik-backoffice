<?php

    class ReportGroupDatas extends BaseModel {

        protected $table = 'report_group_datas';
        protected $guarded = ['id'];
        protected $fillable = [];

        public static function find_data($report_generator_id) {
            return ReportGroupDatas::where('report_generator_id', '=', $report_generator_id)->get(['id', 'report_group_code', 'short_desc', 'type', 'use_direct_query', 'group_query']);
        }

    }
