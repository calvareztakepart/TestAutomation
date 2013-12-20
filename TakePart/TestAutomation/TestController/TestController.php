<?php

/*
 * Created on Oct 11, 2013
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */

require_once 'PHPUnit/Autoload.php';
require_once 'PHPUnit/Extensions/SeleniumTestCase.php';
//require_once $RootPath . '/TestFramework/PageFunctions.php';
require_once $RootPath.'/TestAutomation/Resources/BaseResource.php';


//define('SiteUrl', 'http://qa.takepart.com');

//global Variables


$RootPath = dirname(dirname(__DIR__));



class TestController extends PHPUnit_Extensions_Selenium2TestCase {


public function ClickOnLinkandWaitByCss($strCSS)
{
	echo 'in test controller'
		 $parent = $this->byCssSelector(strCSS);
         $parent->click();
		$this->timeouts()->implicitWait(25000);

}

// your rules here
  public function  isEmptyString($data)
    {
        return (trim($data) === "" or $data === null);
    }




	//local variables

	//private $pageTitle;
	//private $_TestCase;
	//public $logger;
	//public $logger;

	/*public function TestCasecontroller($testcase) {
		$logger = new StringBuilder();

	}*/

  //   function setUp()
    //{
      //  $this->setBrowser(Browser);
        //$this->setBrowserUrl(SiteUrl);
    //}
//}   
    /*
	protected function setUp($url) {
		$this->setBrowser('*firefox');
		if ($url != null) {
			$this->setBrowserUrl($url);

		} else {
			$this->setBrowserUrl(SiteUrl);
		}

		$this->setPort(4444);
		// $this->setHost('localhost');
	}*/
/*
	public function testTitle() {
		$this->open('http://www.msn.com/');
		$this->assertTitle('msn');
	}
*/
	//protected function tearDown($_TestCase) {
		/*if ($this->hasfailed()) {
			echo 'error on page $_TestCase';

		}*/
		//$this->setBrowser('*firefox');
		//$this->setBrowserUrl(myurl);
		//$this->setPort(4444);
		// $this->setHost('localhost');
	//}

}
?>
