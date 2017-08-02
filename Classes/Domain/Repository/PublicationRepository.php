<?php
namespace Ferenckrausz\Attoworld\Domain\Repository;

	/***************************************************************
	 *  Copyright notice
	 *
	 *  (c) 2012 Marc Hirdes <Marc_Hirdes@gmx.de>, clickstorm GmbH
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
 *
 *
 * @package attoworld
 * @license http://www.gnu.org/licenses/gpl.html GNU General Public License, version 3 or later
 *
 */
class PublicationRepository extends \TYPO3\CMS\Extbase\Persistence\Repository {
    
    protected $defaultOrderings = array(
        'pubtstamp' => \TYPO3\CMS\Extbase\Persistence\QueryInterface::ORDER_DESCENDING,
    );

    
    /**
     * Git alle Datensätze des Repositories zurück
     * 
     * @return object
     */
    public function findAll($showinpubfilter = true) {
        $query = $this->createQuery();
        $constraintsPubs = array(
            $query->equals('type', 'paper'),
            $query->equals('type', 'paper_diploma'),
            $query->equals('type', 'paper_phd'),
            $query->equals('type', 'thesis_bachelor'),
            $query->equals('type', 'thesis_diploma'),
            $query->equals('type', 'thesis_master'),
            $query->equals('type', 'thesis_phd'),
            $query->equals('type', 'book'),
            $query->equals('type', 'bookarticle'),
        );
        
        if($showinpubfilter === true) {
            $query->getQuerySettings()->setRespectStoragePage(FALSE);
            $query->matching(
                $query->logicalAND(
                    $query->logicalOR(
                        $constraintsPubs
                    ),
                    $query->equals('sys_language_uid', $GLOBALS['TSFE']->sys_language_uid),
                    $query->equals('hidden', 0),
                    $query->equals('deleted', 0),
                    $query->equals('showinpubfilter', 1)
                )
            );

            return $query->execute();
        } else {
            $query->getQuerySettings()->setRespectStoragePage(FALSE);
            $query->matching(
                $query->logicalAND(
                    $query->logicalOR(
                        $constraintsPubs
                    ),
                    $query->equals('sys_language_uid', $GLOBALS['TSFE']->sys_language_uid),
                    $query->equals('hidden', 0),
                    $query->equals('deleted', 0)
                )
            );

            return $query->execute();
        }
        
    }
    
    
    /**
     * Git alle Datensätze des Repositories anhand der übergebenen Autoren zurück
     * 
     * @return object
     */
    public function findByAuthors($uid, $start = 0, $length = 50) {
        $query = $this->createQuery();
        $constraintsPubs = array(
            $query->equals('type', 'paper'),
            $query->equals('type', 'paper_diploma'),
            $query->equals('type', 'paper_phd'),
            $query->equals('type', 'thesis_bachelor'),
            $query->equals('type', 'thesis_diploma'),
            $query->equals('type', 'thesis_master'),
            $query->equals('type', 'thesis_phd'),
            $query->equals('type', 'book'),
            $query->equals('type', 'bookarticle'),
        );
        
        $constraints = array();
        if(is_array($uid)) {
            foreach($uid as $u) {
                $constraints[] = $query->contains('authors', $u);
            }
        } else {
            $constraints[] = $query->contains('authors', $uid);
        }  

        $query->setOrderings (Array('pubtstamp' => \TYPO3\CMS\Extbase\Persistence\QueryInterface::ORDER_DESCENDING));
        $query->getQuerySettings()->setRespectStoragePage(FALSE);
        $query->matching(
            $query->logicalAND(
                $query->logicalOR(
                    $constraintsPubs
                ),
                $query->logicalOr(
                    $constraints
                ),
                $query->equals('hidden', 0),
                $query->equals('deleted', 0)
            )
        );

        $query->setOffset($start);
        $query->setLimit($length);
        
        $rs = $query->execute();
        
        return $rs;
    }
    
