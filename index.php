<?php

/**
 * Use case
 */
use src\Scorimmo;

require __DIR__ . '/vendor/autoload.php';

$username = '';
$password = '';

try {
    $scorimmo = new Scorimmo($username, $password);
    $lead     = new \src\ScorimmoLead();
    $lead->setFirstName('Dominique');
    $lead->setLastName('Dupont');
    $lead->setPropertyType('Maison');
    $lead->setPhone('+33645236589');
    $lead->setEmail('dominique.dupont@email.com');
    $lead->setPropertyAddressLine1('22 rue des champs');
    $lead->setPropertyCity('Montpellier');
    $lead->setPropertyZipcode('34000');
    $lead->setPropertyPrice('299003');
    $lead->setPropertyArea('156');
    $lead->setPropertyReference('568952');
    $lead->setSellerId(123);

    //$data = $scorimmo->addLead($lead, 123);
    //$data = $scorimmo->changeUserOfLead(123, 141151, 123);
    //$data = $scorimmo->getUsers(123);
    //$data = $scorimmo->searchLeadsByEmail('a2mebazaa@gmail.com', 535);
    $data = $scorimmo->searchLeadAppointments(123, 123456);

    print_r($data[0]->location);
    print_r($data[0]->start_time);
} catch (Exception $e) {
    echo $e->getMessage();
}




