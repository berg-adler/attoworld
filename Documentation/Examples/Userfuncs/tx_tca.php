<?php

    namespace Ferenckrausz\Attoworld\Documentation\Examples\Userfuncs;


    class Tx_Tca {
        
        function Tx_NiceTitle($params) {
            
            var_dump($params);
            die('!');
            
            $params['title'] = 'Hallo Welt!';
            
            return $params;
        }
        
    }

?>