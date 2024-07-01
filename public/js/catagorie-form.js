function redirectActino(host) {
    let select = document.getElementById("catagorie");
    let value = select.value;   

    let link = "/items/" + value;

    window.location.href = link
}
