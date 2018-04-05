<?php
//Service lag tdos los servioc get set update
//business/PersoonService.php
require_once("data/PersoonDAO.php");

class PersoonService {

    public function getPersonenOverzicht() {
        $pDAO = new PersoonDAO();
        $personen = $pDAO->getAll();
        return $personen;
    }

}
