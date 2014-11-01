<?php

	class AdminController extends BaseController {

		public function login() {
			return View::make('login.index');

		}

		public function post_login() {

		}

	}