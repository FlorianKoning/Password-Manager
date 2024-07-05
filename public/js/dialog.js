// Display function for the dialog div
function showDialog(dialog_id) {
    $("#"+dialog_id)
        .fadeIn()
        .removeClass("hidden")
        .attr({
            'aria-modal': 'true',
    });
}


function showDeleteDialog(dialog_id, item_id) {
    $("#"+dialog_id)
        .fadeIn()
        .removeClass("hidden")
        .attr({
            'aria-modal': 'true',
    });

    $("#item_input").val(item_id);
}


// Close function for the dialog div
function closeDialog(dialog_id) {
    $("#"+dialog_id)
        .fadeOut()
        .addClass("hidden")
        .attr({
            'aria-modal': 'false',
    });

    $("#edit_password").prop('type', 'password')
    $("#extra_div").remove();
}


// Creates the new input fields
function createNewInput() {
    let container = document.getElementById('form-container');
    let title = document.getElementById('extra_title_intput');
    let inputError = document.getElementById('inputError');

    // Checks if the extra input title is empty
    if (title.value == '') {
        // Gives a input error
        $("#inputError").html("Please fill in the title!").removeClass("hidden");
    } else {
        // Adds the new input and label with title as name and id
        let newDiv = document.createElement("div");

        inputError.classList.add('hidden');

        container.appendChild(newDiv);


        // Creates the new label
        $('<label>').html(title.value).attr({
            for: title.value,
        }).addClass(
            "block font-medium text-sm text-gray-700"
        ).appendTo(newDiv);


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