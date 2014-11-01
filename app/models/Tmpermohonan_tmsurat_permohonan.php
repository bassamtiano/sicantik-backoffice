<?php

	class tmpermohonan_tmsurat_permohonan extends BaseModel {

		protected $table = "tmpermohonan_tmsurat_permohonan";
		protected $guarded = array('id');
		protected $fillable = array('nik','jam_ke','tanggal','keterangan');

	}