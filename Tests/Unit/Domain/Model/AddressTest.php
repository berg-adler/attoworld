<?php

namespace Ferenckrausz\Attoworld\Tests\Unit\Domain\Model;

/***************************************************************
 *  Copyright notice
 *
 *  (c) 2017 Mandy Singh <mandy.singh@mpq.mpg.de>, Max-Planck-Institut für Quantenoptik
 *
 *  All rights reserved
 *
 *  This script is part of the TYPO3 project. The TYPO3 project is
 *  free software; you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation; either version 2 of the License, or
 *  (at your option) any later version.
 *
 *  The GNU General Public License can be found at
 *  http://www.gnu.org/copyleft/gpl.html.
 *
 *  This script is distributed in the hope that it will be useful,
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *  GNU General Public License for more details.
 *
 *  This copyright notice MUST APPEAR in all copies of the script!
 ***************************************************************/

/**
 * Test case for class \Ferenckrausz\Attoworld\Domain\Model\Address.
 *
 * @copyright Copyright belongs to the respective authors
 * @license http://www.gnu.org/licenses/gpl.html GNU General Public License, version 3 or later
 *
 * @author Mandy Singh <mandy.singh@mpq.mpg.de>
 */
class AddressTest extends \TYPO3\CMS\Core\Tests\UnitTestCase
{
	/**
	 * @var \Ferenckrausz\Attoworld\Domain\Model\Address
	 */
	protected $subject = NULL;

	public function setUp()
	{
		$this->subject = new \Ferenckrausz\Attoworld\Domain\Model\Address();
	}

	public function tearDown()
	{
		unset($this->subject);
	}

	/**
	 * @test
	 */
	public function getZipcodeReturnsInitialValueForString()
	{
		$this->assertSame(
			'',
			$this->subject->getZipcode()
		);
	}

	/**
	 * @test
	 */
	public function setZipcodeForStringSetsZipcode()
	{
		$this->subject->setZipcode('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'zipcode',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getCityReturnsInitialValueForString()
	{
		$this->assertSame(
			'',
			$this->subject->getCity()
		);
	}

	/**
	 * @test
	 */
	public function setCityForStringSetsCity()
	{
		$this->subject->setCity('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'city',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getStreetReturnsInitialValueForString()
	{
		$this->assertSame(
			'',
			$this->subject->getStreet()
		);
	}

	/**
	 * @test
	 */
	public function setStreetForStringSetsStreet()
	{
		$this->subject->setStreet('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'street',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getStreetnumberReturnsInitialValueForString()
	{
		$this->assertSame(
			'',
			$this->subject->getStreetnumber()
		);
	}

	/**
	 * @test
	 */
	public function setStreetnumberForStringSetsStreetnumber()
	{
		$this->subject->setStreetnumber('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'streetnumber',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getTitleReturnsInitialValueForString()
	{
		$this->assertSame(
			'',
			$this->subject->getTitle()
		);
	}

	/**
	 * @test
	 */
	public function setTitleForStringSetsTitle()
	{
		$this->subject->setTitle('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'title',
			$this->subject
		);
	}
}
