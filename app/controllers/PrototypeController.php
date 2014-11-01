<?php

    class PrototypeController extends BaseController {

        public function home() {
            return View::make('prototype.index');

        }

        public function submit_data() {
            DB::table('prototype_bassam')->insert(['nama' => Input::get('nama'), 'alamat' => Input::get('alamat')]);
        }

        public function load_file() {
            $test = 'Hai saya bassam';

            // $fh = fopen();

            $url = URL::to('uploads/dokumen/test.ame');

            $fh = fopen($url, 'r');
            while ($line = fgets($fh)) {
              // <... Do your work with the line ...>
              eval('echo ' . $line);
            }
            fclose($fh);
        }

    }
