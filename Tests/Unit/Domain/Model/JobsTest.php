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
 * Test case for class \Ferenckrausz\Attoworld\Domain\Model\Jobs.
 *
 * @copyright Copyright belongs to the respective authors
 * @license http://www.gnu.org/licenses/gpl.html GNU General Public License, version 3 or later
 *
 * @author Mandy Singh <mandy.singh@mpq.mpg.de>
 */
class JobsTest extends \TYPO3\CMS\Core\Tests\UnitTestCase
{
	/**
	 * @var \Ferenckrausz\Attoworld\Domain\Model\Jobs
	 */
	protected $subject = NULL;

	public function setUp()
	{
		$this->subject = new \Ferenckrausz\Attoworld\Domain\Model\Jobs();
	}

	public function tearDown()
	{
		unset($this->subject);
	}

	/**
	 * @test
	 */
	public function getGwdglinkReturnsInitialValueForString()
	{
		$this->assertSame(
			'',
			$this->subject->getGwdglink()
		);
	}

	/**
	 * @test
	 */
	public function setGwdglinkForStringSetsGwdglink()
	{
		$this->subject->setGwdglink('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'gwdglink',
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
	public function getDescriptionReturnsInitialValueForString()
	{
		$this->assertSame(
			'',
			$this->subject->getDescription()
		);
	}

	/**
	 * @test
	 */
	public function setDescriptionForStringSetsDescription()
	{
		$this->subject->setDescription('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'description',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getFulltextdescriptionReturnsInitialValueForString()
	{
		$this->assertSame(
			'',
			$this->subject->getFulltextdescription()
		);
	}

	/**
	 * @test
	 */
	public function setFulltextdescriptionForStringSetsFulltextdescription()
	{
		$this->subject->setFulltextdescription('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'fulltextdescription',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getTypeReturnsInitialValueForString()
	{
		$this->assertSame(
			'',
			$this->subject->getType()
		);
	}

	/**
	 * @test
	 */
	public function setTypeForStringSetsType()
	{
		$this->subject->setType('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'type',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getPersonsubgroupReturnsInitialValueForString()
	{
		$this->assertSame(
			'',
			$this->subject->getPersonsubgroup()
		);
	}

	/**
	 * @test
	 */
	public function setPersonsubgroupForStringSetsPersonsubgroup()
	{
		$this->subject->setPersonsubgroup('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'personsubgroup',
			$this->subject
		);
	}
}
