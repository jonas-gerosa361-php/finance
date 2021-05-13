function payBill(bill) {
    axios
        .post("/pay-bill", {
            id: bill,
        })
        .then((response) => {
            if (response.data.success) {
                location.reload();
                return;
            }

            Swal.fire({
                icon: "error",
                text: response.data.message,
            });
        })
        .catch((error) => {
            Swal.fire({
                icon: "error",
                text: "Erro inesperado",
            });
            console.log("Error");
        });
}

function receiveIncome(income) {
    axios
        .post("/receive-income", {
            id: income,
        })
        .then((response) => {
            if (response.data.success) {
                location.reload();
                return;
            }

            Swal.fire({
                icon: "error",
                text: response.data.message,
            });
        })
        .catch((error) => {
            console.log(error);
            Swal.fire({
                icon: "error",
                text: "Erro inesperado",
            });
        });
}

function editBill(bill) {
    location.href = `/bills/edit/${bill}`;
}

function deleteBill(bill) {
    Swal.fire({
        title: "Tem certeza que quer deletar esta conta?",
        showCancelButton: true,
        cancelButtonText: "Cancelar",
        confirmButtonText: "Sim",
    }).then((result) => {
        if (result.isConfirmed) {
            axios
                .post(`/bills/delete/${bill}`)
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
                        text: "Erro inesperado ao deletar conta",
                    });
                });
        }
    });
}