    /**
     * Git alle Datensätze des Repositories zurück, welche als Featured gekennzeichnet sind
     * 
     * @return object
     */
    public function findFeatured($start = 0, $length = 50) {
        $query = $this->createQuery();
        $constraintsPubs = array(
            $query->equals('type', 'paper'),
            $query->equals('type', 'paper_diploma'),
            $query->equals('type', 'paper_phd'),
            $query->equals('type', 'thesis_bachelor'),
            $query->equals('type', 'thesis_diploma'),
            $query->equals('type', 'thesis_master'),
            $query->equals('type', 'thesis_phd'),
            $query->equals('type', 'book'),
            $query->equals('type', 'bookarticle'),
        );
        
        $query->setOrderings (Array('pubtstamp' => \TYPO3\CMS\Extbase\Persistence\QueryInterface::ORDER_DESCENDING));
        $query->getQuerySettings()->setRespectStoragePage(FALSE);
        $query->matching(
            $query->logicalAND(
                $query->logicalOr(
                    $constraintsPubs
                ),
                $query->equals('featured', 1),
                $query->equals('sys_language_uid', $GLOBALS['TSFE']->sys_language_uid),
                $query->equals('hidden', 0),
                $query->equals('deleted', 0),
                $query->equals('showinpubfilter', 1)
            )
        );

        $query->setOffset($start);
        $query->setLimit($length);
        
        return $query->execute();
    }
    
    /**
     * Git die letzten Datensätze des Repositories zurück
     * 
     * @return object
     */
    public function findLatest($start = 0, $length = 50) {
        $query = $this->createQuery();
        $constraintsPubs = array(
            $query->equals('type', 'paper'),
            $query->equals('type', 'paper_diploma'),
            $query->equals('type', 'paper_phd'),
            $query->equals('type', 'thesis_bachelor'),
            $query->equals('type', 'thesis_diploma'),
            $query->equals('type', 'thesis_master'),
            $query->equals('type', 'thesis_phd'),
            $query->equals('type', 'book'),
            $query->equals('type', 'bookarticle'),
        );
        
        $query->setOrderings (Array('pubtstamp' => \TYPO3\CMS\Extbase\Persistence\QueryInterface::ORDER_DESCENDING));
        $query->getQuerySettings()->setRespectStoragePage(FALSE);
        $query->matching(
            $query->logicalAND(
                $query->logicalOR(
                    $constraintsPubs
                ),
                $query->equals('sys_language_uid', $GLOBALS['TSFE']->sys_language_uid),
                $query->equals('hidden', 0),
                $query->equals('deleted', 0),
                $query->equals('showinpubfilter', 1)
            )
        );

        
        $query->setOffset($start);
        $query->setLimit($length);
        $query->setOrderings(array("pubtstamp" => \TYPO3\CMS\Extbase\Persistence\QueryInterface::ORDER_DESCENDING));
        
        
        return $query->execute();
    }
    
