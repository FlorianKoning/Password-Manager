// Display function for the dialog div
function showDialog() {
    // gets the id of the dialog div
    const notification = document.getElementById('notification');


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
    notification.animate(keyframes, timing);

    // sets the aria-modal to false
    notification.setAttribute('aria-modal', true);

    // Shows the dialog divs
    notification.classList.remove("hidden");
}


// Close function for the dialog div
function closeNotification() {
    // gets the id of the dialog div
    const infoDialog = document.getElementById('notification');


    // sets the aria-modal to false
    infoDialog.setAttribute('aria-modal', false);
    
    infoDialog.classList.add("hidden");
}



function createNewInputField() {
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
        let newInput = document.createElement("input");
        let newLabel = document.createElement("label");

        inputError.classList.add('hidden');

        newLabel.classList.add("block", "font-medium", "text-sm", "text-gray-700");
        newLabel.setAttribute("for", "extra_input");
        newLabel.innerHTML = title.value;
        
        newInput.classList.add("block", "w-full", "text-main", "placeholder-main", "border-gray-300", "focus:border-indigo-500", "focus:ring-indigo-500", "rounded-md", "shadow-sm")
        newInput.setAttribute("id", 'extra-'+title.value);
        newInput.setAttribute("name", 'extra-'+title.value);
        newInput.setAttribute("type", "text");

        title.value = '';

        container.appendChild(newDiv);
        newDiv.appendChild(newLabel);
        newDiv.appendChild(newInput);
    }
}


