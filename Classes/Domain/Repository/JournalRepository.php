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
class JournalRepository extends \TYPO3\CMS\Extbase\Persistence\Repository {
    
    protected $defaultOrderings = array(
        'title' => \TYPO3\CMS\Extbase\Persistence\QueryInterface::ORDER_ASCENDING,
    );

    /**
     * Git alle Datensätze des Repositories zurück
     * 
     * @return object
     */
    public function findAll() {
        
        $query = $this->createQuery();
        $query->getQuerySettings()->setRespectStoragePage(FALSE);
        $query->setOrderings (Array('sorting' => \TYPO3\CMS\Extbase\Persistence\QueryInterface::ORDER_ASCENDING));
        $query->matching(
            $query->logicalAND(
                $query->equals('sys_language_uid', $GLOBALS['TSFE']->sys_language_uid),
                $query->equals('hidden', 0),
                $query->equals('deleted', 0)
            )
        );

        return $query->execute();
    }
    
    /**
     * Git alle Datensätze anhand der PID zurück
     * 
     * @return object
     */
    public function findByPid($pid) {
        
        $query = $this->createQuery();
        $query->getQuerySettings()->setRespectStoragePage(FALSE);
        $query->setOrderings (Array('sorting' => \TYPO3\CMS\Extbase\Persistence\QueryInterface::ORDER_ASCENDING));
        $query->matching(
            $query->logicalAND(
                $query->equals('sys_language_uid', $GLOBALS['TSFE']->sys_language_uid),
                $query->equals('hidden', 0),
                $query->equals('pid', $pid)
            )
        );

        return $query->execute();
    }
    
    /**
     * Git alle Datensätze des Repositories anhand des Types zurück
     * 
     * @return object
     */
    public function findByType($type) {
        
        $query = $this->createQuery();
        $query->getQuerySettings()->setRespectStoragePage(FALSE);
        $query->setOrderings (Array('sorting' => \TYPO3\CMS\Extbase\Persistence\QueryInterface::ORDER_ASCENDING));
        $query->matching(
            $query->logicalAND(
                $query->equals('sys_language_uid', $GLOBALS['TSFE']->sys_language_uid),
                $query->equals('hidden', 0),
                $query->equals('type', $type)
            )
        );

        return $query->execute();
    }
    
    /**
     * Git alle Datensätze des Repositories anhand der Webcat zurück
     * 
     * @return object
     */
    public function findByWebcat($webcat) {
        $pid = $GLOBALS['TSFE']->id;
        
        $query = $this->createQuery();
        $query->getQuerySettings()->setRespectStoragePage(FALSE);
        $query->matching(
            $query->logicalAND(
                $query->equals('sys_language_uid', $GLOBALS['TSFE']->sys_language_uid),
                $query->equals('hidden', 0),
                $query->equals('deleted', 0),
                $query->equals('webcat', $webcat)
            )
        );

        return $query->execute();
    }
    
    /**
     * Git alle Datensätze des Repositories , welche der übergebenen webcat entsprechen, sowie für das Frontend ausgegeben werden sollen (showinfrontend=1)
     * 
     * @return object
     */
    public function findForFrontendByWebcat($webcat) {
        $pid = $GLOBALS['TSFE']->id;
        
        $query = $this->createQuery();
        $query->getQuerySettings()->setRespectStoragePage(FALSE);
        $query->matching(
            $query->logicalAND(
                $query->equals('sys_language_uid', $GLOBALS['TSFE']->sys_language_uid),
                $query->equals('hidden', 0),
                $query->equals('deleted', 0),
                $query->equals('webcat', $webcat),
                $query->equals('showinfrontend', '1')
            )
        );

        return $query->execute();
    }
    
}

?>