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
 * Project
 */
class Project extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
{

    /** 
    * @var int
    */
    protected $uid;
    
    /** 
    * @var string
    */
    protected $title;
    
    /** 
    * @var string
    */
    protected $shorttitle;
    
    /** 
    * @var string
    */
    protected $image;
   
    /** 
    * @var string
    */
    protected $description;
    
    /** 
    * @var string
    */
    protected $oneliner;
    
    /** 
    * @var string
    */
    protected $address;
    
    /** 
    * @var int
    */
    protected $active = 0;
    
    /** 
    * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Ferenckrausz\Attoworld\Domain\Model\Person>
    */
    protected $member;
    
    /** 
    * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Ferenckrausz\Attoworld\Domain\Model\Content>
    */
    protected $page;
    
    /** 
    * @var int
    */
    protected $pagepid;
    
    
    public function getAddress() {
        return $this->address;
    }
    
    public function setAddress($address) {
        $this->address = $address;
    }
    
    
    public function getActive() {
        return $this->active;
    }
    
    public function setActive($active) {
        $this->active = $active;
    }
    
    public function getUid() {
        return $this->uid;
    }
    
    public function setUid($uid) {
        $this->uid = $uid;
    }
    
    public function getTitle() {
        return $this->title;
    }
    
    public function setTitle($title) {
        $this->title = $title;
    }
    
    public function getShorttitle() {
        return $this->shorttitle;
    }
    
    public function setShorttitle($shorttitle) {
        $this->shorttitle = $shorttitle;
    }
    
    public function getImage() {
        return $this->image;
    }
    
    public function setImage($image) {
        $this->image = $image;
    }
    
    public function getMember() {
        return $this->member;
    }
    
    public function setMember($member) {
        $this->member = $member;
    }
    
    public function getPage() {
        return $this->page;
    }
    
    public function setPage($page) {
        $this->page = $page;
    }
    
    public function getPagepid() {
        return $this->pagepid;
    }
    
    public function setPagepid($pagepid) {
        $this->pagepid = $pagepid;
    }
    
    public function getDescription() {
        return $this->description;
    }
    
    public function setDescription($description) {
        $this->description = $description;
    }
    
    public function getOneliner() {
        return $this->oneliner;
    }
    
    public function setOneliner($oneliner) {
        $this->oneliner = $oneliner;
    }
    
    public function getLeaders() {
        $ms = $this->getMember();
        
        $leaders = array();
        foreach($ms as $m) {
            if($m->getIsgroupleader() == true) {
                $leaders[] = $m;
            }
        }
        
        return $leaders;
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