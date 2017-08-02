<?php

    namespace Ferenckrausz\Attoworld;

    require_once(PATH_t3lib.'class.t3lib_befunc.php');


    class user_LabelClass {
       function getUserLabel(&$params, &$pObj) {
         $id = $params['row']['uid']; //aktuelle uid
         $mylabel = $params['row']['title']; //wie oben holen wir uns den ersten Label

         if ($id) { //zur Sicherheit...
           $item = t3lib_BEfunc::getRecord('tx_attoworld_domain_model_jobs', $id); //uid aus Tabelle holen
           //$label = $GLOBALS['LANG']->sL('LLL:EXT:[attoworld]/locallang_db.xml:[XMLFRAGMENT].'.$item['[DROPDOWNWERT]']);
           $label = 'Title';
        } else $label = '[Fehler!]';
           $params['title'] = $mylabel.', '.$label;
         }
    }

?>