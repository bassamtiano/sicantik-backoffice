<?php

    class Tmpermohonantmperusahaan extends BaseModel {

        protected $table = 'tmpermohonan_tmperusahaan';
        protected $guarded = ['id'];
        protected $fillable = ['tmpermohonan_id','tmperusahaan_id'];

        public static function get_tmperusahaan_id($tmpermohonan_id) {
            return Tmpermohonantmperusahaan::where('tmpermohonan_id', '=', $tmpermohonan_id)->get(['tmperusahaan_id']);
        }

        public static function insert_data($tmpermohonan_id, $tmperusahaan_id) {
			Tmpermohonantmperusahaan::create(['tmpermohonan_id' => $tmpermohonan_id, 'tmperusahaan_id' => $tmperusahaan_id]);
		}

    }
