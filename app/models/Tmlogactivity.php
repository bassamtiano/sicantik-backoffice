<?php

	class Tmlogactivity extends BaseModel {

		protected $table = 'tmlogactivity';

		public static function fetch_data($date_start, $date_finish) {
			if(!empty($date_start) && !empty($date_start))  {
				return Tmlogactivity::whereBetween('action_date', [$date_start, $date_finish])->get(['id', 'module', 'action_type', 'action_date', 'users']);	
			}
			else {
				return Tmlogactivity::get(['id', 'module', 'action_type', 'action_date', 'users']);
			}
			
		}

	}