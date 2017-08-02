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

class MakelinebreakViewHelper extends \TYPO3\CMS\Fluid\Core\ViewHelper\AbstractViewHelper {
    
    
    
    private $letters = array(
        'a' => 'A',
        'b' => 'B',
        'c' => 'C',
        'd' => 'D',
        'e' => 'E',
        'f' => 'F',
        'g' => 'G',
        'h' => 'H',
        'i' => 'I',
        'j' => 'J',
        'k' => 'K',
        'l' => 'L',
        'm' => 'M',
        'n' => 'N',
        'o' => 'O',
        'p' => 'P',
        'q' => 'Q',
        'r' => 'R',
        's' => 'S',
        't' => 'T',
        'u' => 'U',
        'v' => 'V',
        'w' => 'W',
        'x' => 'X',
        'y' => 'Y',
        'z' => 'Z',
    );
    
    /**
    * @param type $type
    * @param string $string
    *
    * @return string
    */
    public function render($type, $string) {
        
        if($type=='list') {
            $string = preg_replace("/\n/",'</li><li>',$string);
            $string = '<ul class="design-listing-gefriert"><li>'.$string;
            $string .= '</li></ul>';
            
            foreach($this->letters as $i => $l) {
                $string = preg_replace("/<li>".$i."/","<li>".$l,$string);
            }
            
        } else {
            $string = preg_replace("/\n/",'<br/>',$string);
        }
        
        
        
        return $string;
    }
}

?>