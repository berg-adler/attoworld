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
class NewsRepository extends \TYPO3\CMS\Extbase\Persistence\Repository {
    
    protected $defaultOrderings = array(
        'pubdate' => \TYPO3\CMS\Extbase\Persistence\QueryInterface::ORDER_DESCENDING,
        'title' => \TYPO3\CMS\Extbase\Persistence\QueryInterface::ORDER_DESCENDING,
    );

    /**
     * Git alle Datensätze des Repositories zurück
     * 
     * @return object
     */
    public function getAll($offset = null, $limit = null) {
        
        if($offset !== null &&
           $limit !== null) {
            
            $query = $this->createQuery();
            
            $query->setOffset($offset);
            $query->setLimit($limit);
            
            $query->getQuerySettings()->setRespectStoragePage(FALSE);
            $query->matching(
                $query->logicalAND(
                    $query->equals('sys_language_uid', $GLOBALS['TSFE']->sys_language_uid),
                    $query->equals('hidden', 0)
                )
            );
        } else {
            $query = $this->createQuery();
            $query->getQuerySettings()->setRespectStoragePage(FALSE);
            $query->matching(
                $query->logicalAND(
                    $query->equals('sys_language_uid', $GLOBALS['TSFE']->sys_language_uid),
                    $query->equals('hidden', 0)
                )
            );
        }
        
        if($offset !== null && $limit !== null) {
            $query->setOffset($offset);
            $query->setLimit($limit);
        }

        return $query->execute();
    }
    
    /**
     * Git alle Datensätze des Repositories zurück, welche nicht aus der pub_publications stammen
     * 
     * @return object
     */
    public function findAll($offset = null, $limit = null) {
        
        if($offset !== null &&
           $limit !== null) {
            
            $query = $this->createQuery();
            
            $query->setOffset($offset);
            $query->setLimit($limit);
            
            $query->getQuerySettings()->setRespectStoragePage(FALSE);
            $query->matching(
                $query->logicalAND(
                    $query->equals('sys_language_uid', $GLOBALS['TSFE']->sys_language_uid),
                    $query->equals('hidden', 0),
                    
                    $query->logicalOR(
                        $query->equals('isscientific', 0),
                        $query->equals('isscientific', 1),
                        $query->equals('isscientific', 2)
                    )
                )
            );
        } else {
            $query = $this->createQuery();
            $query->getQuerySettings()->setRespectStoragePage(FALSE);
            $query->matching(
                $query->logicalAND(
                    $query->equals('sys_language_uid', $GLOBALS['TSFE']->sys_language_uid),
                    $query->equals('hidden', 0),
                    
                    $query->logicalOR(
                        $query->equals('isscientific', 0),
                        $query->equals('isscientific', 1),
                        $query->equals('isscientific', 2)
                    )
                )
            );
        }
        
        if($offset !== null && $limit !== null) {
            $query->setOffset($offset);
            $query->setLimit($limit);
        }

        return $query->execute();
    }
    
    /**
     * Git alle Datensätze des Repositories zurück, welche nicht aus der pub_publications stammen, sortiert nach dem aktuellesten News
     * 
     * @return object
     */
    public function getAllSortedByPubdate($offset = null, $limit = null) {
        
        if($offset !== null &&
           $limit !== null) {
            
            $query = $this->createQuery();
            
            $query->setOffset($offset);
            $query->setLimit($limit);
            
            $query->getQuerySettings()->setRespectStoragePage(FALSE);
            $query->setOrderings (Array('pubdate' => \TYPO3\CMS\Extbase\Persistence\QueryInterface::ORDER_DESCENDING));
            $query->matching(
                $query->logicalAND(
                    $query->equals('sys_language_uid', $GLOBALS['TSFE']->sys_language_uid),
                    $query->equals('hidden', 0)
                )
            );
        } else {
            $query = $this->createQuery();
            $query->getQuerySettings()->setRespectStoragePage(FALSE);
            $query->setOrderings (Array('pubdate' => \TYPO3\CMS\Extbase\Persistence\QueryInterface::ORDER_DESCENDING));
            $query->matching(
                $query->logicalAND(
                    $query->equals('sys_language_uid', $GLOBALS['TSFE']->sys_language_uid),
                    $query->equals('hidden', 0)
                )
            );
        }
        
        if($offset !== null && $limit !== null) {
            $query->setOffset($offset);
            $query->setLimit($limit);
        }

        return $query->execute();
    }
    
