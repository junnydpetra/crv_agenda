<?php
    include '../controllers/ContactController.php';

    $contactController = new ContactController($pdo);
    $contactController->index();
?>