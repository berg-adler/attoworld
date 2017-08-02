<?php

namespace Ferenckrausz\Attoworld\Controller;

/* * *************************************************************
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
 * ************************************************************* */

/**
 * AjaxController
 */
class AjaxController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController {

    private $publicationsuploadpath = '/';      // Upload-Pfad der Publikationen (href)
    private $rootpath;                          // Rootpfad
    private $standardPath = 'fileadmin/user_upload/tx_attoworld/publications/';     // Standarduploadpfad der Publikationen

    /**
     * Konstruktor der Klasse
     */

    public function __construct() {
        $this->rootpath = realpath(dirname(__FILE__)) . '/../../../../..';      // Pfad für Rpptpfad erzeugen
    }

    /**
     * Konstruktor des Typo3-Controllers
     */
    public function initializeAction() {
        $url = $this->doc->backPath . 'ajax.php?ajaxID=tx_attoworld::requesthandler';       // Pfad für AJAX
    }

    /**
     * Konvertiert die MATHSPAN-Elemente
     * 
     * @param string|object $math   Der String/das Objekt welches konvertiert werden soll
     * @return string|object    Der konvertierte String/Objekt
     */
    private function mathspan($math) {
        if (is_string($math)) {
            $math = str_replace('__MATHSPAN(', '\(', $math);
            $math = str_replace(')__', '\)', $math);
            $math = str_replace('mathrm', '', $math);
        } else {
            foreach (get_class_methods($math) as $method) {
                if (substr($method, 0, 3) == 'set') {
                    $getter = preg_replace('/^set/', 'get', $method);

                    $value = $math->{$getter}();

                    if (is_string($value)) {
                        $value = str_replace('__MATHSPAN(', '\(', $value);
                        $value = str_replace(')__', '\)', $value);
                        $value = str_replace('mathrm', '', $value);

                        $math->{$method}($value);
                    }
                }
            }
        }

        return $math;
    }

    /**
     * Erzeugt aus einem übergebenen Vor- und Zunamen die jeweiligen Namen für die Publikationen
     * 
     * @param string $forename
     * @param string $surname
     * @return string Zusammengesetzter Name
     */
    private function makeNameforPublications($forename, $surname) {
        if (preg_match('/^[A-Z][a-z]/', $forename)) {
            return substr($forename, 0, 1) . '. ' . $surname;
        } else {
            return $forename . ' ' . $surname;
        }
    }

    private function makepub($repository, $uid) {
        $array = array();

        $tps = $repository->findAll();

        $i = 0;
        foreach ($tps as $tp) {
            $sps = $tp->getPublications();

            if ($sps->count() > 0) {

                foreach ($sps as $k => $sp) {

                    if ($sp->getUid() == $uid) {
                        $fileName = $this->rootpath . '/' . $tp->getFile();

                        if (file_exists($fileName)) {
                            $array[$i]['title'] = $tp->getTitle();
                            $array[$i]['file'] = $tp->getFile();

                            $ppR = $this->objectManager->get('Ferenckrausz\Attoworlddata\Domain\Repository\PubpublicationsRepository');
                            $pprtR = $this->objectManager->get('Ferenckrausz\Attoworlddata\Domain\Repository\PubpublicationsreferstopubRepository');
                            $prtR = $this->objectManager->get('Ferenckrausz\Attoworlddata\Domain\Repository\PubreferencetypeRepository');

                            $RS = $ppR->findAll();
                            $pub = null;
                            foreach ($RS as $h) {
                                if ($h->getTitle() == $tp->getTitle()) {
                                    $pub = $h;
                                }
                            }

                            if (!empty($pub)) {

                                $RS = $pprtR->findAll();
                                $ref = null;
                                foreach ($RS as $h) {
                                    if ($h->getPublication() == $pub->getId()) {
                                        $ref = $h;
                                    }
                                }

                                if ($ref !== null) {
                                    $RS = $prtR->findAll();
                                    $type = null;
                                    foreach ($RS as $h) {
                                        if ($h->getId() == $ref->getReferencetype()) {
                                            $type = $h;
                                        }
                                    }

                                    $array[$i]['type'] = $type->getNameen();
                                } else {
                                    $array[$i]['type'] = $tp->getType();
                                }
                            } else {
                                $array[$i]['type'] = $tp->getType();
                            }

                            $array[$i]['uid'] = $tp->getUid();

                            $i++;
                        }
                    }
                }
            }
        }

        return $array;
    }

    /**
     * Debugs a SQL query from a QueryResult
     *
     * @param \TYPO3\CMS\Extbase\Persistence\Generic\QueryResult $queryResult
     * @param boolean $explainOutput
     * @return void
     */
    public function debugQuery(\TYPO3\CMS\Extbase\Persistence\Generic\QueryResult $queryResult, $explainOutput = FALSE) {
        $GLOBALS['TYPO3_DB']->debugOutput = 2;
        if ($explainOutput) {
            $GLOBALS['TYPO3_DB']->explainOutput = true;
        }
        $GLOBALS['TYPO3_DB']->store_lastBuiltQuery = true;
        $queryResult->toArray();
        \TYPO3\CMS\Extbase\Utility\DebuggerUtility::var_dump($GLOBALS['TYPO3_DB']->debug_lastBuiltQuery);

        $GLOBALS['TYPO3_DB']->store_lastBuiltQuery = false;
        $GLOBALS['TYPO3_DB']->explainOutput = false;
        $GLOBALS['TYPO3_DB']->debugOutput = false;
    }

