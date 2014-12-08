<?php

    class Tmpemohontrkelurahan extends BaseModel {

        protected $table = 'tmpemohon_trkelurahan';
        protected $guarded = ['id'];
        protected $fillable = ['tmpemohon_id','trkelurahan_id'];

    }
