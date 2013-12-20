<?php

$RootPath = dirname(dirname(__DIR__));


//included files
require_once 'PHPUnit/Autoload.php';
require_once 'PHPUnit/Extensions/SeleniumTestCase.php';
require_once $RootPath . '/TestAutomation/Resources/HomePageResource.php';
require_once $RootPath . '/TestAutomation/Resources/BaseResource.php';
require_once $RootPath . '/TestAutomation/Resources/errorMsgResource.php';


//go to home page

class HomePage extends PHPUnit_Extensions_Selenium2TestCase {


	function setUp() {
		$this->setBrowser(Browser);
		$this->setBrowserUrl(SiteUrl);

	}

	// public function testGoToHomepage()
	// {
	//     $this->url("/");
	//    	$this->assertEquals(strHomePageTitle, $this->title());
	// }

	/* 
	* Go to home page and verify at least one author Name displays 
	*/
/*
	public function testGoToHomepageVerifyColAuthorName()
	{
		$this->url("/");

		try {
			//get author list from skinny columns rail
			$AuthorList = $this->elements($this->using('css selector')->value('div.views-field-field-author'));
			$AuthorCount = count($AuthorList);

			if ($AuthorCount<1)
			{	
				$this->fail(True, strHPAuthorCol);
			}

		} catch (Exception $e) {
			$this->fail(strHPAuthorCol);
		}

	}
*/
	/* 
	* Go to home page and verify article headline appears on columns section
	*/
	/*
	public function testGoToHomepageVerifyColHeadline()
	{
		$this->url("/");

		try {

			//get skinny column headlines
			$ColumnsArticleList = $this->elements($this->using('css selector')->value('div.view-id-homepage_columns div.view-content div.views-field-field-promo-headline'));
			$ColumnsArticleCount = count($ColumnsArticleList);

			//if there are no article headlines showing then error out
			if ($ColumnsArticleCount<1)
			{	
				$this->fail(True, strHPHeadlineCol);
			}


		} catch (Exception $e) {
			$this->fail(strHPHeadlineCol);
		}

	}*/


	/* verify latest headlines have content */
	/*
	public function testGoToHomepageVerifylatestHeadlinesDisplay()
	{
		$this->url("/");

		try {
			$this->timeouts()->implicitWait(8000);
			//get author list from skinny columns rail
			$LatestHeadlinesList = $this->byCssSelector("div.view-latest-headlines")->text();
			//change text into list
			$Latestarray =  explode("\n",$LatestHeadlinesList);
			$LatestHeadlinesCount = count($Latestarray);

			if ($LatestHeadlinesCount<1)
			{	
				$this->fail(True, strHPLatestHeadline);
			}

		} catch (Exception $e) {
			$this->fail(strHPLatestHeadline);
		}

	}
*/

/*			foreach ($LatestHeadlinesList as $author) {
				var_dump($author->text());

			}
*/

			/*verify take home page displays actions*/
	/*
	public function testGoToHomepageVerifyTakeActonDisplay()
	{
		$this->url("/");

		try {
			$ActionList = $this->elements($this->using('css selector')->value('div.view-takeaction-homepage div.view-content div.tab-call-to-action'));
			$ActionListCount= count($ActionList);

			//if there are no action headlines showing then error out
			if ($ActionListCount<1)
			{	
				$this->fail(True, strHPActionlist);
			}

		} catch (Exception $e) {
			$this->fail(strHPActionlist);
		}

	}*/

	/*verify take home page displays photo galleries headline */
	/*
	public function testGoToHomepageVerifyGalleryHeadlineExist()
	{
		$this->url("/");

		try {

			$PhotoHeadlineList = $this->elements($this->using('css selector')->value('div.view-photo-galleries-promo div.view-content div.views-field-field-promo-headline'));
			$PhotoHeadlineCount= count($PhotoHeadlineList);

			//if there are no gallery headlines showing then error out
			if ($PhotoHeadlineCount<1)
			{	
				$this->fail(True, strHPPhotoHeadlineslist);
			}

		} catch (Exception $e) {
			$this->fail(strHPPhotoHeadlineslist);
		}

	}*/

	/*verify photo image tag generates*/
	// public function testGoToHomepageVerifyGalleryPhoto()
	// {
	// 	$this->url("/");
	// 	try {
	// 		//get images
	// 		$PhotoTag= $this->elements($this->using('css selector')->value('div.view-photo-galleries-promo div.field-content a img'));
	// 		$PhotoImageCount= count($PhotoTag);

	// 		//	if there are no gallery images showing then error out
	// 		if ($PhotoImageCount<1)
	// 		{	
	// 			$this->fail(True, strHPPhotoImagelist);
	// 		}

	// 	} catch (Exception $e) {
	// 		$this->fail(strHPPhotoImagelist);
	// 	}

	// }


	/*verify right rail 300x250 ads tag generates*/
	
/*
	public function testGoToHomepageVerifyRightRailAd()
	{
		$this->url("/");
	//	$theFrame = $this->byCssSelector('google_ads_iframe_/4355895/TP3_Homepage_RR_ATF_300x250_0__container__');
	// $this->frame($theFrame->getId());

echo 'the frame after grabbing it';

		$gaframe = $this->frame('google_ads_iframe_/4355895/TP3_Homepage_RR_ATF_300x250_0');

$theimage = $this->byCssSelector('aw0');

var_dump($theimage);

		try {
			//get images
			
			$this ->selectFrame($gaframe);
			 $this->frame($theFrame->getId());
			 $bodytext = $this->byCssSelector('body')->text();
			echo '-------here--------';
			var_dump($bodytext);
		

			$PhotoTag= $this->elements($this->using('css selector')->value('head body div#google_image_div a'));
			$PhotoImageCount= count($PhotoTag);

			//	if there are no Ads images showing then error out
			if ($PhotoImageCount<1)
			{	
				$this->fail(True, strHPPhotoImagelist);
			}

		} catch (Exception $e) {
			$this->fail(strHPPhotoImagelist);
		}

	}	*/
}

?>