    /**
     * Methode um die Publikationen zurückzugeben, welche über einen SingleFilter angesprochen wurden
     */
    public function getpublicationsAction() {

        $pR = $this->objectManager->get('Ferenckrausz\Attoworld\Domain\Repository\PublicationRepository');
        $counter = 0;

        if ($this->request->hasArgument('data')) {
            // Holen der übergebenen Parameter (Request)
            $type = $this->request->getArgument('data');
            $position = intval($this->request->getArgument('position'));
            $limit = intval($this->request->getArgument('limit'));

            $pubs = null;
            if ($type == 'feature') {
                $pubs = $pR->findFeatured($position, $limit);
                $pubsCounter = $pR->findFeatured(0, 100000);
                $counter = $pubsCounter->count();
            }
            if ($type == 'latest') {
                $pubs = $pR->findLatest($position, $limit);
                $pubsCounter = $pR->findLatest(0, 100000);
                $counter = $pubsCounter->count();
            }

            /*
            $newarr = array();
            $i = 0;
            foreach ($pubs as $p) {
                // Zusammensetzen der Publikationsrückgabe

                /*
                  $newarr[$i]['title'] = $this->mathspan($p->getTitle());

                  $href = $this->publicationsuploadpath . $p->getFile();
                  $file = $this->rootpath . $this->publicationsuploadpath . $p->getFile();
                  if ($this->isPublicationEmpty($file, $p)) {
                  $href = '';
                  } else {
                  //die($file);
                  }

                  $newarr[$i]['file'] = $href;

                  $as = $p->getAuthors();
                  foreach ($as as $k => $a) {
                  $newarr[$i]['authors'][$k]['name'] = $this->makeNameforPublications($a->getForename(), $a->getSurname());
                  $newarr[$i]['authors'][$k]['uid'] = $this->makeNameforPublications($a->getForename(), $a->getSurname());
                  }

                  $newarr[$i]['pubtstamp'] = $p->getPubtstamp();
                  $newarr[$i]['url'] = $p->getUrl();

                  $newarr[$i]['pubdate'] = $p->getPubdate();
                  $newarr[$i]['uid'] = $p->getUid();

                  $newarr[$i]['journal'] = $p->getJournal();
                  $newarr[$i]['pageref'] = $p->getPageref();
                  $newarr[$i]['volume'] = $p->getVolume();
                  $newarr[$i]['type'] = $p->getType();
                 */

                /*
                
                $newarr[$i] = $this->buildPublication($p);

                $i++;
            }
            */

            if (empty($newarr)) {
                $newarr['respmessage'] = 'No Results';
            }

            if (!isset($newarr['respmessage'])) {
                //$counter = count($newarr);
                //$newarr = $this->array_msort($newarr, array('pubtstamp' => SORT_DESC));
                //$pubsArr = $this->cropResultArray($newarr, $limit, $position);
            }

            /*
            echo json_encode(array(
                'counter' => $counter,
                'data' => $newarr)
            );
            die();
            */
            
            $this->view->assign('publications',$pubs);
            $this->view->assign('publicationcounter',$counter);
        }
    }

    /**
     * Prüfung ob der Pfad zur Publikation existiert
     * 
     * @param string $file      Die Datei auf die geprüft werden soll
     * @param object $p         Das Publikationsobjekt
     * @return boolean          
     */
    private function isPublicationEmpty($file, $p) {
        $fileName = $p->getFile();

        if (!file_exists($file) ||
            empty($fileName) ||
            $fileName == $this->standardPath) {

            return true;
        }
    }

    /**
     * Suche nach den Publikationen
     */
    public function publicationsearchAction() {
        $counter = 0;

        if ($this->request->hasArgument('sword')) {

            // Holen der übergebenen Parameter (Request)
            $sword = strtolower($this->request->getArgument('sword'));
            $position = intval($this->request->getArgument('position'));
            $limit = intval($this->request->getArgument('limit'));

            
            $pR = $this->objectManager->get('Ferenckrausz\Attoworld\Domain\Repository\PersonRepository');
            $rs = $pR->search($sword);
            
            $authors = array();
            foreach($rs as $author) {
                $authors[] = $author->getUid();
            }
            
            $pR = $this->objectManager->get('Ferenckrausz\Attoworld\Domain\Repository\PublicationRepository');
            $pubs = $pR->searchByCriterias(array('author' => $authors, 'title' => $sword), $position, $limit);
            $pubscounter = $pR->searchByCriterias(array('author' => $authors, 'title' => $sword), 0, 100000);
           
             $this->view->assign('publications',$pubs);
            $this->view->assign('publicationcounter',$pubscounter->count());
            
        }
    }

    /**
     * Reduziert ein Array aufgrund der definierten Limitierung durch $pubsstart und $pubslength
     * 
     * @param array $array      Das Array welches gecropt werden soll
     * @return array            Das gecropte Array
     */
    private function cropResultArray($array, $limit = 50, $offset = 0) {

        $inc = 0;
        foreach ($array as $i => $v) {
            if ($inc < $offset) {
                unset($array[$i]);
            }
            if ($inc > ($offset + $limit) - 1) {
                unset($array[$i]);
            }
            $inc++;
        }

        return $array;
    }

    /**
     * Plugin, die Suche innerhalb der News-Seite
     */
    public function newssearchAction() {

        if ($this->request->hasArgument('sword')) {
            $sword = $this->request->getArgument('sword');
            $position = intval($this->request->getArgument('position'));
            $limit = intval($this->request->getArgument('limit'));

            $pR = $this->objectManager->get('Ferenckrausz\Attoworld\Domain\Repository\NewsRepository');
            $pubs = $pR->findAll();

            $pubsArr = array();
            $i = 0;
            foreach ($pubs as $p) {
                $p = $this->mathspan($p);

                $take = false;

                if (preg_match('/' . $sword . '/', strtolower($p->getTitle())) ||
                    preg_match('/' . $sword . '/', strtolower($p->getPubdate())) ||
                    preg_match('/' . $sword . '/', strtolower($p->getFulltexten())) ||
                    preg_match('/' . $sword . '/', strtolower($p->getShorttexten()))) {

                    $take = true;
                }

                if ($take === true) {
                    $pubsArr[$i]['model'] = $p;
                    $pubsArr[$i]['sorting'] = $p->getPubdate();

                    /*
                      $href = $this->publicationsuploadpath . $p->getFile();
                      $file = $this->rootpath . $this->publicationsuploadpath . $p->getFile();
                      if ($this->isPublicationEmpty($file, $p)) {
                      $href = '';
                      }

                      $pubsArr[$i]['file'] = $href;
                     */
                }

                $i++;
            }

            $pubsArr = $this->array_msort($pubsArr, array('sorting' => SORT_DESC));
            $pubsArr = $this->cropResultArray($pubsArr, $limit, $position);

            if (empty($pubsArr)) {
                $pubsArr['respmessage'] = 'No Results';
            }
        }

        $this->view->assign('newarray', $pubsArr);
    }

