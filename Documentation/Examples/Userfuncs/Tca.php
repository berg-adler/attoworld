<?php

    namespace Ferenckrausz\Attoworld\Documentation\Examples\Userfuncs;


    class Tca {
        
        public function Nicetitle(&$parameters, $parentObject) {
            $record = \TYPO3\CMS\Backend\Utility\BackendUtility::getRecord($parameters['table'], $parameters['row']['uid']);
            $newTitle = $record['title'];
            $newTitle .= ' (' . substr(strip_tags($record['poem']), 0, 10) . '...)';
            $parameters['title'] = $newTitle;
        }
        
    }

?>