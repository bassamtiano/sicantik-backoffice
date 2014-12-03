<?php

    class Tmpemohontmpermohonan extends BaseModel {

        protected $table = 'tmpemohon_tmpermohonan';
        protected $guarded = ['id'];
        protected $fillable = ['tmpermohonan_id', 'tmpemohon_id'];

        public static function get_tmpemohon_id($tmpermohonan_id) {
            return Tmpemohontmpermohonan::where('tmpermohonan_id', '=', $tmpermohonan_id)->get(['tmpemohon_id']);
        }

        public static function insert_data($tmpermohonan_id, $tmpemohon_id) {
			Tmpemohontmpermohonan::create(['tmpermohonan_id' => $tmpermohonan_id, 'tmpemohon_id' => $tmpemohon_id]);
		}

    }