    /**
     * Git alle Datensätze des Repositories anhand der PID zurück, welche nicht aus der pub_publications stammen
     * 
     * @return object
     */
    public function findByPid($pid, $offset = null, $limit = null) {
        
        $query = $this->createQuery();
        $query->getQuerySettings()->setRespectStoragePage(FALSE);
        $query->matching(
            $query->logicalAND(
                $query->equals('sys_language_uid', $GLOBALS['TSFE']->sys_language_uid),
                $query->equals('hidden', 0),
                $query->equals('pid', $pid),
                
                $query->logicalOR(
                    $query->equals('isscientific', 0),
                    $query->equals('isscientific', 1),
                    $query->equals('isscientific', 2)
                )
            )
        );

        if($offset !== null && $limit !== null) {
            $query->setOffset($offset);
            $query->setLimit($limit);
        }
        
        return $query->execute();
    }
    
    /**
     * Git alle Datensätze des Repositories anhand der Group-UID/Projekt-UID zurück
     * 
     * @return object
     */
    public function findByGroups($groups, $offset = null, $limit = null) {
        
        $query = $this->createQuery();
        $query->getQuerySettings()->setRespectStoragePage(FALSE);
        $query->matching(
            $query->logicalAND(
                $query->equals('sys_language_uid', $GLOBALS['TSFE']->sys_language_uid),
                $query->equals('hidden', 0),
                $query->equals('groups', $groups),
                
                $query->logicalOR(
                    $query->equals('isscientific', 0),
                    $query->equals('isscientific', 1),
                    $query->equals('isscientific', 2)
                )
            )
        );

        if($offset !== null && $limit !== null) {
            $query->setOffset($offset);
            $query->setLimit($limit);
        }
        
        return $query->execute();
    }
    
    /**
     * Git alle Datensätze des Repositories anhand der Joinid zurück, welche nicht aus der pub_publications stammen
     * 
     * @return object
     */
    public function findByJoinid($joinid, $offset = null, $limit = null) {
        $query = $this->createQuery();
        $query->getQuerySettings()->setRespectStoragePage(FALSE);
        $query->matching(
            $query->logicalAND(
                $query->equals('joinid', $joinid)
            )
        );

        if($offset !== null && $limit !== null) {
            $query->setOffset($offset);
            $query->setLimit($limit);
        }
        
        return $query->execute();
    }
    
    /**
     * Git alle Datensätze des Repositories anhand der Refid zurück, welche nicht aus der pub_publications stammen
     * 
     * @return object
     */
    public function findByRefid($refid, $offset = null, $limit = null) {
        
        $query = $this->createQuery();
        $query->getQuerySettings()->setRespectStoragePage(FALSE);
        $query->matching(
            $query->logicalAND(
                $query->equals('sys_language_uid', $GLOBALS['TSFE']->sys_language_uid),
                $query->equals('hidden', 0),
                $query->equals('refid', $refid)
            )
        );

        if($offset !== null && $limit !== null) {
            $query->setOffset($offset);
            $query->setLimit($limit);
        }
        
        return $query->execute();
    }
    
    /**
     * Git alle Datensätze des Repositories anhand des Scientific-Attributes zurück, welche nicht aus der pub_publications stammen
     * 
     * @return object
     */
    public function findByIsscientific($isscientific, $offset = null, $limit = null) {
        
        $query = $this->createQuery();
        $query->getQuerySettings()->setRespectStoragePage(FALSE);
        $query->matching(
            $query->logicalAND(
                $query->equals('sys_language_uid', $GLOBALS['TSFE']->sys_language_uid),
                $query->equals('hidden', 0),
                $query->equals('isscientific', $isscientific),
                
                $query->logicalOR(
                    $query->equals('isscientific', 0),
                    $query->equals('isscientific', 1),
                    $query->equals('isscientific', 2)
                )
            )
        );
        
        if($offset !== null && $limit !== null) {
            $query->setOffset($offset);
            $query->setLimit($limit);
        }

        return $query->execute();
    }
    
