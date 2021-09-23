<?php

namespace controllers;

use controllers\base\Web;

class SampleWeb extends Web
{
    function home()
    {
        $this->header();
        include("views/global/home.php");
        $this->footer();
    }
    function about()
    {
    $this->header(); // Va afficher le header de la page (mais comment ? Avez-vous regardé ?)
    include("views/global/about.php");
    $this->footer(); // Va afficher le footer de la page (mais comment ? Avez-vous regardé ?)
    }
}