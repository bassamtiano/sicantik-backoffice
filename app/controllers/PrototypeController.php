<?php

    class PrototypeController extends BaseController {

        public function home() {
            return View::make('prototype.index');

        }

        public function submit_data() {
            // DB::table('prototype_bassam')->insert(['nama' => Input::get('nama'), 'alamat' => Input::get('alamat')]);

            // echo '<p>' . Input::get('nama') . Input::get('alamat') . '</p>';
            // return '<p id="result">' . Input::get('nama') . Input::get('alamat') . '</p>';
            echo "<script>";
                echo "haiii('coba ah')";
            echo "</script>";
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
