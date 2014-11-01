<?php

	class tmpermohonan_tmproperty_prasarana extends BaseModel {

		protected $table = "tmpermohonan_tmproperty_prasarana";
		protected $guarded = array('id');
		protected $fillable = array('tmpermohonan_id', 'tmproperty_prasarana_id');

	}