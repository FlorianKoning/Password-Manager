// Display function for the dialog div
function showDialog(dialog_id) {
    // gets the id of the dialog div
    const dialog = document.getElementById(dialog_id);


    // Ease in animation for background
    const keyframes = [
        {opacity: 0},
        {opacity: 100},
    ];
    const timing = {
        duration: 300,
        easing: "ease-out"
    };

    // Ease in animations for div
    dialog.animate(keyframes, timing);

    // sets the aria-modal to false
    dialog.setAttribute('aria-modal', true);

    // Shows the dialog divs
    dialog.classList.remove("hidden");
}


// Close function for the dialog div
function closeDialog(dialog_id) {
    // gets the id of the dialog div
    const dialog = document.getElementById(dialog_id);


    // sets the aria-modal to false
    dialog.setAttribute('aria-modal', false);
    
    dialog.classList.add("hidden");
}

// Creates the new input fields
function createNewInput() {
    let container = document.getElementById('form-container');
    let title = document.getElementById('extra_title_intput');
    let inputError = document.getElementById('inputError');

    // Checks if the extra input title is empty
    if (title.value == '') {
        // Gives a input error
        inputError.innerHTML = "Please fill in the title!";

        inputError.classList.remove('hidden');
    } else {
        // Adds the new input and label with title as name and id
        let newDiv = document.createElement("div");

        inputError.classList.add('hidden');

        container.appendChild(newDiv);


        // Creates the new label
        $('<label>').html(title.value).attr({
            for: title.value,
        }).addClass("block font-medium text-sm text-gray-700").appendTo(newDiv);

        // Creates the new form
        $('<input>').attr({
            type: 'text',
            name: title.value,
            id: title.value,
        }).addClass(
            "mt-1 block w-full text-main placeholder-main border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
        ).appendTo(newDiv);


        // Resets the title input
        title.value = '';
    }
}