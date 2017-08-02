<?php
namespace Ferenckrausz\Attoworld\Controller;

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
 * ElementsController
 */
class ElementsController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController
{

    
    private $showOnWebpageMemberAttr = 3; // MemberStatus der Personen, welche auf der LapStaff-Seite angezeigt werden sollen
    
    // Die Hauptkonfiguration mit Angaben zu den Daten der attoworld2
    private $config = array(
        'attoworld2' => array(
            'subgroups' => array(
                'assistents' => 39,
                'executive' => 36,
                'administration' => 40,
                'mapcala' => 41,
                'publicoutreach' => 38,
                'communications' => 37,
                'technicalstaff' => 31
            ),
            'category' => array(
                'atto3' => 20,
                'guestscientists' => 4,
                'juniorscientists' => 5,
                'seniorscientists' => 6,
                'technicalstaff' => 3,
                'diplstudent' => 7,
                'gradstudent' => 8,
                'assdirectors' => 9,
                'notinweb' => 18,
                'administration' => 13
            ),
            'person' => array(
                'ferenc' => 1939,
                'nils' => 1864
            ),
            'projects' => array(
                'twoleaders' => array(
                    78
                )
            )
        ),
        'attoworld3' => array(
            'pagetree' => array(
                'news' => 85
            ),
            'projects' => array(
                'associated' => 7
            )
        )
    );
    
    private $nextApperancesLink = 'https://ferenckrausz.de/?id=44';
    private $nextApperancesLinkForImages = 'https://ferenckrausz.de/uploads/tx_ferenckrausz/';
    
    private $magazinTypeMagazin = 2;        // Nummer für alle Journals welche für Magazine vorgesehen sind
    private $magazinTypeDailypress = 1;     // Nummer für alle Journals welche für Dailypress vorgesehen sind
    
    private $standardPath = 'fileadmin/user_upload/tx_attoworld/publications/';     // Das Standardverzeichnis zu den Publikationen
    
    /**
     * Anzahl von bestimmten Ausgaben limitieren auf n Datensätze
     */
    private $totalFeaturedNewsOnNewsSite = 5;   // Anzahl der auszulesenden Featured-News-Datensätze
    
    private $randomIndex;       // Der ZUfallsindex für die Haupt- und Researchseite
    
    private $publicationsuploadpath = '/';      // Uploadverzeichnis der Publikationen
    private $rootpath;          // Das Hauptverzeichnis der Webseite
    
    private $pubsstart = 0;     // Initialisierungsoffset der Filterelemente
    private $pubslength = 50;   // Initialisierungsmaximallänge der Filterelemente
    
    private $latestNewsFeaturedLength = 3;      // Anzeige und Auslesen der Magazin-Elemente für die eine Extrakachel auf der News-Seite
    
