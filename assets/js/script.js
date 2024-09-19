function confirmDeletion(id) {
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
          Swal.fire({
            title: "Excluído!",
            text: "O registro foi excluído com sucesso.",
            icon: "success"
          });
        }
      });
    }