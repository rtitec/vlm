<?php
    include_once("includes/header.inc");
    include_once("config.php");
?>
    <script type='text/javascript' src='externals/jquery/jquery.js'></script>
    <link rel='stylesheet' type='text/css' href='externals/fullcalendar/core/main.min.css' />
    <link rel='stylesheet' type='text/css' href='externals/fullcalendar/daygrid/main.min.css' />
    <script src='externals/fullcalendar/core/main.js'></script>
    <script src='externals/fullcalendar/daygrid/main.js'></script>
    <script type='text/javascript'>
		//var $jq = jQuery.noConflict();
		jQuery.noConflict();
		//$(document).ready(function() {
		jQuery(document).ready(function() {
            var el =jQuery('#calendar')[0];
            var Cal = new FullCalendar.Calendar(el,{
                plugins: [ 'dayGrid' ],
                editable: false,
                header: { left: 'title', center: '', right:  'today prev,next'},
                firstDay: 1,
                events: "/feed/races.fullcalendar.php",
                timeFormat: 'H:mm',
                loading: function(bool) {
                    if (bool) jQuery('#loading').show();
                    else jQuery('#loading').hide();
                }
            });
            Cal.render();
        });
    </script>
    <style type='text/css'>
      #loading {
        position: absolute;
        top: 5px;
        right: 5px;
        }

      #calendar {
        width: 550px;
        margin: 0 auto;
        }
      .fc-header td {
          border-style: none;
      }
      .fc-header-title { margin-top: 20px; }
    </style>
        <div id='loading' style='display:none'>loading...</div>
        <div id='calendar'></div>
        <hr />
        <div id='ical-help-box'>
        <?php
            echo nl2br(getLocalizedString("icalhelpbox"));
            echo "&nbsp;<b>http://".$_SERVER['SERVER_NAME']."/feed/races.ical.php?lang=".getCurrentLang()."</b>";
                
        ?>
        </div>
<?php
    include_once("includes/footer.inc");
?>
