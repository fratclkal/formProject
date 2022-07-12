<?php

$token = $_GET['asd'];

if ($token == '7a00c8b60d6728a8e4bd0668492a93c5'){
    $actual_link = "http://$_SERVER[HTTP_HOST]";

    header('Location: '.$actual_link.'/api/forms7a00c8b60d6728a8e4bd0668492a93c5');

}
