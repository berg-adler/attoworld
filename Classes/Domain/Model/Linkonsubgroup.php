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
 * Linkonsubgroup
 */
class Linkonsubgroup extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
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
    protected $leader;
    
    /** 
    * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Ferenckrausz\Attoworld\Domain\Model\Person>
    */
    protected $leaderj;
    
    
    /** 
    * @var string
    */
    protected $image;
    
    /** 
    * @var string
    */
    protected $bodytext;
    
    /** 
    * @var int
    */
    protected $pageid;
    
    /** 
    * @var int
    */
    protected $type;
    
    /** 
    * @var string
    */
    protected $uri;
    
    /** 
    * @var string
    */
    protected $pageidanchor;
    
    public function getPageidanchor() {
        return $this->pageidanchor;
    }
    
    public function setPageidanchor($pageidanchor) {
        $this->pageidanchor = $pageidanchor;
    }
    
    public function getPid() {
        return $this->pid;
    }
    
    public function setPid($pid) {
        $this->pid = $pid;
    }
    
    public function getLeader() {
        return $this->leader;
    }
    
    public function setLeader($leader) {
        $this->leader = $leader;
    }
    
    public function getLeaderj() {
        return $this->leaderj;
    }
    
    public function setLeaderj($leaderj) {
        $this->leaderj = $leaderj;
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
    
    public function getBodytext() {
        return $this->bodytext;
    }
    
    public function setBodytext($bodytext) {
        $this->bodytext = $bodytext;
    }
    
    public function getPageid() {
        return $this->pageid;
    }
    
    public function setPageid($pageid) {
        $this->pageid = $pageid;
    }
    
    public function getType() {
        return $this->type;
    }
    
    public function setType($type) {
        $this->type = $type;
    }
    
    public function getUri() {
        return $this->uri;
    }
    
    public function setUri($uri) {
        $this->uri = $uri;
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