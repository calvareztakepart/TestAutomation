<?php
$RootPath = dirname(dirname(__DIR__));
require_once 'PHPUnit/Autoload.php';
require_once 'PHPUnit/Extensions/SeleniumTestCase.php';

//included files
require_once $RootPath .'/TestAutomation/Resources/SocialJusticeResource.php';
require_once $RootPath .'/TestAutomation/Resources/BaseResource.php';
require_once $RootPath .'/TestAutomation/Resources/errorMsgResource.php';



class SocialJusticeTestCasesPage extends PHPUnit_Extensions_Selenium2TestCase {
	
	function setUp() {
		$this->setBrowser(Browser);
		$this->setBrowserUrl(SiteUrl);
	}

	//go to social justice page
	public function testGoToSocialJusticePage() {
		//go to SocialJustice page
		$this->url(SocialJusticeUrl);

		//verify PAGE title
		$this->assertEquals(strSocialJusticePageTitle, $this->title());

		//verify SocialJustice heading exists
		$SocialJusticeHeading = $this->byXPath(PageHeaderxPath)->text();
		$this->assertEquals(strSocialJusticePageHeader, $SocialJusticeHeading);
	}
	
	
	/* verify topic content generates */
	public function testVerifySocialJusticeTopicContentGenerates() {
		
		//go to SocialJustice page
		$this->url(SocialJusticeUrl);
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
