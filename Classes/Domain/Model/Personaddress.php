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
 * Personaddress
 */
class Personaddress extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
{

    /** 
    * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Ferenckrausz\Attoworld\Domain\Model\Location>
    */
    protected $location;
    
    /** 
    * @var string
    */
    protected $phonenumber;
    
    /** 
    * @var string
    */
    protected $roomnumber;
    
    
    /** 
    * @var string
    */
    protected $person;
    
    /** 
    * @var string
    */
    protected $kind;
    
    /** 
    * @var string
    */
    protected $data;
    
    
    /** 
    * @var string
    */
    protected $tx_attoworld_domain_model_person;
    
    public function getLocation() {
        return $this->location;
    }
    
    public function setLocation($location) {
        $this->location = $location;
    }
    
    public function getKind() {
        return $this->kind;
    }
    
    public function setKind($kind) {
        $this->kind = $kind;
    }
    
    public function getPerson() {
        return $this->person;
    }
    
    public function setPerson($person) {
        $this->person = $person;
    }
    
    public function getPhonenumber() {
        return $this->phonenumber;
    }
    
    public function setPhonenumber($phonenumber) {
        $this->phonenumber = $phonenumber;
    }
    
    public function getRoomnumber() {
        return $this->roomnumber;
    }
    
    public function setRoomnumber($roomnumber) {
        $this->roomnumber = $roomnumber;
    }
    
    public function getData() {
        return $this->data;
    }
    
    public function setData($data) {
        $this->data = $data;
    }
    
    public function getTxAttoworldDomainModelPerson() {
        return $this->tx_attoworld_domain_model_person;
    }
    
    public function setTxAttoworldDomainModelPerson($tx_attoworld_domain_model_person) {
        $this->tx_attoworld_domain_model_person = $tx_attoworld_domain_model_person;
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