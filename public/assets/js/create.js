(function () {
    const form = document.querySelector("form");
    const saveButton = document.querySelector("#saveButton");

    //Save button
    saveButton.addEventListener("click", (event) => {
        event.preventDefault();

        const data = new FormData(form);
        axios
            .post("/cadastrar", data)
            .then((response) => {
                console.log(response);
            })
            .catch((error) => {
                console.log(error);
            });
    });

    toggleRepeatNTimesDiv();
})(toggleRepeatNTimesDiv());

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
