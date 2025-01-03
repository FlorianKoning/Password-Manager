function toggleBtn() {
    if($("#toggle-btn").attr('aria-checked') == 'false') {
        $("#toggle-btn").attr('aria-checked', 'true').removeClass("bg-gray-200").addClass("bg-second");
        $("#toggle-span").removeClass("translate-x-0").addClass("translate-x-5");
        $('#toggle-input').val(true)
    } else {
        $("#toggle-btn").attr('aria-checked', 'false').removeClass("bg-second").addClass("bg-gray-200");
        $("#toggle-span").removeClass("translate-x-5").addClass("translate-x-0");
        $('#toggle-input').val(false)
    }
}


// Generates a new password and prints it out in the input
// Removes hidden class from element with animation
function generatePassword(input_id) {
    $.ajax({
        type: 'POST',
        url: '/ajax/password',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success:function(data) {
            $("#"+input_id).val(data.password);

            $("svg").removeClass("hidden");
        }
    });

    // Ease in animation for background
   $("#checkId").fadeIn().removeClass("hidden"); 
}




// Gets password form database by item_id and copy's password to clipboard
function getPassword(item_id) {
    $.ajax({
        type: 'GET',
        url: "/ajax/"+item_id,
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function(data) {
            showNotification();

            // console.log(data.password);
            navigator.clipboard.writeText(data.password);
        }
    })
}




// Displays notification that password has been copyd
function showNotification() {
    $("#copyAlert").fadeIn().removeClass("hidden");
    $("#copyAlert").delay(4000).fadeOut().addClass("hiddem");
}




// Shows the edit dialog and gets data from route
function showEditDialog(dialog_id, item_id, is_favorite)
{
    $.ajax({
        type: 'GET',
        url: '/ajax/edit/'+item_id,
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function(data) {
            $("#item_id").val(item_id);

            // Sets the toggle in right position
            if (is_favorite === '0') {
                $("#toggle-btn").attr('aria-checked', 'false').removeClass("bg-second").addClass("bg-gray-200");
                $("#toggle-span").removeClass("translate-x-5").addClass("translate-x-0");
                $('#toggle-input').val(false)
            } else {
                $("#toggle-btn").attr('aria-checked', 'true').removeClass("bg-gray-200").addClass("bg-second");
                $("#toggle-span").removeClass("translate-x-0").addClass("translate-x-5");
                $('#toggle-input').val(true)
            }

            // Function to fill in the inputs
            displayExtraInputs(dialog_id,data);
            
        }
    })
}


function showSelectedCatagorieDialog(path) {
    const CATAGORIE = $("#select-catagorie").find(":selected").val();
    path = path.substring(0, path.length -3) + CATAGORIE;  


    // Saves the path to the route location and saves path to form action
    $("#catagorie-form-create").attr('action', path);
    $("#catagorie_id").attr('value', CATAGORIE);


    // hides the catagorie_form_dialog
    $("#catagorie_form_dialog")
        .fadeOut()
        .addClass("hidden")
        .attr({
            'aria-modal': 'false',
    });

    $("#edit_password").prop('type', 'password')
    $("#extra_div").remove();


    // Displays the add item dialog
    $("#catagorie_dialog")
        .fadeIn()
        .removeClass("hidden")
        .attr({
            'aria-modal': 'true',
    });
}


function displayExtraInputs(dialog_id,data) 
{
    // Puts the title and password in the right input
    $("#edit_title").val(data.title);
    $("#edit_password").val(data.password);


    // Makes the right option selected
    $("#"+data.type).attr('selected', 'selected');

    // Sets up the div for the label and input
    let container = document.getElementById('edit-form-container');

    let div = document.createElement("div");
    div.setAttribute('id', 'extra_div');
    div.classList.add('space-y-6');

    
    container.appendChild(div);

    // console.log(data.extra);


    if(data.extra != '[]') {
        // Loops true the extra array
        $.each(data.extra, function(key, value) {
            let newDiv = document.createElement("div");
            div.appendChild(newDiv);

            // Creates the new label
            $('<label>').html(key).attr({
                for: key,
            }).addClass("block font-medium text-sm text-gray-700").appendTo(newDiv);

            // Creates the new form
            $('<input>').attr({
                type: 'text',
                name: key,
                id: key,
                value: value,
            }).addClass(
                "mt-1 block w-full text-main placeholder-main border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
            ).appendTo(newDiv);
        })
    }

    $("#"+dialog_id).fadeIn().removeClass("hidden");
}



function showPassword()
{
    if($("#edit_password").attr('type') == 'password') {
        $("#edit_password").prop('type', 'text')
    } else {
        $("#edit_password").prop('type', 'password')
    }
}