    /**
     * durchsucht die Eigenschaften der Magazindatensätze (Magazin, Newspaper und Audioorvideo)
     * 
     * @param array $object
     * @return array
     */
    private function searchThroughMagazins($object, $sword) {
        $result = $object->findAll();

        $pubsArr = array();
        $i = 0;
        foreach ($result as $p) {
            $p = $this->mathspan($p);

            $take = false;

            if (preg_match('/' . strtolower($sword) . '/', strtolower($p->getTitle())) ||
                preg_match('/' . strtolower($sword) . '/', strtolower($p->getPubdate()))) {

                $take = true;
            }

            if ($take === true) {
                $pubsArr[$i]['model'] = $p;
                $pubsArr[$i]['sorting'] = $p->getPubtstamp();

                /*
                  $href = $this->publicationsuploadpath . $p->getFile();
                  $file = $this->rootpath . $this->publicationsuploadpath . $p->getFile();
                  if ($this->isPublicationEmpty($file, $p)) {
                  $href = '';
                  }

                  $pubsArr[$i]['file'] = $href;
                 */
            }

            $i++;
        }

        return $pubsArr;
    }

    /**
     * Suche innerhalb der Magazinobjekte (Magazin, Newspaper und Audioorvideo)
     */
    public function magazinsearchAction() {

        if ($this->request->hasArgument('sword')) {
            $sword = $this->request->getArgument('sword');
            $position = intval($this->request->getArgument('position'));
            $limit = intval($this->request->getArgument('limit'));

            $R = array(
                'dp' => $this->objectManager->get('Ferenckrausz\Attoworld\Domain\Repository\NewspaperRepository'),
                'm' => $this->objectManager->get('Ferenckrausz\Attoworld\Domain\Repository\MagazinRepository'),
                'av' => $this->objectManager->get('Ferenckrausz\Attoworld\Domain\Repository\AudioorvideoRepository')
            );

            $findings = array();
            foreach ($R as $value) {
                $findings = $findings + $this->searchThroughMagazins($value, $sword);
            }

            $findings = $this->array_msort($findings, array('sorting' => SORT_DESC));
            $findings = $this->cropResultArray($findings, $limit, $position);

            if (empty($findings)) {
                $findings['respmessage'] = 'No Results';
            }
        }

        $this->view->assign('data', $findings);
    }

    /**
     * Erstellt ein Jobelement für das Frontend
     * 
     * @param object $t     Der Job
     * @return array        Das Rückgabearray mit den Informationen für die Ausgabe im Frotnend
     */
    private function makejob($t) {
        $type = $t->getType();

        $frontendTypes = array(
            'msc' => 'M.Sc.',
            'bsc' => 'B.Sc.',
            'postdoc' => 'Post-Doc',
            'phd' => 'Ph.D.',
            'intern' => 'Internship',
            'assistant' => 'Referent/Assistant',
            'student' => 'Student',
            'init' => 'Job Announcement',
        );

        $pid = $t->getPid();
        $pR = $this->objectManager->get('Ferenckrausz\Attoworld\Domain\Repository\ProjectRepository');
        $project = $pR->findByPagepid($pid);

        if ($project->current() !== false) {
            return array(
                'title' => $t->getTitle(),
                'description' => $t->getDescription(),
                'location' => $t->getLocation(),
                'fulltextdescription' => $t->getFulltextdescription(),
                'personsubgroup' => $project->current()->getTitle(),
                'gwdglink' => $t->getGwdglink(),
                'type' => $frontendTypes[$type],
            );
        } else {
            return array(
                'title' => $t->getTitle(),
                'description' => $t->getDescription(),
                'location' => $t->getLocation(),
                'fulltextdescription' => $t->getFulltextdescription(),
                'gwdglink' => $t->getGwdglink(),
                'type' => $frontendTypes[$type],
            );
        }
    }

    /**
     * Prüft ob ein String sich im JSON-Format befindet
     * 
     * @param string $string
     * @return bool
     */
    private function isJson($string) {
        return ((is_string($string) &&
            (is_object(json_decode($string)) ||
            is_array(json_decode($string))))) ? true : false;
    }

    /*
      public function getjobsAction() {
      $jR = $this->objectManager->get('Tx_Attoworld_Domain_Repository_JobsRepository');

      if($this->request->hasArgument('filter')) {
      $data = $this->request->getArgument('filter');
      if($data !== 'others') {
      $filterValues = explode(',',$data);

      $jobs = array();
      foreach($filterValues as $filterValue) {
      $tmp = $jR->findByType($filterValue);

      foreach($tmp as $t) {
      $jobs[] = $this->makejob($t);
      }
      }
      } else {

      $jobs = array();

      $tmp = $jR->findByType('intern');
      foreach($tmp as $t) {
      $jobs[] = $this->makejob($t);
      }
      $tmp = $jR->findByType('assistant');
      foreach($tmp as $t) {
      $jobs[] = $this->makejob($t);
      }
      $tmp = $jR->findByType('student');
      foreach($tmp as $t) {
      $jobs[] = $this->makejob($t);
      }
      $tmp = $jR->findByType('init');
      foreach($tmp as $t) {
      $jobs[] = $this->makejob($t);
      }
      }

      if(empty($jobs)) {
      $jobs['respmessage'] = 'No Results';
      }
      echo json_encode($jobs);
      }
      }
     */

