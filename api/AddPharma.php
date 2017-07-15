<?php

include_once('Pharmacie.php');
include_once('PharmacieDao.php');

$nom = filter_input(INPUT_POST,'nom', FILTER_SANITIZE_STRING);
$adresse = filter_input(INPUT_POST,'adresse', FILTER_SANITIZE_STRING);
$ville = filter_input(INPUT_POST,'ville', FILTER_SANITIZE_STRING);
$contact = filter_input(INPUT_POST,'contact', FILTER_SANITIZE_STRING);
$quartier = filter_input(INPUT_POST,'quartier', FILTER_SANITIZE_STRING);
$numero = filter_input(INPUT_POST,'numero', FILTER_SANITIZE_STRING);

if(!empty($nom) && !empty($adresse) && !empty($ville) && !empty($quartier) && !empty($contact) && !empty($numero)){

    $result = [];

    //vérifie si le numéro entréest valide
    if(!is_numeric($contact) || strlen($contact) < 9 || strlen($contact) > 9){
       $result['is_valid'] ='
        <div class="response_form_warnig">
            <strong>Veuillez entrer un numero valide de 9 caractères \'il vous plait!</strong>
        </div>
        ';
    }else{
        if(existPharma($nom,$adresse) == true){
            $result['exist'] = "<div class='response_form_warnig'>
                                    <button type=\"button\" class=\"close\">×</button>
                                    <strong>Désolé cette pharmacie existe déjà</strong>
                                </div>";
        }else{

            $pharma = new Pharmacie();
            $pharma->setNom($nom);
            $pharma->setAdresse($adresse);
            $pharma->setVille($ville);
            $pharma->setContact('+242'.$contact);
            $pharma->setQuartier($quartier);
            $pharma->setNumero($numero);

            //echo('Nom: '+$pharma->getNom());

            $dao = new PharmaciesDao();

            $_pharmaId = $dao->addPharmacie($pharma);

            if($_pharmaId > 0){
                $result['success'] = '
                            <div class="response_form_success">
                                <button type="button" class="close">×</button>
                                <strong>Pharmacie ajouter avec succès</strong>
                            </div>
                            ';

                //json_encode($result);
            }

        }
    }



}else{
    $result['empty'] = "
                        <div class='response_form_failed'>
                            <button type=\"button\" class=\"close\">×</button>
                            <strong>Désolé Tous les champs ne peuvent pas être vide</strong>
                        </div>";
}

if(!empty($result)){
    foreach($result as $msg):
        echo $msg;
    endforeach;
}


//function de verification si la pharmacie existe deja
function existPharma($nom,$adresse){
    global $pdo;
    $q = "
            SELECT nom,adresse
            FROM tab_pharmacie
            WHERE nom = :nom  AND adresse = :adresse
                ";

    $req =$pdo->prepare($q);
    $req->bindValue(':nom', $nom);
    $req->bindValue(':adresse',$adresse);
    $req->execute();
    $exist = $req->rowCount();
    return $exist;

}