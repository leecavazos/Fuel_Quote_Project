<?php
    use PHPUnit\Framework\TestCase;
    class test_functions extends TestCase {

        /**
         * @coversNothing
         */
        private function _execute(array $params = array(), $filename){
            $_GET = $params;
            $conn = new mysqli(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
            ob_start();
            include $filename;
            return ob_get_clean();
        }

        /**
         * @coversNothing
         */
        private function _executePOST(array $params = array(), $filename){
            $_POST = $params;
            $conn = new mysqli(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
            ob_start();
            include $filename;
            return ob_get_clean();
        }

        // This is covers nothing because there's no way to specify a whole file
        /**
         * @runInSeparateProcess
         * @coversNothing
         */
        public function test_DeleteOrder(){
            $args = array('deleteOrder'=>-1);
            $this->assertEquals('Deleted', $this->_execute($args, 'php/DeleteOrder.php'));
        }

        // This is covers nothing because there's no way to specify a whole file
        /**
         * @runInSeparateProcess
         * @coversNothing
         */
        public function test_accountDetailsAction(){
            $args = array('User_ID'=>-1, 
                'First_name'=>'David', 
                'Last_name'=>'Silva', 
                'Email'=>'david.silva.25812@gmail.com',
                'Phone_number'=>'13123',
                'Street_address'=>'foo',
                'APT'=>NULL,
                'City'=>'foo',
                'State'=>'foo',
                'Zip'=>'foo',
                'Username'=>'foo',
                'Password'=>'foo'
            );
            $this->assertEquals('Email exists', $this->_executePOST($args, 'php/accountDetailsAction.php'));
        }

         // This is covers nothing because there's no way to specify a whole file
        /**
         * @runInSeparateProcess
         * @coversNothing
         */
        public function test_loginAction(){
            $args = array(
                'uname'=>NULL,
                'psw'=>'gasad'
            );
            $this->assertEquals(0, strpos($this->_executePOST($args, 'php/loginAction.php'), 'something'));
        }

        /**
        * @covers emailExists
        */
        public function test_emailExists(){
            include_once('php/functions.php');
            $conn = new mysqli(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
            $result = emailExists($conn, 'david.silva.25812@gmail.com');
            // echo $result;
            $this->assertEquals(true, $result);
        }

        /**
        * @covers usernameExists
        */
        public function test_usernameExists(){
            include_once('php/functions.php');
            $conn = new mysqli(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
            $result = usernameExists($conn, 'jetscooters');
            // echo $result;
            $this->assertEquals(true, $result);
        }

        /**
        * @covers emailExistsForOtherUser
        */
        public function test_emailExistsForOtherUser(){
            include_once('php/functions.php');
            $conn = new mysqli(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
            $result = emailExistsForOtherUser($conn, 'david.silva.25812@gmail.com', 1);
            // echo $result;
            $this->assertEquals(true, $result);
        }

        /**
        * @covers usernameExistsForOtherUser
        */
        public function test_usernameExistsForOtherUser(){
            include_once('php/functions.php');
            $conn = new mysqli(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
            $result = usernameExistsForOtherUser($conn, 'jetscooters', 6);
            // echo $result;
            $this->assertEquals(false, $result);
        }

        /**
        * @covers validate
        */
        public function test_validate(){
            include_once('php/functions.php');
            $result = validate(" O\'Reiley ");
            $this->assertEquals("O'Reiley", $result);
        }
        
        /**
         * @covers PreviousQuotes
         */
        public function test_PreviousQuotes(){
            include_once('php/functions.php');
            $conn = new mysqli(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
            $result = PreviousQuotes($conn, 6);
            $this->assertEquals(.01, $result);
        }


        /**
         * @covers State_or_Outside
         */
        public function test_State_or_Outside(){
            include_once('php/functions.php');
            $conn = new mysqli(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
            $result = State_or_Outside($conn, "Texas");
            $this->assertEquals(.02, $result);
        }

        /**
         * @covers GallonsRequested
         */
        public function test_GallonsRequested(){
            include_once('php/functions.php');
            $result = GallonsRequested(NULL, 5000);
            $this->assertEquals(.02, $result);
        }

        /**
         * @covers CalculateTotal
         * @uses GallonsRequested
         * @uses State_or_Outside
         * @uses PreviousQuotes
         */
        public function test_CalculateTotal(){
            include_once('php/functions.php');
            $conn = new mysqli(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
            $result = CalculateTotal($conn, 5000, 6, "Texas");
            $this->assertEquals(8475.0, $result);
        }
    }
?>