<?php

   /*
    *  wpMonique Functions
    * =====================
    * @package WordPress
    * @subpackage wpMonique
    * @since wpMonique 0.1
    */

    function fLReplace($sSearch, $sReplace, $sSubject) {

        $iPos = strrpos($sSubject, $sSearch);

        if($iPos !== false) {
            $sSubject = substr_replace($sSubject, $sReplace, $iPos, strlen($sSearch));
        }

        return $sSubject;
    }

?>
