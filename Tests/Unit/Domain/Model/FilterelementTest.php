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
 * Test case for class \Ferenckrausz\Attoworld\Domain\Model\Filterelement.
 *
 * @copyright Copyright belongs to the respective authors
 * @license http://www.gnu.org/licenses/gpl.html GNU General Public License, version 3 or later
 *
 * @author Mandy Singh <mandy.singh@mpq.mpg.de>
 */
class FilterelementTest extends \TYPO3\CMS\Core\Tests\UnitTestCase
{
	/**
	 * @var \Ferenckrausz\Attoworld\Domain\Model\Filterelement
	 */
	protected $subject = NULL;

	public function setUp()
	{
		$this->subject = new \Ferenckrausz\Attoworld\Domain\Model\Filterelement();
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
	public function getSubtitleReturnsInitialValueForString()
	{
		$this->assertSame(
			'',
			$this->subject->getSubtitle()
		);
	}

	/**
	 * @test
	 */
	public function setSubtitleForStringSetsSubtitle()
	{
		$this->subject->setSubtitle('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'subtitle',
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
	public function getSizeReturnsInitialValueForString()
	{
		$this->assertSame(
			'',
			$this->subject->getSize()
		);
	}

	/**
	 * @test
	 */
	public function setSizeForStringSetsSize()
	{
		$this->subject->setSize('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'size',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getLinkjobsReturnsInitialValueForString()
	{
		$this->assertSame(
			'',
			$this->subject->getLinkjobs()
		);
	}

	/**
	 * @test
	 */
	public function setLinkjobsForStringSetsLinkjobs()
	{
		$this->subject->setLinkjobs('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'linkjobs',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getLinknewsReturnsInitialValueForString()
	{
		$this->assertSame(
			'',
			$this->subject->getLinknews()
		);
	}

	/**
	 * @test
	 */
	public function setLinknewsForStringSetsLinknews()
	{
		$this->subject->setLinknews('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'linknews',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getLinknextappearanceReturnsInitialValueForString()
	{
		$this->assertSame(
			'',
			$this->subject->getLinknextappearance()
		);
	}

	/**
	 * @test
	 */
	public function setLinknextappearanceForStringSetsLinknextappearance()
	{
		$this->subject->setLinknextappearance('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'linknextappearance',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getLinkexternReturnsInitialValueForString()
	{
		$this->assertSame(
			'',
			$this->subject->getLinkextern()
		);
	}

	/**
	 * @test
	 */
	public function setLinkexternForStringSetsLinkextern()
	{
		$this->subject->setLinkextern('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'linkextern',
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
	public function getPageidReturnsInitialValueForInt()
	{	}

	/**
	 * @test
	 */
	public function setPageidForIntSetsPageid()
	{	}

	/**
	 * @test
	 */
	public function getLinkreferenceReturnsInitialValueForInt()
	{	}

	/**
	 * @test
	 */
	public function setLinkreferenceForIntSetsLinkreference()
	{	}

	/**
	 * @test
	 */
	public function getAnchorReturnsInitialValueForString()
	{
		$this->assertSame(
			'',
			$this->subject->getAnchor()
		);
	}

	/**
	 * @test
	 */
	public function setAnchorForStringSetsAnchor()
	{
		$this->subject->setAnchor('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'anchor',
			$this->subject
		);
	}
}