    /**
     * Holt die Jobs welche via eines SingleFilters gefiltert wurden
     */
    public function getjobsAction() {
        $jR = $this->objectManager->get('Ferenckrausz\Attoworld\Domain\Repository\JobsRepository');
        $pR = $this->objectManager->get('Ferenckrausz\Attoworld\Domain\Repository\ProjectRepository');
        $projects = $pR->findAll();
        $pIds = array();
        foreach ($projects as $p) {
            $pIds[$p->getPagepid()] = $p->getUid();
        }

        if ($this->request->hasArgument('filter')) {
            $data = $this->request->getArgument('filter');

            if ($data !== 'others') {

                if ($this->isJson($data)) {

                    $data = json_decode($data);

                    $projectsArr = array();
                    foreach ($data->projects as $p => $v) {
                        $projectsArr[$p] = true;
                    }
                    $jobs = array();

                    $rs = $jR->findAll();
                    foreach ($rs as $v) {
                        $pid = $v->getPid();

                        if (isset($projectsArr[$pIds[$pid]])) {
                            $jobs[] = $this->makejob($v);
                        }
                    }
                } else {
                    $filterValues = explode(',', $data);

                    $jobs = array();
                    foreach ($filterValues as $filterValue) {
                        $tmp = $jR->findByType($filterValue);

                        foreach ($tmp as $t) {
                            $jobs[] = $this->makejob($t);
                        }
                    }
                }
            } else {

                $jobs = array();

                $tmp = $jR->findByType('intern');
                foreach ($tmp as $t) {
                    $jobs[] = $this->makejob($t);
                }
                $tmp = $jR->findByType('assistant');
                foreach ($tmp as $t) {
                    $jobs[] = $this->makejob($t);
                }
                $tmp = $jR->findByType('student');
                foreach ($tmp as $t) {
                    $jobs[] = $this->makejob($t);
                }
                $tmp = $jR->findByType('init');
                foreach ($tmp as $t) {
                    $jobs[] = $this->makejob($t);
                }
            }

            if (empty($jobs)) {
                $jobs['respmessage'] = 'No Results';
            }
            echo json_encode($jobs);
            die();
        }
    }

    /**
     * Baut die Publikation für das Suchergebnis zusammen
     */
    private function buildPublication($p) {
        $array['title'] = $this->mathspan($p->getTitle());

        $href = $this->publicationsuploadpath . $p->getFile();
        $file = $this->rootpath . $this->publicationsuploadpath . $p->getFile();
        if ($this->isPublicationEmpty($file, $p)) {
            $href = '';
        } else {
            //die($file);
        }

        $array['file'] = $href;

        $as = $p->getAuthors();
        foreach ($as as $k => $a) {
            $array['authors'][$k]['name'] = $this->makeNameforPublications($a->getForename(), $a->getSurname());
            $array['authors'][$k]['uid'] = $this->makeNameforPublications($a->getForename(), $a->getSurname());
        }

        // $pU = $this->objectManager->get('Ferenckrausz\Attoworld\Domain\Utility\PublicationUtility');

        $pR = $this->objectManager->get('Ferenckrausz\Attoworld\Domain\Repository\PublicationRepository');
        $prR = $this->objectManager->get('Ferenckrausz\Attoworld\Domain\Repository\PressreleaseRepository');
        $npR = $this->objectManager->get('Ferenckrausz\Attoworld\Domain\Repository\NewspaperRepository');
        $mR = $this->objectManager->get('Ferenckrausz\Attoworld\Domain\Repository\MagazinRepository');

        $array['publications'] = array();

        $array['publications'] = array_merge($array['publications'], $this->makepub($pR, $p->getUid()));
        $array['publications'] = array_merge($array['publications'], $this->makepub($prR, $p->getUid()));
        $array['publications'] = array_merge($array['publications'], $this->makepub($npR, $p->getUid()));
        $array['publications'] = array_merge($array['publications'], $this->makepub($mR, $p->getUid()));

        $array['pubtstamp'] = $p->getPubtstamp();
        $array['url'] = $p->getUrl();

        $array['pubdate'] = $p->getPubdate();
        $array['uid'] = $p->getUid();

        $array['doi'] = $p->getDoi();
        $array['editors'] = $p->getEditors();

        $locations = '';
        foreach ($p->getLocations() as $location) {
            $locations = $location->getName();
            break;
        }

        $array['locations'] = $locations;

        $array['journal'] = $p->getJournal();
        $array['pageref'] = $p->getPageref();
        $array['volume'] = $p->getVolume();
        $array['type'] = $p->getType();

        return $array;
    }

    /**
     * Filtert die Publikationen anhand des übergebenen JSON-Objektes
     */
    public function filterpublicationsAction() {
        $pR = $this->objectManager->get('Ferenckrausz\Attoworld\Domain\Repository\PublicationRepository');

        $counter = 0;

        if ($this->request->hasArgument('data')) {
            $json = $this->request->getArgument('data');
            $position = intval($this->request->getArgument('position'));
            $limit = intval($this->request->getArgument('limit'));

            $data = json_decode($json);

            $info = array(
                'authors' => array(),
                'subjects' => array(),
                'years' => array(),
                'projects' => array(),
            );

            $isNotEmpty = false;
            if (!empty((array) $data->authors)) {
                $isNotEmpty = true;
            }
            if (!empty((array) $data->subjects)) {
                $isNotEmpty = true;
            }
            if (!empty((array) $data->years)) {
                $isNotEmpty = true;
            }
            if (!empty((array) $data->projects)) {
                $isNotEmpty = true;
            }

            if ($isNotEmpty === true) {
                foreach ($data as $index => $entry) {
                    foreach ($entry as $subindex => $subentry) {
                        $info[$index][$subindex] = $subindex;
                    }
                }

                $ps = $pR->findByCriterias($info, $position, $limit);
                
                // $this->debugQuery($ps);
                
                $psCounter = $pR->findByCriterias($info, 0, 1000000);
                $counter = $psCounter->count();

                /*
                $newarr = array();
                $i = 0;
                foreach ($ps as $p) {

                    $newarr[$i] = $this->buildPublication($p);

                    $i++;
                }
                */
                
                // $newarr = $this->array_msort($newarr, array('pubtstamp' => SORT_DESC));
                // $newarr = $this->cropResultArray($newarr, $limit, $position);

                if (empty($newarr)) {
                    $newarr['respmessage'] = 'No Results';
                }
            } else {
                $newarr['respmessage'] = 'No Selection';
            }

            $this->view->assign('publications',$ps);
            $this->view->assign('publicationcounter',$counter);
            
            /*
            echo json_encode(array(
                'counter' => $counter,
                'data' => $newarr)
            );
            die();
            */
        }
    }
    
