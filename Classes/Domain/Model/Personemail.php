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
 * Personemail
 */
class Personemail extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
{

    /** 
    * @var int
    */
    protected $uid;
    
    /** 
    * @var string
    */
    protected $email;
    
    /** 
    * @var string
    */
    protected $identifier;
    
    /** 
    * @var string
    */
    protected $tx_attoworld_domain_model_person;
    
    /** 
    * @var string
    */
    protected $person;
    
    public function getUid() {
        return $this->id;
    }
    
    public function setUid($uid) {
        $this->uid = $uid;
    }
    
    public function getEmail() {
        return $this->email;
    }
    
    public function setEmail($email) {
        $this->email = $email;
    }
    
    public function getIdentifier() {
        return $this->identifier;
    }
    
    public function setIdentifier($identifier) {
        $this->identifier = $identifier;
    }
    
    public function getTxAttoworldDomainModelPerson() {
        return $this->tx_attoworld_domain_model_person;
    }
    
    public function setTxAttoworldDomainModelPerson($tx_attoworld_domain_model_person) {
        $this->tx_attoworld_domain_model_person = $tx_attoworld_domain_model_person;
    }
    
    public function getPerson() {
        return $this->person;
    }
    
    public function setPerson($person) {
        $this->person = $person;
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