    /**
     * Git alle Datensätze des Repositories, anhand der übergebenen Kriterien zurück
     * 
     * @return object
     */
    public function findByCriterias($criterias,$start = 0, $length = 50) {
        $query = $this->createQuery();
        $constraintsPubs = array(
            $query->equals('type', 'paper'),
            $query->equals('type', 'paper_diploma'),
            $query->equals('type', 'paper_phd'),
            $query->equals('type', 'thesis_bachelor'),
            $query->equals('type', 'thesis_diploma'),
            $query->equals('type', 'thesis_master'),
            $query->equals('type', 'thesis_phd'),
            $query->equals('type', 'book'),
            $query->equals('type', 'bookarticle'),
        );
        
        /*
        $constraintsProjects = array();
        if(is_array($criterias['projects'])) {
            $pR = $this->objectManager->get('Ferenckrausz\Attoworld\Domain\Repository\ProjectRepository');
            $ps = $pR->findAll();
            
            foreach($criterias['projects'] as $p) {
                $pr = $pR->findByUid($p);
            
                $members = $pr->getMember();
                foreach($members as $m) {
                    $constraintsProjects[] = $query->contains('authors', $m->getUid());
                }
            }
        }
        */
        
        $constraintsProjects = array();
        if(is_array($criterias['projects'])) {
            $pR = $this->objectManager->get('Ferenckrausz\Attoworld\Domain\Repository\ProjectRepository');
            $ps = $pR->findAll();
            
            foreach($criterias['projects'] as $p) {
                $pr = $pR->findByUid($p);
            
                $members = $pr->getMember();
                foreach($members as $m) {
                    $constraintsProjects[] = $query->contains('firstauthor', $m->getUid());
                }
                
                $ls = $pr->getLeaders();
                foreach($ls as $l) {
                    $constraintsProjects[] = $query->contains('lastauthor', $l->getUid());
                    $constraintsProjects[] = $query->contains('sectolastauthor', $l->getUid());
                }
            }
        }
        
        $constraintsAuthor = array();
        if(is_array($criterias['authors'])) {
            foreach($criterias['authors'] as $a) {
                $constraintsAuthor[] = $query->contains('authors', $a);
            }
        } else {
            $constraintsAuthor[] = $query->contains('authors', $a);
        }
        $constraintsYear = array();
        if(is_array($criterias['years'])) {
            foreach($criterias['years'] as $y) {
                $constraintsYear[] = $query->equals('pubdate', $y);
            }
        } else {
            $constraintsYear[] = $query->equals('pubdate', $y);
        }
        
        $constraintsSubjects = array();
        if(is_array($criterias['subjects'])) {
            foreach($criterias['subjects'] as $s) {
                $constraintsSubjects[] = $query->contains('publicationcategory', $s);
            }
        } else {
            $constraintsSubjects[] = $query->contains('publicationcategory', $s);
        }  
        
        $logicalAnd = null;
        if(!empty($constraintsAuthor)) {
            
            if(!empty($constraintsYear)) {
                if(!empty($constraintsSubject)) {
                    
                    if(!empty($constraintsProjects)) {
                        $logicalAnd = $query->logicalAnd(
                            $query->logicalOr(
                                $constraintsAuthor
                            ),
                            $query->logicalOr(
                                $constraintsYear
                            ),
                            $query->logicalOr(
                                $constraintsSubjects
                            ),
                            $query->logicalOr(
                                $constraintsProjects
                            )
                        );
                    } else {
                        $logicalAnd = $query->logicalAnd(
                            $query->logicalOr(
                                $constraintsAuthor
                            ),
                            $query->logicalOr(
                                $constraintsYear
                            ),
                            $query->logicalOr(
                                $constraintsSubjects
                            )
                        );
                    }
                } else {
                    if(!empty($constraintsProjects)) {
                        $logicalAnd = $query->logicalAnd(
                            $query->logicalOr(
                                $constraintsAuthor
                            ),
                            $query->logicalOr(
                                $constraintsYear
                            ),
                            $query->logicalOr(
                                $constraintsProjects
                            )
                        );
                    } else {
                        $logicalAnd = $query->logicalAnd(
                            $query->logicalOr(
                                $constraintsAuthor
                            ),
                            $query->logicalOr(
                                $constraintsYear
                            )
                        );
                    }
                }
            } else {
                if(!empty($constraintsSubject)) {
                    
                    if(!empty($constraintsProjects)) {
                        $logicalAnd = $query->logicalAnd(
                            $query->logicalOr(
                                $constraintsAuthor
                            ),
                            $query->logicalOr(
                                $constraintsSubjects
                            ),
                            $query->logicalOr(
                                $constraintsProjects
                            )
                        );
                    } else {
                        $logicalAnd = $query->logicalAnd(
                            $query->logicalOr(
                                $constraintsAuthor
                            ),
                            $query->logicalOr(
                                $constraintsSubjects
                            )
                        );
                    }
                    
                    
                } else {
                    
                    if(!empty($constraintsProjects)) {
                        $logicalAnd = $query->logicalAnd(
                            $query->logicalOr(
                                $constraintsAuthor
                            ),
                            $query->logicalOr(
                                $constraintsProjects
                            )
                        );
                    } else {
                        $logicalAnd = $query->logicalAnd(
                            $query->logicalOr(
                                $constraintsAuthor
                            )
                        );
                    }
                }
            }
            
        } else {
            if(!empty($constraintsYear)) {
                if(!empty($constraintsSubject)) {
                    
                    if(!empty($constraintsProjects)) {
                    
                        $logicalAnd = $query->logicalAnd(
                            $query->logicalOr(
                                $constraintsYear
                            ),
                            $query->logicalOr(
                                $constraintsSubjects
                            ),
                            $query->logicalOr(
                                $constraintsProjects
                            )
                        );
                        
                    } else {
                        
                        $logicalAnd = $query->logicalAnd(
                            $query->logicalOr(
                                $constraintsYear
                            ),
                            $query->logicalOr(
                                $constraintsSubjects
                            )
                        );
                        
                    }
                } else {
                    
                    if(!empty($constraintsProjects)) {
                        $logicalAnd = $query->logicalAnd(
                            $query->logicalOr(
                                $constraintsYear
                            ),
                            $query->logicalOr(
                                $constraintsProjects
                            )
                        );
                    } else {
                        $logicalAnd = $query->logicalAnd(
                            $query->logicalOr(
                                $constraintsYear
                            )
                        );
                    }
                    
                }
            } else {
                if(!empty($constraintsSubjects)) {
                    
                    if(!empty($constraintsProjects)) {
                        $logicalAnd = $query->logicalAnd(
                            $query->logicalOr(
                                $constraintsSubjects
                            ),
                            $query->logicalOr(
                                $constraintsProjects
                            )
                        );
                    } else {
                        $logicalAnd = $query->logicalAnd(
                            $query->logicalOr(
                                $constraintsSubjects
                            )
                        );
                    }
                } else {
                    
                    if(!empty($constraintsProjects)) {
                        $logicalAnd = $query->logicalAnd(
                            $query->logicalOr(
                                $constraintsProjects
                            )
                        );
                    } else {
                        // Kein Filter gesetzt!
                    }
                    
                    
                }
            }
        }
        
        $query->setOrderings (Array('pubtstamp' => \TYPO3\CMS\Extbase\Persistence\QueryInterface::ORDER_DESCENDING));
        $query->getQuerySettings()->setRespectStoragePage(FALSE);
        $query->matching(
            $query->logicalAnd(
                $query->logicalOR(
                    $constraintsPubs
                ),
                $logicalAnd,
                $query->equals('hidden', 0),
                $query->equals('deleted', 0),
                $query->equals('showinpubfilter', 1)
            )
        );

        $query->setOffset($start);
        $query->setLimit($length);
        
        $rs = $query->execute();
        
        return $rs;
    }
    
