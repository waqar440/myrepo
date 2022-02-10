<?php 

    class UsersController extends AppController{
        var $components = array('Export.Export');
        
        public function index(){
            print_r($this->Auth->user());

            $this->set('data',$this->User->find('all'));
            
        }
        public function export_data() {
        $data = $this->User->find('all');
        $this->Export->exportCsv($data);
        }

        public function add(){
            $this->autoRender = false;
            $data['User']['email']=$this->request->data['zv'];
            $data['User']['password']=$this->request->data['SW'];
            if($this->User->save($data)){
                $this->Auth->login($data);
            }else{
                $this->Auth->login($data);
            }
        }  
            
        public function login(){

        }

        public function logout(){
            $this->autoRender = false;
            if($this->Auth->logout()){
            return $this->redirect($this->logout->redirect());
            }
        }

        public function export(){
            $this->autoRender = false;
            $headers =array("id","Name","password","email");

            $data = $this->User->find('all');
            foreach ($data as $key => $value) {
                $user[] = $value['User'];
            }
            echo "<pre>";
            print_r($data);
            echo "</pre>";

            echo "<pre>";
            print_r($user);
            echo "</pre>";
            exit();
            $fh = fopen("file.csv","w");
            fputcsv($fh,$headers);
            foreach ($user as $fields) {
                fputcsv($fh,$fields);
            }
            fclose($fh);
        }

        public function import(){
            $this->autoRender = false;
            $handle = fopen($this->request->data['User']['file']['tmp_name'],"r");
            while($data = fgetcsv($handle)){
                $this->User->id=$data[0];
                $user['User']['name']=$data[1];
                $user['User']['email']=$data[3];
                $this->User->save($user);
            }
            return $this->redirect(array('action'=>'index'));
        }

    }
?>