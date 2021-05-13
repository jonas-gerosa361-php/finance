(function () {
    const form = document.querySelector("form");
    const saveButton = document.querySelector("#saveButton");

    saveButton.addEventListener("click", (event) => {
        event.preventDefault();
        const data = new FormData(form);
        axios
            .post("/create-income", data)
            .then((response) => {
                if (response.data.success) {
                    Swal.fire({
                        icon: "success",
                        text: response.data.message,
                    });
                    eraseForm();
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
})(eraseForm());

function eraseForm() {
    const form = document.querySelector("form");
    form.reset();
}
