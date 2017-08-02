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
 * Filterelement
 */
class Filterelement extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
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
    protected $image;
    
    /** 
    * @var string
    */
    protected $size;
    
    /** 
    * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Ferenckrausz\Attoworld\Domain\Model\Jobs>
    */
    protected $linkjobs;
    
    /** 
    * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Ferenckrausz\Attoworld\Domain\Model\News>
    */
    protected $linknews;
    
    /** 
    * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Ferenckrausz\Attoworld\Domain\Model\Nextappearance>
    */
    protected $linknextappearance;
    
    /*
    * @var string
    */
    protected $linkextern;
    
    /*
    * @var string
    */
    protected $oneliner;

    /** 
    * @var int
    */
    protected $pageid;
    
    /** 
    * @var int
    */
    protected $linkreference;
    
    /** 
    * @var string
    */
    protected $anchor;
    
    public function getAnchor() {
        return $this->anchor;
    }
    
    public function setAnchor($anchor) {
        $this->anchor = $anchor;
    }
    
    public function getLinkreference() {
        return $this->linkreference;
    }
    
    public function setLinkreference($linkreference) {
        $this->$linkreference = $linkreference;
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
    
    public function getImage() {
        return $this->image;
    }
    
    public function setImage($image) {
        $this->image = $image;
    }
    
    public function getSize() {
        return $this->size;
    }
    
    public function setSize($size) {
        $this->size = $size;
    }
    
    
    public function getLinknews() {
        return $this->linknews;
    }
    
    public function setLinknews($linknews) {
        $this->linknews = $linknews;
    }
    
    public function getLinkjobs() {
        return $this->linkjobs;
    }
    
    public function setLinkjobs($linkjobs) {
        $this->linkjobs = $linkjobs;
    }
    
    public function getLinkextern() {
        return $this->linkextern;
    }
    
    public function setLinkextern($linkextern) {
        $this->linkextern = $linkextern;
    }
    
    public function getLinknextappearance() {
        return $this->linknextappearance;
    }
    
    public function setLinknextappearance($linknextappearance) {
        $this->linknextappearance = $linknextappearance;
    }

    public function getPageid() {
        return $this->pageid;
    }
    
    public function setPageid($pageid) {
        $this->pageid = $pageid;
    }
    
    public function getOneliner() {
        return $this->oneliner;
    }
    
    public function setOneliner($oneliner) {
        $this->oneliner = $oneliner;
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