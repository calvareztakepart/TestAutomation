<?php
$RootPath = dirname(dirname(__DIR__));


//included files
require_once 'PHPUnit/Autoload.php';
require_once 'PHPUnit/Extensions/SeleniumTestCase.php';
require_once $RootPath . '/TestAutomation/Resources/HomePageResource.php';
require_once $RootPath . '/TestAutomation/Resources/BaseResource.php';
require_once $RootPath . '/TestAutomation/Resources/errorMsgResource.php';


class ScheduleTestCasesPage extends PHPUnit_Extensions_Selenium2TestCase {

	function setUp() {
		$this->setBrowser(Browser);
		$this->setBrowserUrl(SiteUrl);
	}

	//go to Schedule page Verify it loads
	public function testGoToHomePage() {
		//go to Schedule page
		$this->url('/');

		//verify PAGE title
		$this->assertEquals(strHomePageTitle, $this->title());

	}
}
?>
