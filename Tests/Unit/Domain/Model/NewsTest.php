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
 * Test case for class \Ferenckrausz\Attoworld\Domain\Model\News.
 *
 * @copyright Copyright belongs to the respective authors
 * @license http://www.gnu.org/licenses/gpl.html GNU General Public License, version 3 or later
 *
 * @author Mandy Singh <mandy.singh@mpq.mpg.de>
 */
class NewsTest extends \TYPO3\CMS\Core\Tests\UnitTestCase
{
	/**
	 * @var \Ferenckrausz\Attoworld\Domain\Model\News
	 */
	protected $subject = NULL;

	public function setUp()
	{
		$this->subject = new \Ferenckrausz\Attoworld\Domain\Model\News();
	}

	public function tearDown()
	{
		unset($this->subject);
	}

	/**
	 * @test
	 */
	public function getPubdateReturnsInitialValueForInt()
	{	}

	/**
	 * @test
	 */
	public function setPubdateForIntSetsPubdate()
	{	}

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
	public function getAuthorReturnsInitialValueForString()
	{
		$this->assertSame(
			'',
			$this->subject->getAuthor()
		);
	}

	/**
	 * @test
	 */
	public function setAuthorForStringSetsAuthor()
	{
		$this->subject->setAuthor('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'author',
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
	public function getPressreleaseReturnsInitialValueForString()
	{
		$this->assertSame(
			'',
			$this->subject->getPressrelease()
		);
	}

	/**
	 * @test
	 */
	public function setPressreleaseForStringSetsPressrelease()
	{
		$this->subject->setPressrelease('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'pressrelease',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getPublinktextReturnsInitialValueForString()
	{
		$this->assertSame(
			'',
			$this->subject->getPublinktext()
		);
	}

	/**
	 * @test
	 */
	public function setPublinktextForStringSetsPublinktext()
	{
		$this->subject->setPublinktext('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'publinktext',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getBodytextReturnsInitialValueForString()
	{
		$this->assertSame(
			'',
			$this->subject->getBodytext()
		);
	}

	/**
	 * @test
	 */
	public function setBodytextForStringSetsBodytext()
	{
		$this->subject->setBodytext('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'bodytext',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getContactsReturnsInitialValueForString()
	{
		$this->assertSame(
			'',
			$this->subject->getContacts()
		);
	}

	/**
	 * @test
	 */
	public function setContactsForStringSetsContacts()
	{
		$this->subject->setContacts('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'contacts',
			$this->subject
		);
	}
}
