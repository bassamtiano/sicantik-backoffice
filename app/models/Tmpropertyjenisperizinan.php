<?php

    class Tmpropertyjenisperizinan extends BaseModel {

        protected $table = 'tmproperty_jenisperizinan';
        protected $guarded = ['id'];
        protected $fillable = [];

        public static function edit_data($id, $data) {
            return Tmpropertyjenisperizinan::where('id', '=', $id)->update($data);
        }

    }
