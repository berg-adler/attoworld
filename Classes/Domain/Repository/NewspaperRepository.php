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
class NewspaperRepository extends \TYPO3\CMS\Extbase\Persistence\Repository {
    
    protected $defaultOrderings = array(
        'sorting' => \TYPO3\CMS\Extbase\Persistence\QueryInterface::ORDER_DESCENDING,
    );

    /**
     * Git alle Datensätze des Repositories zurück
     * 
     * @return object
     */
    public function findAll($offset = null, $limit = null) {
        $pid = $GLOBALS['TSFE']->id;
        
        $query = $this->createQuery();
        $query->getQuerySettings()->setRespectStoragePage(FALSE);
        $query->matching(
            $query->logicalAND(
                $query->equals('sys_language_uid', $GLOBALS['TSFE']->sys_language_uid),
                $query->equals('hidden', 0),
                $query->equals('deleted', 0)
            )
        );

        if($offset !== null && $limit !== null) {
            $query->setOffset($offset);
            $query->setLimit($limit);
        }
        
        return $query->execute();
    }
    
    /**
     * Git alle Datensätze des Repositories anhand des Journals zurück
     * 
     * @return object
     */
    public function findByJournal($journal, $offset = null, $limit = null) {
        $pid = $GLOBALS['TSFE']->id;
        
        $query = $this->createQuery();
        $query->getQuerySettings()->setRespectStoragePage(FALSE);
        $query->matching(
            $query->logicalAND(
                $query->equals('sys_language_uid', $GLOBALS['TSFE']->sys_language_uid),
                $query->equals('hidden', 0),
                $query->equals('deleted', 0),
                $query->equals('journal', $journal)
            )
        );

        if($offset !== null && $limit !== null) {
            $query->setOffset($offset);
            $query->setLimit($limit);
        }
        
        return $query->execute();
    }
    
    /**
     * Git alle Datensätze des Repositories anhand des Datums zurück
     * 
     * @return object
     */
    public function findByPubdate($pubdate, $offset = null, $limit = null) {
        $pid = $GLOBALS['TSFE']->id;
        
        $query = $this->createQuery();
        $query->getQuerySettings()->setRespectStoragePage(FALSE);
        $query->matching(
            $query->logicalAND(
                $query->equals('sys_language_uid', $GLOBALS['TSFE']->sys_language_uid),
                $query->equals('hidden', 0),
                $query->equals('deleted', 0),
                $query->equals('pubdate', $pubdate)
            )
        );

        if($offset !== null && $limit !== null) {
            $query->setOffset($offset);
            $query->setLimit($limit);
        }
        
        return $query->execute();
    }
    
    /**
     * Git alle Datensätze des Repositories anhand des Jahres zurück
     * 
     * @return object
     */
    public function findYears() {
        $query = $this->createQuery();
        
        $query->getQuerySettings()->setRespectStoragePage(FALSE);
        $query->matching(
            $query->logicalAND(
                $query->equals('sys_language_uid', $GLOBALS['TSFE']->sys_language_uid),
                $query->equals('hidden', 0),
                $query->equals('deleted', 0)
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
                    $query->equals('deleted', 0)
                )
            );
            $rs = $query->execute();
            
            $years[$pubdate]['date'] = $pubdate;
            $years[$pubdate]['counts'] = $rs->count();
        }
        
        krsort($years);
        
        return $years;
    }
    
}

?>