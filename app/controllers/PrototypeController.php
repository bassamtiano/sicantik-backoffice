<?php

    class PrototypeController extends BaseController {

        public function home() {
            return View::make('prototype.index');

        }

        public function submit_data() {
            // DB::table('prototype_bassam')->insert(['nama' => Input::get('nama'), 'alamat' => Input::get('alamat')]);

            // echo '<p>' . Input::get('nama') . Input::get('alamat') . '</p>';
            // return '<p id="result">' . Input::get('nama') . Input::get('alamat') . '</p>';
            // echo "<script>";
            //     echo "haiii('coba ah')";
            // echo "</script>";

            return Input::get('nama');
        }

        public function load_file($data = null) {

            $data = DB::table('trperizinan')->get();

            // $fh = fopen();
            $content = '';
            $url = URL::to('uploads/dokumen/test.dok');

            $fh = fopen($url, 'r');
            while ($line = fgets($fh)) {

                // preg_replace('/[^A-Za-z0-9\-]/', '', $line);
                // echo $line;

                $result = substr($line, 0,13);
                if($result == '<data-source>') {
                    $output = substr($line, 13, -15);
                    eval($output . ';');

                    // echo $item['type'];
                    // echo $item['source'];

                    if($item['type' ] === 'table') {
                        echo $item['source'];
                    }
                    else if($item['type' === 'text']) {

                    }
                    else if($item['type'] === 'list' ) {
                        $send = 'ini list';
                    }
                    else if($item['type'] === 'list-number') {

                    }
                    else if($item['type'] === 'list-bullet') {

                    }
                    else {

                    }
                }



                // eval($line);

            //   $content .= $line;
            }
            fclose($fh);
            return $data;

            // return View::make('dokumen.index', ['item' => $send]);

            // $data =  [
            //         [
            //             'nama' => 'Bassamtiano',
            //             'alamat' => 'Jakarta',
            //             'tempat lahir' => 'Jakarta',
            //         ],
            //         [
            //             'nama' => 'Renaufalgi',
            //             'alamat' => 'Jakarta',
            //             'tempat lahir' => 'Surabaya',
            //         ]
            // ];

            // $data = [
            //     'nama' => 'Bassamtiano',
            //     'alamat' => 'Jakarta',
            //     'tempat' => 'Depok'
            // ];

            // $this->table_item($data);
            // $this->list_item($data);

            // return $item;
        }

        public function table_item($data) {
            echo '<table style="width:100%;">';

            foreach($data as $k => $v) {

                echo '<tr>';

                foreach($v as $ka) {
                    echo '<td>' . $ka . '</td>';
                }

                echo '</tr>';
            }
            echo '</table>';
        }

        public function list_item($data) {
            echo '<table style="width:100%;">';
            foreach($data as $k => $v) {
                echo '<tr>';
                    echo '<td>' . $k . '</td>';
                    echo '<td>' . $v . '</td>';
                echo '</tr>';
            }
            echo '</table>';
        }

    }
