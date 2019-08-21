<!DOCTYPE html>
<?php

?>
<html lang="hr">
<head>
    <meta charset="UTF-8">
    <title>Rezervacija</title>
    <sript src="https.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></sript>
    <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
    <script src="JQUERY.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Noticia+Text&display=swap" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="uredi.css">
    <link href="https://fonts.googleapis.com/css?family=Great+Vibes&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Emilys+Candy&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Frank+Ruhl+Libre&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="fullcalendar/fullcalendar.min.css" />
    <script src="fullcalendar/lib/jquery.min.js"></script>
    <script src="fullcalendar/lib/moment.min.js"></script>
    <script src="fullcalendar/fullcalendar.min.js"></script>
    <link rel="stylesheet" type="text/css" href="style.css">


    <script>
    $(document).ready(function () {
        var calendar = $('#calendar').fullCalendar({
            editable: true,
            events: "fetch-event.php",
            displayEventTime: false,
            eventRender: function (event, element, view) {
                if (event.allDay === 'true') {
                    event.allDay = true;
                } else {
                    event.allDay = false;
                }
            },
            selectable: true,
            selectHelper: true,
            select: function (start, end, allDay) {
                var title = prompt('Event Title:');

                if (title) {
                    var start = $.fullCalendar.formatDate(start, "Y-MM-DD HH:mm:ss");
                    var end = $.fullCalendar.formatDate(end, "Y-MM-DD HH:mm:ss");

                    $.ajax({
                        url: 'add-event.php',
                        data: 'title=' + title + '&start=' + start + '&end=' + end,
                        type: "POST",
                        success: function (data) {
                            displayMessage("Added Successfully");
                        }
                    });
                    calendar.fullCalendar('renderEvent',
                            {
                                title: title,
                                start: start,
                                end: end,
                                allDay: allDay
                            },
                    true
                            );
                }
                calendar.fullCalendar('unselect');
            },

            editable: true,
            eventDrop: function (event, delta) {
                        var start = $.fullCalendar.formatDate(event.start, "Y-MM-DD HH:mm:ss");
                        var end = $.fullCalendar.formatDate(event.end, "Y-MM-DD HH:mm:ss");
                        $.ajax({
                            url: 'edit-event.php',
                            data: 'title=' + event.title + '&start=' + start + '&end=' + end + '&id=' + event.id,
                            type: "POST",
                            success: function (response) {
                                displayMessage("Updated Successfully");
                            }
                        });
                    },
            eventClick: function (event) {
                var deleteMsg = confirm("Do you really want to delete?");
                if (deleteMsg) {
                    $.ajax({
                        type: "POST",
                        url: "delete-event.php",
                        data: "&id=" + event.id,
                        success: function (response) {
                            if(parseInt(response) > 0) {
                                $('#calendar').fullCalendar('removeEvents', event.id);
                                displayMessage("Deleted Successfully");
                            }
                        }
                    });
                }
            }

        });
    });

    function displayMessage(message) {
    	    $(".response").html("<div class='success'>"+message+"</div>");
        setInterval(function() { $(".success").fadeOut(); }, 1000);
    }
    </script>

</head>

<style>
body, h1,h2,h3,h4,h5,h6 {
font-family: "Montserrat",
sans-serif
}
.w3-row-padding img {
margin-bottom: 12px
}

.w3-sidebar {
width: 120px;
background: #222;
}

input{
    color: white;
}

.fc-unthemed td.fc-today{
    background:none;
}

.fc-event{
    border-color: darkmagenta;
}

.fc-title{
    margin-top: 1px;
    margin-left: 2px;
}


@media only screen and (max-width: 600px) {#main {margin-left: 0}}
</style>

<body class="w3-black" id="popravi">

<div class="w3-display-bottomleft w3-hide-small"
   style="bottom:90%;opacity:0.7;width:100%;margin-left:1200px;height:10%">
  <h2 id="logo" style="font-size:50px"><b>STL Nails</b></h2>
</div>

<!-- Icon Bar (Sidebar - hidden on small screens) -->
<nav class="w3-sidebar w3-bar-block w3-small w3-hide-small w3-center">

  <a href="pocetna.php" class="w3-bar-item w3-button w3-padding-large">
    <i class="fa fa-home w3-xxlarge"></i>
    <p>POČETNA</p>
  </a>
  <a href="prijava.php" class="w3-bar-item w3-button w3-padding-large w3-hover-black">
    <i class="fa fa-user w3-xxlarge"></i>
    <p>PRIJAVA</p>
  </a>
  <a href="registracija.php" class="w3-bar-item w3-button w3-padding-large w3-hover-black">
    <i class="fa fa-arrow-circle-right w3-xxlarge"></i>
    <p>REGISTRACIJA</p>
  </a>
  <a href="galerija.php" class="w3-bar-item w3-button w3-padding-large w3-hover-black">
    <i class="fa fa-eye w3-xxlarge"></i>
    <p>GALERIJA</p>
  </a>
  <a href="rezervacija.php" class="w3-bar-item w3-button w3-padding-large w3-hover-black w3-black">
      <i class="fa fa-calendar-plus-o w3-xxlarge"></i>
    <p>REZERVACIJA</p>
    </a>
  <a href="tablica.php" class="w3-bar-item w3-button w3-padding-large w3-hover-black">
    <i class="fa fa-money w3-xxlarge"></i>
    <p>CJENIK</p>
  </a>
  <a href="upit.php" class="w3-bar-item w3-button w3-padding-large w3-hover-black">
    <i class="fa fa-envelope w3-xxlarge"></i>
    <p>KONTAKT</p>
  </a>
</nav>

<div class="response"></div>
<div id='calendar'></div>
</body>
</html>