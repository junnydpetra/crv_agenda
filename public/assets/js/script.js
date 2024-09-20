$(document).ready(function() {
    
    function formatPhoneNumber(phoneNumber) {
        phoneNumber = phoneNumber.replace(/\D/g, '');
        if (phoneNumber.length === 11) {
            return phoneNumber.replace(/(\d{2})(\d{1})(\d{4})(\d{4})/, '($1) $2 $3-$4');
        } else {
            return phoneNumber;
        }
    }

    $('#contactsTable').DataTable({
        "paging": true,
        "searching": true,
        "ordering": true,
        "info": true,
        "language": {
            "search": "Pesquisar:",
            "lengthMenu": "Mostrar _MENU_ registros por página",
            "info": "Mostrando página _PAGE_ de _PAGES_",
            "infoEmpty": "Nenhum registro encontrado",
            "infoFiltered": "(filtrado de _MAX_ registros no total)",
            "paginate": {
                "previous": "Anterior",
                "next": "Próximo"
            }
        }
    });

    window.confirmDeletion = function(id) {
        Swal.fire({
            title: "Tem certeza que deseja excluir o registro?",
            text: "O acesso ao registro será perdido, em caso afirmativo!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Confirmar!"
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = "http://localhost/crv_agenda/public/index.php?action=delete&id=" + id;
            }
        });
    };    

    window.openModal = function(action, contact = {}) {
        const modalTitle = document.querySelector('#contactModal h2');
        const inputName = document.getElementById('con_name');
        const inputPhoneNumber = document.getElementById('con_phone_number');
        const hiddenIdInput = document.getElementById('con_id');

        if (action === 'add') {
            modalTitle.innerText = 'Adicionar Contato';
            inputName.value = '';
            inputPhoneNumber.value = '';
            hiddenIdInput.value = ''; /* Limpa ID */
            document.querySelector('input[name="action"]').value = 'create';
        } else if (action === 'edit') {
            modalTitle.innerText = 'Atualizar Contato';
            inputName.value = contact.name || '';
            inputPhoneNumber.value = contact.phone || ''; // Mantém a máscara
            hiddenIdInput.value = contact.id || ''; /* Define ID */
            document.querySelector('input[name="action"]').value = 'update'; /* Muda para update */
        }

        document.getElementById("contactModal").style.display = "block";
    };

    window.closeModal = function() {
        document.getElementById("contactModal").style.display = "none";
    };

    window.onclick = function(event) {
        const modal = document.getElementById("contactModal");
        if (event.target == modal) {
            modal.style.display = "none";
        }
    };

    /* Validação de form */
    window.validateForm = function() {
        const name = document.getElementById('con_name').value.trim();
        const phoneNumber = document.getElementById('con_phone_number').value.trim();
        
        const namePattern = /^[A-Za-z\s]{5,}$/;
        if (name === '' || !namePattern.test(name)) {
            const Toast = Swal.mixin({
                toast: true,
                position: "top-end",
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.onmouseenter = Swal.stopTimer;
                    toast.onmouseleave = Swal.resumeTimer;
                }
            });
            Toast.fire({
                icon: "error",
                title: "O nome deve ter no mínimo 5 letras e apenas caracteres não numéricos!"
            });
            return false;
        }
    
        /* Validação do telefone */
        const phoneDigits = phoneNumber.replace(/\D/g, '');
        
        if (phoneDigits.length < 11) {
            const Toast = Swal.mixin({
                toast: true,
                position: "top-end",
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.onmouseenter = Swal.stopTimer;
                    toast.onmouseleave = Swal.resumeTimer;
                }
            });
            Toast.fire({
                icon: "error",
                title: "O telefone deve ter pelo menos 11 dígitos numéricos."
            });
            return false;
        }

        document.getElementById('con_phone_number').value = phoneDigits;
    
        return true;
    };

    var phoneNumberPost = document.getElementById("con_phone_number");

        phoneNumberPost.addEventListener("input", () => {
        
            var cleanValue = phoneNumberPost.value.replace(/\D/g, "").substring(0,11);

        

        phoneNumberPost.value = cleanValue;
    });
});