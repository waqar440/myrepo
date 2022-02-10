<?php 

    class HelloShell extends AppShell {
        public function main() {
            $data = array(
                array('Header 1', 'Header', 'Long Header'),
                array('short', 'Longish thing', 'short'),
                array('Longer thing', 'short', 'Longest Value'),
            );
            $this->helper('table')->output($data);
        }

        public function hey_there() {
            $this->out('Hey there' . $this->args[0]);
        }
    }

?>