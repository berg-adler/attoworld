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
 * Test case for class \Ferenckrausz\Attoworld\Domain\Model\Personaddress.
 *
 * @copyright Copyright belongs to the respective authors
 * @license http://www.gnu.org/licenses/gpl.html GNU General Public License, version 3 or later
 *
 * @author Mandy Singh <mandy.singh@mpq.mpg.de>
 */
class PersonaddressTest extends \TYPO3\CMS\Core\Tests\UnitTestCase
{
	/**
	 * @var \Ferenckrausz\Attoworld\Domain\Model\Personaddress
	 */
	protected $subject = NULL;

	public function setUp()
	{
		$this->subject = new \Ferenckrausz\Attoworld\Domain\Model\Personaddress();
	}

	public function tearDown()
	{
		unset($this->subject);
	}

	/**
	 * @test
	 */
	public function getLocationReturnsInitialValueForString()
	{
		$this->assertSame(
			'',
			$this->subject->getLocation()
		);
	}

	/**
	 * @test
	 */
	public function setLocationForStringSetsLocation()
	{
		$this->subject->setLocation('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'location',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getPhonenumberReturnsInitialValueForString()
	{
		$this->assertSame(
			'',
			$this->subject->getPhonenumber()
		);
	}

	/**
	 * @test
	 */
	public function setPhonenumberForStringSetsPhonenumber()
	{
		$this->subject->setPhonenumber('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'phonenumber',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getRoomnumberReturnsInitialValueForString()
	{
		$this->assertSame(
			'',
			$this->subject->getRoomnumber()
		);
	}

	/**
	 * @test
	 */
	public function setRoomnumberForStringSetsRoomnumber()
	{
		$this->subject->setRoomnumber('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'roomnumber',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getPersonReturnsInitialValueForString()
	{
		$this->assertSame(
			'',
			$this->subject->getPerson()
		);
	}

	/**
	 * @test
	 */
	public function setPersonForStringSetsPerson()
	{
		$this->subject->setPerson('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'person',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getTxattoworlddomainmodelpersonReturnsInitialValueForString()
	{
		$this->assertSame(
			'',
			$this->subject->getTxattoworlddomainmodelperson()
		);
	}

	/**
	 * @test
	 */
	public function setTxattoworlddomainmodelpersonForStringSetsTxattoworlddomainmodelperson()
	{
		$this->subject->setTxattoworlddomainmodelperson('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'txattoworlddomainmodelperson',
			$this->subject
		);
	}
}
