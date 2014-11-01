<?php

	class tmpermohonan_tmsurat_rekomendasi extends BaseModel {

		protected $table = "tmpermohonan_tmsurat_rekomendasi";
		protected $guarded = array('id');
		protected $fillable = array('tmpermohonan_id', 'tmsurat_rekomendasi_id');

	}