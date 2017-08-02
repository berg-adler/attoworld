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
 * Test case for class \Ferenckrausz\Attoworld\Domain\Model\Pressrelease.
 *
 * @copyright Copyright belongs to the respective authors
 * @license http://www.gnu.org/licenses/gpl.html GNU General Public License, version 3 or later
 *
 * @author Mandy Singh <mandy.singh@mpq.mpg.de>
 */
class PressreleaseTest extends \TYPO3\CMS\Core\Tests\UnitTestCase
{
	/**
	 * @var \Ferenckrausz\Attoworld\Domain\Model\Pressrelease
	 */
	protected $subject = NULL;

	public function setUp()
	{
		$this->subject = new \Ferenckrausz\Attoworld\Domain\Model\Pressrelease();
	}

	public function tearDown()
	{
		unset($this->subject);
	}

	/**
	 * @test
	 */
	public function getFeaturedReturnsInitialValueForInt()
	{	}

	/**
	 * @test
	 */
	public function setFeaturedForIntSetsFeatured()
	{	}

	/**
	 * @test
	 */
	public function getPubdateReturnsInitialValueForString()
	{
		$this->assertSame(
			'',
			$this->subject->getPubdate()
		);
	}

	/**
	 * @test
	 */
	public function setPubdateForStringSetsPubdate()
	{
		$this->subject->setPubdate('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'pubdate',
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
	public function getFileReturnsInitialValueForString()
	{
		$this->assertSame(
			'',
			$this->subject->getFile()
		);
	}

	/**
	 * @test
	 */
	public function setFileForStringSetsFile()
	{
		$this->subject->setFile('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'file',
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
	public function getJournalReturnsInitialValueForString()
	{
		$this->assertSame(
			'',
			$this->subject->getJournal()
		);
	}

	/**
	 * @test
	 */
	public function setJournalForStringSetsJournal()
	{
		$this->subject->setJournal('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'journal',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getPagerefReturnsInitialValueForString()
	{
		$this->assertSame(
			'',
			$this->subject->getPageref()
		);
	}

	/**
	 * @test
	 */
	public function setPagerefForStringSetsPageref()
	{
		$this->subject->setPageref('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'pageref',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getVolumeReturnsInitialValueForString()
	{
		$this->assertSame(
			'',
			$this->subject->getVolume()
		);
	}

	/**
	 * @test
	 */
	public function setVolumeForStringSetsVolume()
	{
		$this->subject->setVolume('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'volume',
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
	public function getAuthorsReturnsInitialValueForString()
	{
		$this->assertSame(
			'',
			$this->subject->getAuthors()
		);
	}

	/**
	 * @test
	 */
	public function setAuthorsForStringSetsAuthors()
	{
		$this->subject->setAuthors('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'authors',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getPublicationcategoryReturnsInitialValueForString()
	{
		$this->assertSame(
			'',
			$this->subject->getPublicationcategory()
		);
	}

	/**
	 * @test
	 */
	public function setPublicationcategoryForStringSetsPublicationcategory()
	{
		$this->subject->setPublicationcategory('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'publicationcategory',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getPictureReturnsInitialValueForString()
	{
		$this->assertSame(
			'',
			$this->subject->getPicture()
		);
	}

	/**
	 * @test
	 */
	public function setPictureForStringSetsPicture()
	{
		$this->subject->setPicture('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'picture',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getPubtstampReturnsInitialValueForInt()
	{	}

	/**
	 * @test
	 */
	public function setPubtstampForIntSetsPubtstamp()
	{	}
}
