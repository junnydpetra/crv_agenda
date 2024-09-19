<?php

    include '../data_base.php';
    include '../controllers/ContactController.php';
   
    $controller = new ContactController($pdo);
    $controller->index();

?>