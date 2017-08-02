require_once(PATH_t3lib.'class.t3lib_befunc.php');
<?php

    class user_Tca {
       function Nicetitle(&$params, &$pObj) {
         $id = $params['row']['uid']; //aktuelle uid
         $mylabel = $params['row']['[ERSTERLABEL]']; //wie oben holen wir uns den ersten Label

         if ($id) { //zur Sicherheit...
           $item = t3lib_BEfunc::getRecord('[TABELLENAME]', $id); //uid aus Tabelle holen
           $label = $GLOBALS['LANG']->sL('LLL:EXT:[EXTKEY]/locallang_db.xml:[XMLFRAGMENT].'.$item['[DROPDOWNWERT]']);
         } else $label = '[Fehler!]';
           $params['title'] = $mylabel.', '.$label;
         }
    }

?>