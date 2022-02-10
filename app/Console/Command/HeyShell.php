<?php 

class HeyShell extends AppShell{
    public function main(){
        $this->loadModel('User');
        $data = $this->User->findByid($this->args[0]);
        // $this->out($data);
        print_r($data);
        
    }
}


?>