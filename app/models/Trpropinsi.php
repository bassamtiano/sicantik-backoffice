<?php

	 class Trpropinsi extends BaseModel {

	 	protected $table = 'trpropinsi';
        protected $guarded = ['id'];
        protected $fillable = ['n_propinsi'];

	 	public static function fetch_data() {
	 		return Trpropinsi::get();
	 	}

	 	public static function search_data($id) {
	 		return Trpropinsi::where('id', '=', $id)->get();
	 	}

	 	public static function opsi_propinsi(){
	 		return Trpropinsi::select('id', 'n_propinsi')
			->get();
	 	}
	 }