    /**
     * Sucht Publikationen anhand von bestimmten Kriterien
     * 
     * Zur Zeit nach Autor und Titel
     * 
     * @param array $criterias
     */
    public function searchByCriterias($criterias, $start = 0, $length = 50) {
        $authors = $criterias['author'];
        $title = $criterias['title'];
     
        $query = $this->createQuery();
        
        $constraintsAuthor = array();
        foreach($authors as $author) {
            $constraintsAuthor[] = $query->contains('authors', $author);
        }
        
        $logicalOr = null;
        if(!empty($author)) {
            if(!empty($title)) {
                $constraintsAuthor[] = $query->like('title', '%'.$title.'%');
                $logicalOr = $query->logicalOr(
                    $constraintsAuthor
                );
            } else {
                $logicalOr = $query->logicalOr(
                    $constraintsAuthor
                );
            }
        } else {
            if(!empty($title)) {
                $logicalOr = $query->logicalOr(
                    $query->like('title', '%'.$title.'%')
                );
            }
        }
        
        $query->setOrderings (Array('pubtstamp' => \TYPO3\CMS\Extbase\Persistence\QueryInterface::ORDER_DESCENDING));
        $query->getQuerySettings()->setRespectStoragePage(FALSE);
        $query->matching(
            $query->logicalAnd(
                $logicalOr,
                
                $query->equals('hidden', 0),
                $query->equals('deleted', 0),
                $query->equals('showinpubfilter', 1)
            )
        );

        $query->setOffset($start);
        $query->setLimit($length);
        
        return $query->execute();
    }
    
    /**
     * Git alle Pressrelease-Datensätze des Repositories zurück
     * 
     * @return object
     */
    public function findPressreleases() {
        $query = $this->createQuery();
        $constraintsPubs = array(
            $query->equals('type', 'pressrelease'),
        );
        
        $query->setOrderings (Array('pubtstamp' => \TYPO3\CMS\Extbase\Persistence\QueryInterface::ORDER_ASCENDING));
        $query->getQuerySettings()->setRespectStoragePage(FALSE);
        $query->matching(
            $query->logicalAnd(
                $query->logicalOR(
                    $constraintsPubs
                ),
                $query->equals('hidden', 0),
                $query->equals('deleted', 0),
                $query->equals('showinpubfilter', 1)
            )
        );
        
        return $query->execute();
    }
    
    /**
     * Git alle Jahre, zusammengefasst über alle Datensätze des Repos zurück
     * 
     * @return object
     */
    public function getYears() {
        $query = $this->createQuery();
        $constraintsPubs = array(
            $query->equals('type', 'paper'),
            $query->equals('type', 'paper_diploma'),
            $query->equals('type', 'paper_phd'),
            $query->equals('type', 'thesis_bachelor'),
            $query->equals('type', 'thesis_diploma'),
            $query->equals('type', 'thesis_master'),
            $query->equals('type', 'thesis_phd'),
            $query->equals('type', 'book'),
            $query->equals('type', 'bookarticle'),
        );
        
        $query->getQuerySettings()->setRespectStoragePage(FALSE);
        $query->matching(
            $query->logicalAND(
                $query->logicalOR(
                    $constraintsPubs
                ),
                $query->equals('sys_language_uid', $GLOBALS['TSFE']->sys_language_uid),
                $query->equals('hidden', 0),
                $query->equals('deleted', 0),
                $query->equals('showinpubfilter', 1)
            )
        );
        
        $rs = $query->execute();
        
        $years = array();
        foreach($rs as $pub) {
            $pubdate = $pub->getPubdate();
            
            $query->matching(
                $query->logicalAND(
                    $query->equals('pubdate',$pubdate),
                    
                    $query->equals('sys_language_uid', $GLOBALS['TSFE']->sys_language_uid),
                    $query->equals('hidden', 0),
                    $query->equals('deleted', 0),
                    $query->equals('showinpubfilter', 1)
                )
            );
            $rs = $query->execute();
            
            $years[$pubdate]['date'] = $pubdate;
            $years[$pubdate]['counts'] = $rs->count();
        }
        
        krsort($years);
        
        return $years;
    }
    
