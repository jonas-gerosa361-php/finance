(function () {
    const saveButton = document.querySelector("#saveButton");
    const billId = document.querySelector("#billId");
    const accountId = document.querySelector("#accountId");

    saveButton.addEventListener("click", (event) => {
        event.preventDefault();

        axios
            .post(`/bills/${billId.value}/pay`, {
                account: accountId.value,
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
