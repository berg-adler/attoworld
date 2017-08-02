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
 * Videos
 */
class Videos extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
{

    /** 
    * @var string
    */
    protected $title;
    
    /** 
    * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Ferenckrausz\Attoworld\Domain\Model\Videocategory>
    */
    protected $videocategory;
   
    /** 
    * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Ferenckrausz\Attoworld\Domain\Model\Mediathekcategory>
    */
    protected $mediathekcategory;
    
    /** 
    * @var string
    */
    protected $image;
    
    /** 
    * @var string
    */
    protected $image21zu9;
    
    /** 
    * @var string
    */
    protected $videomp4mobile;	
    
    /** 
    * @var string
    */
    protected $videomp4sd;	
    
    /** 
    * @var string
    */
    protected $videomp4hd;	

    /** 
    * @var string
    */
    protected $videowebmmobile;	
    
    /** 
    * @var string
    */
    protected $videowebmsd;
    
    /** 
    * @var string
    */
    protected $videowebmhd;
    
    /** 
    * @var string
    */
    protected $videoogvmobile;
    
    /** 
    * @var string
    */
    protected $videoogvsd;
    
    /** 
    * @var string
    */
    protected $videoogvhd;
    
    /** 
    * @var string
    */
    protected $keywords;
    
    /** 
    * @var int
    */
    protected $crdate;
    
    /** 
    * @var string
    */
    protected $description;
    
    
    public function getCrdate() {
        return $this->crdate;
    }

    public function getTitle() {
        return $this->title;
    }
    
    public function getImage() {
        return $this->image;
    }
    
    public function getImage21zu9() {
        return $this->image21zu9;
    }
        
    public function getVideowebmmobile() {
        return $this->videowebmmobile;
    }
    
    public function getVideowebmsd() {
        return $this->videowebmsd;
    }
    
    public function getVideowebmhd() {
        return $this->videowebmhd;
    }

    public function getVideomp4mobile() {
        return $this->videomp4mobile;
    }
    
    public function getVideomp4sd() {
        return $this->videomp4sd;
    }
    
    public function getVideomp4hd() {
        return $this->videomp4hd;
    }
    
    public function getVideoogvmobile() {
        return $this->videoogvmobile;
    }
    
    public function getVideoogvsd() {
        return $this->videoogvsd;
    }
    
    public function getVideoogvhd() {
        return $this->videoogvhd;
    }
    
    public function getKeywords() {
        return $this->keywords;
    }
    
    public function getDescription() {
        return $this->description;
    }
    
    public function getVideocategory() {
        return $this->videocategory;
    }
    
    public function getMediathekcategory() {
        return $this->mediathekcategory;
    }
    
    
    public function setCrdate($crdate) {
        $this->crdate = $crdate;
    }
    
    public function setTitle($title) {
        $this->title = $title;
    }
        
    public function setImage($image) {
        $this->image = $image;
    }
    
    public function setImage21zu9($image21zu9) {
        $this->image21zu9 = $image21zu9;
    }
        
    public function setVideowebmmobile($videowebmmobile) {
        $this->videowebmmobile = $videowebmmobile;
    }
    
    public function setVideowebmsd($videowebmsd) {
        $this->videowebmsd = $videowebmsd;
    }
    
    public function setVideowebmhd($videowebmhd) {
        $this->videowebmhd = $videowebmhd;
    }

    public function setVideomp4mobile($videomp4mobile) {
        $this->videomp4mobile = $videomp4mobile;
    }
    
    public function setVideomp4sd($videomp4sd) {
        $this->videomp4sd = $videomp4sd;
    }
    
    public function setVideomp4hd($videomp4hd) {
        $this->videomp4hd = $videomp4hd;
    }
    
    public function setVideoogvmobile($videoogvmobile) {
        $this->videoogvmobile = $videoogvmobile;
    }
    
    public function setVideoogvsd($videoogvsd) {
        $this->videoogvsd = $videoogvsd;
    }
    
    public function setVideoogvhd($videoogvhd) {
        $this->videoogvhd = $videoogvhd;
    }
    
    public function setKeywords($keywords) {
        $this->keywords = $keywords;
    }
    
    public function setDescription($description) {
        $this->description = $description;
    }
    
    public function setVideocategory($videocategory) {
        $this->videocategory = $videocategory;
    }
    
    public function setMediathekcategory($mediathekcategory) {
        $this->mediathekcategory = $mediathekcategory;
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