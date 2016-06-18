<?php

require 'vendor/autoload.php';

$app = new \Slim\Slim();
$app->get('/horarios', function () {
    echo pegar_horarios();
});
$app->run();


function pegar_horarios(){
    $horarios = array(
            "MANHA" => "Manhã",
            "TARDE" => "Tarde",
            "NOITE" => "Noite"
        );
    return json_encode($horarios);
}