    /**
     * Git alle Datensätze des Repositories zurück, welche gefeatured sind, welche nicht aus der pub_publications stammen
     * 
     * @return object
     */
    public function findByFeatured($featured, $offset = null, $limit = null) {
        
        $query = $this->createQuery();
        $query->getQuerySettings()->setRespectStoragePage(FALSE);
        $query->matching(
            $query->logicalAND(
                $query->equals('sys_language_uid', $GLOBALS['TSFE']->sys_language_uid),
                $query->equals('hidden', 0),
                $query->equals('featured', $featured),
                
                $query->logicalOR(
                    $query->equals('isscientific', 0),
                    $query->equals('isscientific', 1),
                    $query->equals('isscientific', 2)
                )
            )
        );
        
        if($offset !== null && $limit !== null) {
            $query->setOffset($offset);
            $query->setLimit($limit);
        }

        return $query->execute();
    }
    
    /**
     * Git alle Datensätze des Repositories zurück, welche als Breaking gekennzeichnet sind, welche nicht aus der pub_publications stammen
     * 
     * @return object
     */
    public function findByBreaking($breaking, $offset = null, $limit = null) {
        
        $query = $this->createQuery();
        $query->getQuerySettings()->setRespectStoragePage(FALSE);
        $query->matching(
            $query->logicalAND(
                $query->equals('sys_language_uid', $GLOBALS['TSFE']->sys_language_uid),
                $query->equals('hidden', 0),
                $query->equals('breaking', $breaking),
                
                $query->logicalOR(
                    $query->equals('isscientific', 0),
                    $query->equals('isscientific', 1),
                    $query->equals('isscientific', 2)
                )
            )
        );
        
        if($offset !== null && $limit !== null) {
            $query->setOffset($offset);
            $query->setLimit($limit);
        }

        return $query->execute();
    }
    
    /**
     * Git alle Jahre der Datensätze des Repos zurück, welche nicht aus der pub_publications stammen
     * 
     * @return object
     */
    public function getYears() {
        $query = $this->createQuery();
       
        $query->getQuerySettings()->setRespectStoragePage(FALSE);
        $query->matching(
            $query->logicalAND(
                $query->equals('sys_language_uid', $GLOBALS['TSFE']->sys_language_uid),
                $query->equals('hidden', 0),
                $query->equals('deleted', 0),
                
                $query->logicalOR(
                    $query->equals('isscientific', 0),
                    $query->equals('isscientific', 1),
                    $query->equals('isscientific', 2)
                )
            )
        );
        
        $rs = $query->execute();
        
        $years = array();
        foreach($rs as $pub) {
            $pubdate = date('Y',$pub->getPubdate());
            
            $query->matching(
                $query->logicalAND(
                    $query->equals('pubdate',$pubdate),
                    
                    $query->equals('sys_language_uid', $GLOBALS['TSFE']->sys_language_uid),
                    $query->equals('hidden', 0),
                    $query->equals('deleted', 0),
                    
                    $query->logicalOR(
                        $query->equals('isscientific', 0),
                        $query->equals('isscientific', 1),
                        $query->equals('isscientific', 2)
                    )
                )
            );
            $rs = $query->execute();
            
            if($pubdate > 1970) {
                $years[$pubdate]['date'] = $pubdate;
                $years[$pubdate]['counts'] = $rs->count();
            }
        }
        
        krsort($years);
        
        return $years;
    }
    
