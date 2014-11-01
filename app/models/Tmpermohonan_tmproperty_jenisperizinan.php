<?php

	class tmpermohonan_tmproperty_jenisperizinan extends BaseModel {
		protected $table = "tmpermohonan_tmproperty_jenisperizinan";
		protected $guarded = array('id');
		protected $fillable = array('tmpermohonan_id', 'tmproperty_jenisperizinan_id');
	}