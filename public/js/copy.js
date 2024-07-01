function copyFunction() {
    var copyText = document.getElementById("key");

    copyText.select();
    console.log(copyText.value);

    navigator.clipboard.writeText(copyText.value)
        .then(function() {
            
        })
        .catch(function(error) {
            
        });
}