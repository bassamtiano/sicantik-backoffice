<?php

	class tmpermohona_tmproperty_kasifikasi extends BaseModel {

		protected $table = "tmpermohona_tmproperty_kasifikasi";
		protected $guarded = array('id');
		protected $fillable = array('tmpermohona_id', 'tmproperty_kasifikasi_id');

	}