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
