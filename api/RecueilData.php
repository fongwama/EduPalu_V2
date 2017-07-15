<?php
/**
 * Created by PhpStorm.
 * User: Petenet001
 * Date: 13/07/2017
 * Time: 07:19
 */

require_once ('Information.php');
require_once ('InformationDao.php');



$identite = filter_input(INPUT_POST,'identite', FILTER_SANITIZE_STRING);
$etat = filter_input(INPUT_POST,'etat', FILTER_SANITIZE_STRING);
$age = filter_input(INPUT_POST,'age', FILTER_SANITIZE_STRING);
$question = filter_input(INPUT_POST,'question', FILTER_SANITIZE_STRING);
$question_labo = filter_input(INPUT_POST,'question_labo', FILTER_SANITIZE_STRING);
$traitement = filter_input(INPUT_POST,'traitement', FILTER_SANITIZE_STRING);
$trtmnt_anti_palu = filter_input(INPUT_POST,'trtmnt_antipaludeen', FILTER_SANITIZE_STRING);
$trtmnt_tradi = filter_input(INPUT_POST,'trtmnt_tradi', FILTER_SANITIZE_STRING);
$trtmnt_autre = filter_input(INPUT_POST,'trtmnt_autre', FILTER_SANITIZE_STRING);
$lieu = filter_input(INPUT_POST,'lieu', FILTER_SANITIZE_STRING);
$ville = filter_input(INPUT_POST,'ville', FILTER_SANITIZE_STRING);
$quartier_arrondi = filter_input(INPUT_POST,'quartier_arrondi', FILTER_SANITIZE_STRING);
$type_trtmnt = $traitement;
$msg = [];


if(!empty($identite) && !empty($age) && !empty($question) &&  !empty($traitement) && !empty($question_labo) && !empty($ville) && !empty($quartier_arrondi)){


    $information = new Information();
    $informationDao = new InformationDao();

    //petite condition de verification de tpe du traitment choisi en fonction du type
    if($traitement == 'antipaludeen'){
        $trtmnt =  $traitement = $trtmnt_anti_palu;
    }elseif($traitement == 'traditionnel'){
        $trtmnt = $traitement = $trtmnt_tradi;
    }elseif($traitement == 'autre'){
        $trtmnt = $traitement = $trtmnt_autre;
    }else{
        $trtmnt = $traitement;
        $lieu = 'non disponible';
    }

    $information->setIdentite($identite);
    $information->setEtat(($identite == 'femme' && $etat == 'on' )?'oui':'');
    $information->setAge($age);
    $information->setQuestion($question);
    $information->setQuestionLabo($question_labo);
    $information->setTraitement($trtmnt);
    $information->setTypeTraitemen($type_trtmnt);
    $information->setLieu($lieu);
    $information->setVille($ville);
    $information->setQuartierArrondi($quartier_arrondi);
    $_infoId = $informationDao->addInformation($information);

    if($_infoId > 0){
        $msg['success'] = "
                            <div class='response_form_success'>
                                <button type=\"button\" class=\"close\">×</button>
                                <strong>Enregistré avec succès</strong>
                            </div>
                            ";

        //json_encode($result);
    }

}else{
    $msg['empty'] = '<div class="response_form_failed">Vueillez remplir tous les champs </div>';
}



foreach($msg as $message){
    echo $message;
}