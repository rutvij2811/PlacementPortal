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
        url: '../php/readevents.php',
        async: false,
        success: function (data) {
            a = data;
        }
    });
    a = JSON.parse(a);
    Object.keys(a).forEach(function (key) {
        var event = a[key];
        var x = document.getElementById("events");
        var j = '' +
            '<a href="#" class="event clearfix">' +
            '<div class="event_icon">' +
            '<div class="event_month">' + event['jdate'].split(' ')[1] + '</div>' +
            '<div class="event_day">' + event['jdate'].split(' ')[0] + '</div>' +
            '</div>' +
            '<div class="event_title">' + event['jname'] + '<br/>' +
            'CTC:' + event['jpackage'] + ' lakhs&nbsp;&nbsp;Bond:' + event['jbond'] + ' years<br/>' +
            'Branches Eligible: ' + event['jbranch'] + '<br>' +
            'Job Type: ' + event['jtype'] + '&nbsp;&nbsp;<br>' +
            'Job Description:' + event['jdesc'] + '<br>' +
            'Registration Link: ' + event['jlink'] +
            '</div>' +
            '</a>';
        x.innerHTML += j;
    });
}