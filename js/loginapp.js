function login() {
    var email = document.getElementById('username').value;
    if (email == "admin@amrita.com") {
        location.href = 'ciradmin.html'
    } else {
        location.href = 'eventList.html'
    }
}

function register() {
    alert("Registered!")
    document.getElementById("logmodule").className = "central badge";
}

