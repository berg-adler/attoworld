<?php
namespace Ferenckrausz\Attoworld\ViewHelpers;

	/*
	 *  Copyright notice
	 *
	 *  (c) 2012 Marc Hirdes <Marc_Hirdes@gmx.de>, clickstorm GmbH
	 *
	 *  All rights reserved
	 *
	 *  This script is part of the TYPO3 project. The TYPO3 project is
	 *  free software; you can redistribute it and/or modify
	 *  it under the terms of the GNU General Public License as published by
	 *  the Free Software Foundation; either version 3 of the License, or
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
	*/

	/**
	 */

/**
 * Renders Nothing
 *
 * == Examples ==
 *
 * <code title="Default parameters">
 * <gomapsext:format.comment>'foo <b>bar</b>.'</gomapsext:format.comment>
 * </code>
 * <output>
 * </output>
 */

class PubauthornameViewHelper extends \TYPO3\CMS\Fluid\Core\ViewHelper\AbstractViewHelper {
    
    /**
    * @param Tx_Attoworld_Domain_Model_Person $author 
    *
    * @return string
    */
    public function render($author) {
        
        if(is_object($author)) {
            $fn = $author->getForename();
            
            if(preg_match('/^[A-Z]\./',$fn)) {
                return ' '.$fn.' '.$author->getSurname();
            } else {
                if(preg_match('/^[A-Z] /',$fn)) {
                    return ' '.$fn.' '.$author->getSurname();
                } else {
                    if(preg_match('/^[A-Z]-/',$fn)) {
                        return ' '.$fn.' '.$author->getSurname();
                    } else {
                        if(preg_match('/^[A-Z]/',$fn)) {
                            return ' '.substr($fn,0,1).'. '.$author->getSurname();
                        } else {

                            return ' '.$fn.' '.$author->getSurname();
                        }
                    }
                }
            }
        } else {
            return $author->getForename();
        }
        
    }
}

?>