(function () {
    const form = document.querySelector("form");
    const saveButton = document.querySelector("#saveButton");
    const income = document.querySelector("#income").value;

    console.log(income);
    saveButton.addEventListener("click", (event) => {
        event.preventDefault();

        const data = new FormData(form);
        axios
            .post(`/incomes/edit/${income}`, data)
            .then((response) => {
                if (response.data.success) {
                    Swal.fire({
                        icon: "success",
                        text: response.data.message,
                    });
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
