<?php
require_once('../../vendor/autoload.php');

use App\Model\Agent;
$agent=new Agent;

    $details=$agent->find($_GET['id']);
    
    echo json_encode( $details );
 
?>