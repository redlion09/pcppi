<?php

/**
 * User Test Case
 *
 */
class ApplicationTestCase extends CakeTestCase {

/**
 * setUp method
 *
 * @return void
 */
        private $given;
	public function setUp() {
		parent::setUp();

                $this->given['domain'] ='pcppi';
	}
        
        public function testAvailability() {
            $ch = curl_init();
            $url = "http://{$this->given['domain']}/users/login";
            
            echo "Testing connection to $url...";
            
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            
            $output = curl_exec($ch);
            
            $this->assertTrue(strlen($output) > 0);
        }

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {

		parent::tearDown();
	}

}
      