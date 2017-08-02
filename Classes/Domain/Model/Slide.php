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
 * Slide
 */
class Slide extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
{

    /** 
    * @var string
    */
    protected $image;
    
    /** 
    * @var string
    */
    protected $shorttitle;
    
    /** 
    * @var string
    */
    protected $title;
    
    /** 
    * @var string
    */
    protected $titleinpicture;
    
    /** 
    * @var int
    */
    protected $pid;
    
    /** 
    * @var int
    */
    protected $pagepid;
    
    /** 
    * @var string
    */
    protected $anchor;
    
    /** 
    * @var int
    */
    protected $active;
    
    /** 
    * @var int
    */
    protected $type;
    
    /** 
    * @var int
    */
    protected $newsid;
    
    public function getNewsid() {
        return $this->newsid;
    }
    
    public function setNewsid($newsid) {
        $this->newsid = $newsid;
    }
    
    public function getTitleinpicture() {
        return $this->titleinpicture;
    }
    
    public function setTitleinpicture($titleinpicture) {
        $this->titleinpicture = $titleinpicture;
    }
    
    public function getType() {
        return $this->type;
    }
    
    public function setType($type) {
        $this->type = $type;
    }
    
    public function getImage() {
        return $this->image;
    }
    
    public function setImage($image) {
        $this->image = $image;
    }
    
    public function getPagepid() {
        return $this->pagepid;
    }
    
    public function setPagepid($pagepid) {
        $this->$pagepid = $pagepid;
    }
    
    public function getAnchor() {
        return $this->anchor;
    }
    
    public function setAnchor($anchor) {
        $this->anchor = $anchor;
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
    
    public function getShorttitle() {
        return $this->shorttitle;
    }
    
    public function setShorttitle($shorttitle) {
        $this->shorttitle = $shorttitle;
    }
    
    public function getActive() {
        return $this->active;
    }
    
    public function setActive($active) {
        $this->active = $active;
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