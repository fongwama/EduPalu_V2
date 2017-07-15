<?php
require_once ('Information.php');

interface IInformation
{
    public function addInformation(Information $information);
    public function deleteInformation(Information $information);
    public function updateInformation(Information $information);
}