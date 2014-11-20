<?php

    class Tmpemohontmpermohonan extends BaseModel {

        protected $table = 'tmpemohon_tmpermohonan';
        protected $guarded = ['id'];
        protected $fillable = [];

        public static function get_tmpemohon_id($tmpermohonan_id) {
            return Tmpemohontmpermohonan::where('tmpermohonan_id', '=', $tmpermohonan_id)->get(['tmpemohon_id']);
        }

    }
