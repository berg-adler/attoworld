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
 * Test case for class \Ferenckrausz\Attoworld\Domain\Model\Videos.
 *
 * @copyright Copyright belongs to the respective authors
 * @license http://www.gnu.org/licenses/gpl.html GNU General Public License, version 3 or later
 *
 * @author Mandy Singh <mandy.singh@mpq.mpg.de>
 */
class VideosTest extends \TYPO3\CMS\Core\Tests\UnitTestCase
{
	/**
	 * @var \Ferenckrausz\Attoworld\Domain\Model\Videos
	 */
	protected $subject = NULL;

	public function setUp()
	{
		$this->subject = new \Ferenckrausz\Attoworld\Domain\Model\Videos();
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
	public function getVideocategoryReturnsInitialValueForString()
	{
		$this->assertSame(
			'',
			$this->subject->getVideocategory()
		);
	}

	/**
	 * @test
	 */
	public function setVideocategoryForStringSetsVideocategory()
	{
		$this->subject->setVideocategory('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'videocategory',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getMediathekcategoryReturnsInitialValueForString()
	{
		$this->assertSame(
			'',
			$this->subject->getMediathekcategory()
		);
	}

	/**
	 * @test
	 */
	public function setMediathekcategoryForStringSetsMediathekcategory()
	{
		$this->subject->setMediathekcategory('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'mediathekcategory',
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
	public function getImage21zu9ReturnsInitialValueForString()
	{
		$this->assertSame(
			'',
			$this->subject->getImage21zu9()
		);
	}

	/**
	 * @test
	 */
	public function setImage21zu9ForStringSetsImage21zu9()
	{
		$this->subject->setImage21zu9('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'image21zu9',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getVideomp4mobileReturnsInitialValueForString()
	{
		$this->assertSame(
			'',
			$this->subject->getVideomp4mobile()
		);
	}

	/**
	 * @test
	 */
	public function setVideomp4mobileForStringSetsVideomp4mobile()
	{
		$this->subject->setVideomp4mobile('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'videomp4mobile',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getVideomp4sdReturnsInitialValueForString()
	{
		$this->assertSame(
			'',
			$this->subject->getVideomp4sd()
		);
	}

	/**
	 * @test
	 */
	public function setVideomp4sdForStringSetsVideomp4sd()
	{
		$this->subject->setVideomp4sd('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'videomp4sd',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getVideomp4hdReturnsInitialValueForString()
	{
		$this->assertSame(
			'',
			$this->subject->getVideomp4hd()
		);
	}

	/**
	 * @test
	 */
	public function setVideomp4hdForStringSetsVideomp4hd()
	{
		$this->subject->setVideomp4hd('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'videomp4hd',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getVideowebmmobileReturnsInitialValueForString()
	{
		$this->assertSame(
			'',
			$this->subject->getVideowebmmobile()
		);
	}

	/**
	 * @test
	 */
	public function setVideowebmmobileForStringSetsVideowebmmobile()
	{
		$this->subject->setVideowebmmobile('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'videowebmmobile',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getVideowebmsdReturnsInitialValueForString()
	{
		$this->assertSame(
			'',
			$this->subject->getVideowebmsd()
		);
	}

	/**
	 * @test
	 */
	public function setVideowebmsdForStringSetsVideowebmsd()
	{
		$this->subject->setVideowebmsd('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'videowebmsd',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getVideowebmhdReturnsInitialValueForString()
	{
		$this->assertSame(
			'',
			$this->subject->getVideowebmhd()
		);
	}

	/**
	 * @test
	 */
	public function setVideowebmhdForStringSetsVideowebmhd()
	{
		$this->subject->setVideowebmhd('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'videowebmhd',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getVideoogvmobileReturnsInitialValueForString()
	{
		$this->assertSame(
			'',
			$this->subject->getVideoogvmobile()
		);
	}

	/**
	 * @test
	 */
	public function setVideoogvmobileForStringSetsVideoogvmobile()
	{
		$this->subject->setVideoogvmobile('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'videoogvmobile',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getVideoogvsdReturnsInitialValueForString()
	{
		$this->assertSame(
			'',
			$this->subject->getVideoogvsd()
		);
	}

	/**
	 * @test
	 */
	public function setVideoogvsdForStringSetsVideoogvsd()
	{
		$this->subject->setVideoogvsd('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'videoogvsd',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getVideoogvhdReturnsInitialValueForString()
	{
		$this->assertSame(
			'',
			$this->subject->getVideoogvhd()
		);
	}

	/**
	 * @test
	 */
	public function setVideoogvhdForStringSetsVideoogvhd()
	{
		$this->subject->setVideoogvhd('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'videoogvhd',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getKeywordsReturnsInitialValueForString()
	{
		$this->assertSame(
			'',
			$this->subject->getKeywords()
		);
	}

	/**
	 * @test
	 */
	public function setKeywordsForStringSetsKeywords()
	{
		$this->subject->setKeywords('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'keywords',
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
}
