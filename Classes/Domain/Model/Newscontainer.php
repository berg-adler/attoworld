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
class Newscontainer extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
{

    /** 
    * @var int
    */
    protected $pid;
    
    
    /** 
    * @var int
    */
    protected $isbreaking;
    
    
    /** 
    * @var int
    */
    protected $crdate;
    
    
    /** 
    * @var string
    */
    protected $title;
    
    /** 
    * @var string
    */
    protected $image;
    
    /**  
    * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Ferenckrausz\Attoworld\Domain\Model\Pressrelease>
    */
    protected $pressrelease;
    
    /**
    * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Ferenckrausz\Attoworld\Domain\Model\News>
    */
    protected $news;
    
    /**
    * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Ferenckrausz\Attoworld\Domain\Model\Jobs>
    */
    protected $job;
    
    
    public function getCrdate() {
        return $this->crdate;
    }
    
    public function setCrdate($crdate) {
        $this->crdate = $crdate;
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
    
    public function getNews() {
        return $this->news;
    }
    
    public function setNews($news) {
        $this->news = $news;
    }
    
    public function getJob() {
        return $this->job;
    }
    
    public function setJob($job) {
        $this->job = $job;
    }
    
    public function getIsbreaking() {
        return $this->isbreaking;
    }
    
    public function setIsbreaking($isbreaking) {
        $this->isbreaking = $isbreaking;
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