    /**
     * Git alle Datensätze des Repositoriesanhand der üergebenen Kriterien zurück, welche nicht aus der pub_publications stammen
     * 
     * @return object
     */
    public function findByCriterias($criterias,$start = 0, $length = 50) {
        $query = $this->createQuery();
        
        if(is_array($criterias['authors'])) {
            foreach($criterias['authors'] as $a) {
                $constraintsAuthor[] = $query->contains('authors', $a);
            }
        } else {
            $constraintsAuthor[] = $query->contains('authors', $criterias['authors']);
        }
        $constraintsYear = array();
        
        if(is_array($criterias['years'])) {
            foreach($criterias['years'] as $i => $y) {
                $constraintsYear[] = $query->equals('realyear', $i);
            }
        } else {
            $constraintsYear[] = $query->equals('realyear', $criterias['years']);
        }
        
        $constraintsPids = array();
        if(is_array($criterias['pids'])) {
            foreach($criterias['pids'] as $i => $pid) {
                $constraintsPids[] = $query->equals('pid', $i);
            }
        } else {
            $constraintsPids[] = $query->equals('pid', $criterias['pids']);
        }
        
        
        $constraintsSubjects = array();
        if(is_array($criterias['subjects'])) {
            foreach($criterias['subjects'] as $s) {
                $constraintsSubjects[] = $query->contains('publicationcategory', $s);
            }
        } else {
            $constraintsSubjects[] = $query->contains('publicationcategory', $criterias['subjects']);
        }  
        
        // Für die Projekte verwendet, kopiert von den Publikationen
        $constraintsProjects = array();
        if(is_array($criterias['projects'])) {
            foreach($criterias['projects'] as $i => $p) {
                $constraintsProjects[] = $query->contains('groups', $i);
            }
        }
        
        // Um Autoren zu umgehen, kopiert von den Publikationen
        $constraintsAuthors = null;
        
        $logicalAnd = null;
        if(!empty($constraintsAuthor)) {
            
            if(!empty($constraintsYear)) {
                if(!empty($constraintsSubject)) {
                    if(!empty($constraintsProjects)) {
                    
                        if(!empty($constraintsPids)) {
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
                                    $query->logicalOr(
                                        $constraintsProjects
                                    ),
                                    $query->logicalOr(
                                        $constraintsPids
                                    )
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
                                    $constraintsProjects
                                ),
                                $query->logicalOr(
                                    $constraintsSubjects
                                )
                            );
                        }
                    
                    } else {
                        
                        if(!empty($constraintsPids)) {
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
                                    $constraintsPids
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
                        
                    }
                } else {
                    if(!empty($constraintsProjects)) {
                        if(!empty($constraintsPids)) {
                            $logicalAnd = $query->logicalAnd(
                                $query->logicalOr(
                                    $constraintsAuthor
                                ),
                                $query->logicalOr(
                                    $constraintsYear
                                ),
                                $query->logicalOr(
                                    $query->logicalOr(
                                        $constraintsProjects
                                    ),
                                    $query->logicalOr(
                                        $constraintsPids
                                    )
                                )
                            );
                        } else {
                            $logicalAnd = $query->logicalAnd(
                                $query->logicalOr(
                                    $constraintsProjects
                                ),
                                $query->logicalOr(
                                    $constraintsAuthor
                                ),
                                $query->logicalOr(
                                    $constraintsYear
                                )
                            );
                        }
                    } else {
                        if(!empty($constraintsPids)) {
                            $logicalAnd = $query->logicalAnd(
                                $query->logicalOr(
                                    $constraintsAuthor
                                ),
                                $query->logicalOr(
                                    $constraintsYear
                                ),
                                $query->logicalOr(
                                    $constraintsPids
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
                }
            } else {
                if(!empty($constraintsSubject)) {
                    if(!empty($constraintsProjects)) {
                        if(!empty($constraintsPids)) {
                            $logicalAnd = $query->logicalAnd(
                                $query->logicalOr(
                                    $constraintsAuthor
                                ),
                                $query->logicalOr(
                                    $constraintsSubjects
                                ),
                                $query->logicalOr(
                                    $query->logicalOr(
                                        $constraintsProjects
                                    ),
                                    $query->logicalOr(
                                        $constraintsPids
                                    )
                                )
                            );
                        } else {
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
                        }
                    } else {    
                        if(!empty($constraintsPids)) {
                            $logicalAnd = $query->logicalAnd(
                                $query->logicalOr(
                                    $constraintsAuthor
                                ),
                                $query->logicalOr(
                                    $constraintsSubjects
                                ),
                                $query->logicalOr(
                                    $constraintsPids
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
                    }
                    
                } else {
                    if(!empty($constraintsProjects)) {
                        if(!empty($constraintsPids)) {
                            $logicalAnd = $query->logicalAnd(
                                $query->logicalOr(
                                    $constraintsAuthor
                                ),
                                $query->logicalOr(
                                    $query->logicalOr(
                                        $constraintsProjects
                                    ),
                                    $query->logicalOr(
                                        $constraintsPids
                                    )
                                )
                            );
                        } else {
                            $logicalAnd = $query->logicalAnd(
                                $query->logicalOr(
                                    $constraintsProjects
                                ),
                                $query->logicalOr(
                                    $constraintsAuthor
                                )
                            );
                        }
                    } else {
                        if(!empty($constraintsPids)) {
                            $logicalAnd = $query->logicalAnd(
                                $query->logicalOr(
                                    $constraintsAuthor
                                ),
                                $query->logicalOr(
                                    $constraintsPids
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
            }
            
        } else {
            
            if(!empty($constraintsYear)) {
                
                if(!empty($constraintsSubject)) {
                    if(!empty($constraintsProjects)) {
                        if(!empty($constraintsPids)) {
                            $logicalAnd = $query->logicalAnd(
                                $query->logicalOr(
                                    $constraintsYear
                                ),
                                $query->logicalOr(
                                    $constraintsSubjects
                                ),
                                $query->logicalOr(
                                    $query->logicalOr(
                                        $constraintsProjects
                                    ),
                                    $query->logicalOr(
                                        $constraintsPids
                                    )
                                )
                            );
                        } else {
                            $logicalAnd = $query->logicalAnd(
                                $query->logicalOr(
                                    $constraintsProjects
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
                        if(!empty($constraintsPids)) {
                            $logicalAnd = $query->logicalAnd(
                                $query->logicalOr(
                                    $constraintsYear
                                ),
                                $query->logicalOr(
                                    $constraintsSubjects
                                ),
                                $query->logicalOr(
                                    $constraintsPids
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
                    }
                } else {
                    
                    if(!empty($constraintsProjects)) {
                        if(!empty($constraintsPids)) {
                            $logicalAnd = $query->logicalAnd(
                                $query->logicalOr(
                                    $constraintsYear
                                ),
                                $query->logicalOr(
                                    $query->logicalOr(
                                        $constraintsProjects
                                    ),
                                    $query->logicalOr(
                                        $constraintsPids
                                    )
                                )
                            );
                        } else {
                            $logicalAnd = $query->logicalAnd(
                                $query->logicalOr(
                                    $constraintsProjects
                                ),
                                $query->logicalOr(
                                    $constraintsYear
                                )
                            );
                        }
                    } else {
                        
                        if(!empty($constraintsPids)) {
                            
                            $logicalAnd = $query->logicalAnd(
                                $query->logicalOr(
                                    $constraintsYear
                                ),
                                $query->logicalOr(
                                    $constraintsPids
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
                    
                }
            } else {
                if(!empty($constraintsSubjects)) {
                    if(!empty($constraintsProjects)) {
                        if(!empty($constraintsPids)) {
                            $logicalAnd = $query->logicalAnd(
                                $query->logicalOr(
                                    $constraintsSubjects
                                ),
                                $query->logicalOr(
                                    $query->logicalOr(
                                        $constraintsProjects
                                    ),
                                    $query->logicalOr(
                                        $constraintsPids
                                    )
                                )
                            );
                        } else {
                            $logicalAnd = $query->logicalAnd(
                                $query->logicalOr(
                                    $constraintsProjects
                                ),
                                $query->logicalOr(
                                    $constraintsSubjects
                                )
                            );
                        }
                    } else {
                        if(!empty($constraintsPids)) {
                            $logicalAnd = $query->logicalAnd(
                                $query->logicalOr(
                                    $constraintsSubjects
                                ),
                                $query->logicalOr(
                                    $constraintsPids
                                )
                            );
                        } else {
                            $logicalAnd = $query->logicalAnd(
                                $query->logicalOr(
                                    $constraintsSubjects
                                )
                            );
                        }
                    } 
                        
                    
                    
                } else {
                    
                    if(!empty($constraintsProjects)) {
                        if(!empty($constraintsPids)) {
                            
                            $logicalAnd = $query->logicalAnd(
                                $query->logicalOr(
                                    $query->logicalOr(
                                        $constraintsProjects
                                    ),
                                    $query->logicalOr(
                                        $constraintsPids
                                    )
                                )
                            );
                            
                        } else {
                            $logicalAnd = $query->logicalAnd(
                                $query->logicalOr(
                                    $constraintsProjects
                                )
                            );
                        }
                    } else {
                        if(!empty($constraintsPids)) {
                            $logicalAnd = $query->logicalAnd(
                                $query->logicalOr(
                                    $constraintsPids
                                )
                            );
                        } else {
                             // Kein Filter gesetzt!
                        }
                    }
                    
                    
                    
                    
                    
                }
            }
        }
        
        $query->getQuerySettings()->setRespectStoragePage(FALSE);
        $query->matching(
            $query->logicalAnd(
                $logicalAnd,
                $query->equals('hidden', 0),
                $query->equals('deleted', 0),
                
                $query->logicalOR(
                    $query->equals('isscientific', 0),
                    $query->equals('isscientific', 1),
                    $query->equals('isscientific', 2)
                )
            )
        );

        $query->setOffset($start);
        $query->setLimit($length);
        
        $rs = $query->execute();
        
        return $rs;
    }
    
}

?>