    /**
     * Filtert die Publikationen anhand des übergebenen JSON-Objektes und gibt die Anzahl der gefundenen Datensütze in der Datenbank zurück
     */
    public function filterpublicationscounterAction() {
        $pR = $this->objectManager->get('Ferenckrausz\Attoworld\Domain\Repository\PublicationRepository');

        $json = array();

        if ($this->request->hasArgument('data')) {
            $json = $this->request->getArgument('data');
            $position = intval($this->request->getArgument('position'));
            $limit = intval($this->request->getArgument('limit'));

            $data = json_decode($json);

            $info = array(
                'authors' => array(),
                'subjects' => array(),
                'years' => array(),
                'projects' => array(),
            );

            $isNotEmpty = false;
            if (!empty((array) $data->authors)) {
                $isNotEmpty = true;
            }
            if (!empty((array) $data->subjects)) {
                $isNotEmpty = true;
            }
            if (!empty((array) $data->years)) {
                $isNotEmpty = true;
            }
            if (!empty((array) $data->projects)) {
                $isNotEmpty = true;
            }

            if ($isNotEmpty === true) {
                foreach ($data as $index => $entry) {
                    foreach ($entry as $subindex => $subentry) {
                        $info[$index][$subindex] = $subindex;
                    }
                }

                $psCounter = $pR->findByCriterias($info, 0, 1000000);
                $counter = $psCounter->count();

                $json['counter'] = $counter;
                
            } else {
                $json['counter'] = 0;
            }

        } else {
            $json['counter'] = 0;
        }
        
        echo json_encode($json);
    }

    /**
     * Action für die Ausgabe eines Bildes via Plugin (Renderprobleme von Typo3 umgehen)
     */
    public function imageAction() {
        
    }

    /**
     * Filtert die Magazinobjekte (Magazin, Newspaper und Audioorvideo)
     */
    public function filtermagazinsAction() {
        $avR = $this->objectManager->get('Ferenckrausz\Attoworld\Domain\Repository\AudioorvideoRepository');
        $mR = $this->objectManager->get('Ferenckrausz\Attoworld\Domain\Repository\MagazinRepository');
        $npR = $this->objectManager->get('Ferenckrausz\Attoworld\Domain\Repository\NewspaperRepository');
        $newarr = array();

        if ($this->request->hasArgument('data')) {
            // Holen der übergebenen Parameter
            $json = $this->request->getArgument('data');
            $position = intval($this->request->getArgument('position'));
            $limit = intval($this->request->getArgument('limit'));

            // Abfragen nach den zu filternden Kriterien
            if ($json == 'audioorvideo') {

                // Audio or video

                $avRs = $avR->findAll($position, $limit);

                $av = array();
                foreach ($avRs as $m) {
                    $av[] = array(
                        'model' => $m,
                        'type' => 'av',
                        'sorting' => $m->getPubtstamp()
                    );
                }

                $po = $this->array_msort($po, array('sorting' => SORT_DESC));
                $po = $this->cropResultArray($po, $limit, $position);

                $this->view->assign('data', $av);
                $doNotDie = true;
            } elseif ($json == 'printonline') {

                // Printed and Online

                $mR = $this->objectManager->get('Ferenckrausz\Attoworld\Domain\Repository\MagazinRepository');
                $ms = $mR->findAll();

                $dpR = $this->objectManager->get('Ferenckrausz\Attoworld\Domain\Repository\NewspaperRepository');
                $dps = $dpR->findAll();

                $po = array();
                foreach ($ms as $m) {
                    $po[] = array(
                        'model' => $m,
                        'type' => 'm',
                        'sorting' => $m->getPubtstamp()
                    );
                }
                foreach ($dps as $m) {
                    $po[] = array(
                        'model' => $m,
                        'type' => 'dp',
                        'sorting' => $m->getPubtstamp()
                    );
                }

                $po = $this->array_msort($po, array('sorting' => SORT_DESC));
                $po = $this->cropResultArray($po, $limit, $position);

                $this->view->assign('data', $po);
                $this->view->assign('position', $position);
                $doNotDie = true;
            } elseif ($json == 'dailypress') {
                // Gibts nicht mehr - 21.2.2017
            } else {

                // Freie Filter Dailypress, Magazine and Year

                $position = intval($this->request->getArgument('position'));
                $limit = intval($this->request->getArgument('limit'));

                $data = json_decode($json);

                $info = array(
                    'dailypresss' => array(),
                    'magazines' => array(),
                    'years' => array(),
                );

                $isNotEmpty = false;
                if (!empty((array) $data->dailypresss)) {
                    $isNotEmpty = true;
                }
                if (!empty((array) $data->magazines)) {
                    $isNotEmpty = true;
                }
                if (!empty((array) $data->years)) {
                    $isNotEmpty = true;
                }

                if ($isNotEmpty === true) {
                    foreach ($data as $index => $entry) {
                        foreach ($entry as $subindex => $subentry) {
                            $info[$index][$subindex] = $subindex;
                        }
                    }

                    $mR = $this->objectManager->get('Ferenckrausz\Attoworld\Domain\Repository\MagazinRepository');
                    $dpR = $this->objectManager->get('Ferenckrausz\Attoworld\Domain\Repository\NewspaperRepository');
                    $avR = $this->objectManager->get('Ferenckrausz\Attoworld\Domain\Repository\AudioorvideoRepository');
                    $jR = $this->objectManager->get('Ferenckrausz\Attoworld\Domain\Repository\JournalRepository');

                    $findings = array();
                    foreach ($info as $index => $criterium) {

                        // Dailypress-Filter
                        if ($index == 'dailypresss') {
                            foreach ($criterium as $uid) {
                                $dbRes = $jR->findByUid($uid);

                                $dpRes = $dpR->findByJournal($dbRes->getTitle());

                                if ($dpRes->count() > 0) {
                                    foreach ($dpRes as $m) {
                                        $findings[] = array(
                                            'model' => $m,
                                            'type' => 'm',
                                            'sorting' => $m->getPubtstamp()
                                        );
                                    }
                                }
                            }
                        }

                        // Magazin-Filter
                        if ($index == 'magazines') {
                            foreach ($criterium as $uid) {
                                $mRes = $jR->findByUid($uid);

                                $title = $mRes->getTitle();

                                // @Bug - Workaround, Methode trotz Deklaration und Cache-Leerens nicht aufrufbar
                                $resM = $mR->findByJournal($title);

                                $hRes = $mR->findAll();
                                $hMRes = array();
                                foreach ($hRes as $h) {
                                    if ($h->getJournal() == $title) {
                                        $hMRes[] = $h;
                                    }
                                }
                                $maRes = $hMRes;

                                if (count($maRes) > 0) {
                                    foreach ($maRes as $m) {
                                        $findings[] = array(
                                            'model' => $m,
                                            'type' => 'm',
                                            'sorting' => $m->getPubtstamp()
                                        );
                                    }
                                }
                            }
                        }

                        // Jahr-Filter
                        if ($index == 'years') {

                            foreach ($criterium as $year => $uid) {

                                // @Bug - Workaround, Methode trotz Deklaration und Cache-Leerens nicht aufrufbar
                                $resM = $mR->findByPubdate($year);

                                $hRes = $mR->findAll();
                                $hMRes = array();
                                foreach ($hRes as $h) {
                                    if ($h->getPubdate() == $year) {
                                        $hMRes[] = $h;
                                    }
                                }
                                $resM = $hMRes;

                                $resAV = $avR->findByPubdate($year);
                                $resDP = $dpR->findByPubdate($year);

                                //var_dump(get_class($f['model']), $types[$type]);
                                // if($resM->count() > 0) {
                                if (count($resM) > 0) {
                                    foreach ($resM as $m) {
                                        if (!$this->inFindings($m, $findings, 'm')) {
                                            $findings[] = array(
                                                'model' => $m,
                                                'type' => 'm',
                                                'sorting' => $m->getPubtstamp()
                                            );
                                        }
                                    }
                                }

                                if ($resAV->count() > 0) {
                                    foreach ($resAV as $m) {
                                        if (!$this->inFindings($m, $findings, 'av')) {
                                            $findings[] = array(
                                                'model' => $m,
                                                'type' => 'av',
                                                'sorting' => $m->getPubtstamp()
                                            );
                                        }
                                    }
                                }

                                if ($resDP->count() > 0) {
                                    foreach ($resDP as $m) {
                                        if (!$this->inFindings($m, $findings, 'dp')) {
                                            $findings[] = array(
                                                'model' => $m,
                                                'type' => 'dp',
                                                'sorting' => $m->getPubtstamp()
                                            );
                                        }
                                    }
                                }
                            }
                        }
                    }

                    $findings = $this->array_msort($findings, array('sorting' => SORT_DESC));
                    $findings = $this->cropResultArray($findings, $limit, $position);

                    $this->view->assign('data', $findings);
                    $this->view->assign('position', $position);
                    $doNotDie = true;

                    if (empty($newarr)) {
                        $newarr['respmessage'] = 'No Results';
                    }
                } else {
                    $newarr['respmessage'] = 'No Selection';
                }

                $this->view->assign('array', $newarr);
                $doNotDie = true;
            }
        }

        if ($doNotDie !== true) {
            echo json_encode($newarr);
            die();
        }
    }

