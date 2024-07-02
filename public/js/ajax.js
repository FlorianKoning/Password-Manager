// Generates a new password and prints it out in the input
// Removes hidden class from element with animation
function generatePassword() {
    $.ajax({
        type: 'POST',
        url: '/ajax/password',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success:function(data) {
            $("#password").val(data.password);
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

            console.log(data.password);
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
function showEditDialog(dialog_id)
{
    $("#"+dialog_id).fadeIn().removeClass("hidden");
}


