<?php
    include '../data_base.php';
    include '../models/ContactModel.php';

    class ContactController
    {
        protected $contact_model;

        public function __construct($pdo)
        {
            $this->contact_model = new ContactModel($pdo);
        }

        public function index()
        {
            $contatos = $this->contact_model
                             ->getAll();

            include '../public/views/contact_list.php';
        }

        public function show($id)
        {
            $contato = $this->contact_model
                            ->getById($id);

            include 'public/views/contact_detail.php';
        }
    }
?>