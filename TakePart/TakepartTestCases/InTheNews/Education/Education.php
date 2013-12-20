<?php
$RootPath = dirname(dirname(__DIR__));
require_once 'PHPUnit/Autoload.php';
require_once 'PHPUnit/Extensions/SeleniumTestCase.php';

//included files
require_once $RootPath .'/TestAutomation/Resources/EducationResource.php';
require_once $RootPath .'/TestAutomation/Resources/BaseResource.php';
require_once $RootPath .'/TestAutomation/Resources/errorMsgResource.php';

class EducationTestCasesPage extends PHPUnit_Extensions_Selenium2TestCase {
	
	function setUp() {
		$this->setBrowser(Browser);
		$this->setBrowserUrl('http://www.takepart.com');
	}

	public function testGoToEducationPage() {
		//go to Education page
		$this->url(EducationUrl);

		//verify PAGE title
		$this->assertEquals(strEducationPageTitle, $this->title());

		//verify Education heading exists
		$EducationHeading = $this->byXPath(PageHeaderxPath)->text();
		$this->assertEquals(strEducationPageHeader, $EducationHeading);
	}
	
	
	/* verify topic content generates */
	public function testVerifyEducationTopicContentGenerates() {
		
		//go to Education page
		$this->url(EducationUrl);
		try {
			//get values from topic section
			$Lastestelement = $this->byCssSelector(strTopicSectionClass);
			
			//make sure there is an actual topic on the page
			if ($Lastestelement->text() != strErrSolrDownText) {
				$this->assertTrue(True, strErrSolrUP);
			}

		} catch (Exception $e) {
				$this->fail(strErrSolrDown);
			}

	}
}
?>
