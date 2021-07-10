(function () {
    const saveButton = document.querySelector("#saveButton");
    const billId = document.querySelector("#billId");
    const accountId = document.querySelector("#accountId");
    const payDate = document.querySelector("#pay_date");
    const creditCard = document.querySelector("#creditCard");

    saveButton.addEventListener("click", (event) => {
        event.preventDefault();
        axios
            .post(`/bills/${billId.value}/pay`, {
                account: accountId.value,
                pay_date: payDate.value,
                creditCard: creditCard.value,
            })
            .then((response) => {
                if (response.data.success) {
                    Swal.fire({
                        icon: "success",
                        text: response.data.message,
                    });
                    location.href = "/home";
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
                    text: "Erro inesperado",
                });
            });
    });
})();
