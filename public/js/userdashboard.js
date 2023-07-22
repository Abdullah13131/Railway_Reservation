getBooking();
$("body").css("font-family", "Arial, Helvetica, sans-serif");
$("body").addClass("bg-dark");
$("#complaints").hide();
$("#cancelled").hide();
// $("#bookedtickets").hide();

$(".fa-times-circle").click(function() {
    var ticket = $(this).attr('value');
    console.log(ticket);
});
// $("#profile_edit").hide();

// $("#edit-user").click(function() {
//     console.log("edit profile");
//     $("#f_name").prop("readonly", false);
//     $("#email").prop("readonly", false);
//     $("#password").prop("readonly", false);
//     $("#oldpassword").prop("readonly", false);
// })

$("#sidebar button").click(function() {

    var selected_display = "#" + $("#sidebar .active").attr("for");
    $(selected_display).hide();
    $("#sidebar .active").removeClass("active");

    var change_display = "#" + $(this).attr("for");
    console.log(change_display);
    if (change_display == "#complaints") {
        $("#complaint_table").empty();
        getComplaints();
    } else if (change_display == "#bookedtickets") {
        $("#booking_table").empty();
        getBooking();
    } else if (change_display == "#cancelled") {
        $("#cancelled_table").empty();
        getCancelled();
    }


    $(change_display).show();
    $(this).addClass("active");

})


function getCancelled() {
    var username = document.querySelector(".jumbotron h1").innerHTML;
    console.log(username);
    sendReq = new XMLHttpRequest();
    var url = '/getcancelled?data=' + username;
    sendReq.open('GET', url);
    sendReq.send();
    sendReq.onreadystatechange = function() {
        if (sendReq.readyState == 4 && sendReq.status == 200) {
            const JSONResponse = JSON.parse(sendReq.responseText);
            var index = 1;
            for (var item in JSONResponse) {
                console.log("here");
                console.log(JSONResponse[item].complaint_id);
                $("#cancelled_table").append("<tr><td>" + JSONResponse[item].train_name + "</td><td>" + JSONResponse[item].from_s + "</td><td>" + JSONResponse[item].to_s + "</td><td>" + JSONResponse[item].depart_time + "</td></tr>");
                index++;
                console.log(index);
            }
        }
    };
}

function getBooking() {
    var username = document.querySelector(".jumbotron h1").innerHTML;
    console.log(username);
    sendReq = new XMLHttpRequest();
    var url = '/getbooking?data=' + username;
    sendReq.open('GET', url);
    sendReq.send();
    sendReq.onreadystatechange = function() {
        if (sendReq.readyState == 4 && sendReq.status == 200) {

            const JSONResponse = JSON.parse(sendReq.responseText);
            var index = 1;
            for (var item in JSONResponse) {
                console.log("here");
                console.log(JSONResponse[item].complaint_id);

                $("#booking_table").append("<tr><td >" + JSONResponse[item].train_name + "</td><td>" + JSONResponse[item].from_s + "</td><td>" + JSONResponse[item].to_s + "</td><td>" + JSONResponse[item].depart_time + "</td><td><a href='generate-pdf/" + JSONResponse[item].ticket_id + "'><i style='font-size: 25px; color:rgb(43, 117, 214);' class='fas fa-print'></i></a></td><td><a href='/cancelticket/" + JSONResponse[item].ticket_id + "'><i style='font-size: 25px; color:rgb(177, 26, 76);' class='far fa-times-circle'></i></a></td></tr>");
                index++;
                console.log(index);
            }
        }
    };
}

function getComplaints() {
    var username = document.querySelector(".jumbotron h1").innerHTML;
    console.log(username);
    sendReq = new XMLHttpRequest();
    var url = '/getcomplaint?data=' + username;
    sendReq.open('GET', url);
    sendReq.send();
    sendReq.onreadystatechange = function() {
        if (sendReq.readyState == 4 && sendReq.status == 200) {

            const JSONResponse = JSON.parse(sendReq.responseText);
            var index = 1;
            for (var item in JSONResponse) {
                console.log("here");
                console.log(JSONResponse[item].complaint_id);
                $("#complaint_table").append("<tr><td>" + JSONResponse[item].complaint_id + "</td><td>" + JSONResponse[item].tel + "</td><td>" + JSONResponse[item].description + "</td><td><a href='downloadcomplaint/" + JSONResponse[item].complaint_id + "'><i style='font-size: 25px; color:rgb(43, 117, 214);' class='fas fa-print'></i></a></td></tr>");


                index++;
            }
        }
    };
}
$("#edit").click(function(){
    $("#save").show();

    var all_inputs=document.querySelectorAll("#profile_edit input");
    console.log(all_inputs);
    for( var i=0;i<all_inputs.length;i++){
        console.log(all_inputs[i]);
        all_inputs[i].removeAttribute("readonly");
    }
    $("#profile_edit").show();

})