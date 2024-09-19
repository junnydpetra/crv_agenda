<?php
    include 'data_base.php';
    include 'models/ContactModel.php';

    class ContactController
    {
        private $model;

        public function __construct($pdo)
        {
            $this->model = new ContactModel($pdo);
        }

        public function index()
        {
            $contatos = $this->model
                             ->getAll();

            include '../public/views/contact_list.php';
        }

        public function show($id)
        {
            $contato = $this->model
                            ->getById($id);
                            
            include '../public/views/contact_detail.php';
        }
    }
?>