<?php 

    class ExportShell extends AppShell {
        public function main() {
            // $data = $this->User->find('all');
            $data = array(
                array(
                    "name"=>"waqar ahmad",
                    "website" => "htttp://asifnif1234"
                ),
                array(
                    "name"=>"ahmad",
                    "website" => "htttp://aifhiebsgubb12345678"
                ),
                
            );
            $this->Export->exportCsv($data);
        }

    }

?>