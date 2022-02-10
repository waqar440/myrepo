<?php

    class UserShell extends AppShell {
        public $uses = array('User');
        var $components = array('Export.Export');

        public function show() {
            $user = $this->User->find('all');
            $this->out(print_r($user, true));
        }

        public function export_data() {
            // $this->Task->load('Export.Export');
            $headers =array("id","Name","password","email");

            $data = $this->User->find('all');
            foreach ($data as $key => $value) {
                $user[] = $value['User'];
            }

            $fh = fopen(WWW_ROOT."files".DS."filecsv".rand(10000,20000).".csv","w");
            fputcsv($fh,$headers);
            foreach ($user as $fields) {
                fputcsv($fh,$fields);
            }
            fclose($fh);
        }

        public function import(){
            $handle = fopen(WWW_ROOT."files".DS.'filecsv10023.csv',"r");
            while($data = fgetcsv($handle)){
                $this->User->id=$data[0];
                $user['User']['name']=$data[1];
                $user['User']['email']=$data[3];
                $this->User->save($user);
        }
            echo "Data Updated";
        }
    }
?>