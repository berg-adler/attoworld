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
 * Person
 */
class Person extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
{

    /** 
    * @var int
    */
    protected $uid;
    
    /** 
    * @var string
    */
    protected $surname;
    
    /** 
    * @var string
    */
    protected $forename;
    
    /** 
    * @var string
    */
    protected $title;
    
    /** 
    * @var string
    */
    protected $gender;
    
    /** 
    * @var string
    */
    protected $image;
    
    /** 
    * @var string
    */
    protected $curriculumvitae;
    
    /** 
    * @var string
    */
    protected $publicationsbefore;
    
    /** 
    * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Ferenckrausz\Attoworld\Domain\Model\Personaddress>
    */
    protected $address;
    
    /** 
    * @var int
    */
    protected $member;
    
    /** 
    * @var int
    */
    protected $onwebpage;
    
    /** 
    * @var int
    */
    protected $isgroupleader;
    
    /** 
    * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Ferenckrausz\Attoworld\Domain\Model\Personsubgroup>
    */
    protected $subgroup;
    
    /** 
    * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Ferenckrausz\Attoworld\Domain\Model\Personcategory>
    */
    protected $category;
    
    /** 
    * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Ferenckrausz\Attoworld\Domain\Model\Nation>
    */
    protected $nation;
    
    /** 
    * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Ferenckrausz\Attoworld\Domain\Model\Publication>
    */
    protected $publications;
    
    /** 
    * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Ferenckrausz\Attoworld\Domain\Model\Personposition>
    */
    protected $position;
    
    /** 
    * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Ferenckrausz\Attoworld\Domain\Model\Person>
    */
    protected $contact;
    
    /** 
    * @var string
    */
    protected $researchtext;
    
    /** 
    * @var string
    */
    protected $projecttext;
    
    /** 
    * @var string
    */
    protected $description;
    
    
    public function getDescription() {
        return $this->description;
    }
    
    public function setDescription($description) {
        $this->description = $description;
    }
    
    public function getProjecttext() {
        return $this->projecttext;
    }
    
    public function setProjecttext($projecttext) {
        $this->projecttext = $projecttext;
    }
    
    public function getResearchtext() {
        return $this->researchtext;
    }
    
    public function setResearchtext($researchtext) {
        $this->researchtext = $researchtext;
    }
    
    public function getPosition() {
        return $this->position;
    }
    
    public function setPosition($position) {
        $this->position = $position;
    }
    
    public function getAddress() {
        return $this->address;
    }
    
    public function setAddress($address) {
        $this->address = $address;
    }
    
    public function getPublicationsbefore() {
        return $this->publicationsbefore;
    }
    
    public function setPublicationsbefore($publicationsbefore) {
        $this->publicationsbefore = $publicationsbefore;
    }
    
    public function getCurriculumvitae() {
        return $this->curriculumvitae;
    }
    
    public function setCurriculumvitae($curriculumvitae) {
        $this->curriculumvitae = $curriculumvitae;
    }
    
    public function setIsgroupleader($isgroupleader) {
        $this->isgroupleader = $isgroupleader;
    }
    
    public function getIsgroupleader() {
        return $this->isgroupleader;
    }
    
    public function getUid() {
        return $this->uid;
    }
    
    public function setUid($uid) {
        $this->uid = $uid;
    }
    
    public function getImage() {
        $image = $this->image;
        
        // Schattenkopf einbauen, falls Bild im Dateisystem nicht vorhanden
        if(!file_exists($_SERVER['DOCUMENT_ROOT'].'/'.$image) || $image == '') {
            if($this->getGender() == 'male') {
                $image = $_SERVER['DOCUMENT_ROOT'].'/typo3conf/ext/attoworld/Resources/Public/images/AvatarMale.svg';
            } else {
                $image = $_SERVER['DOCUMENT_ROOT'].'/typo3conf/ext/attoworld/Resources/Public/images/AvatarFemale.svg';
            }
        }
        
        return $image;
    }
    
    public function setImage($image) {
        $this->image = $image;
    }
    
    public function getForename() {
        return $this->forename;
    }
    
    public function setForename($forename) {
        $this->forename = $forename;
    }
    
    public function getSurname() {
        return $this->surname;
    }
    
    public function setSurname($surname) {
        $this->surname = $surname;
    }
    
    public function getTitle() {
        return $this->title;
    }
    
    public function setTitle($title) {
        $this->title = $title;
    }
    
    public function getGender() {
        return $this->gender;
    }
    
    public function setGender($gender) {
        $this->gender = $gender;
    }
    
    public function getMember() {
        return $this->member;
    }
    
    public function setMember($member) {
        $this->member = $member;
    }
    
    public function getOnwebpage() {
        return $this->onwebpage;
    }
    
    public function setOnwebpage($onwebpage) {
        $this->onwebpage = $onwebpage;
    }
    
    public function getSubgroup() {
        return $this->subgroup;
    }
    
    public function setSubgroup($subgroup) {
        $this->subgroup = $subgroup;
    }
    
    public function getCategory() {
        return $this->category;
    }
    
    public function setCategory($category) {
        $this->category = $category;
    }
    
    public function getNation() {
        return $this->nation;
    }
    
    public function setNation($nation) {
        $this->nation = $nation;
    }
    
    public function getContact() {
        return $this->contact;
    }
    
    public function setContact($contact) {
        $this->contact = $contact;
    }
    
    public function getPublications() {
        return $this->publications;
    }
    
    public function setPublications($publications) {
        $this->publications = $publications;
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