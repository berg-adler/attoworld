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

class AddresskindViewHelper extends \TYPO3\CMS\Fluid\Core\ViewHelper\AbstractViewHelper {
    
    /**
    * @param string $string     Der Wert
    * @param string $type   Office oder Lab
    * @param string $type2   Fax oder Fone
    *
    * @return string
    */
    public function render($string, $type, $type2) {
        
        
        
        $replacements = array(
            'phone' => array(
                'lab' => 'laboratory',
                'laboratory' => 'laboratory',
                'office' => 'office',
                'fax' => 'fax'
            ),
            'room' => array(
                'lab' => 'Laboratory',
                'office' => 'Office'
            )
        );
        
        $count = 0;
        foreach($replacements[$type] as $i => $v) {
            if(preg_match('/'.$i.'/',$string) == 1) {
                $string = preg_replace('/'.$i.'/', $v, $string, -1, $count);
            }
        }
       
        if($type == 'phone') {
            if($count > 0) {
                
                if($type2 == 'fax') {
                    $string = 'Fax ('.$string.')';
                } else {
                    $string = 'Phone ('.$string.')';
                }
                
                
            } else {
                
                if($type2 == 'fax') {
                    $string = 'Fax (office)';
                } else {
                    $string = 'Phone (office)';
                }
                
            }
            $string .= ': ';
        } elseif($type == 'room') {
            if($count > 0) {
                $string = $string.': ';
            } else {
                if(empty($string)) {
                    $string = 'Office: ';
                } else {
                    $string = $string;
                }
            }
        }
        
        // $string = '/'.$type.'/'.$count.'/'.$string;
        
        return $string;
    }
}

?>