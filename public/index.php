<?php
    include '../controllers/ContactController.php';

    $contactController = new ContactController($pdo);

    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action'])) {
        switch ($_POST['action']) {
            case 'create':
                $contactController->create();
                break;
            case 'update':
                $contactController->update();
                break;
        }
    } elseif (isset($_GET['action']) && $_GET['action'] === 'delete') {
        $contactController->delete($_GET['id']);
    } else {
        $contactController->index();
    }
?>