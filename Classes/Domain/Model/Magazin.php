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
 * Magazin
 */
class Magazin extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
{

    /** 
    * @var int
    */
    protected $uid;
    
    /** 
    * @var int
    */
    protected $featured;
    
    /** 
    * @var int
    */
    protected $crdate;
    
    /** 
    * @var string
    */
    protected $pubdate;
    
    /** 
    * @var string
    */
    protected $title;
    
    /** 
    * @var string
    */
    protected $type;
    
    /** 
    * @var string
    */
    protected $file;
    
    
    /** 
    * @var string
    */
    protected $journal;
    
    /** 
    * @var string
    */
    protected $pageref;
    
    /** 
    * @var string
    */
    protected $volume;
    
    
    /** 
    * @var string
    */
    protected $description;
    
    /**  
    * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Ferenckrausz\Attoworld\Domain\Model\Publication>
    */
    protected $publications;
        
    /** 
    * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Ferenckrausz\Attoworld\Domain\Model\Person>
    */
    protected $authors;
    
    /**  
    * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Ferenckrausz\Attoworld\Domain\Model\Publicationcategory>
    */
    protected $publicationcategory;
    
    /** 
    * @var string
    */
    protected $picture;
    
    /** 
    * @var int
    */
    protected $pubtstamp;
    
    
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
    
    public function getPubtstamp() {
        return $this->pubtstamp;
    }
    
    public function setPubtstamp($pubtstamp) {
        $this->pubtstamp = $pubtstamp;
    }
    
    public function getPicture() {
        $fileName = $this->picture;
        $fileNameWithServer = $_SERVER['DOCUMENT_ROOT'].'/'.$this->picture;
        $orgFileName = $fileName;
        
        $newFileName = '';
        if(!file_exists($fileNameWithServer)) {
            $newFileNameWithServer = substr($fileNameWithServer, 0, strrpos($fileNameWithServer,'.')).'.png';
            $newFileName = substr($fileName, 0, strrpos($fileName,'.')).'.png';
            
            if(!file_exists($newFileNameWithServer)) {
                $newFileNameWithServer = substr($fileNameWithServer, 0, strrpos($fileNameWithServer,'.')).'.svg';
                $newFileName = substr($fileName, 0, strrpos($fileName,'.')).'.svg';
                
                if(!file_exists($newFileNameWithServer)) {
                    $newFileNameWithServer = substr($fileNameWithServer, 0, strrpos($fileNameWithServer,'.')).'.jpg';
                    $newFileName = substr($fileName, 0, strrpos($fileName,'.')).'.jpg';

                    if(!file_exists($newFileNameWithServer)) {
                        $orgFileName = str_replace('/logos/','/logos_old/',$orgFileName);
                        $newFileName = $orgFileName;
                    }
                }
            }
        } else {
            // Übernehme was offiziell verknüpft ist
            
            $newFileName = $fileName;
        }
        
        $this->picture = $newFileName;
        return $this->picture;
    }
    
    public function setPicture($picture) {
        $this->picture = $picture;
    }
    
    
    public function getUid() {
        return $this->uid;
    }
    
    public function setUid($uid) {
        $this->uid = $uid;
    }
    
    public function getPubdate() {
        return $this->pubdate;
    }
    
    public function setPubdate($pubdate) {
        $this->pubdate = $pubdate;
    }
    
    public function getTitle() {
        return $this->title;
    }
    
    public function setTitle($title) {
        $this->title = $title;
    }
    
    public function getType() {
        return $this->type;
    }
    
    public function setType($type) {
        $this->type = $type;
    }
    
    public function getDescription() {
        return $this->description;
    }
    
    public function setDescription($description) {
        $this->description = $description;
    }
    
    public function getPublicationcategory() {
        return $this->publicationcategory;
    }
    
    public function setPublicationcategory($publicationcategory) {
        $this->publicationcategory = $publicationcategory;
    }
    
    public function getAuthors() {
        return $this->authors;
    }
    
    public function setAuthors($authors) {
        $this->authors = $authors;
    }
    
    public function getPublications() {
        return $this->publications;
    }
    
    public function setPublications($publications) {
        $this->publications = $publications;
    }
    
    public function getFeatured() {
        return $this->featured;
    }
    
    public function setFeatured($featured) {
        $this->featured = $featured;
    }
    
    public function getCrdate() {
        return $this->crdate;
    }
    
    public function setCrdate($crdate) {
        $this->crdate = $crdate;
    }
    
    public function getFile() {
        return $this->file;
    }
    
    public function setFile($file) {
        $this->file = $file;
    }
    
    public function getPageref() {
        return $this->pageref;
    }
    
    public function setPageref($pageref) {
        $this->pageref = $pageref;
    }
    
    public function getVolume() {
        return $this->volume;
    }
    
    public function setVolume($volume) {
        $this->volume = $volume;
    }
    
    public function getJournal() {
        return $this->journal;
    }
    
    public function setJournal($journal) {
        $this->journal = $journal;
    }
    
    public function toArray() {
        $array = array();
        
        foreach(get_class_methods($this) as $key => $value) {
            $array[$key] = $this->{$value}();
        }
        return $array;
    }

}