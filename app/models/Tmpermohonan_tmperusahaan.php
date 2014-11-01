<?php

	class tmpermohonan_tmperusahaan extends BaseModel {

		protected $table = "tmpermohonan_tmperusahaan";
		protected $guarded = array('id');
		protected $fillable = array('tmpermohonan_id', 'tmperusahaan_id');

	}