<?php

require_once 'vendor/autoload.php';
require_once 'config.php';
require_once 'Citizen.php';
require_once 'Certificate.php';

$citizen = new Citizen();
$citizen->setFirstname(FIRSTNAME)
    ->setLastname(LASTNAME)
    ->setBirthDate(BIRTH_DATE)
    ->setBirthLocation(BIRTH_LOCATION)
    ->setStreetAddress(FULL_STREET_ADDRESS);

$certificate = new Certificate();
$certificate->setCitizen($citizen)
    ->setReason($_GET['reason'] ?? '')
    ->setMadeIn($_GET['made_in'] ?? MADE_IN_DEFAULT)
    ->generate();

switch ($_GET['output'] ?? '') {
    case 'save':
        $certificate->save();
        die('<a href="./upload/' . $certificate->getFilename() . '">Voir le fichier</a>');

    case 'download':
        $certificate->download();
        break;

    default:
        $certificate->show();
}
