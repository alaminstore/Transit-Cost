<?php
ob_start();
    $filepath = realpath(dirname(__FILE__));
    include_once $filepath.'/../lib/Session.php';
    Session::init();
    $sesid = Session::get("id");