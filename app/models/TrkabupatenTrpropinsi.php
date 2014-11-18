<?php

	class TrkabupatenTrpropinsi extends BaseModel {

		protected $table = 'trkabupaten_trpropinsi';
		protected $guarded = ['id'];
		protected $fillable = ['trkabupaten_id', 'trpropinsi_id'];

		public static function insert_data($trkabupaten_id, $trpropinsi_id) {
			TrkabupatenTrpropinsi::create(['trkabupaten_id' => $trkabupaten_id, 'trpropinsi_id' => $trpropinsi_id]);
		}

	}