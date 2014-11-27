<?php

    class Tmpermohonantmperusahaan extends BaseModel {

        protected $table = 'tmpermohonan_tmperusahaan';
        protected $guarded = ['id'];
        protected $fillable = [];

        public static function get_tmperusahaan_id($tmpermohonan_id) {
            return Tmpermohonantmperusahaan::where('tmpermohonan_id', '=', $tmpermohonan_id)->get(['tmperusahaan_id']);
        }

    }
