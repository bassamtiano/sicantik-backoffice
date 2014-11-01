<?php

	 class Trpropinsi extends BaseModel {

	 	protected $table = 'trpropinsi';

	 	public static function fetch_data() {
	 		return Trpropinsi::get();
	 	}

	 	public static function search_data($id) {
	 		return Trpropinsi::where('id', '=', $id)->get();
	 	}
	 }