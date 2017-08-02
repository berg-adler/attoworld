<?php
namespace Ferenckrausz\Attoworld\Domain\Model;

/***************************************************************
 *
 *  Copyright notice
 *
 *  (c) 2017 Mandy Singh <mandy.singh@mpq.mpg.de>, Max-Planck-Institut für Quantenoptik
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
 ***************************************************************/

/**
 * Address
 */
class Address extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
{

    /** 
    * @var string
    */
    protected $zipcode;
    
    /** 
    * @var string
    */
    protected $city;
    
    /** 
    * @var string
    */
    protected $street;
    
    /** 
    * @var string
    */
    protected $streetnumber;
    
    /** 
    * @var string
    */
    protected $title;
    
    
    public function getTitle() {
        return $this->title;
    }
    
    public function setTitle($title) {
        $this->title = $title;
    }
    
    public function getZipcode() {
        return $this->zipcode;
    }
    
    public function setZipcode($zipcode) {
        $this->zipcode = $zipcode;
    }
    
    public function getCity() {
        return $this->city;
    }
    
    public function setCity($city) {
        $this->city = $city;
    }
    
    public function getStreet() {
        return $this->street;
    }
    
    public function setStreet($street) {
        $this->street = $street;
    }
    
    public function getStreetnumber() {
        return $this->streetnumber;
    }
    
    public function setStreetnumber($streetnumber) {
        $this->streetnumber = $streetnumber;
    }
    
    public function toArray() {
        $array = array();
        foreach($this as $property => $value) {
            
            if(is_string($value)) {
                $array[$property] = $value;
            }
            
        }
        
        return $array;
    }

}