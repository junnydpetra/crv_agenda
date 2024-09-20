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

        public function create()
        {
            if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] === 'create') {
        
                $name = $_POST['con_name'] ?? '';
                $phone = $_POST['con_phone_number'] ?? '';
        
                var_dump($name, $phone);
        
                if ($this->contact_model->create($name, $phone)) {
                    var_dump($name, $phone);
                    header("Location: /crv_agenda/public");
                    exit();
                } else {
                    echo "Erro ao criar contato.";
                }
            } else {
                echo "Método inválido ou ação não definida.";
            }
        }

        public function index()
        {
            $contatos = $this->contact_model
                             ->getAll();

            include '../public/views/contact_list.php';
        }

        public function update()
        {
            $id = $_POST['con_id'] ?? '';
            $name = $_POST['con_name'] ?? '';
            $phone = $_POST['con_phone_number'] ?? '';

            if ($this->contact_model->update($id, $name, $phone)) {
                header("Location: /crv_agenda/controllers/ContactController.php");
                exit();
            } else {
                echo "Erro ao atualizar contato.";
            }
        }

        public function delete($id)
        {
            if ($this->contact_model->delete($id)) {
                header("Location: /crv_agenda/public");
                exit();
            } else {
                echo "Erro ao excluir contato.";
            }
        }

        /* public function show($id)
        {
            $contato = $this->contact_model
                            ->getById($id);

            include 'public/views/contact_detail.php';
        } */
    }
?>