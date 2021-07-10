function deleteAccount(id) {
    Swal.fire({
        title: "Tem certeza que quer deletar esta categoria?",
        showCancelButton: true,
        cancelButtonText: "Cancelar",
        confirmButtonText: "Sim",
    }).then((result) => {
        if (result.isConfirmed) {
            axios
                .post(`/accounts/delete/${id}`)
                .then((response) => {
                    if (response.data.success) {
                        Swal.fire({
                            icon: "info",
                            text: response.data.message,
                        });
                        location.reload();
                    } else {
                        Swal.fire({
                            icon: "error",
                            text: response.data.message,
                        });
                    }
                })
                .catch((error) => {
                    console.log(error);
                    Swal.fire({
                        icon: "error",
                        text: "Erro inesperado ao deletar categoria",
                    });
                });
        }
    });
}

function editAccount(id) {
    location.href = `/accounts/edit/${id}`;
}
