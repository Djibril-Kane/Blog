<?php
    require_once("../fonctions/bdd.php");
    include_once("../fonctions/admin.php");
    $bdd = bdd();
    $supp = supprimer();
    header ("Location: posts.php");