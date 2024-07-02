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
    let check = document.getElementById('checkId');

    const keyframes = [
        {opacity: 0},
        {opacity: 100},
    ];
    const timing = {
        duration: 900,
        easing: "ease-out"
    };

    check.animate(keyframes, timing);
    check.classList.remove("hidden");
}


function getPassword(item_id) {
    $.ajax({
        type: 'GET',
        url: "/ajax/"+item_id,
        headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function(data) {
            console.log(data.password);
            navigator.clipboard.writeText(data.password);
        }
    })
  }


