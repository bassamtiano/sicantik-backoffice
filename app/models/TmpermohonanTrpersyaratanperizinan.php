<?php

	class TmpermohonanTrpersyaratanperizinan extends BaseModel {

		protected $table = 'tmpermohonan_trsyarat_perizinan';
		protected $guarded = ['id'];
        protected $fillable = ['tmpermohonan_id','trsyarat_perizinan_id'];

		public static function insert_data($trsyarat_perizinan_id, $tmpermohonan_id) {
			TmpermohonanTrpersyaratanperizinan::create(['tmpermohonan_id' => $tmpermohonan_id, 'trsyarat_perizinan_id' => $trsyarat_perizinan_id ]);
		}

	}