<?php
namespace Ferenckrausz\Attoworld\Tests\Unit\Controller;
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
 * Test case for class Ferenckrausz\Attoworld\Controller\ElementsController.
 *
 * @author Mandy Singh <mandy.singh@mpq.mpg.de>
 */
class ElementsControllerTest extends \TYPO3\CMS\Core\Tests\UnitTestCase
{

	/**
	 * @var \Ferenckrausz\Attoworld\Controller\ElementsController
	 */
	protected $subject = NULL;

	public function setUp()
	{
		$this->subject = $this->getMock('Ferenckrausz\\Attoworld\\Controller\\ElementsController', array('redirect', 'forward', 'addFlashMessage'), array(), '', FALSE);
	}

	public function tearDown()
	{
		unset($this->subject);
	}

	/**
	 * @test
	 */
	public function showActionAssignsTheGivenElementsToView()
	{
		$elements = new \Ferenckrausz\Attoworld\Domain\Model\Elements();

		$view = $this->getMock('TYPO3\\CMS\\Extbase\\Mvc\\View\\ViewInterface');
		$this->inject($this->subject, 'view', $view);
		$view->expects($this->once())->method('assign')->with('elements', $elements);

		$this->subject->showAction($elements);
	}

	/**
	 * @test
	 */
	public function showActionAssignsTheGivenElementsToView()
	{
		$elements = new \Ferenckrausz\Attoworld\Domain\Model\Elements();

		$view = $this->getMock('TYPO3\\CMS\\Extbase\\Mvc\\View\\ViewInterface');
		$this->inject($this->subject, 'view', $view);
		$view->expects($this->once())->method('assign')->with('elements', $elements);

		$this->subject->showAction($elements);
	}

	/**
	 * @test
	 */
	public function showActionAssignsTheGivenElementsToView()
	{
		$elements = new \Ferenckrausz\Attoworld\Domain\Model\Elements();

		$view = $this->getMock('TYPO3\\CMS\\Extbase\\Mvc\\View\\ViewInterface');
		$this->inject($this->subject, 'view', $view);
		$view->expects($this->once())->method('assign')->with('elements', $elements);

		$this->subject->showAction($elements);
	}
}
