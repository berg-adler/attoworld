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
 * Breakingnews
 */
class Coverstory extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
{

    /** 
    * @var string
    */
    protected $title;
    
    /** 
    * @var int
    */
    protected $coverdate;

    /**  
    * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Ferenckrausz\Attoworld\Domain\Model\Journal>
    */
    protected $journal;
    
    /** 
    * @var string
    */
    protected $journaltext;
    
    /** 
    * @var string
    */
    protected $image;
    
    /** 
    * @var string
    */
    protected $bodytext;
    
    /**  
    * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Ferenckrausz\Attoworld\Domain\Model\Pressrelease>
    */
    protected $pressrelease;
    
    /** 
    * @var string
    */
    protected $file;
    
    public function getJournaltext() {
        return $this->journaltext;
    }
    
    public function setJournaltext($journaltext) {
        $this->journaltext = $journaltext;
    }
    
    public function getPressrelease() {
        return $this->pressrelease;
    }
    
    public function setPressrelease($pressrelease) {
        $this->pressrelease = $pressrelease;
    }
    
    public function getTitle() {
        return $this->title;
    }
    
    public function setTitle($title) {
        $this->title = $title;
    }
    
    public function getCoverdate() {
        return $this->coverdate;
    }
    
    public function setCoverdate($coverdate) {
        $this->coverdate = $coverdate;
    }
    
    public function getJournal() {
        return $this->journal;
    }
    
    public function setJournal($journal) {
        $this->journal = $journal;
    }
    
    public function getImage() {
        return $this->image;
    }
    
    public function setImage($image) {
        $this->image = $image;
    }
    
    public function getBodytext() {
        return $this->bodytext;
    }
    
    public function setBodytext($bodytext) {
        $this->bodytext = $bodytext;
    }
    
    public function getFile() {
        return $this->file;
    }
    
    public function setFile($file) {
        $this->file = $file;
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