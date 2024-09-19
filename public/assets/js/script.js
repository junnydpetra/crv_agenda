$(document).ready(function() {
  $(document).ready(function() {
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
              window.location.href = "delete.php?id=" + id;
          }
      });
  };

  window.openModal = function() {
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
});