$(document).ready(function () {
    $('.button-collapse').sideNav();
    $('.parallax').parallax();
    $('.collapsible').collapsible();
    $('.dropdown-trigger').dropdown();
    fillTable();
});

function fillTable() {
    var events = [];
    var a = [];
    $.ajax({
        url: '../php/readCompanies.php',
        async: false,
        success: function (data) {
            a = data;
        }
    });
    a = JSON.parse(a);
    Object.keys(a).forEach(function (key) {
        var event = a[key];
        var students = event['students'].split(',');
        var s = "";
        for (var i = 0; i < students.length - 1; i++)
            s += students[i] + '<br/>';
        s += students[students.length - 1];
        var x = document.getElementById("students");
        var j = '' +
            '<a href="#" class="event clearfix">' +
            '<div class="event_icon">' +
            '<div class="event_month">' + event['jname'] + '</div>' +
            '<div class="event_day">' + event['jpackage'] + ' Lakhs</div>' +
            '</div>' +
            '<div class="event_title">' +
            s +
            '</div>' +
            '</a>';
        x.innerHTML += j;
    });
}