    /**
     * Funktion die überprüft, ob sich das Model bereits in der Ergebnisliste befindet
     * 
     * @param type $m       Das Model auf das geprüft wird
     * @param type $fs      Die Ergebnisliste
     * @return boolean      Wenn es enthalten ist, dann gibt die Funktion true zurück
     */
    private function inFindings($m, $fs, $type) {

        $types = array(
            'm' => 'Ferenckrausz\Attoworld\Domain\Model\Magazin',
            'dp' => 'Ferenckrausz\Attoworld\Domain\Model\Newspaper',
            'av' => 'Ferenckrausz\Attoworld\Domain\Model\Audioorvideo',
        );

        foreach ($fs as $f) {
            if ($f['model']->getUid() == $m->getUid()) {
                if (get_class($f['model']) == $types[$type]) {
                    return true;
                    break;
                }
            }
        }
    }

    /*
      public function filtermagazinsAction() {
      $avR = $this->objectManager->get('Ferenckrausz\Attoworld\Domain\Repository\AudioorvideoRepository');
      $mR = $this->objectManager->get('Ferenckrausz\Attoworld\Domain\Repository\MagazinRepository');
      $npR = $this->objectManager->get('Ferenckrausz\Attoworld\Domain\Repository\NewspaperRepository');
      $newarr = array();

      if ($this->request->hasArgument('data')) {
      $json = $this->request->getArgument('data');
      $position = intval($this->request->getArgument('position'));
      $limit = intval($this->request->getArgument('limit'));

      if ($json == 'audioorvideo') {

      $avRs = $avR->findAll();

      foreach ($avRs as $i => $m) {

      $newarr[$i]['crdate'] = $m->getPubdate();
      $newarr[$i]['title'] = $this->mathspan($m->getTitle());

      $newarr[$i]['model']['title'] = $this->mathspan($m->getTitle());
      $newarr[$i]['model']['pubdate'] = $m->getPubdate();
      $newarr[$i]['model']['uid'] = $m->getUid();

      $newarr[$i]['model']['journal'] = $m->getJournal();
      $newarr[$i]['model']['pageref'] = $m->getPageref();
      $newarr[$i]['model']['volume'] = $m->getVolume();
      $newarr[$i]['model']['picture'] = $m->getPicture();
      $newarr[$i]['model']['type'] = $m->getType();
      $newarr[$i]['model']['file'] = $m->getFile();
      }

      $tmp = $this->array_msort($newarr, array('crdate' => SORT_DESC, 'title' => SORT_ASC));
      $newarr = $tmp;

      $tmp = array();
      foreach ($newarr as $i => $v) {
      $tmp[$i] = $v['model'];
      }
      $newarr = $tmp;

      $tmp = $newarr;
      $newarr = array();

      foreach ($tmp as $i => $v) {

      if ($i >= $position &&
      $i <= ($position + $limit)) {

      $newarr[$i] = $tmp[$i];
      }
      }



      $this->view->assign('array',$newarr);
      $doNotDie = true;
      } elseif ($json == 'printonline') {

      $mRes = $mR->findAll();
      $npRes = $npR->findAll();

      $i = 0;
      foreach ($mRes as $m) {
      $newarr[$i]['crdate'] = $m->getPubdate();
      $newarr[$i]['title'] = $this->mathspan($m->getTitle());

      $newarr[$i]['model']['title'] = $this->mathspan($m->getTitle());
      $newarr[$i]['model']['pubdate'] = $m->getPubdate();
      $newarr[$i]['model']['uid'] = $m->getUid();

      $newarr[$i]['model']['journal'] = $m->getJournal();
      $newarr[$i]['model']['pageref'] = $m->getPageref();
      $newarr[$i]['model']['volume'] = $m->getVolume();
      $newarr[$i]['model']['picture'] = $m->getPicture();
      $newarr[$i]['model']['type'] = $m->getType();
      $newarr[$i]['model']['file'] = $m->getFile();

      $i++;
      }
      foreach ($npRes as $m) {
      $newarr[$i]['crdate'] = $m->getPubdate();
      $newarr[$i]['title'] = $this->mathspan($m->getTitle());

      $newarr[$i]['model']['title'] = $this->mathspan($m->getTitle());
      $newarr[$i]['model']['pubdate'] = $m->getPubdate();
      $newarr[$i]['model']['uid'] = $m->getUid();

      $newarr[$i]['model']['journal'] = $m->getJournal();
      $newarr[$i]['model']['pageref'] = $m->getPageref();
      $newarr[$i]['model']['volume'] = $m->getVolume();
      $newarr[$i]['model']['picture'] = $m->getPicture();
      $newarr[$i]['model']['type'] = $m->getType();
      $newarr[$i]['model']['file'] = $m->getFile();

      $i++;
      }

      $sort_col = array();
      foreach ($newarr as $key => $row) {

      $sort_col[$key] = $row['crdate'];
      }

      $tmp = $this->array_msort($newarr, array('crdate' => SORT_DESC, 'title' => SORT_ASC));
      $newarr = $tmp;

      $tmp = array();
      foreach ($newarr as $i => $v) {
      $tmp[$i] = $v['model'];
      }
      $newarr = $tmp;

      $tmp = $newarr;
      $newarr = array();

      foreach ($tmp as $i => $v) {

      if ($i >= $position &&
      $i <= ($position + $limit)) {

      $newarr[$i] = $tmp[$i];
      }
      }

      $this->view->assign('array',$newarr);
      $doNotDie = true;
      } elseif ($json == 'dailypress') {
      // Gibts nicht mehr - 21.2.2017
      } else {
      $position = intval($this->request->getArgument('position'));
      $limit = intval($this->request->getArgument('limit'));

      $data = json_decode($json);

      $info = array(
      'dailypresss' => array(),
      'magazines' => array(),
      'years' => array(),
      );

      $isNotEmpty = false;
      if (!empty((array) $data->authors)) {
      $isNotEmpty = true;
      }
      if (!empty((array) $data->subjects)) {
      $isNotEmpty = true;
      }
      if (!empty((array) $data->years)) {
      $isNotEmpty = true;
      }
      if (!empty((array) $data->projects)) {
      $isNotEmpty = true;
      }

      if ($isNotEmpty === true) {
      foreach ($data as $index => $entry) {
      foreach ($entry as $subindex => $subentry) {
      $info[$index][$subindex] = $subindex;
      }
      }

      $ps = $pR->findByCriterias($info, $position, $limit);
      $newarr = array();
      $i = 0;
      foreach ($ps as $p) {
      $newarr[$i]['title'] = $this->mathspan($p->getTitle());

      $href = $this->publicationsuploadpath . $p->getFile();
      $file = $this->rootpath . $this->publicationsuploadpath . $p->getFile();
      if ($this->isPublicationEmpty($file, $p)) {
      $href = '';
      } else {
      //die($file);
      }

      $newarr[$i]['file'] = $href;

      $newarr[$i]['pubdate'] = $p->getPubdate();
      $newarr[$i]['uid'] = $p->getUid();

      $newarr[$i]['journal'] = $p->getJournal();
      $newarr[$i]['pageref'] = $p->getPageref();
      $newarr[$i]['volume'] = $p->getVolume();

      $newarr[$i]['crdate'] = $p->getPubdate();

      $newarr[$i]['model']['title'] = $this->mathspan($p->getTitle());
      $newarr[$i]['model']['pubdate'] = $p->getPubdate();
      $newarr[$i]['model']['uid'] = $p->getUid();

      $newarr[$i]['model']['journal'] = $p->getJournal();
      $newarr[$i]['model']['pageref'] = $p->getPageref();
      $newarr[$i]['model']['volume'] = $p->getVolume();
      $newarr[$i]['model']['picture'] = $p->getPicture();
      $newarr[$i]['model']['type'] = $p->getType();
      $newarr[$i]['model']['file'] = $p->getFile();


      $i++;
      }

      if (empty($newarr)) {
      $newarr['respmessage'] = 'No Results';
      }
      } else {
      $newarr['respmessage'] = 'No Selection';
      }

      $this->view->assign('array',$newarr);
      $doNotDie = true;
      }
      }

      if($doNotDie !== true) {
      echo json_encode($newarr);
      die();
      }

      }
     */

