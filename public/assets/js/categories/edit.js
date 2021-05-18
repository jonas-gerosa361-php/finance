(function () {
    const saveButton = document.querySelector("#saveButton");
    const name = document.querySelector("#name");
    const id = document.querySelector("#id");
    saveButton.addEventListener("click", (event) => {
        event.preventDefault();
        axios
            .post(`/categories/edit/${id.value}`, {
                name: name.value,
            })
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
