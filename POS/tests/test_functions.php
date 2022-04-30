<?php
    define('DB_SERVER', 'localhost');
    define('DB_USERNAME', 'root');
    define('DB_PASSWORD', '');
    define('DB_DATABASE', 'POS');

    use PHPUnit\Framework\TestCase;
    class test_functions extends TestCase {
        /*
        * Writing the first test
        */

        // private function _execute(array $params = array()){
        //     $_GET = $params;
        //     ob_start();
        //     include 'some file'; // This should be the non oop file to test
        //                          // Needs to return something
        //     return ob_get_clean();
        // }

        public function test_assert(){
            include('php/functions.php');
            $result = validate(" O\'Reiley ");
            $this->assertEquals("O'Reiley", $result);
        }

        public function test_emailExists(){
            // include('php/functions.php');
            $conn = new mysqli(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
            $result = emailExists($conn, 'david.silva.25812@gmail.com');
            // echo $result;
            $this->assertEquals(true, $result);
        }

        public function test_usernameExists(){
            // include('php/functions.php');
            $conn = new mysqli(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
            $result = usernameExists($conn, 'jetscooters');
            // echo $result;
            $this->assertEquals(true, $result);
        }

        public function test_emailExistsForOtherUser(){
            $conn = new mysqli(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
            $result = emailExistsForOtherUser($conn, 'david.silva.25812@gmail.com', 1);
            // echo $result;
            $this->assertEquals(true, $result);
        }

        public function test_usernameExistsForOtherUser(){
            $conn = new mysqli(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
            $result = usernameExistsForOtherUser($conn, 'jjerome', 2);
            // echo $result;
            $this->assertEquals(true, $result);
        }
    }
?>