    /**
     * Sortiert ein Array
     * 
     * @param array $array      Das zu sortierende Array
     * @param array $cols       Sortierkriterien
     * @return array            Das sortierte Array
     */
    private function array_msort($array, $cols) {

        $index = '';
        $type = '';
        $inc = 0;
        foreach ($cols as $i => $v) {
            $index = $i;
            $type = $v;

            if ($inc > 0) {
                die('FEHLER: Mehr als 2 Einträge bei der Sortierung!');
            }
        }

        $sorting = array();
        foreach ($array as $key => $row) {
            $sorting[$key] = $row[$index];
        }

        $sorttype = SORT_STRING;
        if (is_int($sorting[0])) {
            $sorttype = SORT_NUMERIC;
        }

        array_multisort($sorting, $type, $sorttype, $array);

        return $array;

        /*
          $sortArray = array();
          foreach($array as $key => $data) {
          $sortArray[$key] = $data[2];
          }

          array_multisort($sortArray, SORT_ASC, $array);

          return $sortArray;
         */

        /*
          $colarr = array();
          foreach ($cols as $col => $order) {
          $colarr[$col] = array();
          foreach ($array as $k => $row) {
          $colarr[$col]['_' . $k] = strtolower($row[$col]);
          }
          }
          $eval = 'array_multisort(';
          foreach ($cols as $col => $order) {
          $eval .= '$colarr[\'' . $col . '\'],' . $order . ',';
          }
          $eval = substr($eval, 0, -1) . ');';

          eval($eval);

          $ret = array();
          foreach ($colarr as $col => $arr) {
          foreach ($arr as $k => $v) {
          $k = substr($k, 1);
          if (!isset($ret[$k]))
          $ret[$k] = $array[$k];
          $ret[$k][$col] = $array[$k][$col];
          }
          }

          return $ret;
         */
    }

