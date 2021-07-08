(function () {
    const saveButton = document.querySelector("#saveButton");
    saveButton.addEventListener("click", (event) => {
        event.preventDefault();
        const form = document.querySelector("form");
        const formData = new FormData(form);
        axios
            .post(`/accounts/edit/${formData.get("id")}`, formData)
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
