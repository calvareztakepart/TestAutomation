<?php
$RootPath = dirname(dirname(__DIR__));


//included files
require_once 'PHPUnit/Autoload.php';
require_once 'PHPUnit/Extensions/SeleniumTestCase.php';
require_once $RootPath . '/TestAutomation/Resources/FooterResource.php';
require_once $RootPath . '/TestAutomation/Resources/BaseResource.php';
require_once $RootPath . '/TestAutomation/Resources/errorMsgResource.php';


class FooterTestCasePage extends PHPUnit_Extensions_Selenium2TestCase {

	function setUp() {
		$this->setBrowser(Browser);
		$this->setBrowserUrl(SiteUrl);
	}


	public function testGoToPrivacyPolicy() {

		$this->url('/');
		 $parent = $this->byCssSelector(strPrivacyPolicyMenusCSS);
         $parent->click();
		$this->timeouts()->implicitWait(25000);

		//verify PAGE title
		$this->assertEquals(strPrivacyPolicyPageTitle, $this->title());

		//verify PrivacyPolicy heading exists
		//$PrivacyPolicyHeading = $this->byXPath(PageHeaderxPath)->text();
		//$this->assertEquals(strCulturePageHeader, $CultureHeading);
	}


}
?>
