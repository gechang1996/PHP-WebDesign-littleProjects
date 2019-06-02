<?php
require __DIR__ . "/../../vendor/autoload.php";
/** @file
 * Empty unit testing template
 * @cond 
 * Unit tests for the class
 */
class SiteTest extends \PHPUnit_Framework_TestCase
{
	public function testgetter_setter() {
		$g=new \Felis\Site();
		$g->dbConfigure("a","b","c","d");
		$g->setEmail("gechang1@msu.edu");
		$g->setRoot("aaa");
        $this->assertContains("gechang1@msu.edu",$g->getEmail());
        $this->assertContains("aaa",$g->getRoot());
        $this->assertContains("d",$g->getTablePrefix());
	}
    public function test_localize() {
        $site = new Felis\Site();
        $localize = require 'localize.inc.php';
        if(is_callable($localize)) {
            $localize($site);
        }
        $this->assertEquals('test8_', $site->getTablePrefix());
    }
}

/// @endcond
