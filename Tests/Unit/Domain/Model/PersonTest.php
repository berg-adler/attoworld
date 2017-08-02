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
 * Test case for class \Ferenckrausz\Attoworld\Domain\Model\Person.
 *
 * @copyright Copyright belongs to the respective authors
 * @license http://www.gnu.org/licenses/gpl.html GNU General Public License, version 3 or later
 *
 * @author Mandy Singh <mandy.singh@mpq.mpg.de>
 */
class PersonTest extends \TYPO3\CMS\Core\Tests\UnitTestCase
{
	/**
	 * @var \Ferenckrausz\Attoworld\Domain\Model\Person
	 */
	protected $subject = NULL;

	public function setUp()
	{
		$this->subject = new \Ferenckrausz\Attoworld\Domain\Model\Person();
	}

	public function tearDown()
	{
		unset($this->subject);
	}

	/**
	 * @test
	 */
	public function getSurnameReturnsInitialValueForString()
	{
		$this->assertSame(
			'',
			$this->subject->getSurname()
		);
	}

	/**
	 * @test
	 */
	public function setSurnameForStringSetsSurname()
	{
		$this->subject->setSurname('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'surname',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getForenameReturnsInitialValueForString()
	{
		$this->assertSame(
			'',
			$this->subject->getForename()
		);
	}

	/**
	 * @test
	 */
	public function setForenameForStringSetsForename()
	{
		$this->subject->setForename('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'forename',
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
	public function getGenderReturnsInitialValueForString()
	{
		$this->assertSame(
			'',
			$this->subject->getGender()
		);
	}

	/**
	 * @test
	 */
	public function setGenderForStringSetsGender()
	{
		$this->subject->setGender('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'gender',
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
	public function getCurriculumvitaeReturnsInitialValueForString()
	{
		$this->assertSame(
			'',
			$this->subject->getCurriculumvitae()
		);
	}

	/**
	 * @test
	 */
	public function setCurriculumvitaeForStringSetsCurriculumvitae()
	{
		$this->subject->setCurriculumvitae('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'curriculumvitae',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getPublicationsbeforeReturnsInitialValueForString()
	{
		$this->assertSame(
			'',
			$this->subject->getPublicationsbefore()
		);
	}

	/**
	 * @test
	 */
	public function setPublicationsbeforeForStringSetsPublicationsbefore()
	{
		$this->subject->setPublicationsbefore('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'publicationsbefore',
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
	public function getMemberReturnsInitialValueForInt()
	{	}

	/**
	 * @test
	 */
	public function setMemberForIntSetsMember()
	{	}

	/**
	 * @test
	 */
	public function getOnwebpageReturnsInitialValueForInt()
	{	}

	/**
	 * @test
	 */
	public function setOnwebpageForIntSetsOnwebpage()
	{	}

	/**
	 * @test
	 */
	public function getIsgroupleaderReturnsInitialValueForInt()
	{	}

	/**
	 * @test
	 */
	public function setIsgroupleaderForIntSetsIsgroupleader()
	{	}

	/**
	 * @test
	 */
	public function getSubgroupReturnsInitialValueForString()
	{
		$this->assertSame(
			'',
			$this->subject->getSubgroup()
		);
	}

	/**
	 * @test
	 */
	public function setSubgroupForStringSetsSubgroup()
	{
		$this->subject->setSubgroup('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'subgroup',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getCategoryReturnsInitialValueForString()
	{
		$this->assertSame(
			'',
			$this->subject->getCategory()
		);
	}

	/**
	 * @test
	 */
	public function setCategoryForStringSetsCategory()
	{
		$this->subject->setCategory('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'category',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getNationReturnsInitialValueForString()
	{
		$this->assertSame(
			'',
			$this->subject->getNation()
		);
	}

	/**
	 * @test
	 */
	public function setNationForStringSetsNation()
	{
		$this->subject->setNation('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'nation',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getPublicationsReturnsInitialValueForString()
	{
		$this->assertSame(
			'',
			$this->subject->getPublications()
		);
	}

	/**
	 * @test
	 */
	public function setPublicationsForStringSetsPublications()
	{
		$this->subject->setPublications('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'publications',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getPositionReturnsInitialValueForString()
	{
		$this->assertSame(
			'',
			$this->subject->getPosition()
		);
	}

	/**
	 * @test
	 */
	public function setPositionForStringSetsPosition()
	{
		$this->subject->setPosition('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'position',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getResearchtextReturnsInitialValueForString()
	{
		$this->assertSame(
			'',
			$this->subject->getResearchtext()
		);
	}

	/**
	 * @test
	 */
	public function setResearchtextForStringSetsResearchtext()
	{
		$this->subject->setResearchtext('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'researchtext',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getProjecttextReturnsInitialValueForString()
	{
		$this->assertSame(
			'',
			$this->subject->getProjecttext()
		);
	}

	/**
	 * @test
	 */
	public function setProjecttextForStringSetsProjecttext()
	{
		$this->subject->setProjecttext('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'projecttext',
			$this->subject
		);
	}
}
