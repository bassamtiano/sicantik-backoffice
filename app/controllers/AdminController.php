<?php

	class AdminController extends BaseController {

		public function login() {
			// $this->auth_reporting();
			return View::make('login.index');
		}



		public function do_login() {
			$username = trim(Input::get('username'));
			$password = trim(Input::get('password'));

			$data = compact('username', 'password');

			if(Auth::attempt($data)) {
				$id = User::where('username', '=', $username)->get(['id']);
				$auth_id = UserUserAuth::where('user_id', '=', $id[0]['id'])->get(['user_auth_id']);

				foreach($auth_id as $auk => $auv) {
					$user_auth = UserAuth::where('id', '=', $auv->user_auth_id)->get(['description']);
					foreach($user_auth as $uak) {

						Session::put(strtolower($uak->description), true);
					}
				}

				$id = $id[0]['id'];

				Auth::user()->$id;


				return Redirect::intended('/');
			}

			else {
				return Redirect::intended('login')->with('message', '<label>User Name & Password Salah .. !</label>');
			}
		}

		public function do_logout() {
			Auth::logout();
			Session::flush();

			return Redirect::intended('login');
		}

	}
