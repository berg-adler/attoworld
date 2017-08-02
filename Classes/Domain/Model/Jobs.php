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
 * Jobs
 */
class Jobs extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
{

    /** 
    * @var int
    */
    protected $pid;
    
    /** 
    * @var int
    */
    protected $crdate;
    
    /** 
    * @var string
    */
    protected $gwdglink;
    
    /** 
    * @var string
    */
    protected $title;
    
    /** 
    * @var string
    */
    protected $location;
    
    /** 
    * @var string
    */
    protected $description;
    
    /** 
    * @var string
    */
    protected $fulltextdescription;
    
    /** 
    * @var string
    */
    protected $type;
    
    /** 
    * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Ferenckrausz\Attoworld\Domain\Model\Personsubgroup>
    */
    protected $personsubgroup;
    
    
    public function getType() {
        return $this->type;
    }
    
    public function setType($type) {
        $this->type = $type;
    }
    
    public function getPersonsubgroup() {
        return $this->personsubgroup;
    }
    
    public function setPersonsubgroup($personsubgroup) {
        $this->personsubgroup = $personsubgroup;
    }
    
    public function getLocation() {
        return $this->location;
    }
    
    public function setLocation($location) {
        $this->location = $location;
    }
    
    public function getDescription() {
        return $this->description;
    }
    
    public function setDescription($description) {
        $this->description = $description;
    }
    
    public function getFulltextdescription() {
        return $this->fulltextdescription;
    }
    
    public function setFulltextdescription($fulltextdescription) {
        $this->fulltextdescription = $fulltextdescription;
    }
    
    public function getPid() {
        return $this->pid;
    }
    
    public function setPid($pid) {
        $this->pid = $pid;
    }
    
    public function getGwdglink() {
        return $this->gwdglink;
    }
    
    public function setGwdglink($gwdglink) {
        $this->gwdglink = $gwdglink;
    }
    
    public function getTitle() {
        return $this->title;
    }
    
    public function setTitle($title) {
        $this->title = $title;
    }
    
    public function getCrdate() {
        return $this->crdate;
    }
    
    public function setCrdate($crdate) {
        $this->crdate = $crdate;
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