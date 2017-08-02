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
 * News
 */
class News extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
{

    /** 
    * @var int
    */
    protected $pid;
    
    /** 
    * @var int
    */
    protected $pubdate;
    
   
    /** 
    * @var int
    */
    protected $crdate;
    
    /** 
    * @var int
    */
    protected $featured;
    
    /** 
    * @var int
    */
    protected $breaking;
    
    /** 
    * @var int
    */
    protected $realyear;
    
    /** 
    * @var string
    */
    protected $title;
    
    /** 
    * @var string
    */
    protected $author;
    
    /** 
    * @var string
    */
    protected $image;
    
    /**  
    * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Ferenckrausz\Attoworld\Domain\Model\Pressrelease>
    */
    protected $pressrelease;
    
    /** 
    * @var string
    */
    protected $publinktext;
    
    /** 
    * @var string
    */
    protected $bodytext;
    
    /** 
    * @var string
    */
    protected $contacts;
    
    /** 
    * @var int
    */
    protected $isscientific;
    
    /** 
    * @var string
    */
    protected $fulltexten;
    
    /** 
    * @var string
    */
    protected $shorttexten;
    
    /** 
    * @var string
    */
    protected $groups;
    
    /** 
    * @var int
    */
    protected $refid;
    
    /** 
    * @var int
    */
    protected $joinid;
    
    
    
    /** 
    * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Ferenckrausz\Attoworld\Domain\Model\Person>
    */
    protected $lastauthor;
    
    /** 
    * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Ferenckrausz\Attoworld\Domain\Model\Person>
    */
    protected $firstauthor;
    
    /** 
    * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Ferenckrausz\Attoworld\Domain\Model\Person>
    */
    protected $sectolastauthor;
    
    public function getLastauthor() {
        return $this->lastauthor;
    }
    
    public function setLastauthor($lastauthor) {
        $this->lastauthor = $lastauthor;
    }
    
    public function getSectolastauthor() {
        return $this->sectolastauthor;
    }
    
    public function setSectolastauthor($sectolastauthor) {
        $this->sectolastauthor = $sectolastauthor;
    }
    
    public function getFirstauthor() {
        return $this->firstauthor;
    }
    
    public function setFirstauthor($firstauthor) {
        $this->firstauthor = $firstauthor;
    }
    
    /** 
    * @var string
    */
    protected $file;
    
    public function getType() {
        if($this->isscientific == 0) {
            return 'Team';
        } else {
            if($this->isscientific == 1) {
                return 'Research';
            } else {
                if($this->isscientific == 2) {
                    return 'Graduate';
                }
            }
        }
    }
    
    public function getRefid() {
        return $this->refid;
    }
    
    public function setRefid($refid) {
        $this->refid = $refid;
    }
    
    public function getJoinid() {
        return $this->joinid;
    }
    
    public function setJoinid($joinid) {
        $this->joinid = $joinid;
    }
    
    public function getIsscientific() {
        return $this->isscientific;
    }
    
    public function setIsscientific($isscientific) {
        $this->isscientific = $isscientific;
    }
    
    public function getFulltexten() {
        return $this->fulltexten;
    }
    
    public function setFulltexten($fulltexten) {
        $this->fulltexten = $fulltexten;
    }
    
    public function getShorttexten() {
        return $this->shorttexten;
    }
    
    public function setShorttexten($shorttexten) {
        $this->shorttexten = $shorttexten;
    }
    
    public function getRealyear() {
        return $this->realyear;
    }
    
    public function setRealyear($realyear) {
        $this->realyear = $realyear;
    }
    
    public function getGroups() {
        return $this->groups;
    }
    
    public function setGroups($groups) {
        $this->groups = $groups;
    }
    
    public function getFile() {
        return $this->file;
    }
    
    public function setFile($file) {
        $this->file = $file;
    }
    
    public function getBreaking() {
        return $this->breaking;
    }
    
    public function setBreaking($breaking) {
        $this->breaking = $breaking;
    }
    
    public function getFeatured() {
        return $this->featured;
    }
    
    public function setFeatured($featured) {
        $this->featured = $featured;
    }
    
    public function getPubdate() {
        return $this->pubdate;
    }
    
    public function setPubdate($pubdate) {
        $this->pubdate = $pubdate;
    }
    
    public function getCrdate() {
        return $this->crdate;
    }
    
    public function setCrdate($crdate) {
        $this->crdate = $crdate;
    }
    
    public function getAuthor() {
        return $this->author;
    }
    
    public function setAuthor($author) {
        $this->author = $author;
    }
    
    public function getPid() {
        return $this->pid;
    }
    
    public function setPid($pid) {
        $this->pid = $pid;
    }
    
    public function getTitle() {
        return $this->title;
    }
    
    public function setTitle($title) {
        $this->title = $title;
    }
    
    public function getImage() {
        if($this->image == 'fileadmin/user_upload/tx_attoworld/News/Pictures/') {
            $this->image = '';
        }
        
        $fileName = $_SERVER['DOCUMENT_ROOT'].'/'.$this->image;
        if(!file_exists($fileName)) {
            $this->image = '';
        }
        
        return $this->image;
    }
    
    public function setImage($image) {
        $this->image = $image;
    }
    
    public function getPressrelease() {
        return $this->pressrelease;
    }
    
    public function setPressrelease($pressrelease) {
        $this->pressrelease = $pressrelease;
    }
    
    public function getBodytext() {
        return $this->bodytext;
    }
    
    public function setBodytext($bodytext) {
        $this->bodytext = $bodytext;
    }
    
    public function getContacts() {
        return $this->contacts;
    }
    
    public function setContacts($contacts) {
        $this->contacts = $contacts;
    }
    
    public function getPublinktext() {
        return $this->publinktext;
    }
    
    public function setPublinktext($publinktext) {
        $this->publinktext = $publinktext;
    }

    public function getPendant() {
        $oM = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance('TYPO3\\CMS\\Extbase\\Object\\ObjectManager');
        $nR = $oM->get('Ferenckrausz\Attoworld\Domain\Repository\NewsRepository');
        
        $n = $nR->findByJoinid($this->refid);
        
        if($n->count() == 1) {
            return $n->current();
        } else {
            return null;
        }
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