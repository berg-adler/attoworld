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
 * Test case for class \Ferenckrausz\Attoworld\Domain\Model\Project.
 *
 * @copyright Copyright belongs to the respective authors
 * @license http://www.gnu.org/licenses/gpl.html GNU General Public License, version 3 or later
 *
 * @author Mandy Singh <mandy.singh@mpq.mpg.de>
 */
class ProjectTest extends \TYPO3\CMS\Core\Tests\UnitTestCase
{
	/**
	 * @var \Ferenckrausz\Attoworld\Domain\Model\Project
	 */
	protected $subject = NULL;

	public function setUp()
	{
		$this->subject = new \Ferenckrausz\Attoworld\Domain\Model\Project();
	}

	public function tearDown()
	{
		unset($this->subject);
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
	public function getShorttitleReturnsInitialValueForString()
	{
		$this->assertSame(
			'',
			$this->subject->getShorttitle()
		);
	}

	/**
	 * @test
	 */
	public function setShorttitleForStringSetsShorttitle()
	{
		$this->subject->setShorttitle('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'shorttitle',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getImageReturnsInitialValueForString()
	{
		$this->assertSame(
			'',
			$this->subject->getImage()
		);
	}

	/**
	 * @test
	 */
	public function setImageForStringSetsImage()
	{
		$this->subject->setImage('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'image',
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
	public function getOnelinerReturnsInitialValueForString()
	{
		$this->assertSame(
			'',
			$this->subject->getOneliner()
		);
	}

	/**
	 * @test
	 */
	public function setOnelinerForStringSetsOneliner()
	{
		$this->subject->setOneliner('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'oneliner',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getAddressReturnsInitialValueForString()
	{
		$this->assertSame(
			'',
			$this->subject->getAddress()
		);
	}

	/**
	 * @test
	 */
	public function setAddressForStringSetsAddress()
	{
		$this->subject->setAddress('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'address',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getActiveReturnsInitialValueForInt()
	{	}

	/**
	 * @test
	 */
	public function setActiveForIntSetsActive()
	{	}

	/**
	 * @test
	 */
	public function getMemberReturnsInitialValueForString()
	{
		$this->assertSame(
			'',
			$this->subject->getMember()
		);
	}

	/**
	 * @test
	 */
	public function setMemberForStringSetsMember()
	{
		$this->subject->setMember('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'member',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getPageReturnsInitialValueForString()
	{
		$this->assertSame(
			'',
			$this->subject->getPage()
		);
	}

	/**
	 * @test
	 */
	public function setPageForStringSetsPage()
	{
		$this->subject->setPage('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'page',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getPageidReturnsInitialValueForInt()
	{	}

	/**
	 * @test
	 */
	public function setPageidForIntSetsPageid()
	{	}
}
