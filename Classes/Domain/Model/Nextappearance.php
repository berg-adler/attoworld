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
 * Nextappearance
 */
class Nextappearance extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
{

    /** 
    * @var int
    */
    protected $pid;
    
    /** 
    * @var string
    */
    protected $title;
    
    /** 
    * @var string
    */
    protected $subtitle;
    
    /** 
    * @var string
    */
    protected $organizer;
    
    /** 
    * @var string
    */
    protected $elementtitle;
    
    /** 
    * @var string
    */
    protected $description;
    
    /** 
    * @var string
    */
    protected $time;
    
    /** 
    * @var string
    */
    protected $location;
    
    /** 
    * @var string
    */
    protected $link;
    
    /** 
    * @var string
    */
    protected $image;
    
    
    public function getLink() {
        return $this->link;
    }
    
    public function setLink($link) {
        $this->link = $link;
    }
    
    public function getImage() {
        return $this->image;
    }
    
    public function setImage($image) {
        $this->image = $image;
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
    
    public function getSubtitle() {
        return $this->subtitle;
    }
    
    public function setSubtitle($subtitle) {
        $this->subtitle = $subtitle;
    }
    
    public function getOrganizer() {
        return $this->organizer;
    }
    
    public function setOrganizer($organizer) {
        $this->organizer = $organizer;
    }
    
    public function getElementtitle() {
        return $this->elementtitle;
    }
    
    public function setElementtitle($elementtitle) {
        $this->elementtitle = $elementtitle;
    }
    
    public function getDescription() {
        return $this->description;
    }
    
    public function setDescription($description) {
        $this->description = $description;
    }
    
    public function getTime() {
        return $this->time;
    }
    
    public function setTime($time) {
        $this->time = $time;
    }
    
    public function getLocation() {
        return $this->location;
    }
    
    public function setLocation($location) {
        $this->location = $location;
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