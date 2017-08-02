<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Ferenckrausz\Attoworld\Domain\Model;

/**
 * Description of Paperarchiv
 *
 * @author ferenckrausz
 */
class Paperarchiv extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity {
    
    /** 
    * @var string
    */
    protected $identifier;
    
    public function getIdentifier() {
        return $this->identifier;
    }
    
    public function setIdentifier($identifier) {
        $this->identifier = $identifier;
    }
    
    /** 
    * @var int
    */
    protected $isarchived;
    
    public function getIsarchived() {
        return $this->isarchived;
    }
    
    public function setIsarchived($isarchived) {
        $this->isarchived = $isarchived;
    }
    
    /** 
    * @var int
    */
    protected $needsarchive;
    
    public function getNeedsarchive() {
        return $this->needsarchive;
    }
    
    public function setNeedsarchive($needsarchive) {
        $this->needsarchive = $needsarchive;
    }
    
    /**  
    * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Ferenckrausz\Attoworld\Domain\Model\Publication>
    */
    protected $publication;
    
    public function getPublication() {
        return $this->publication;
    }
    
    public function setPublication($publication) {
        $this->publication = $publication;
    }
    
}