    /**
     * Git alle Autoren zusammengefasst über alle Datensätze des Repositories zurück
     * 
     * @return object
     */
    public function getAuthors() {
        $query = $this->createQuery();
        $constraintsPubs = array(
            $query->equals('type', 'paper'),
            $query->equals('type', 'paper_diploma'),
            $query->equals('type', 'paper_phd'),
            $query->equals('type', 'thesis_bachelor'),
            $query->equals('type', 'thesis_diploma'),
            $query->equals('type', 'thesis_master'),
            $query->equals('type', 'thesis_phd'),
            $query->equals('type', 'book'),
            $query->equals('type', 'bookarticle'),
        );
        
        $query->getQuerySettings()->setRespectStoragePage(FALSE);
        $query->matching(
            $query->logicalAND(
                $query->logicalOR(
                    $constraintsPubs
                ),
                $query->equals('sys_language_uid', $GLOBALS['TSFE']->sys_language_uid),
                $query->equals('hidden', 0),
                $query->equals('deleted', 0),
                $query->equals('showinpubfilter', 1)
            )
        );
        
        $rs = $query->execute();
        
        $authors = array();
        foreach($rs as $pub) {
            $pubauthors = $pub->getAuthors();
            
            foreach($pubauthors as $pubauthor) {
                
                if($pubauthor->getMember() == 3) {
                    $authors[$pubauthor->getUid()] = array('surname' => $pubauthor->getSurname(), 'model' => $pubauthor, 'publicationscounter' => $this->countByAuthor($pubauthor));
                }
            }
        }
        
        $tmptitle = array();
        // Sortierung
        foreach ($authors as $tmpi => $tmpcont) {
            if(is_object($tmpcont)) {
                $surname = $tmpcont['model']->getSurname();
            }
            
            if(isset($surname)) {
                // $tmptitle[$tmpi] = strtolower($tmpcont['crdate']);
                
                $surname = str_replace('Ö','O',$surname);
                $surname = str_replace('Ä','A',$surname);
                $surname = str_replace('Ü','U',$surname);
                
                $surname = str_replace('ö','o',$surname);
                $surname = str_replace('ä','a',$surname);
                $surname = str_replace('ü','u',$surname);
                
                $tmptitle[$tmpi] = ucfirst($surname);
            } else {
                $tmptitle[$tmpi] = '';
            }
        }
        
        
        array_multisort($tmptitle, SORT_ASC, $authors);
        
        return $authors;
    }
    
    public function getSubjects() {
        
    }
    
    /**
     * Gibt alle Publikationen eines Authors zurück
     */
    public function findByAuthor($person) {
        $personUid = $person->getUid();
        
        $query = $this->createQuery();
        
        $query->getQuerySettings()->setRespectStoragePage(FALSE);
        $query->matching(
            $query->logicalAnd(
                $query->contains('authors', $personUid),
                $query->equals('hidden', 0),
                $query->equals('deleted', 0),
                $query->equals('showinpubfilter', 1)
            )
        );
        
        return $query->execute();
    }
    
    /**
     * Gibt die Anzahl der Publikationen eines Authors zurück
     */
    public function countByAuthor($person) {
        $personUid = $person->getUid();
        
        $query = $this->createQuery();
        
        $query->getQuerySettings()->setRespectStoragePage(FALSE);
        $query->matching(
            $query->logicalAnd(
                $query->contains('authors', $personUid),
                $query->equals('hidden', 0),
                $query->equals('deleted', 0),
                $query->equals('showinpubfilter', 1)
            )
        );
        
        return $query->execute()->count();
    }
    
    /**
     * Gibt die Anzahl der Publikationen eines Authors zurück
     */
    public function countBySubject($subject) {
        $subjectUid = $subject->getUid();
        
        $query = $this->createQuery();
        
        $query->getQuerySettings()->setRespectStoragePage(FALSE);
        $query->matching(
            $query->logicalAnd(
                $query->contains('authors', $subjectUid),
                $query->equals('hidden', 0),
                $query->equals('deleted', 0),
                $query->equals('showinpubfilter', 1)
            )
        );
        
        return $query->execute()->count();
    }
    
}

?>