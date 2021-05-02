(function () {
    const form = document.querySelector("form");
    const saveButton = document.querySelector("#saveButton");

    //Save button
    saveButton.addEventListener("click", (event) => {
        event.preventDefault();

        const data = new FormData(form);
        axios.post("/teste", data);
    });

    //Show or hide repeat-n-times div
    const repeat = form.querySelector("#repeat");
    const repeatForDiv = form.querySelector("#hidden");
    const repeatForInput = form.querySelector("#repeatFor");
    repeat.addEventListener("click", function () {
        if (this.checked) {
            repeatForDiv.style.display = "block";
            return;
        }

        if (!this.checked) {
            repeatForDiv.style.display = "none";
            repeatForInput.value = "";
        }
    });
})();