    /**
     * Behelf, für das verwenden eines Viewhelpers im Controller
     * 
     * @param string $templateName      Der Name des Templates
     * @param array $variables          Übergeene Parameter in Array-Form (index->value)
     * @param string $format            Das Format
     * @return string                   Das gerenderte Objekt
     */
    private function getFluidValue($templateName, array $variables = array(), $format = "html") {
        $tmpView = $this->objectManager->get('TYPO3\CMS\Fluid\View\StandaloneView');
        switch ($format) {
            case "html" :
                $tmpView->setFormat('html');
                break;
            case "txt" :
                $tmpView->setFormat('txt');
                break;
            default:
                $tmpView->setFormat('html');
                break;
        }
        $extbaseFrameworkConfiguration = $this->configurationManager->getConfiguration(\TYPO3\CMS\Extbase\Configuration\ConfigurationManagerInterface::CONFIGURATION_TYPE_FRAMEWORK);
        $templateRootPath = \TYPO3\CMS\Core\Utility\GeneralUtility::getFileAbsFileName($extbaseFrameworkConfiguration['view']['templateRootPath']);
        $partialRootPath = \TYPO3\CMS\Core\Utility\GeneralUtility::getFileAbsFileName($extbaseFrameworkConfiguration['view']['partialRootPath']);
        $templatePathAndFilename = $templateRootPath . $this->request->getControllerName() . '/' . $templateName . ".$format";
        $extensionName = $this->request->getControllerExtensionName();
        $tmpView->getRequest()->setControllerExtensionName($extensionName);
        $tmpView->setTemplatePathAndFilename($templatePathAndFilename);
        $tmpView->setPartialRootPath($partialRootPath);
        $tmpView->assignMultiple($variables);
        $content = $tmpView->render();

        return $content;
    }

    /**
     * Plugin, Verlinkung der Projektgruppern
     */
    public function projektgroupAction() {
        $pR = $this->objectManager->get('Ferenckrausz\Attoworld\Domain\Repository\ProjectRepository');

        if ($this->request->hasArgument('data')) {
            $json = $this->request->getArgument('data');

            $data = json_decode($json);
            if (isset($data['project'])) {
                $projectId = intval($data['project']);

                $project = $pR->findByGroup($projectId);

                $members = $project->getMember();
                $persons = array();
                foreach ($members as $index => $member) {
                    $persons[$index]['model'] = $member;

                    $persons[$index]['model'] = $member;
                }

                $this->view->assign('persons', $persons);
            }
        }
    }

    /**
     * Filterung der News-Elemente
     */
    public function filternewsAction() {
        $pR = $this->objectManager->get('Ferenckrausz\Attoworld\Domain\Repository\NewsRepository');

        if ($this->request->hasArgument('data')) {
            $json = $this->request->getArgument('data');

            $position = intval($this->request->getArgument('position'));
            $limit = intval($this->request->getArgument('limit'));

            // Prüfung aus Graduation-Filterung
            if ($json == 'graduation') {
                $ps = $pR->findByIsscientific(2, $position, $limit);

                $newarr = array();
                $i = 0;
                foreach ($ps as $p) {
                    $p = $this->mathspan($p);

                    $newarr[$i]['model'] = $p;
                    $newarr[$i]['sorting'] = $p->getPubdate();

                    $i++;
                }
                // Prüfung aus Team-Filterung
            } elseif ($json == 'team') {
                $ps = $pR->findByIsscientific(0, $position, $limit);

                $newarr = array();
                $i = 0;
                foreach ($ps as $p) {
                    $p = $this->mathspan($p);

                    $newarr[$i]['model'] = $p;
                    $newarr[$i]['sorting'] = $p->getPubdate();

                    $i++;
                }
                // Prüfung aus Reserach-Filterung
            } elseif ($json == 'research') {
                $ps = $pR->findByIsscientific(1, $position, $limit);

                $newarr = array();
                $i = 0;
                foreach ($ps as $p) {
                    $p = $this->mathspan($p);

                    $newarr[$i]['model'] = $p;
                    $newarr[$i]['sorting'] = $p->getPubdate();

                    $i++;
                }
                // allgemeine Filterung
            } else {
                $data = json_decode($json);

                $info = array(
                    'authors' => array(),
                    'subjects' => array(),
                    'years' => array(),
                    'projects' => array(),
                );

                $isNotEmpty = false;
                if (!empty((array) $data->authors)) {
                    $isNotEmpty = true;
                }
                if (!empty((array) $data->subjects)) {
                    $isNotEmpty = true;
                }
                if (!empty((array) $data->years)) {
                    $isNotEmpty = true;
                }
                if (!empty((array) $data->projects)) {
                    $isNotEmpty = true;
                }

                if ($isNotEmpty === true) {
                    foreach ($data as $index => $entry) {
                        foreach ($entry as $subindex => $subentry) {
                            $info[$index][$subindex] = $subindex;
                        }
                    }

                    $tpR = $this->objectManager->get('Ferenckrausz\Attoworld\Domain\Repository\ProjectRepository');
                    $projects = $tpR->findAll();

                    if (count($info['projects']) > 0) {
                        foreach ($projects as $tp) {
                            foreach ($info['projects'] as $iip => $isp) {
                                if ($iip == $tp->getUid()) {
                                    $index = $tp->getPagepid();
                                    $info['pids'][$index] = true;
                                }
                            }
                        }
                    } else {
                        $info['pids'] = array();
                    }

                    $ps = $pR->findByCriterias($info, $position, $limit);

                    $newarr = array();
                    $i = 0;
                    foreach ($ps as $p) {
                        $p = $this->mathspan($p);

                        $newarr[$i]['model'] = $p;
                        $newarr[$i]['sorting'] = $p->getPubdate();

                        $i++;
                    }
                } else {
                    $newarr['respmessage'] = 'No Selection';
                }
            }

            if (empty($newarr)) {
                $newarr['respmessage'] = 'No Results';
            }

            if (!isset($newarr['respmessage'])) {
                //$newarr = $this->cropResultArray($newarr, $limit, $position);
            }
        }

        $this->view->assign('position', $position);
        $this->view->assign('newarray', $newarr);
    }

}
