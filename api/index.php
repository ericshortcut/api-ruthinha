<?php

require 'vendor/autoload.php';

$app = new \Slim\Slim();
/* ------------------------------------
    URL para fornecer lista de horários disponíveis
   ------------------------------------
*/
$app->get('/horarios', function () {
    echo pegar_horarios();
});

/* ------------------------------------
    URL para fornecer lista de horários disponíveis
   ------------------------------------
*/
$app->get('/cursos/:horario', function ($horario) {
    echo pegar_cursos_do_horario($horario);
});

$app->run();

/* ------------------------------------
    Métodos de ajuda
   ------------------------------------
*/
/*
    Método que fornece a lista de horários (chave => valor), sendo chave uma string sem acentuação
    @return json/horarios
    TODO: Implementar select do banco
*/
function pegar_horarios(){
    $horarios = array(
            "MANHA" => "Manhã",
            "TARDE" => "Tarde",
            "NOITE" => "Noite"
        );
    return json_encode($horarios);
}
/*
    Método que fornece a lista de cursos (chave => valor), sendo chave uma string sem acentuação
    @return json/cursos
    TODO: Implementar select do banco
*/
function pegar_cursos_do_horario($horario){
    $cursosComHorarios = array(
        "MANHA" => array(
                    "ENSINO_MEDIO" => "Ensino médio",
                    "ENFERMAGEM"   => "Enfermagem"
                   ),
        "TARDE" => array(
                    "EDIFICACOES" => "Edificações",
                    "INFORMATICA" => "Informática",
                    "ENFERMAGEM"  => "Enfermagem"
                   ),
        "NOITE" => array(
                    "EDIFICACOES"   => "Edificações",
                    "INFORMATICA"   => "Informática",
                    "LOGISTICA"     => "Logística",
                    "ADMINISTRACAO" => "Administração"
                   )
     );
     
     $horarioDoCurso = array("HORARIO_INVALIDO"=>"Horário Inválido");
     
     if(isset($cursosComHorarios[$horario])){
         $horarioDoCurso = $cursosComHorarios[$horario];
     }
     
     return json_encode($horarioDoCurso);
}