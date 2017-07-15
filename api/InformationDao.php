<?php
include_once ('db.php');
include_once('IInformation.php');

class InformationDao{


    public function __construct()
    {
    }


    public function addInformation(Information $information)
    {
        global $pdo;

        try{
            //On ajoute l'info dans la table tab_info
            $query = "INSERT INTO tb_information
            SET
            sexe = :sexe,
            enceinte = :enceinte,
            age = :age,
            consulter_medecin = :consulter_medecin,
            dianostiquer = :dianostiquer,
            traitement = :traitement,
            type_traitement = :type_traitement,
            lieu_traitement = :lieu_traitement,
            ville = :ville,
            quartier_arrond = :quartier_arrond
            ";

            $q = $pdo->prepare($query);

            $q->bindValue(':sexe', $information->getIdentite());
            $q->bindValue(':enceinte', $information->getEtat());
            $q->bindValue(':age', $information->getAge());
            $q->bindValue(':consulter_medecin', $information->getQuestion());
            $q->bindValue(':dianostiquer', $information->getQuestionLabo());
            $q->bindValue(':traitement', $information->getTraitement());
            $q->bindValue(':type_traitement', $information->getTypeTraitemen());
            $q->bindValue(':lieu_traitement', $information->getLieu());
            $q->bindValue(':ville', $information->getVille());
            $q->bindValue(':quartier_arrond', $information->getQuartierArrondi());

            $q->execute();

            $infoIdAdd = $pdo->lastInsertId();

            return $infoIdAdd;

        }catch (PDOException $e){
            return $e -> getMessage();
        }
    }

    public function deleteInformation(Information $information)
    {

    }

    public function updateInformation(Information $information)
    {

    }
}