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

class NewspictureforfeaturedpublicationViewHelper extends \TYPO3\CMS\Fluid\Core\ViewHelper\AbstractViewHelper {
    
     /**
    * @param string $image
    *
    * @return string
    */
    public function render($image) {
        $string = $image;
        
        $string = basename($string);
        
        // $string = str_replace('/Pictures/','/Pictures1280x506/',$string);
        $string = str_replace('.jpg','_1280x506.jpg',$string);
        
        $pathToGreatPicture = '/fileadmin/user_upload/tx_attoworld/News/Pictures1280x506/';
        
        $rootpath = realpath(dirname(__FILE__)) . '/../../../../..'.$pathToGreatPicture;
        $fileName = $rootpath.$string;
        
        if(!file_exists($fileName)) {
            return $image;
        } else {
            return $pathToGreatPicture.$string;
        }
        
        
    }
}

?>