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
class Journal extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
{

    /** 
    * @var string
    */
    protected $title;
    
    /** 
    * @var int
    */
    protected $showinfrontend;
    
    /** 
    * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Ferenckrausz\Attoworld\Domain\Model\Publication>
    */
    protected $publication;
    
    /** 
    * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Ferenckrausz\Attoworld\Domain\Model\Book>
    */
    protected $book;
    
    /** 
    * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Ferenckrausz\Attoworld\Domain\Model\Pressrelease>
    */
    protected $pressrelease;
    
    /** 
    * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Ferenckrausz\Attoworld\Domain\Model\Audioorvideo>
    */
    protected $audioorvideo;
    
    
    public function getShowinfrontend() {
        return $this->showinfrontend;
    }
    
    public function setShowinfrontend($showinfrontend) {
        $this->showinfrontend = $showinfrontend;
    }
    
    public function getTitle() {
        return $this->title;
    }
    
    public function setTitle($title) {
        $this->title = $title;
    }
    
    public function getPublication() {
        return $this->publication;
    }
    
    public function setPublication($publication) {
        $this->publication = $publication;
    }
    
    public function getBook() {
        return $this->book;
    }
    
    public function setBook($book) {
        $this->$book = $book;
    }
    
    public function getPressrelease() {
        return $this->pressrelease;
    }
    
    public function setPressrelease($pressrelease) {
        $this->pressrelease = $pressrelease;
    }
    
    public function getAudioorvideo() {
        return $this->audioorvideo;
    }
    
    public function setAudioorvideo($audioorvideo) {
        $this->audioorvideo = $audioorvideo;
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