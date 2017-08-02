<?php

    function makepub($repository, $uid) {
        $array = array();

        $tps = $repository->findAll();

        foreach($tps as $tp) {
            $sps = $tp->getPublications();
            if($sps->count() > 0) {
                foreach ($sps as $k => $sp) {

                    if($sp->getUid() == $uid) {
                        $array[$k]['title'] = $tp->getTitle();
                        $array[$k]['file'] = $tp->getFile();
                        $array[$k]['type'] = $tp->getType();
                        $array[$k]['uid'] = $tp->getUid();
                    }

                }
            }
        }

        return $array;
    }

?>