<?php

/**
 * Created by PhpStorm.
 * User: Petenet001
 * Date: 13/07/2017
 * Time: 09:02
 */
class Information{
    private $identite;
    private $etat;
    private $age;
    private $question;
    private $question_labo;
    private $traitement;
    private $type_traitemen;
    private $lieu;
    private $ville;
    private $quartier_arrondi;


    public function __construct(){

    }

    /**
     * @return mixed
     */
    public function getIdentite()
    {
        return $this->identite;
    }

    /**
     * @param mixed $identite
     */
    public function setIdentite($identite)
    {
        $this->identite = $identite;
    }

    /**
     * @return mixed
     */
    public function getEtat()
    {
        return $this->etat;
    }

    /**
     * @param mixed $etat
     */
    public function setEtat($etat)
    {
        $this->etat = $etat;
    }

    /**
     * @return mixed
     */
    public function getAge()
    {
        return $this->age;
    }

    /**
     * @param mixed $age
     */
    public function setAge($age)
    {
        $this->age = $age;
    }

    /**
     * @return mixed
     */
    public function getQuestion()
    {
        return $this->question;
    }

    /**
     * @param mixed $question
     */
    public function setQuestion($question)
    {
        $this->question = $question;
    }

    /**
     * @return mixed
     */
    public function getQuestionLabo()
    {
        return $this->question_labo;
    }

    /**
     * @param mixed $question_labo
     */
    public function setQuestionLabo($question_labo)
    {
        $this->question_labo = $question_labo;
    }

    /**
     * @return mixed
     */
    public function getTraitement()
    {
        return $this->traitement;
    }

    /**
     * @param mixed $traitement
     */
    public function setTraitement($traitement)
    {
        $this->traitement = $traitement;
    }

    /**
     * @return mixed
     */
    public function getTypeTraitemen()
    {
        return $this->type_traitemen;
    }

    /**
     * @param mixed $type_traitemen
     */
    public function setTypeTraitemen($type_traitemen)
    {
        $this->type_traitemen = $type_traitemen;
    }

    /**
     * @return mixed
     */
    public function getLieu()
    {
        return $this->lieu;
    }

    /**
     * @param mixed $lieu
     */
    public function setLieu($lieu)
    {
        $this->lieu = $lieu;
    }

    /**
     * @return mixed
     */
    public function getVille()
    {
        return $this->ville;
    }

    /**
     * @param mixed $ville
     */
    public function setVille($ville)
    {
        $this->ville = $ville;
    }

    /**
     * @return mixed
     */
    public function getQuartierArrondi()
    {
        return $this->quartier_arrondi;
    }

    /**
     * @param mixed $quartier_arrondi
     */
    public function setQuartierArrondi($quartier_arrondi)
    {
        $this->quartier_arrondi = $quartier_arrondi;
    }




}