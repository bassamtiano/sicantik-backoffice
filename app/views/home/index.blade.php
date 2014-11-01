@extends('layouts.form_content')

@section('page_name')
	Halaman Utama
@stop

@section('angular_controller_script')
	{{ HTML::script('assets/controllers/KonfigurasiCtrl.js') }}
@stop

@section('angular_controller')
	ng-controller="KonfigurasiSettingUmumInstansiCtrl"
@stop

@section('page_name')

	Setting Umum / Instansi

@stop

@section('form_content')

	a

@stop