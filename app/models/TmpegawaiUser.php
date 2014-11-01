<?php
class TmpegawaiUser extends BaseModel {
	protected $table = 'tmpegawai_user';

	public static function fetch_data() {
		return DB::table('user')

		->join('tmpegawai_user', 'user.id', '=', 'tmpegawai_user.id')
		->join('tmpegawai', 'tmpegawai_user.tmpegawai_id', '=', 'tmpegawai.id')
		->select('n_pegawai', 'nip', 'n_jabatan', 'status', 'username')
		->get(); 

	}
	
	public static function search_data() {

	}
}