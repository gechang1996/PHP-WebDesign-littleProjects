<?php
require __DIR__ . "/../../vendor/autoload.php";
/** @file
 * Empty unit testing template/database version
 * @cond 
 * Unit tests for the class
 */

class UsersTest extends \PHPUnit_Extensions_Database_TestCase
{



    public function testUpdate(){
        $users = new Felis\Users(self::$site);
        $user = $users->get(7);
        $this->assertInstanceOf('Felis\User', $user);
        $this->assertEquals('dudess@dude.com', $user->getEmail());
        $this->assertEquals('111-222-3333', $user->getPhone());
        $this->assertEquals('Dudess Address', $user->getAddress());
        $this->assertEquals('Dudess Notes', $user->getNotes());
        $this->assertEquals(strtotime('2015-01-22 23:50:26'),
            $user->getJoined());
        $this->assertEquals('S', $user->getRole());

        $user->setAddress("asdfghjkl");
        $user->setPhone("111-111-1111");
        $user->setNotes("this is a test note");
        $user->setRole("A");

        $this->assertEquals(true, $users->update($user));
        $user=$users->get(7);
        $this->assertEquals("111-111-1111", $user->getPhone());
        $user->setId(11);
        $this->assertEquals(false, $users->update($user));



        $row = array('id' => 7,
            'email' => 'wrong@ranch.com',
            'name' => 'Dude, The',
            'phone' => '123-456-7890',
            'address' => 'Some Address',
            'notes' => 'Some Notes',
            'password' => '12345678',
            'joined' => '2015-01-15 23:50:26',
            'role' => 'S'
        );
        $user = new Felis\User($row);
        $this->assertEquals(true, $users->update($user));

        $user=$users->get(7);
        $this->assertEquals("Some Notes", $user->getNotes());

    }
	/**
     * @return PHPUnit_Extensions_Database_DB_IDatabaseConnection
     */
    public function getConnection()
    {

        return $this->createDefaultDBConnection(self::$site->pdo(), 'gechang1');
    }

    /**
     * @return PHPUnit_Extensions_Database_DataSet_IDataSet
     */
    public function test_construct() {
        $users = new Felis\Users(self::$site);
        $this->assertInstanceOf('Felis\Users', $users);
    }

    public function getDataSet()
    {
        return $this->createFlatXMLDataSet(dirname(__FILE__) . '/db/user.xml');

        //return $this->createFlatXMLDataSet(dirname(__FILE__) .
		//	'/db/users.xml');
    }
    private static $site;

    public static function setUpBeforeClass() {
        self::$site = new Felis\Site();
        $localize  = require 'localize.inc.php';
        if(is_callable($localize)) {
            $localize(self::$site);
        }
    }

    public function test_login() {
        $users = new Felis\Users(self::$site);

        // Test a valid login based on email address
        $user = $users->login("dudess@dude.com", "87654321");
        $this->assertInstanceOf('Felis\User', $user);

        $this->assertEquals(7, $user->getId());
        $this->assertEquals('dudess@dude.com', $user->getEmail());
        $this->assertEquals('111-222-3333', $user->getPhone());
        $this->assertEquals('Dudess Address', $user->getAddress());
        $this->assertEquals('Dudess Notes', $user->getNotes());
        $this->assertEquals(strtotime('2015-01-22 23:50:26'),
            $user->getJoined());
        $this->assertEquals('S', $user->getRole());

        // Test a valid login based on email address
        $user = $users->login("cbowen@cse.msu.edu", "super477");
        $this->assertInstanceOf('Felis\User', $user);

        $this->assertEquals(8, $user->getId());
        $this->assertEquals('cbowen@cse.msu.edu', $user->getEmail());
        $this->assertEquals('999-999-9999', $user->getPhone());
        $this->assertEquals('Owen Address', $user->getAddress());
        $this->assertEquals('Owen Notes', $user->getNotes());
        $this->assertEquals(strtotime('2015-01-01 23:50:26'),
            $user->getJoined());
        $this->assertEquals('A', $user->getRole());

        // Test a failed login
        $user = $users->login("dudess@dude.com", "wrongpw");
        $this->assertNull($user);



    }
    public function test_id(){
        $users = new Felis\Users(self::$site);
        $user = $users->get(7);
        $this->assertInstanceOf('Felis\User', $user);
        $this->assertEquals('dudess@dude.com', $user->getEmail());
        $this->assertEquals('111-222-3333', $user->getPhone());
        $this->assertEquals('Dudess Address', $user->getAddress());
        $this->assertEquals('Dudess Notes', $user->getNotes());
        $this->assertEquals(strtotime('2015-01-22 23:50:26'),
            $user->getJoined());
        $this->assertEquals('S', $user->getRole());

        $user = $users->get(8);
        $this->assertInstanceOf('Felis\User', $user);
        $this->assertEquals('cbowen@cse.msu.edu', $user->getEmail());
        $this->assertEquals('999-999-9999', $user->getPhone());
        $this->assertEquals('Owen Address', $user->getAddress());
        $this->assertEquals('Owen Notes', $user->getNotes());
        $this->assertEquals(strtotime('2015-01-01 23:50:26'),
            $user->getJoined());
        $this->assertEquals('A', $user->getRole());
    }
}

/// @endcond
