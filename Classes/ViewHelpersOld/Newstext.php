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

class NewstextViewHelper extends \TYPO3\CMS\Fluid\Core\ViewHelper\AbstractViewHelper {
    
    /**
    * @param string $string 
    *
    * @return string
    */
    public function render($string) {
        
        $all = preg_match_all("/__LINKTO\([^\)]+\)/",$string, $matches);
        
        foreach($matches as $match) {
            $linkParts = explode(',',$match);
            
            $link = $linkParts[0];
            
            $link = preg_replace("/^\"/","",$link);
            $link = preg_replace("/\"$/","",$link);
            
            $title = $linkParts[1];
            
            $title = preg_replace("/^\"/","",$title);
            $title = preg_replace("/\"$/","",$title);
            
            $replacement = '<a href="'.$link.'">'.$title.'</a>';
            str_replace('__LINKTO('.$match.')',$replacement);
            
            
        }
        
        return $string;
    }
}

?>