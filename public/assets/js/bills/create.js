(function () {
    const form = document.querySelector("form");
    const saveButton = document.querySelector("#saveButton");

    saveButton.addEventListener("click", (event) => {
        event.preventDefault();

        const data = new FormData(form);
        axios
            .post("/bills/create", data)
            .then((response) => {
                console.log(response);
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

    toggleRepeatNTimesDiv();
})(toggleRepeatNTimesDiv(), eraseForm());

function toggleRepeatNTimesDiv() {
    const repeat = document.querySelector("#repeat");
    const repeatForDiv = document.querySelector("#hidden");
    const repeatForInput = document.querySelector("#repeatFor");
    repeat.addEventListener("click", function () {
        repeatForDiv.style.display = "block" || this.checked;
        if (!this.checked) {
            repeatForDiv.style.display = "none";
            repeatForInput.value = "";
        }
    });
}

function eraseForm() {
    const form = document.querySelector("form");
    form.reset();
}
