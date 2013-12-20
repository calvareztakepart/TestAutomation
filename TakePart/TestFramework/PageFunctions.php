<?php

/*
 * Created on Oct 14, 2013
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */
require_once 'PHPUnit/Autoload.php';
require_once 'PHPUnit/Extensions/SeleniumTestCase.php';
require_once 'PHPUnit/Extensions/SeleniumTestCase.php';

class TestController extends PHPUnit_Extensions_Selenium2TestCase {

	function GetTitle() {
		return $actualPageTitle = $this->getTitle();
	}

	function GoToPage($goToURL) {
		$this->open($goToURL);
	}

	public function assertElementTextISFound($locator, $text) //, $message = '')
	{
		//$this->assertEquals($text, $this->getText($locator), $message);
		$this->assertEquals($text, $this->getText($locator));
	}

	public function clickOnDisplayedElementByName($name) {
		$elements = $this->elements($this->using('css selector')->value('[name="' . $name . '"]'));
		foreach ($elements as $element) {
			if ($element->displayed()) {
				$element->click();
				return;
			}
		}
		$this->fail('There is no visible elements with name ' . $name);
	}

	public function clickOnMenuLinkandWait($linkname) {
		$link = $this->byLinkText('CULTURE');
		$link->click();
		$this->timeouts()->implicitWait(25000);
	}
}
?>
