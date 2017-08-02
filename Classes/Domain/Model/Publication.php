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
 * Publication
 */
class Publication extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
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
    protected $url;
    
    /** 
    * @var string
    */
    protected $linkurl;
    
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
    protected $description;
    
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
    * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Ferenckrausz\Attoworld\Domain\Model\Publication>
    */
    protected $publications;
       
    /**  
    * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Ferenckrausz\Attoworld\Domain\Model\Location>
    */
    protected $locations;
     
    
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
    * @var string
    */
    protected $doi;
    
    /** 
    * @var string
    */
    protected $editors;
    
    /** 
    * @var int
    */
    protected $pubtstamp;
    
    /** 
    * @var int
    */
    protected $showinpubfilter;
    
    
    
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
    
    public function getResource() {
        $url = $this->url;
        $file = $this->file;
        
        if($file == 'fileadmin/user_upload/tx_attoworld/publications/') {
            $file = '';
        }
        
        $timestamp = $this->pubtstamp;
        
        $resource = null;
        
        $timeStamp = time();
        $sixMonthInSeconds = 15778463;

        $timeStampToCompair = $timestamp + $sixMonthInSeconds;
        
        // Auf Journal prüfen
        if ($this->journal == 'Science' ||
            $this->journals == 'Nature' ||
            $this->journals == 'Nature Communications' ||
            $this->journal == 'Nature Middle East' ||
            $this->journal == 'NatureMilestonesPhotons' ||
            $this->journal == 'Nature.com' ||
            $this->journal == 'Nature Physics' ||
            $this->journal == 'Nature Photonics' ||
            $this->journal == 'Nature photonics technology focus') {

            // Auf Timestamp prüfen
            if (intval($timeStampToCompair) > $timeStamp) {
                $resource = $url;
            } else {
                if($file !== '') {
                    $resource = $file;
                } else {
                    $resource = $url;
                }
            }
        } else {
            if ($file == '' && $url !== '') {
                $resource = $url;
            } else {
                if($file !== '') {
                    $resource = $file;
                }
            }
        }
        
        return $resource;
    }
    
    public function getEditors() {
        return $this->editors;
    }
    
    public function setEditors($editors) {
        $this->editors = $editors;
    }
    
    public function getLocations() {
        return $this->locations;
    }
    
    public function setLocations($locations) {
        $this->locations = $locations;
    }
    
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
    
    public function getShowinpubfilter() {
        return $this->showinpubfilter;
    }
    
    public function setShowinpubfilter($showinpubfilter) {
        $this->showinpubfilter = $showinpubfilter;
    }
    
    public function getUrl() {
        return $this->url;
    }
    
    public function setUrl($url) {
        $this->url = $url;
    }
    
    public function getDoi() {
        return $this->doi;
    }
    
    public function setDoi($doi) {
        $this->doi = $doi;
    }
    
    public function getPubtstamp() {
        return $this->pubtstamp;
    }
    
    public function setPubtstamp($pubtstamp) {
        $this->pubtstamp = $pubtstamp;
    }
    
    public function getPicture() {
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
    
    private function makepub($repository, $uid) {
        $array = array();
        $rootpath = realpath(dirname(__FILE__)) . '/../../../../../..';

        $tps = $repository->findAll(false);

        $i = 0;
        foreach($tps as $tp) {
            $sps = $tp->getPublications();
            
            if($sps->count() > 0) {
                
                foreach ($sps as $k => $sp) {

                    if($sp->getUid() == $uid) {
                        $fileName = $rootpath . '/' . $tp->getFile();
                        
                        if(file_exists($fileName)) {
                            $array[$i]['title'] = $tp->getTitle();
                            $array[$i]['file'] = $tp->getFile();
                            
                            $oM = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance('TYPO3\\CMS\\Extbase\\Object\\ObjectManager');
                            $ppR = $oM->get('Ferenckrausz\Attoworlddata\Domain\Repository\PubpublicationsRepository');
                            $pprtR = $oM->get('Ferenckrausz\Attoworlddata\Domain\Repository\PubpublicationsreferstopubRepository');
                            $prtR = $oM->get('Ferenckrausz\Attoworlddata\Domain\Repository\PubreferencetypeRepository');
                            
                            $RS = $ppR->findAll();
                            $pub = null;
                            foreach($RS as $h) {
                                if($h->getTitle() == $tp->getTitle()) {
                                    $pub = $h;
                                }
                            }
                            
                            if(!empty($pub)) {
                                $RS = $pprtR->findAll();
                                $ref = null;
                                foreach($RS as $h) {
                                    if($h->getPublication() == $pub->getId()) {
                                        $ref = $h;
                                    }
                                }

                                $RS = $prtR->findAll();
                                $type = null;
                                
                                if($ref !== null) {
                                    foreach($RS as $h) {
                                        if($h->getId() == $ref->getReferencetype()) {
                                            $type = $h;
                                        }
                                    }


                                    $array[$i]['type'] = $type->getNameen();
                                } else {
                                    $array[$i]['type'] = $tp->getType();
                                }
                            } else {
                                $array[$i]['type'] = $tp->getType();
                            }
                            
                            $array[$i]['uid'] = $tp->getUid();
                            
                            $i++;
                        }
                    }
                    
                }
            }
        }

        return $array;
    }
    
    public function getAdditionalpublications() {
        
        $oM = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance('TYPO3\\CMS\\Extbase\\Object\\ObjectManager');
        
        $pR = $oM->get('Ferenckrausz\Attoworld\Domain\Repository\PublicationRepository');
        $prR = $oM->get('Ferenckrausz\Attoworld\Domain\Repository\PressreleaseRepository');
        $npR = $oM->get('Ferenckrausz\Attoworld\Domain\Repository\NewspaperRepository');
        $mR = $oM->get('Ferenckrausz\Attoworld\Domain\Repository\MagazinRepository');
        
        $array = array();
        
        $array = array_merge($array, $this->makepub($pR, $this->getUid()));
        $array = array_merge($array, $this->makepub($prR, $this->getUid()));
        $array = array_merge($array, $this->makepub($npR, $this->getUid()));
        $array = array_merge($array, $this->makepub($mR, $this->getUid()));
        
        return $array;
        
    }

}