    /**
     * 
     * @param string|object $math   Das Objekt/der String welcher konvertiert werden soll
     * @return string|object    Das konvertierte Objekt bzw. der konvertierte String
     */
    private function mathspan($math) {
        if(is_string($math)) {
            $math = str_replace('__MATHSPAN(', '\(', $math);
            $math = str_replace(')__', '\)', $math);
            $math = str_replace('mathrm', '', $math);
        } else {
            foreach(get_class_methods($math) as $method) {
                if(substr($method, 0, 3) == 'set') {
                    $getter = preg_replace('/^set/','get',$method);
                    
                    $value = $math->{$getter}();
                    
                    if(is_string($value)) {
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
     * Konstruktor zum initialisieren wichtiger Seitenvariablen und Kosntanten
     */
    public function __construct() {
        // Root-Verzeichnis der Webseite
        $this->rootpath = realpath(dirname(__FILE__)) . '/../../../../..';
        
        // Der ZUfallsindex auf der Hauptseite und der Researchseite
        $this->randomIndex = null;
    }

    /**
     * Typo3-Konstruktor des Controllers zur Initialisierung wichtiger Seitenvariablen und Konstanten mit Typo3-Elementen
     */
    public function initializeAction() {
        $url = $this->doc->backPath . 'ajax.php?ajaxID=tx_attoworld::requesthandler';
        
        $pR = $this->objectManager->get('Ferenckrausz\Attoworld\Domain\Repository\ProjectRepository');
        $projects = $pR->findAll();

        $projectArr = array();
        foreach ($projects as $index => $project) {
            $projectArr[$index] = $project;
        }

        $this->randomIndex = rand(1, count($projectArr)) - 1;
        
        date_default_timezone_set('Europe/Berlin');
    }

    /**
     * Für Ajax vorgesehene Action (Umsetzung momentan als eigenständiger Controller)
     */
    public function ajaxAction() {
        
    }

    /**
     * Plugin für die Projektunterseite zur Darstellung von Bildern (wird aktuell nicht verwendet)
     */
    public function subsitepictureAction() {
        
    }
    
    /**
     * Plugin für die Projektunterseite zur Darstellung des Graphicalabstracts (wird aktuell nicht verwendet)
     */
    public function subsitegraphicalabstractAction() {
        
    }
    
    /**
     * Plugin für die Projektunterseite zur Darstellung des Footers (wird aktuell nicht verwendet)
     */
    public function subsitefooterAction() {
        
    }
    
    /*
     * Plugin für die Projektunterseite zur Darstellung des Bildes mit Scrolldownfunktion im Kppfbereich der Unterseite (wird aktuell nicht verwendet)
     */
    public function picturewithscrolldownAction() {
        
    }
    
    /**
     * Action um den eigenen Cache zu leeren, Lösung über plugin ausprobiert
     */
    private function createowncacheAction() {
        
        //$h = file_get_contents(');
        echo '------';
        $this->view->assign('test','!!!!!');
        
    } 
    
    /**
     * Slideshow der Projektunterseiten
     */
    public function subsitecontentslideshowAction() {
        $pid = $GLOBALS['TSFE']->id;
        $sR = $this->objectManager->get('Ferenckrausz\Attoworld\Domain\Repository\SlideRepository');
        
        $queryGenerator = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance( 'TYPO3\\CMS\\Core\\Database\\QueryGenerator' );
        $rGetTreeList = $queryGenerator->getTreeList($pid, 9999, 0, 1); //Will be a string
        $aPids = explode(',',$rGetTreeList);
        
        $mySlides = null;
        foreach($aPids as $pid) {
            $slides = $sR->findByPid($pid);
            
            if($slides->count() > 0) {
                $mySlides = $slides;
            }
        }
        
        $this->view->assign('slides',$mySlides);
    }
    
    /**
     * Plugin für die Publikationen auf der Publications-Seite
     */
    public function publicationsAction() {
        $pubR = $this->objectManager->get('Ferenckrausz\Attoworld\Domain\Repository\PublicationRepository');
        $pcR = $this->objectManager->get('Ferenckrausz\Attoworld\Domain\Repository\PublicationcategoryRepository');
        $pR = $this->objectManager->get('Ferenckrausz\Attoworld\Domain\Repository\ProjectRepository');
        $counter = 0;
        
        $glProjectArray = $pR->findAll();
        
        $authors = $pubR->getAuthors();
        $years = $pubR->getYears();
        $publicationcategories = $pcR->findAll();

        $this->view->assign('publicationcategories', $publicationcategories);
        
        $authors = $this->array_msort($authors, array('surname' => SORT_ASC));
        
        $this->view->assign('authors', $authors);
        $this->view->assign('years', $years);

        if ($this->request->hasArgument('project')) {
            $project = $this->request->getArgument('project');
        }

        if ($this->request->hasArgument('group')) {
            $group = $this->request->getArgument('group');
            $p = $pR->findByPagepid($group);

            
            
            $members = $p->current()->getMember();
            $membersArr = array();
            foreach ($members as $index => $member) {
                $membersArr[$index] = $member->getUid();
            }

            if (!empty($membersArr)) {
                
                $title = 'Attoworld / Publications / '.strtolower($p->current()->getTitle());
                
                $publications = $pubR->findByAuthors($membersArr, $this->pubsstart, $this->pubslength);
                $publicationsCounter = $pubR->findByAuthors($membersArr, 0, 100000);
                
                $counter = $publicationsCounter->count();
                
                //$this->view->assign('members', $members);
                
                $authors = $pubR->getAuthors();
                $membercount = 0;
                foreach($authors as $a) {
                    foreach($members as $m) {
                        if($m->getUid() == $a['model']->getUid()) {
                            $membercount++;
                        }
                    }
                }
                
                $this->view->assign('memberscount', $membercount);

                $years = array();
                $catsArr = array();
                $i = 0;
                foreach ($publications as $p) {
                    $yearIndex = $p->getPubdate();
                    $years[$yearIndex] = $i;

                    $categories = $p->getPublicationcategory();

                    foreach ($categories as $category) {
                        $catIndex = $category->getUid();
                        $catsArr[$catIndex] = true;
                    }

                    $i++;
                }

                $cats = array();
                $oI = 0;
                foreach ($catsArr as $i => $catItem) {
                    $cats[$oI] = $i;
                    $oI++;
                }

                $years = array_flip($years);
            } else {
                
                $title = 'Attoworld / Publications / Featured';
                
                $publications = $pubR->findFeatured($this->pubsstart, $this->pubslength);
                $publicationsCounter = $pubR->findFeatured(0, 100000);
                
                $counter = $publicationsCounter->count();
            }

            /*
              $this->view->assign('prefilteredYears',$years);
              $this->view->assign('prefilteredCategories',$cats);
             */
        } else {
            if ($this->request->hasArgument('person')) {
                $person = $this->request->getArgument('person');

                $personR = $this->objectManager->get('Ferenckrausz\Attoworld\Domain\Repository\PersonRepository');
                $model = $personR->findByUid($person);
                if(!empty($model)) {
                    $title = 'Attoworld / Publications / '.($model->getSurname().', '.$model->getForename());
                } else {
                    $title = 'Attoworld / Publications / Unknown';
                }
                
                
                $publications = $pubR->findByAuthors(array($person), $this->pubsstart, $this->pubslength);
                $publicationsCounter = $pubR->findByAuthors(array($person), 0, 100000);
                
                $counter = $publicationsCounter->count();
                
                // $this->view->assign('members', $members);
                
                $authors = $pubR->getAuthors();
                $membercount = 0;
                foreach($authors as $a) {
                    foreach($members as $m) {
                        if($m->getUid() == $a['model']->getUid()) {
                            $membercount++;
                        }
                    }
                }
                
                $this->view->assign('memberscount', $membercount);

                $years = array();
                $catsArr = array();
                $i = 0;
                foreach ($publications as $p) {
                    $yearIndex = $p->getPubdate();
                    $years[$yearIndex] = $i;

                    $categories = $p->getPublicationcategory();

                    foreach ($categories as $category) {
                        $catIndex = $category->getUid();
                        $catsArr[$catIndex] = true;
                    }

                    $i++;
                }

                $cats = array();
                $oI = 0;
                foreach ($catsArr as $i => $catItem) {
                    $cats[$oI] = $i;
                    $oI++;
                }

                $years = array_flip($years);
            } else {
                $title = 'Attoworld / Publications / Featured';
                
                $publications = $pubR->findFeatured($this->pubsstart, $this->pubslength);
                $publicationsCounter = $pubR->findFeatured(0, 100000);
                
                $counter = $publicationsCounter->count();
            }
        }

        if(!empty($title)) {
            $GLOBALS['TSFE']->config['config']['noPageTitle'] = 2;
            $GLOBALS['TSFE']->additionalHeaderData['titletag'] = '<title>' . $title . '</title>';
            $GLOBALS['TSFE']->content = preg_replace('/<title>.+<\/title>/','<title>'.$title.'</title>',$GLOBALS['TSFE']->content);
            $GLOBALS['TSFE']->page['title'] = $title;
        }
        
        foreach ($publications as $i => $p) {
            $file = $this->rootpath . $this->publicationsuploadpath . $p->getFile();
            $fileName = trim($p->getFile());
            
            if(!file_exists($file) ||
                empty($fileName) || 
                $fileName == $this->standardPath) {
                
                $publications[$i]->setFile('');
            }
        }

        /*
        foreach($publications as $i => $p) {
            var_dump($p->getTitle());
            
            if($i == 3) {
                break;
            }
        }
        */
        
        $this->view->assign('publicationsLimit', $this->pubslength);
        $this->view->assign('publicationsCounter', $counter);
        $this->view->assign('publications', $publications);
        $this->view->assign('group', $group);
        $this->view->assign('person', $person);
        $this->view->assign('projects', $glProjectArray);
        
    }

    public function filterAction() {
        
    }

    
    private function getNextAppearances() {
        $dataJSON = json_decode(file_get_contents($this->nextApperancesLink));
        
        $data = array();
        foreach($dataJSON as $i => $v) {
            if($v->date >= time()) { 
                foreach($v as $si => $sv) {
                    if($si == 'image') {
                        $sv = $this->nextApperancesLinkForImages.$sv;
                    }
                    if($si == 'imageformat') {
                        if(empty($sv)) {
                            $sv = '0';
                        }
                    }
                    
                    $data[$i][$si] = $sv;
                }
            }
        }
        
        return $this->array_msort($data, array('date' => SORT_DESC));
    }
    
    /**
     * Plugin für die Darstellung der einzelnen Blöcke auf der Hauptseite
     */
    public function filtermaincontentAction() {
        $pid = $GLOBALS['TSFE']->id;

        $feR = $this->objectManager->get('Ferenckrausz\Attoworld\Domain\Repository\FilterelementRepository');
        $filterelements = $feR->findAll();
        
        $filterelements = array_reverse($filterelements->toArray());

        $data = $this->getNextAppearances();
        
        $nas = array();
        foreach($data as $v) {
            $fObject = $this->objectManager->get('Ferenckrausz\Attoworld\Domain\Model\Filterelement');
            
            $fObject->setTitle('Next Appearances');
            $fObject->setSubtitle('Get close to the action! ');
            $fObject->setSize(1);
            
            $naObject = $this->objectManager->get('Ferenckrausz\Attoworld\Domain\Model\Nextappearance');
            
            /*
            $naObject->setTitle($v['title']);
            $naObject->setSubtitle($v['subtitle']);
            */
            
            $naObject->setTitle('Next Appearances');
            $naObject->setSubtitle('Get close to the action! ');
            $naObject->setOrganizer('');
            $naObject->setElementtitle($v['lecturetitle']);
            $naObject->setDescription($v['bodytext']);
            $naObject->setTime($v['date']);
            $naObject->setLocation($v['place']);
            $naObject->setLink($v['link']);
            
            $fObject->setLinknextappearance(array($naObject));
            
            $nas[] = $fObject;
        }
        
        $mergedFilterElements = array_merge($filterelements, $nas);
        
        // Daten wieder raus -_-
        $mergedFilterElements = $filterelements;
        
        $this->view->assign('filterelements', $mergedFilterElements);
    }

    /**
     * Plugin für die Job-Seite
     */
    public function jobsAction() {
        $pid = $GLOBALS['TSFE']->id;

        if ($this->request->hasArgument('uid')) {
            $uid = intval($this->request->getArgument('uid'));
            $this->view->assign('uid', $uid);
        }

        $pR = $this->objectManager->get('Ferenckrausz\Attoworld\Domain\Repository\ProjectRepository');
        $jR = $this->objectManager->get('Ferenckrausz\Attoworld\Domain\Repository\JobsRepository');
        $jobs = $jR->findAll();

        $jobArr = array();
        foreach ($jobs as $i => $job) {

            $pid = $job->getPid();

            $project = $pR->findByPagepid($pid);
            if ($project->current() !== false) {
                $job->setPersonsubgroup($project->current()->getTitle());
            } else {
                $job->setPersonsubgroup('');
            }

            $jobArr[$i] = $job;
        }
        
        $jobArr = array_reverse($jobArr);
        
        $this->view->assign('projects', $pR->findAll());
        $this->view->assign('jobs', $jobArr);
    }

    /**
     * Plugin zur Anzeige der Projektadressen auf der Kontakt-Seite
     */
    public function projectadressesAction() {
        $pR = $this->objectManager->get('Ferenckrausz\Attoworld\Domain\Repository\ProjectRepository');
        $projects = $pR->findAllSortedByTitle();
        
        // Assoziierte ausschließen
        $help = array();
        foreach($projects as $p) {
            if($p->getUid() !== $this->config['attoworld3']['projects']['associated']) {
                $help[] = $p;
            }
        }
        $projects = $help;
        
        $this->view->assign('projects', $projects);
    }

    /**
     * Plugin zur Filterung der Personen (im Moment mit rein clientseitig mit Javascript gelöst)
     */
    public function personfilterAction() {
        
    }
    
    /**
     * Reduziert ein Array aufgrund der definierten Limitierung durch Angabe eines offsets und einer Limitierung
     * 
     * @param type $array
     * @return type
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
     * Plugin zur Filterung der News
     */
    public function newsfilterAction() {
        $nR = $this->objectManager->get('Ferenckrausz\Attoworld\Domain\Repository\NewsRepository');
        $prR = $this->objectManager->get('Ferenckrausz\Attoworld\Domain\Repository\ProjectRepository');
        $projects = $prR->findAll();
        $years = $nR->getYears();
        
        if ($this->request->hasArgument('uid')) {
            $uid = intval($this->request->getArgument('uid'));

            // Bei üergebener UID entsprechenden Datensatz heraussuchen
            $n = $nR->findByUid($uid, $this->pubsstart, $this->pubslength);
            $n = $this->mathspan($n);
            
            $news = array(
                0 => array(
                    'model' => $n,
                    'sorting' => $n->getPubdate(),
                )
            );
            
            $prefilter = 0;
            
            $this->view->assign('newsitemid', $uid);
        } else {
            // Starten mit research-Datensätzen
            $ns = $nR->findByIsscientific(1, $this->pubsstart, $this->pubslength);
            
            $news = array();
            foreach($ns as $i => $n) {
                $n = $this->mathspan($n);

                $news[$i]['model'] = $n;
                $news[$i]['sorting'] = $n->getPubdate();
            }
            
            $prefilter = 1;
        }
        
        // Prefilterung anwenden
        if ($this->request->hasArgument('prefilter')) {
            $prefilter = ($this->request->getArgument('prefilter'));
            
            $position = $this->pubsstart;
            $limit = $this->pubslength;
            
            $pR = $this->objectManager->get('Ferenckrausz\Attoworld\Domain\Repository\NewsRepository');
            
            // Prüfung aus Graduation-Filterung
            if($prefilter == 'graduation') {
                $prefilter = 3;
                $ps = $pR->findByIsscientific(2, $position, $limit);
                
                $news = array();
                $i = 0;
                foreach ($ps as $p) {
                    $p = $this->mathspan($p);
                    
                    $news[$i]['model'] = $p;
                    $news[$i]['sorting'] = $p->getPubdate();

                    $i++;
                }
            // Prüfung aus Team-Filterung
            } elseif($prefilter == 'team') {
                $prefilter = 2;
                $ps = $pR->findByIsscientific(0, $position, $limit);
                
                $news = array();
                $i = 0;
                foreach ($ps as $p) {
                    $p = $this->mathspan($p);
                    
                    $news[$i]['model'] = $p;
                    $news[$i]['sorting'] = $p->getPubdate();

                    $i++;
                }
            // Prüfung aus Reserach-Filterung
            } elseif($prefilter == 'research') {
                $prefilter = 1;
                $ps = $pR->findByIsscientific(1, $position, $limit);
                
                $news = array();
                $i = 0;
                foreach ($ps as $p) {
                    $p = $this->mathspan($p);
                    
                    $news[$i]['model'] = $p;
                    $news[$i]['sorting'] = $p->getPubdate();

                    $i++;
                }
            } else {
                $prefilter = 1; // Standard definieren: Research ist standardmässig aktiv
            }
            
            $this->view->assign('prefilter',$prefilter);
            
        }
        
        // Tanya Script zur Überprüfung der News zu pub_publications-Zuordnung
        
        /*
        $i = 0;
        foreach($news as $n) {
            echo '<pre>';
            
            $tN = $nR->findByJoinid($n->getRefid());
            
            $refId = $n->getRefid();
            
            if(!empty($refId)) {
                if($tN->count() == 0) {
                    if($n->getIsscientific() == 1) {
                        var_dump($n->getTitle().','.$refId.','.$n->getRealyear());
                    }
                }
            }
            
            /*
            foreach($tN as $v) {
                var_dump(++$i, $v->getUid(), $v->getTitle().','.$v->getRealyear().', '.$v->getJoinid(), $n->getUid(), $n->getTitle().','.$n->getRealyear().', '.$refId);
            }
            *//*
        } 
        
        die('!');
        */
        
        $this->view->assign('news', $news);
        $this->view->assign('years', $years);
        $this->view->assign('projects', $projects);
    }

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
        foreach($cols as $i => $v) {
            $index = $i;
            $type = $v;
            
            if($inc > 0) {
                die('FEHLER: Mehr als 2 Einträge bei der Sortierung!');
            }
        }
        
        $sorting = array();
        foreach ($array as $key => $row) {
            $sorting[$key] = $row[$index];
        }
        
        $sorttype = SORT_STRING;
        if(is_int($sorting[0])) {
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
     * Action des persons-Plugns auf der Lap-Staff-Seite
     */
    public function personsAction() {
        $pid = $GLOBALS['TSFE']->id;

        if ($this->request->hasArgument('person')) {
            $person = $this->request->getArgument('person');

            $this->view->assign('personuid', $person);
        }
        
        $pR = $this->objectManager->get('Ferenckrausz\Attoworld\Domain\Repository\PersonRepository');
        $psgR = $this->objectManager->get('Ferenckrausz\Attoworld\Domain\Repository\PersonsubgroupRepository');
        $persons = $pR->findByMember($this->showOnWebpageMemberAttr);
        
        $subgroups = $psgR->findAll();
        $cR = $this->objectManager->get('Ferenckrausz\Attoworld\Domain\Repository\PersoncategoryRepository');
        $categories = $cR->findAll();
        $prR = $this->objectManager->get('Ferenckrausz\Attoworld\Domain\Repository\ProjectRepository');
        $projects = $prR->findAll();

        $paR = $this->objectManager->get('Ferenckrausz\Attoworld\Domain\Repository\PersonaddressRepository');
        $pas = $paR->findAll();

        $pMailR = $this->objectManager->get('Ferenckrausz\Attoworld\Domain\Repository\PersonemailRepository');
        $pmails = $pMailR->findAll();


        $pubR = $this->objectManager->get('Ferenckrausz\Attoworld\Domain\Repository\PublicationRepository');

        $array = array();
        $arrayInc = 0;
        $parray = array();
        $darray = array();
        $usedPersons = array();
        
        // Konfigurationsarray für den listing-Teil der Lap-Staff-Seite
        $siteCategories = array(
            'director' => array(
                'title' => 'Director',
                'personuids' => array(
                    $this->config['attoworld2']['person']['ferenc']    // Ferenc Krausz
                )
            ),
            'pcs' => array(
                'title' => 'Research Group leaders',
                'categoryuids' => array(
                    $this->config['attoworld2']['category']['atto3']
                )
            ),
            'directorsteam_2' => array(
                'title' => 'Director’s team',
                'categoryuids' => array(
                    $this->config['attoworld2']['category']['administration']
                )
                
                /* - rausnehmen, Anweisung von Karolina
                'subgroups' => array(
                    $this->config['attoworld2']['subgroups']['assistents'],
                    $this->config['attoworld2']['subgroups']['administration'],
                    $this->config['attoworld2']['subgroups']['mapcala'],
                    $this->config['attoworld2']['subgroups']['publicoutreach'],
                    $this->config['attoworld2']['subgroups']['communications']
                )
                */
            ),
            'scientists' => array(
                'title' => 'Scientists',
                'categoryuids' => array(
                    $this->config['attoworld2']['category']['guestscientists'], 
                    $this->config['attoworld2']['category']['seniorscientists'],
                    $this->config['attoworld2']['category']['juniorscientists'],
                )
            ),
            'students' => array(
                'title' => 'Students',
                'categoryuids' => array(
                    $this->config['attoworld2']['category']['diplstudent'], 
                    $this->config['attoworld2']['category']['gradstudent'],
                    $this->config['attoworld2']['category']['assdirectors']
                )
            ),
            'technicalstaff' => array(
                'title' => 'Technical staff',
                'categoryuids' => array(
                    $this->config['attoworld2']['category']['technicalstaff']
                )
            ),
        );

        $psgR = $this->objectManager->get('Ferenckrausz\Attoworld\Domain\Repository\PersonsubgroupRepository');
        $psRes = $psgR->findForPersons(array(
            $this->config['attoworld2']['subgroups']['assistents'],
            $this->config['attoworld2']['subgroups']['administration'],
            $this->config['attoworld2']['subgroups']['mapcala'],
            $this->config['attoworld2']['subgroups']['publicoutreach'],
            $this->config['attoworld2']['subgroups']['communications']
        ));
        
        // Durcheghen und zusammenbauen der einzelnen Personentabs
        foreach ($siteCategories as $catIndex => $category) {


            // Kategorien
            // 3 - Technical Staff
            // 4,5,6 - Scientists
            // 7,8,9 - Students
            // 12 - Directors Team
            // PCs

            $array[$arrayInc] = array(
                'title' => $category['title'],
                'shouldbesorted' => true,
                'data' => array()
            );
            
            // Sonderbehandlung für das Director's Team
            if($catIndex === 'directorsteam') {
                $array[$arrayInc]['shouldbesorted'] = false;
                
                $personInc = 0;
                foreach($category['subgroups'] as $subgroup) {
                    $subgroup = $psgR->findByUid($subgroup);
                    
                    $members = $subgroup->getMembers();
                    
                    $tmpCategory = array('title' => 'Directors Team',);
                    foreach($members as $memberIndex => $member) {
                        $tmpCategory['personuids'][] = $member->getUid();
                    }
                   
                    $orderedMembers = array();
                    
                    $leaderDataSet = null;
                    foreach($members as $memberIndex => $member) {
                        $leader = false;
                        $assistents = false;
                        foreach($member->getSubgroup() as $lGroup) {
                            if($lGroup->getUid() == $this->config['attoworld2']['subgroups']['executive']) {
                                $leader = true;
                            }
                            if($lGroup->getUid() == $this->config['attoworld2']['subgroups']['assistents']) {
                                $assistents = true;
                            }
                        }
                        
                        if($leader === true && $assistents === false || $member->getIsgroupleader() == 1) {
                            
                            $orderedMembers = array_reverse($orderedMembers);
                            array_push($orderedMembers, $member);
                            $orderedMembers = array_reverse($orderedMembers);
                            
                        } else {
                            array_push($orderedMembers, $member);
                        }
                        
                        
                    }
                    
                    // $orderedMembers = array_reverse($orderedMembers);
                    
                    $currentLoop = 0;
                    foreach($orderedMembers as $memberIndex => $member) {
                        
                        if($member->getMember() == $this->showOnWebpageMemberAttr) {
                            $this->createperson(null, $member, $array, $personInc, $arrayInc, $tmpCategory, $pR, $pubR, 'dt', $persons, $catIndex, $usedPersons, $currentLoop, $paR);

                            $personInc++;
                        }
                    }
                }
                
            } else {
                $personInc = 0;
                foreach ($persons as $personIndex => $person) {
                    
                    // Sonderbehandlung für PCs
                    if($catIndex === 'pcs') {
                        $pos = $this->objectManager->get('Ferenckrausz\Attoworld\Domain\Model\Personposition');

                        $isAttoGroup = false;
                        foreach ($person->getCategory() as $pCategory) {
                            if ($pCategory->getUid() == $this->config['attoworld2']['category']['atto3']) {
                                $isAttoGroup = true;
                            }
                        }
                        
                        if($isAttoGroup === true) {
                            $projecttitle = '';
                            foreach($projects as $project) {
                                $members = $project->getMember();
                                foreach($members as $member) {
                                    if($member->getUid() == $person->getUid()) {
                                        $projecttitle = $project->getShorttitle();
                                    }
                                }
                            }
                            
                            $catTitle = 'Research Group leader of '.$projecttitle;
                            $pos->setTitle(ucfirst($catTitle));
                            $person->setPosition(array($pos));
                        }
                    }
                    
                    // Sonderbehandlung für Director
                    if($catIndex === 'director') {
                        if($person->getSurname() === 'Krausz' &&
                           $person->getForename() === 'Ferenc') {
                            
                            $pos = $this->objectManager->get('Ferenckrausz\Attoworld\Domain\Model\Personposition');

                            $catTitle = $category['title'];
                            $pos->setTitle(ucfirst($catTitle));
                            $person->setPosition(array($pos));
                        }
                    }
                    
                    // Erzeugt die einzelnen Personen
                    $this->createperson($personIndex, $person, $array, $personInc, $arrayInc, $category, $pR, $pubR, null, $persons, $catIndex, $usedPersons, null, $paR);
                    $personInc++;
                }
            }
            
            $arrayInc++;
        }

        // Sortierung der Personen
        foreach ($array as $index => $category) {
            if($category['shouldbesorted'] === true) {
                $tmp = $category['data'];
                $tmp = $this->array_msort($tmp, array('sorting' => SORT_ASC));
                $array[$index]['data'] = $tmp;
            }
        }
        
        // Array für die Speicherung der UIDs der bereits benutzten Personen (nicht nochmal ausgeben)
        $usedPersons = null;

        // Konfiguration des Arrays für den project-listing-Bereich
        $siteCategories = array();
        foreach ($projects as $p) {
            $help = array(
                'title' => $p->getTitle(),
                'uid' => $p->getUid(),
                'pagepid' => $p->getPagepid(),
                'personuids' => array(
                )
            );

            foreach ($p->getMember() as $m) {
                $help['personuids'][] = $m->getUid();
            }

            $siteCategories[] = $help;
        }

        
        $arrayInc = 0;
        foreach ($siteCategories as $p) {
            $parray[$arrayInc] = array(
                'title' => $p['title'],
                'uid' => $p['uid'],
                'pagepid' => $p['pagepid'],
                'data' => array()
            );

            $personInc = 0;
            foreach ($persons as $personIndex => $person) {
                $this->createperson($personIndex, $person, $parray, $personInc, $arrayInc, $p, $pR, $pubR, null, $persons, $catIndex, $usedPersons, null, $paR);
                $personInc++;
            }

            $arrayInc++;
        }

        foreach ($parray as $index => $category) {
            $tmp = $category['data'];
            $tmp = $this->array_msort($tmp, array('sorting' => SORT_ASC));
            $parray[$index]['data'] = $tmp;
        }
        
        // Gruppenleiter bei Projektlisting vorne dran
        foreach($parray as $ci => $c) {
            $leaders = array();
            
            foreach($c['data'] as $pi => $p) {
                
                $isGroupLeader = false;
                foreach ($p['model']->getCategory() as $pCategory) {
                    // var_dump('?',$p['model']->getSurname());
                    if ($pCategory->getTitle() == 'pc_atto3') {
                        $isGroupLeader = true;
                    }
                }
                
                if($isGroupLeader === true) {
                    $leaders[] = $parray[$ci]['data'][$pi];
                    unset($parray[$ci]['data'][$pi]);
                }
                
            }
            
            $leaders = $this->array_msort($leaders, array('sorting' => SORT_DESC));
            
            if(!empty($leaders)) {
                foreach($leaders as $leader) {
                    $parray[$ci]['data'] = array_reverse($parray[$ci]['data']);
                    array_push($parray[$ci]['data'], $leader);
                    $parray[$ci]['data'] = array_reverse($parray[$ci]['data']);
                }
            }
        }
        
        $siteCategories = array(
            'directorsteam1' => array(
                'uid' => $this->config['attoworld2']['subgroups']['assistents'],
                'title' => 'Personal assistants',
                'subgroups' => array(
                    $this->config['attoworld2']['subgroups']['assistents']
                )
            ),
            'directorsteam2' => array(
                'uid' => $this->config['attoworld2']['subgroups']['administration'],
                'title' => 'Finance & administration',
                'subgroups' => array(
                    $this->config['attoworld2']['subgroups']['administration']
                )
            ),
            'directorsteam3' => array(
                'uid' => $this->config['attoworld2']['subgroups']['mapcala'],
                'title' => 'MAP/CALA',
                'subgroups' => array(
                    $this->config['attoworld2']['subgroups']['mapcala']
                )
            ),
            /*
            'directorsteam4' => array(
                'uid' => $this->config['attoworld2']['subgroups']['publicoutreach'],
                'title' => 'Public outreach',
                'subgroups' => array(
                    $this->config['attoworld2']['subgroups']['publicoutreach']
                )
            ),
            */
            'directorsteam5' => array(
                'uid' => $this->config['attoworld2']['subgroups']['communications'],
                'title' => 'Communications',
                'subgroups' => array(
                    $this->config['attoworld2']['subgroups']['communications']
                )
            ),
        );
        
        foreach ($siteCategories as $catIndex => $category) {


            // Kategorien
            // 3 - Technical Staff
            // 4,5,6 - Scientists
            // 7,8,9 - Students
            // 12 - Directors Team
            // PCs

            $darray[$arrayInc] = array(
                'title' => $category['title'],
                'shouldbesorted' => true,
                'uid' => $category['uid'],
                'data' => array()
            );

            
            $darray[$arrayInc]['shouldbesorted'] = false;

            $personInc = 0;
            foreach($category['subgroups'] as $subgroup) {
                $subgroup = $psgR->findByUid($subgroup);

                $members = $subgroup->getMembers();

                $tmpCategory = array('title' => 'Directors Team',);
                foreach($members as $memberIndex => $member) {
                    $tmpCategory['personuids'][] = $member->getUid();
                }

                $orderedMembers = array();

                foreach($members as $memberIndex => $member) {
                    $leader = false;
                    $assistents = false;
                    foreach($member->getSubgroup() as $lGroup) {
                        if($lGroup->getUid() == $this->config['attoworld2']['subgroups']['executive']) {
                            $leader = true;
                        }
                        if($lGroup->getUid() == $this->config['attoworld2']['subgroups']['assistents']) {
                            $assistents = true;
                        }
                    }

                    if($leader === true && $assistents === false || $member->getIsgroupleader() == 1) {
                        $orderedMembers = array_reverse($orderedMembers);
                        array_push($orderedMembers, $member);
                        $orderedMembers = array_reverse($orderedMembers);

                    } else {
                        array_push($orderedMembers, $member);
                    }
                }

                $currentLoop = 0;
                foreach($orderedMembers as $memberIndex => $member) {
                    $this->createperson(null, $member, $darray, $personInc, $arrayInc, $tmpCategory, $pR, $pubR, 'dt', $persons, $catIndex, $usedPersons, $currentLoop, $paR);

                    $personInc++;
                }
            }
              
            $arrayInc++;
        }

        foreach ($darray as $index => $category) {
            if($category['shouldbesorted'] === true) {
                $tmp = $category['data'];
                $tmp = $this->array_msort($tmp, array('sorting' => SORT_ASC));
                $darray[$index]['data'] = $tmp;
            }
        }
        
        // Teammember-Ergänzung
        /*
            $sort_col = array();
            foreach ($array as $key=> $row) {
            $sort_col[$key] = $row['crdate'];
            }

            array_multisort($sort_col, SORT_ASC, $array);
        */

        $pR = $this->objectManager->get('Ferenckrausz\Attoworld\Domain\Repository\ProjectRepository');
        $projects = $pR->findAll();
        
        if ($this->request->hasArgument('group')) {
            $group = $this->request->getArgument('group');

            $this->view->assign('group', $group);
        } else {
            $this->view->assign('group', '');
        }
        
        // Welcher Tab soll nach Aufruf der Gruppe geöffnet sein?
        if ($this->request->hasArgument('type')) {
            $type = $this->request->getArgument('type');
            
            $this->view->assign('type', $type);
        }
        
        // Bei Gruppen, mit zwei Leadern, die erste Person nicht anklicken
        $this->view->assign('twoleaders', json_encode($this->config['attoworld2']['projects']['twoleaders']));
        
        $pR = $this->objectManager->get('Ferenckrausz\Attoworld\Domain\Repository\PersonRepository');
        $person = $pR->findByUid($this->config['attoworld2']['person']['nils']);
        
        $nils['sorting'] = $person->getSurname();
        $nils['model'] = $person;
        $pubs = $pubR->findByAuthors($person->getUid());

        if(empty($pubs)) {
            $i = 0;
            foreach ($pubs as $pub) {
                if ($i >= 3) {
                    break;
                } else {
                    $nils['pubs'][] = $pubs->offsetGet($i);
                }

                $i++;
            }
        }

        /*
        $pas = $paR->findAll();
        foreach ($pas as $pa) {
            if ($pa->getPerson() == $person->getUid()) {
                foreach($pa->getLocation() as $iLocation => $vLocation) {
                    $nils['address']['locations'][$vLocation->getTitle()]['address'] = $pa;
                    $nils['address']['locations'][$vLocation->getTitle()]['rooms']['value'] = $pa->getRoomnumber();
                    $nils['address']['locations'][$vLocation->getTitle()]['rooms']['type'] = $pa->getKind();
                    $nils['address']['locations'][$vLocation->getTitle()]['rooms']['numbers'][$pa->getKind()][] = $pa->getPhonenumber();
                }
            }
        }
        */
        
        $pas = $paR->findAll();
        foreach ($pas as $pa) {
            if($pa->getPerson() == $person->getUid()) {
                foreach($pa->getLocation() as $iLocation => $vLocation) {
                    $nils['address']['locations'][$vLocation->getTitle()]['address'] = $pa;

                    $rn = $pa->getRoomnumber();
                    $k = $pa->getKind();

                    if(!empty($rn)) {
                        $nils['address']['locations'][$vLocation->getTitle()]['rooms']['value'] = $rn;
                    }
                    if(!empty($k)) {
                        $nils['address']['locations'][$vLocation->getTitle()]['rooms']['type'] = $k;
                    }

                    $nils['address']['locations'][$vLocation->getTitle()]['rooms']['numbers'][$pa->getKind()][] = $pa->getPhonenumber();
                }
            }
        }
        
        
        

        foreach ($pmails as $pmail) {
            if ($pmail->getPerson() == $person->getUid()) {
                $nils['emails'][] = $pmail;
            }
        }

        // $teammembers = $pR->findByCategory($pCategory->getUid());
        $sgR = $this->objectManager->get('Ferenckrausz\Attoworld\Domain\Repository\PersonsubgroupRepository');
        $sgRes = $sgR->findByUid($this->config['attoworld2']['subgroups']['technicalstaff']);

        $members = array();
        $ms = $sgRes->getMembers();

        $mWO = array();
        foreach($ms as $m) {
            if($m->getUid() !== $person->getUid()) {
                $onwebpage = true;
                foreach ($m->getCategory() as $pCategory) {
                    if ($pCategory->getUid() == $this->config['attoworld2']['category']['notinweb']) {
                        $onwebpage = false;
                    }
                }
                
                if($onwebpage === true) {
                    $mWO[] = $m;
                }
            }
        }
        
        $nils['members'] = $mWO;

        $this->view->assign('nils', $nils);
        $this->view->assign('categories', $categories);
        $this->view->assign('persons', $persons);
        $this->view->assign('subgroups', $subgroups);
        $this->view->assign('projects', $projects);
        $this->view->assign('myarray', $array);
        $this->view->assign('parray', $parray);
        $this->view->assign('darray', $darray);
        $this->view->assign('subgroups', $psRes);
    }

    /**
     * Baut die Kontakt-Informationen auf der Lap-Staff-Seite zusammen
     * 
     * @param type $array       Das Array, in welchem die Werte gespeichetr werden
     * @param type $arrayInc    Das äußere Arrayinkrement
     * @param type $person      Das Personenobjekt mit den Informationen der jeweiligen Person
     * @param type $personInc   Der äußere Personeniterator
     */
    public function buildContactData(&$array, $arrayInc, $person, $personInc) {
        
        $paR = $this->objectManager->get('Ferenckrausz\Attoworld\Domain\Repository\PersonaddressRepository');
        $pas = $paR->findAll();
        
        /*
        foreach($pas as $i => $pa) {
            $json = $pa->getData();
            $data = json_decode($json);
                
            foreach($data->phonenumbers as $value) {
                if($index == 'phonenumbers') {
                    $array[$arrayInc]['data'][$personInc]['address']['json']['phonenumber'][] = $value->number;
                }
                if($index == 'roomnumbers') {
                    $array[$arrayInc]['data'][$personInc]['address']['json']['roomnumber'][] = array(
                        $value->number,
                        $value->kind
                    );
                }
                if($index == 'emails') {
                    $array[$arrayInc]['data'][$personInc]['address']['json']['emails'][] = $value->number;
                }
            }
        }
        */
        
        foreach ($pas as $pa) {
            if ($pa->getPerson() == $person->getUid()) {
                
                
                
                $paJson = json_decode($pa->getData());
                $array[$arrayInc]['data'][$personInc]['address']['locationsjson'][] = $paJson;
                
                foreach($pa->getLocation() as $iLocation => $vLocation) {
                    $array[$arrayInc]['data'][$personInc]['address']['locations'][$vLocation->getTitle()]['address'] = $pa;

                    $rn = $pa->getRoomnumber();
                    $k = $pa->getKind();

                    if(!empty($rn)) {
                        $array[$arrayInc]['data'][$personInc]['address']['locations'][$vLocation->getTitle()]['rooms']['value'] = $rn;
                    }
                    if(!empty($k)) {
                        $array[$arrayInc]['data'][$personInc]['address']['locations'][$vLocation->getTitle()]['rooms']['type'] = $k;
                    }
            
                    $array[$arrayInc]['data'][$personInc]['address']['locations'][$vLocation->getTitle()]['rooms']['numbers'][$pa->getKind()][] = $pa->getPhonenumber();
                    $array[$arrayInc]['data'][$personInc]['address']['locations'][$vLocation->getTitle()]['rooms']['numbers'][$pa->getKind()][] = $pa->getPhonenumber();
                }
                
            }
        }
        
        $array[$arrayInc]['data'][$personInc]['address']['locationsjson'] = ($array[$arrayInc]['data'][$personInc]['address']['locationsjson']);
        
        
        // Die Kontaktpersonen eines Personendatensatzes, bspw. Ferenc mit Klaus und Renate
        $cs = $person->getContact();
        
        if(!empty($cs)) {
            
            foreach($cs as $i => $c) {
                $pas = $paR->findByPerson($c->getUid());
                
                foreach($pas as $pa) {
                    $name = $c->getForename().' '.$c->getSurname();
                    if($c->getTitle()) {
                        $name = $c->getTitle().' '.$name;
                    }

                    $paJson = json_decode($pa->getData());
                    $array[$arrayInc]['data'][$personInc]['address']['contacts'][$i]['name'] = $name;
                    $array[$arrayInc]['data'][$personInc]['address']['contacts'][$i]['uid'] = $c->getUid();
                    $array[$arrayInc]['data'][$personInc]['address']['contacts'][$i]['address']['locationsjson'][] = $paJson;
                }
                $array[$arrayInc]['data'][$personInc]['address']['contacts'][$i]['address']['locationsjson'] = array_reverse($array[$arrayInc]['data'][$personInc]['address']['contacts'][$i]['address']['locationsjson']);
        
            }
        }
    }
    
    /**
     * aut eine Person auf der Lap-Staff-Seite zusammen
     * 
     * @param type $personIndex     Der Index der Person im äußeren Array
     * @param type $person          Der Datensatz der Person
     * @param type $array           Das Array in welchem die Person gespeichert werden soll, call by reference
     * @param type $personInc       Der äußere PersonenIterator
     * @param type $arrayInc        Der äußere ArrayIterator
     * @param type $category        Die Category aus dem Konfigurationsarray, über dem durchlaufen der jeweiligen Person
     * @param type $pR              Das personen Repository
     * @param type $pubR            Das Publikationsrepository, zum herausfiltern der Publikationen der einzelnen Personen
     * @param type $type            Der Typ
     * @param type $persons         Das Personenarray
     * @param type $catIndex
     * @param type $usedPersons
     * @param type $currentLoop
     * @param type $paR
     */
    private function createperson($personIndex = null, $person, &$array, $personInc, $arrayInc, $category, $pR, $pubR, $type, &$persons, $catIndex, &$usedPersons, $currentLoop, $paR) {
        if($type == 'dt') {
            // var_dump('DTTT',$person->getSurname());
        }
        
        if(!isset($usedPersons[$person->getUid()]) || $usedPersons === null) {
            $onwebpage = true;
            foreach ($person->getCategory() as $pCategory) {
                if ($pCategory->getUid() == $this->config['attoworld2']['category']['notinweb']) {
                    $onwebpage = false;
                }
            }

            if ($onwebpage === true) {
                $takeit = false;

                foreach ($person->getCategory() as $pCategory) {
                    if (isset($category['categoryuids'])) {
                        foreach ($category['categoryuids'] as $categoryuid) {
                            if ($pCategory->getUid() == $categoryuid) {
                                $takeit = true;
                            }
                        }
                    }
                }

                if (isset($category['personuids'])) {
                    foreach ($category['personuids'] as $lclPersonUid) {

                        $lclPerson = $pR->findByUid($lclPersonUid);

                        if ($lclPersonUid == $person->getUid()) {

                            $onwebpage = true;
                            foreach ($person->getCategory() as $pCategory) {
                                if ($pCategory->getUid() == $this->config['attoworld2']['category']['notinweb']) {
                                    $onwebpage = false;
                                }
                            }

                            if ($onwebpage == true) {

                                $positions = $person->getPosition();

                                if (count($positions) == 0) {
                                    $pos = $this->objectManager->get('Ferenckrausz\Attoworld\Domain\Model\Personposition');

                                    $catTitle = '';
                                    foreach ($person->getCategory() as $pCategory) {
                                        if ($pCategory->getUid() == $this->config['attoworld2']['category']['notinweb'] &&
                                            $pCategory->getTitle() !== 'automatic') {

                                            $catTitle = $pCategory->getViewtitle();
                                        }
                                    }

                                    $pos->setTitle(ucfirst($catTitle));
                                    $person->setPosition(array($pos));
                                }

                                // Kategorienamen hinzufügen, falls nicht vorhanden
                                $cats = $person->getCategory();
                                if($cats->count() == 0) {
                                    $pos = $this->objectManager->get('Ferenckrausz\Attoworld\Domain\Model\Personposition');
                                    $pos->setTitle(ucfirst($category['title']));
                                    $lclPerson->setPosition(array($pos));
                                }

                                $array[$arrayInc]['data'][$personInc]['sorting'] = $person->getSurname();
                                $array[$arrayInc]['data'][$personInc]['model'] = $person;
                                
                                $pubs = $pubR->findByAuthors($person->getUid());

                                if(!empty($pubs)) {
                                    $i = 0;
                                    foreach ($pubs as $pub) {
                                        if ($i >= 3) {
                                            break;
                                        } else {
                                            $array[$arrayInc]['data'][$personInc]['pubs'][] = $pubs->offsetGet($i);
                                        }

                                        $i++;
                                    }
                                }
                                
                                $this->buildContactData($array, $arrayInc, $person, $personInc);
                                
                                foreach ($pmails as $pmail) {
                                    if ($pmail->getPerson() == $person->getUid()) {
                                        $array[$arrayInc]['data'][$personInc]['emails'][] = $pmail;
                                    }
                                }
                                
                                /*
                                $teammembers = $pR->findByCategory($pCategory->getUid());
                                */
                                $teammembers = $this->getTeammembers($person);
                                
                                // Sich selbst entfernen
                                if (!empty($teammembers)) {
                                    foreach ($teammembers as $i => $v) {
                                        if ($v['model']->getUid() == $person->getUid()) {
                                            unset($teammembers[$i]);
                                        }
                                    }
                                }

                                if (!empty($teammembers)) {
                                    $array[$arrayInc]['data'][$personInc]['members'] = $teammembers;
                                }

                                if($usedPersons !== null) {
                                    $usedPersons[$person->getUid()] = $person->getForename().' '.$person->getSurname();
                                }

                            }
                        }
                    }
                } else {

                    if (isset($category['categoryuids'])) {

                        if ($takeit) {

                            $onwebpage = true;
                            $isAttoGroup = false;
                            foreach ($person->getCategory() as $pCategory) {
                                if ($pCategory->getUid() == $this->config['attoworld2']['category']['notinweb']) {
                                    $onwebpage = false;
                                }
                                
                                if ($pCategory->getUid() == $this->config['attoworld2']['category']['atto3']) {
                                    $isAttoGroup = true;
                                }
                            }

                            if ($onwebpage == true) {

                                $positions = $person->getPosition();
                                
                                $sgR = $this->objectManager->get('Ferenckrausz\Attoworlddata\Domain\Repository\PeoplesubgroupRepository');

                                $pR = $this->objectManager->get('Ferenckrausz\Attoworld\Domain\Repository\ProjectRepository');
                                $projects = $pR->findAll();
                                
                                $project = null;
                                foreach($projects as $p) {
                                    $ms = $p->getMember();
                                    foreach($ms as $m) {
                                        if($m->getUid() === $person->getUid()) {
                                            $project = $p;
                                        }
                                    }
                                }

                                $catTitle = '';
                                foreach ($person->getCategory() as $pCategory) {
                                    if ($pCategory->getUid() !== $this->config['attoworld2']['category']['notinweb'] &&
                                        $pCategory->getTitle() !== 'automatic' &&
                                        $pCategory->getTitle() !== 'pc_atto3') {

                                        $catTitle .= $pCategory->getViewtitle();
                                    }
                                }

                                $sgPs = $person->getSubgroup();
                                $subGroupTitle = '';
                                $subGroupTitleString = '';
                                $inc = 0;
                                
                                if($person->getForename() == 'Jonathan') {
                                    // var_dump($sgPs->count());
                                }
                                
                                
                                $gArray = '';
                                foreach($sgPs as $i => $sgP) {
                                    $sg = $sgR->findBySubgroupen($sgP->getTitle());

                                    //$title = $sg->current()->getShortname();
                                    $shortTitleAttoworld = $sgP->getShortname();
                                    if(!empty($shortTitleAttoworld)) {
                                        $title = $shortTitleAttoworld;
                                    }
                                    
                                    // Projekttitel benutzen
                                    /*
                                    if($project !== null) {
                                        // Wenn Projekttitel
                                        
                                        
                                        // Assoziierte ausschließen
                                        if($project->getUid() !== $this->config['attoworld3']['projects']['associated']) {
                                            $title = $project->getShorttitle();
                                        }
                                    }
                                    */

                                    if($inc == 0) {
                                        $subGroupTitle = $title;
                                    } else {
                                        $gArray .= $title.'<br>';
                                    }

                                    if($inc > 0) {
                                        $subGroupTitleString .= ', ';
                                    }
                                    $subGroupTitleString .= $title;

                                    $inc++;
                                }

                                if($inc > 1) {
                                    // die('Liebe Tanya,<br><br>wenn du diese Zeilen liest, dann hast du geflunkert:<br>'.$person->getForename().' '.$person->getSurname().' hat mehr als eine Gruppe! Neben "'.$subGroupTitle.'" hat er auch die Gruppen:<br><br>'.$gArray.'<br>Hier müsste man sich für eine entscheiden.<br>Und Amu ist nicht vorbei gekommen! Da hast du auch geflunkert.<br><br>Liebe Grüße und einen sonnigen Tag! :-)');
                                }

                                if (count($positions) == 0) {
                                    $pos = $this->objectManager->get('Ferenckrausz\Attoworld\Domain\Model\Personposition');

                                    if(!empty($subGroupTitleString)) {
                                        if($person->getIsgroupleader() == 1) {
                                            $pos->setTitle('Research Group leader of '.$subGroupTitleString);
                                        } else {
                                            $pos->setTitle(ucfirst($catTitle).' in '.$subGroupTitleString);
                                        }
                                    } else {
                                        $pos->setTitle(ucfirst($catTitle));
                                    }
                                    
                                    $person->setPosition(array($pos));
                                } else {
                                    if (count($positions) == 1) {
                                        
                                        if($catIndex == 'scientists') {
                                            
                                            $positionsArray = $positions->toArray();
                                            
                                            for($inKrement = 0; $inKrement <= count($positionsArray); $inKrement++) {
                                                if($positionsArray[$inKrement] !== null) {
                                                    $positionsArray[$inKrement]->setTitle($positionsArray[$inKrement]->getTitle() . ' in '.$subGroupTitleString); 
                                                }
                                            }
                                            
                                            $person->setPosition($positionsArray);
                                        }
                                    }
                                    
                                }

                                
                                $array[$arrayInc]['data'][$personInc]['sorting'] = $person->getSurname();
                                $array[$arrayInc]['data'][$personInc]['model'] = $person;
                                $pubs = $pubR->findByAuthors($person->getUid());
                                
                                if(!empty($pubs)) {
                                    $i = 0;
                                    foreach ($pubs as $pub) {
                                        if ($i >= 3) {
                                            break;
                                        } else {
                                            $array[$arrayInc]['data'][$personInc]['pubs'][] = $pubs->offsetGet($i);
                                        }

                                        $i++;
                                    }
                                }

                               
                                
                                $this->buildContactData($array, $arrayInc, $person, $personInc);
                                
                                foreach ($pmails as $pmail) {
                                    if ($pmail->getPerson() == $person->getUid()) {
                                        $array[$arrayInc]['data'][$personInc]['emails'][] = $pmail;
                                    }
                                }

                                // $teammembers = $pR->findByCategory($pCategory->getUid());
                                $teammembers = $this->getTeammembers($person);

                                // Sich selbst entfernen
                                if (!empty($teammembers)) {
                                    foreach ($teammembers as $i => $v) {
                                        if ($v['model']->getUid() == $person->getUid()) {
                                            unset($teammembers[$i]);
                                        }
                                    }
                                }

                                if (!empty($teammembers)) {
                                    $array[$arrayInc]['data'][$personInc]['members'] = $teammembers;
                                }

                                if($usedPersons !== null) {
                                    $usedPersons[$person->getUid()] = $person->getForename().' '.$person->getSurname();
                                }
                            }
                        }
                    } else {
                        if (isset($category['persontype'])) {
                            if ($category['persontype'] == 'pcs') {

                                $onwebpage = true;
                                foreach ($person->getCategory() as $pCategory) {
                                    if ($pCategory->getUid() == $this->config['attoworld2']['category']['notinweb']) {
                                        $onwebpage = false;
                                    }
                                }

                                if ($onwebpage == true &&
                                    $person->getIsgroupleader() == 1) {

                                    $positions = $person->getPosition();

                                    if (count($positions) == 0) {
                                        $pos = $this->objectManager->get('Ferenckrausz\Attoworld\Domain\Model\Personposition');

                                        $catTitle = '';
                                        foreach ($person->getCategory() as $pCategory) {
                                            if ($pCategory->getUid() == $this->config['attoworld2']['category']['notinweb'] &&
                                                $pCategory->getTitle() !== 'automatic') {

                                                $catTitle = $pCategory->getViewtitle();
                                            }
                                        }
                                        
                                        if($catIndex == 'director') {
                                            $catTitle = 'Director';
                                        }
                                        
                                        $pos->setTitle(ucfirst($catTitle));
                                        $person->setPosition(array($pos));
                                    }

                                    $array[$arrayInc]['data'][$personInc]['sorting'] = $person->getSurname();
                                    $array[$arrayInc]['data'][$personInc]['model'] = $person;
                                    $pubs = $pubR->findByAuthors($person->getUid());

                                    if(!empty($pubs)) {
                                        $i = 0;
                                        foreach ($pubs as $pub) {
                                            if ($i >= 3) {
                                                break;
                                            } else {
                                                $array[$arrayInc]['data'][$personInc]['pubs'][] = $pubs->offsetGet($i);
                                            }

                                            $i++;
                                        }
                                    }

                                    $this->buildContactData($array, $arrayInc, $person, $personInc);

                                    foreach ($pmails as $pmail) {
                                        if ($pmail->getPerson() == $person->getUid()) {
                                            $array[$arrayInc]['data'][$personInc]['emails'][] = $pmail;
                                        }
                                    }

                                    // $teammembers = $pR->findByCategory($pCategory->getUid());
                                    $teammembers = $this->getTeammembers($person);

                                    // Sich selbst entfernen
                                    if (!empty($teammembers)) {
                                        foreach ($teammembers as $i => $v) {
                                            if ($v['model']->getUid() == $person->getUid()) {
                                                unset($teammembers[$i]);
                                            }
                                        }
                                    }

                                    if (!empty($teammembers)) {
                                        $array[$arrayInc]['data'][$personInc]['members'] = $teammembers;
                                    }

                                    if($usedPersons !== null) {
                                        $usedPersons[$person->getUid()] = $person->getForename().' '.$person->getSurname();
                                    }
                                }
                            }
                        } else {

                        }
                    }
                }
            }
        }
    }

    /**
     * Baut die Teammembers zu einer Person auf der Lap-Staff Seite zusammen
     * 
     * @param type $person
     * @return type
     */
    private function getTeammembers($person) {
        
        // Teammember der Assoziierten nicht mit ausgeben
        $pR = $this->objectManager->get('Ferenckrausz\Attoworld\Domain\Repository\ProjectRepository');
        $aP = $pR->findByUid($this->config['attoworld3']['projects']['associated']);
        
        $ms = $aP->getMember();
        
        $isAssi = false;
        foreach($ms as $m) {
            if($m->getUid() == $person->getUid()) {
                $isAssi = true;
            }
        }
        
        // if($isAssi === false) { // - wieder raus
        if($person->getUid() !== $this->config['attoworld2']['person']['ferenc']) {

            $pR = $this->objectManager->get('Ferenckrausz\Attoworld\Domain\Repository\ProjectRepository');
            $ps = $pR->findAll();

            $memberType = '';

            $members = array();
            foreach($ps as $p) {
                $ms = $p->getMember();

                foreach($ms as $m) {
                    if($m->getUid() == $p->getUid()) {
                        $members = $ms;
                        $memberType = 'project';
                    }
                }
            }

            if($memberType !== 'project' || $isAssi === true) {
                $sgR = $this->objectManager->get('Ferenckrausz\Attoworld\Domain\Repository\PersonsubgroupRepository');
                $sgRes = $sgR->findAll();

                //$members = array();

                foreach($sgRes as $p) {
                    $takeIt = false;

                    if($p->getUid() !== $this->config['attoworld2']['subgroups']['executive']) {
                        $ms = $p->getMembers();

                        foreach($ms as $m) {
                            if($m->getUid() == $person->getUid()) {
                                $takeIt = true;
                                break;

                                $memberType = 'subgroup';
                            }
                        }

                        if($takeIt === true) {

                            foreach($ms as $m) {
                                $members[] = $m;
                            }

                        }
                    }
                } 
            }

            $isInList = array();
            $mWO = array();
            foreach($members as $m) {
                if($m->getUid() !== $p->getUid()) {

                    if($m->getMember() == 3) {
                        if(!isset($isInList[$m->getUid()]) &&
                            $m->getUid() !== $this->config['attoworld2']['person']['ferenc']) {

                            $mWO[] = array(
                                'model' => $m,
                                'sorting' => $m->getSurname()
                            );
                            $isInList[$m->getUid()] = true; 
                        }
                    }
                }
            }

            $mWO = $this->array_msort($mWO, array('sorting' => SORT_ASC));

            return $mWO;
        } else {
            return null;
        }
        //}
    }
    
    public function newsAction() {
        $pid = $GLOBALS['TSFE']->id;

        $nR = $this->objectManager->get('Ferenckrausz\Attoworld\Domain\Repository\NewsRepository');
        $news = $nR->findAll();

        $this->view->assign('news', $news);
    }

    /**
     * Slideshow im Kopfbereich der Hauptseite, sowie der Reserahc-Seite, gekoppelt mit der Contentslideshow
     */
    public function headerslideshowAction() {
        $pid = $GLOBALS['TSFE']->id;
        $type = $this->settings['type'];

        if ($type == '1') {
            $sR = $this->objectManager->get('Ferenckrausz\Attoworld\Domain\Repository\SlideRepository');
            $slides = $sR->findByPid($pid);
            $randomIndex = 1;
            
            $this->view->assign('slides', $slides);
            $this->view->assign('counter', $slides->count());
            $this->view->assign('active', $randomIndex);
        } else {
            $pR = $this->objectManager->get('Ferenckrausz\Attoworld\Domain\Repository\ProjectRepository');
            $projects = $pR->findAll();
            
            $projectArr = array();
            foreach ($projects as $index => $project) {
                $projectArr[$index] = $project;
            }

            $randomIndex = $this->randomIndex;

            if (isset($projectArr[$randomIndex])) {
                $projectArr[$randomIndex]->setActive(1);
            }

            $this->view->assign('projects', $projects);
            $this->view->assign('counter', $projects->count());
            $this->view->assign('active', $randomIndex);
        }

        $this->view->assign('pid', $pid);
    }

    /**
     * Die Slideshow auf der Reseach-Seite, durchsliden der einzelnen Projekte
     */
    public function contentslideshowAction() {
        $pid = $GLOBALS['TSFE']->id;
        $type = $this->settings['type'];

        if ($type == '1') {
            $sR = $this->objectManager->get('Ferenckrausz\Attoworld\Domain\Repository\SlideRepository');
            $slides = $sR->findByPid($pid);

            $slidesArr = array();
            foreach ($slides as $index => $slide) {
                $slidesArr[$index] = $slide;
            }

            $randomIndex = 1;

            if (isset($slidesArr[$randomIndex])) {
                $slidesArr[$randomIndex]->setActive(1);
            }

            $this->view->assign('slides', $slidesArr);
            $this->view->assign('active', $randomIndex);
        } else {
            $pR = $this->objectManager->get('Ferenckrausz\Attoworld\Domain\Repository\ProjectRepository');
            $projects = $pR->findAll();

            $projectArr = array();
            foreach ($projects as $index => $project) {
                $projectArr[$index] = $project;
            }
            
            $randomIndex = $this->randomIndex;

            if (isset($projectArr[$randomIndex])) {
                $projectArr[$randomIndex]->setActive(1);
            }

            $this->view->assign('projects', $projectArr);
            $this->view->assign('active', $randomIndex);
        }

        $this->view->assign('pid', $pid);
    }

    /**
     * Slideshow auf den Projektunterseiten
     */
    public function projectcontentslideshowAction() {
        $pR = $this->objectManager->get('Ferenckrausz\Attoworld\Domain\Repository\ProjectRepository');
        $projects = $pR->findAll();

        $this->view->assign('projects', $projects);
    }

    /**
     * Plugin auf der News-Übersichtsseite, Ausgabe aller News, inkl einer kleinen Box an der dritten Stelle mit Verweis auf die In The Press-Seite
     */
    public function latestnewsfeatureAction() {
        $pid = $GLOBALS['TSFE']->id;

        $nR = $this->objectManager->get('Ferenckrausz\Attoworld\Domain\Repository\NewsRepository');
        $news = $nR->findAll();
        $newsPR = $nR->getAll();
        
        // Ersetzen der News, mit den Datensätzen, welche ein Pressrelease haben
        
        $tNews = array();
        foreach($news as $n) {
            
            if($n->getBreaking() !== 1) {

                $refId = $n->getRefid();
                if($refId > 0) {
                    $found = $nR->findByJoinid($refId);

                    if($found->count() > 0) {
                        if($found->current() !== null) {
                            $tNews[] = $found->current();
                        } else {
                            $tNews[] = $n;
                        }
                    } else {
                        $tNews[] = $n;
                    }
                } else {
                    if($n->getRefid() == 0 && $n->getJoinid() == 0) {
                        $tNews[] = $n;
                    }
                }
            }
            
        }
        $news = $tNews;
        
        
        $mR = $this->objectManager->get('Ferenckrausz\Attoworld\Domain\Repository\MagazinRepository');
        $ms = $mR->findFirstThree();

        $this->view->assign('magazines', $ms);
        $this->view->assign('news', $news);
        
        $mR = $this->objectManager->get('Ferenckrausz\Attoworld\Domain\Repository\MagazinRepository');
        $ms = $mR->findAll(0, $this->latestNewsFeaturedLength);
        
        $dpR = $this->objectManager->get('Ferenckrausz\Attoworld\Domain\Repository\NewspaperRepository');
        $dps = $dpR->findAll(0, $this->latestNewsFeaturedLength);
        
        $avR = $this->objectManager->get('Ferenckrausz\Attoworld\Domain\Repository\AudioorvideoRepository');
        $avs = $avR->findAll(0, $this->latestNewsFeaturedLength);
        
        $po = array();
        foreach($ms as $m) {
            $pubtstamp = $m->getPubtstamp();
            
            $po[] = array(
                'model' => $m,
                'type' => 'm',
                'sorting' => $pubtstamp
            );
        }
        foreach($dps as $m) {
            $pubtstamp = $m->getPubtstamp();
            
            $po[] = array(
                'model' => $m,
                'type' => 'dp',
                'sorting' => $pubtstamp
            );
        }
        foreach($avs as $m) {
            $pubtstamp = $m->getPubtstamp();
            
            $po[] = array(
                'model' => $m,
                'type' => 'av',
                'sorting' => $pubtstamp
            );
        }
        
        $po = $this->array_msort($po, array('sorting' => SORT_DESC));
        
        $po = $this->cropResultArray($po, $this->latestNewsFeaturedLength, 0);
        $this->view->assign('po', $po);
    }

    /**
     * Die letzten News auf der jeweiligen Projektunterseite
     */
    public function latestnewsAction() {
        $pid = $GLOBALS['TSFE']->id;

        $pR = $this->objectManager->get('Ferenckrausz\Attoworld\Domain\Repository\ProjectRepository');
        $project = $pR->findByPagepid($pid)->getFirst();

        $members = $project->getMember();
        $projectUid = $project->getUid();

        $items = array();
        $index = 0;

        $jR = $this->objectManager->get('Ferenckrausz\Attoworld\Domain\Repository\JobsRepository');
        $jobsRS = $jR->findByPid($pid);
        foreach ($jobsRS as $job) {
            $items[$index]['crdate'] = $job->getCrdate();
            $items[$index]['object'] = $job;
            $items[$index]['type'] = 'job';

            $index++;
        }

        $jR = $this->objectManager->get('Ferenckrausz\Attoworld\Domain\Repository\NewsRepository');
        $newsRS = $jR->findByPid($pid);
        
        $usedNews = array();
        
        foreach ($newsRS as $newsitem) {

            $items[$index]['crdate'] = $newsitem->getPubdate();
            $items[$index]['object'] = $newsitem;
            $items[$index]['type'] = 'news';

            $usedNews[$newsitem->getUid()] = true;
            
            $index++;
        }
        
        $newsRS = $jR->findAll();
        foreach ($newsRS as $newsitem) {
            $groupString = $newsitem->getGroups();
            $groups = explode(',',$groupString);
            
            $isInGroup = false;
            if($groupString == $project->getUid()) {
                $isInGroup = true;
            } else {
                foreach($groups as $group) {
                    if($group == $project->getUid()) {
                        $isInGroup = true;
                        break;
                    }
                }
            }
            
            if($isInGroup === true) {
                
                if(!isset($usedNews[$newsitem->getUid()])) {
                    $items[$index]['crdate'] = $newsitem->getPubdate();
                    $items[$index]['object'] = $newsitem;
                    $items[$index]['type'] = 'news';

                    $index++;
                }
                
            }
        }
        
        $tNews = array();
        foreach($items as $n) {
            
            if($n['type'] == 'news') {

                $refId = $n['object']->getRefid();
                if($refId > 0) {
                    $found = $jR->findByJoinid($refId);

                    if($found->count() > 0) {
                        if($found->current() !== null) {
                            $tNews[] = array(
                                'crdate' => $found->current()->getPubdate(),
                                'object' => $found->current(),
                                'type' => 'news'
                            );
                        } else {
                            $tNews[] = $n;
                        }
                    } else {
                        $tNews[] = $n;
                    }
                } else {
                    $tNews[] = $n;
                }
                
            } else {
                $tNews[] = $n;
            }
        }
        $items = $tNews;
        
        
        $items = $this->array_msort($items, array('crdate' => SORT_DESC));
        $firstItems = ($items);
        
        $this->view->assign('firstItemsCounter', count($firstItems));
        $this->view->assign('firstItems', $firstItems);
        $this->view->assign('projectpageid', $pid);
    }

    /**
     * Plugin auf der Contact-Seite
     */
    public function infoaddressboxAction() {
        
    }

    /**
     * Plugin auf der Projektseite, Verweis zu den einzelnen Unterseiten sowie der Gruppenspezifischen Filterung
     */
    public function linkonsubpageAction() {
        $pid = $GLOBALS['TSFE']->id;

        $spR = $this->objectManager->get('Ferenckrausz\Attoworld\Domain\Repository\LinkonsubpageRepository');
        $rsElements = $spR->findByPid($pid);
        
        $this->view->assign('elements', $rsElements);
        $this->view->assign('projectpageid', $pid);
    }

    /**
     * Plugin
     */
    public function linkonsubgroupsAction() {
        $pid = $GLOBALS['TSFE']->id;

        $lsgR = $this->objectManager->get('Ferenckrausz\Attoworld\Domain\Repository\LinkonsubgroupRepository');
        $lsgRRS = $lsgR->findByPid($pid);

        $this->view->assign('links', $lsgRRS);
    }

    /**
     * Die Breaking-News auf der News-Seite
     */
    public function breakingnewsAction() {
        $pid = $GLOBALS['TSFE']->id;
        
        $ncR = $this->objectManager->get('Ferenckrausz\Attoworld\Domain\Repository\NewscontainerRepository');
        $nR = $this->objectManager->get('Ferenckrausz\Attoworld\Domain\Repository\NewsRepository');
        $pR = $this->objectManager->get('Ferenckrausz\Attoworld\Domain\Repository\ProjectRepository');
        
        $prs = $pR->findAll();
        //$ncs = $ncR->findAll();
        $ns = $nR->findAll();
        
        $pids = array();
        foreach($prs as $p) {
            $pids[$p->getPagepid()] = $p->getUid();
        }
        
        $usedUids = array();
        
        $breakingNews = array();
        foreach($ns as $nitem) {
            if($nitem->getBreaking() == 1) {
                $projects = $nitem->getGroups();
                $projectArray = explode(',',$projects);
                
                $projectUid = $projectArray[0];
                
                $p = $pR->findByPagepid($nitem->getPid());
                if($nitem->getPid() !== $this->config['attoworld3']['pagetree']['news']) {
                    if($p->count() > 0) {
                        // var_dump($p->current()->getTitle(), $projectUid, $nitem->getTitle());
                        $projectUid = $p->current()->getUid();
                    }
                }
                
                if(!isset($usedUids[$projectUid])) {
                    $breakingNews[] = array(
                        'model' => $nitem,
                        //'project' => $pids[$nitem->getPid()],
                        'project' => $projectUid,
                    );
                }

                $usedUids[$projectUid] = true;
            }
        }
        
        $projectUid = null;
        foreach($ns as $i => $nitem) {
            if($i == $this->randomIndex) {
                $projectUid = $pids[$nitem->getPid()];
            }
        }
        
        $this->view->assign('news', $breakingNews);
        $this->view->assign('projectuid', $projectUid);
    }

    /**
     * Pressreleases für gefeaturerte Publikationen
     */
    public function featuredpublicationAction() {
        $pid = $GLOBALS['TSFE']->id;

        $pR = $this->objectManager->get('Ferenckrausz\Attoworld\Domain\Repository\NewsRepository');
        $prs = $pR->findByBreaking(1);

        $news = null;
        $inc = 0;
        foreach($prs as $i => $p) {
            
            /*
            
            // Geafeaturte Publications
            $pr = $p->getPressrelease()->current();
            
            if($pr !== null) {
                $pub = $pr->getPublications()->current();
                $featured = $pub->getFeatured();

                if($featured == 1) {
                    if($inc <= $this->totalFeaturedNewsOnNewsSite - 1) {
                        $news[] = $p;
                        $inc++;
                    }
                }
            }
            
            */
            
            $news[] = $p;
            $inc++;
            
        }
        
        $news = array_reverse($news);
        
        $this->view->assign('news', $news);
    }

    /**
     * Action für die Magazin-Filterungs-Üersicht, News->Find in the Press
     */
    public function magazinesAction() {
        $pid = $GLOBALS['TSFE']->id;

        $jR = $this->objectManager->get('Ferenckrausz\Attoworld\Domain\Repository\JournalRepository');
        $jsMagazines = $jR->findForFrontendByWebcat($this->magazinTypeMagazin);
        $jsDailypress = $jR->findForFrontendByWebcat($this->magazinTypeDailypress);
        
        // Raussuchen der Datensätze
        $mR = $this->objectManager->get('Ferenckrausz\Attoworld\Domain\Repository\MagazinRepository');
        $ms = $mR->findAll();
        
        $dpR = $this->objectManager->get('Ferenckrausz\Attoworld\Domain\Repository\NewspaperRepository');
        $dps = $dpR->findAll();
        
        $avR = $this->objectManager->get('Ferenckrausz\Attoworld\Domain\Repository\AudioorvideoRepository');
        $avs = $avR->findAll();
        
        $po = array();
        foreach($ms as $m) {
            $po[] = array(
                'model' => $m,
                'type' => 'm',
                'sorting' => $m->getPubtstamp()
            );
        }
        foreach($dps as $m) {
            $po[] = array(
                'model' => $m,
                'type' => 'dp',
                'sorting' => $m->getPubtstamp()
            );
        }
        
        $po = $this->array_msort($po, array('sorting' => SORT_DESC));
        $po = $this->cropResultArray($po, $this->pubslength, $this->pubsstart);
        
        // Heraussuchen der Jahre
        $msYears = $mR->findYears();
        $dpsYears = $dpR->findYears();
        $avsYears = $avR->findYears();
        
        $years = array();
        foreach($msYears as $index => $year) {
            $years[$index] = $year;
        }
        
        foreach($dpsYears as $index => $dpYear) {
            if(isset($years[$index])) {
                $years[$index]['counts'] += $dpYear['counts'];
            } else {
                $years[$index] = $dpYear;
            }
        }
        foreach($avsYears as $index => $avYear) {
            if(isset($years[$index])) {
                $years[$index]['counts'] += $avYear['counts'];
            } else {
                $years[$index] = $avYear;
            }
        }
        
        krsort($years);
        
        $this->view->assign('po', $po);
        
        $this->view->assign('years', $years);
        $this->view->assign('journalsmagazin', $jsMagazines);
        $this->view->assign('journalsdailypress', $jsDailypress);
    }

    /*
     * Einzelnes Pressrelease, welches eine gefeaturete Publikation hat
     */
    public function singlenewsitemAction() {
        $pR = $this->objectManager->get('Ferenckrausz\Attoworld\Domain\Repository\NewsRepository');

        if ($this->request->hasArgument('uid')) {
            $uid = $this->request->getArgument('uid');
            $newsitem = $pR->findByUid($uid);

            $this->view->assign('newsitem', $newsitem);
        } else {
            
        }
    }
    
    /**
     * Javascript-Konfiguration für Menüs, etc. erstellen
     */
    public function javascriptconfigurationAction() {
        $pR = $this->objectManager->get('Ferenckrausz\Attoworld\Domain\Repository\ProjectRepository');
        $projects = $pR->findAll();
        
        $configuration = array();
        
        foreach($projects as $i => $p) {
            $configuration['projects'][$i] = array(
                $p->getTitle()
            );
        }
       
        $pubR = $this->objectManager->get('Ferenckrausz\Attoworld\Domain\Repository\PublicationRepository');

        $authors = $pubR->getAuthors();
        
        foreach($authors as $i => $a) {
            $configuration['filter']['publications']['authors'][$i] = $a->toArray();
        }
        
        $years = $pubR->getYears();
        
        foreach($years as $i => $y) {
            $configuration['filter']['publications']['years'][$i] = $y;
        }
        
        echo "mainConfiguration = ".json_encode($configuration);
        die();
    }
    
    /**
     * Javascript-Konfiguration für Menüs, etc. erstellen
     */
    public function nextappearancesAction() {
        $data = $this->getNextAppearances();
        
        $naR = $this->objectManager->get('Ferenckrausz\Attoworld\Domain\Repository\NextappearanceRepository');
        $naRs = $naR->findAll();
        
        foreach($naRs as $nasV) {
            
            $naRsArr[] = array(
                'model' => $nasV,
                'sorting' => $nasV->getTime()
            );
            
        }
        
        $nas = array();
        foreach($data as $v) {
            
            $naObject = $this->objectManager->get('Ferenckrausz\Attoworld\Domain\Model\Nextappearance');
            
            $naObject->setTitle($v['title']);
            $naObject->setImage($v['image']);
            $naObject->setSubtitle($v['lecturetitle']);
            $naObject->setOrganizer('');
            $naObject->setElementtitle($v['imageformat']);
            $naObject->setDescription($v['bodytext']);
            $naObject->setTime($v['date']);
            $naObject->setLocation($v['place']);
            $naObject->setLink($v['link']);
            
            $nas[] = array(
                'model' => $naObject,
                'sorting' => $naObject->getTime()
            );
        }
        
        $mergedFilterElements = array_merge($nas, $naRsArr);
        
        // Daten wieder raus -_-
        $mergedFilterElements = $nas;
        
        $mergedFilterElements = $this->array_msort($mergedFilterElements, array('sorting' => SORT_ASC));
        
        $this->view->assign('data',$mergedFilterElements);
    }
    
    /**
     * Milestones
     */
    public function milestonesAction() {
        $msR = $this->objectManager->get('Ferenckrausz\Attoworld\Domain\Repository\MilestoneRepository');
        $data = $msR->findAll();
        
        $this->view->assign('data',$data);
    }
    
    /**
     * Coverstories
     */
    public function coverstoriesAction() {
        $csR = $this->objectManager->get('Ferenckrausz\Attoworld\Domain\Repository\CoverstoryRepository');
        $data = $csR->findAll();
        
        $this->view->assign('data',$data);
    }
    
    /**
     * Coverstories
     */
    public function graphicalabstractAction() {
        
    }
    
    /**
     * zitat
     */
    public function zitatAction() {
        
    }
    
    /**
     * Progress Reports
     */
    public function progressreportsAction() {
        $prR = $this->objectManager->get('Ferenckrausz\Attoworld\Domain\Repository\ProgressreportRepository');
        $data = $prR->findAll();
        
        $this->view->assign('data',$data);
    }
    
    /**
     * Slideshow
     */
    public function slideshowAction() {
        $pid = $GLOBALS['TSFE']->id;
        
        $sR = $this->objectManager->get('Ferenckrausz\Attoworld\Domain\Repository\SlideRepository');
        $data = $sR->findByPid($pid);
        
        $this->view->assign('data',$data);
    }
    
    /**
     * Picture for Subsite with link
     */
    public function pictureforsubsitewithlinkAction() {
        
    }
    
    /**
     * Paperarchiv
     */
    public function paperarchivAction() {
        $sR = $this->objectManager->get('Ferenckrausz\Attoworld\Domain\Repository\PaperarchivRepository');
        $data = $sR->findAll();
        
        $this->view->assign('data',$data);
    }

}