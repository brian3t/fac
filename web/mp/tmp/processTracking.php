<?php
    ini_set("display_errors","on");
    include("class.bonanza.php");
    $myBonanza = new BonanzaAPI();
    $response = $myBonanza->submitTracking("38335885","ontrac","D10010919794580");
    print_r($response);
