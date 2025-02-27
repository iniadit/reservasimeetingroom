<?php
function build_calendar($month, $year)
{

    $mysqli = new mysqli ('localhost', 'root', '', 'bookingcalendar');
   /*  $stmt = $mysqli->prepare ("select * from bookings where MONTH(date) = ? AND YEAR(date) = ?");
    $stmt->bind_param('ss', $month, $year);
    $bookings = array();
    if($stmt->execute()){
        $result = $stmt->get_result();
        if($result->num_rows>0){
            while($row = $result->fetch_assoc()){
                $bookings[] = $row['date'];
            } 
            $stmt->close();
        }
    } */




    $daysOfWeek = array('Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday');
    $firstDayOfMonth = mktime(0, 0, 0, $month, 1, $year);
    $numberDays = date('t', $firstDayOfMonth);
    $dateComponents = getdate($firstDayOfMonth);
    $monthName = $dateComponents['month'];
    $dayOfWeek = $dateComponents['wday'];
    $datetoday = date('Y-m-d');

    $prev_month = date('m', mktime(0, 0, 0, $month - 1, 1, $year));
    $prev_year = date('Y', mktime(0, 0, 0, $month - 1, 1, $year));
    $next_month = date('m', mktime(0, 0, 0, $month + 1, 1, $year));
    $next_year = date('Y', mktime(0, 0, 0, $month + 1, 1, $year));
    $calendar = "<center><h2>$monthName $year</h2>";
    
    $calendar .= "<a class='btn btn-primary btn-xs' style='margin-right: 5px;' href='?month=" . $prev_month . "&year=" . $prev_year . "'>
    Prev Month</a>";
    $calendar .= "<a class='btn btn-primary btn-xs' style='margin-right: 5px;' href='?month=" . date('m') . "&year=" . date('Y') . "'>
    Current Month</a>";
    $calendar .= "<a class='btn btn-primary btn-xs' style='margin-right: 5px;' href='?month=" . $next_month . "&year=" . $next_year . "'>
    Next Month</a></center>";
    $calendar .= "<br><table class='table table-bordered'>";
    $calendar .= "<tr>";
    foreach ($daysOfWeek as $day) {
        $calendar .= "<th class='header'>$day</th>";
    }

    $calendar .= "</tr><tr>";
    $currentDay = 1;
    if ($dayOfWeek > 0) {
        for ($k = 0; $k < $dayOfWeek; $k++) {
            $calendar .= "<td class='empty'></td>";
        }
    }

    $month = str_pad($month, 2, "0", STR_PAD_LEFT);
    while ($currentDay <= $numberDays) {
        if ($dayOfWeek == 7) {
            $dayOfWeek = 0;
            $calendar .= "</tr><tr>";
        }
        $currentDayRel = str_pad($currentDay, 2, "0", STR_PAD_LEFT);
        $date = "$year-$month-$currentDayRel";

        $dayname = strtolower(date("I", strtotime($date)));
        $eventNum = 0;
        $today = $date == date('Y-m-d')? "today" : "";
       if($dayname=="II $dayname=="){
        $calendar.="<td><h4>$currentDay</h4><button class='btn btn-danger btn-xs'>Holiday</button>";
       }elseif($date<date('Y-m-d')){
        $calendar.="<td><h4>$currentDay</h4><button class='btn btn-danger btn-xs'>N/A</button>";
       }else{


        // Currently we have 10 slots in each day.
        
                $totalbookings = checkSlot($mysqli, $date);
        if ($totalbookings == 10) {
            $calendar .= "<td class='$today'><h4>$currentDay</h4><a href='#' class='btn btn-danger btn-xs'>All Booked</a>";
        } else {
            $availableslots = 10 - $totalbookings;                
            $calendar .= "<td class='$today'><h4>$currentDay</h4>
            <a href='http://localhost/ta/book/neworchide.php?date=" . $date . "' class='btn
            btn-success btn-xs'>Book</a><small><i>$availableslots slots left</i></small>";
            // UBAH BOOK SESUAI no index.php samakan dengan book.php
        }

       }
        
       $calendar."</td>";

        $currentDay++;
        $dayOfWeek++;
    }

    if($dayOfWeek !=7){
        
        $remainingDays=7-$dayOfWeek;
        for($i=0;$i<$remainingDays; $i++){
            $calendar.="<td class='empty'></td>";
        }
    }
    $calendar.="</tr>";
    $calendar.="</table>";

    echo $calendar; 
}

function checkSlot($mysqli, $date){
    $stmt = $mysqli->prepare ("select * from neworchide where date = ?"); // UBAH BOOKINGS SESUAI DATABASE
    $stmt->bind_param('s', $date);
    
    $totalbookings = 0;
    if($stmt->execute()){
        $result = $stmt->get_result();
        if($result->num_rows>0){
            while($row = $result->fetch_assoc()){
               $totalbookings++;
            } 
            $stmt->close();
        }
    }
    return $totalbookings;
}

?>

<html>
    <head>
        <meta name ="viewport" content="width=device-width, initial-scare=1.0">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
        <style>
            @media only screen and (max-width: 760px),
            (min-device-width: 802px)and(max-device-width: 1020px) {
                /* Force table to not be like tables anymore */
                table,
                thead,
                tbody,
                th,
                td,
                tr{
                    display: block;

                }

                .empty{
                    display: none;
                }

                /* Hide table heaers (but not display: none;, for accessibility) */
                th {
                    position: absolute;
                    top: -9999px;
                    left: -9999px;
                }

                tr{
                    border: 1px solid #ccc;
                }

                td{
                    /* Behave like a "row" */
                    border: none;
                    border-bottom: 1px solid #eee;
                    position: relative;
                    padding-left: 50%;
                }

                /* Label the data  */
                td:nth-of-type(1):before{
                    content: "Sunday";
                }

                td:nth-of-type(2):before{
                    content: "Monday";
                }

                td:nth-of-type(3):before{
                    content: "Tuesday";
                }

                td:nth-of-type(4):before{
                    content: "Wednesday";
                }

                td:nth-of-type(5):before{
                    content: "Thuesday";
                }

                td:nth-of-type(6):before{
                    content: "Friday";
                }

                td:nth-of-type(7):before{
                    content: "Saturday";
                }
            }

            /* Smartphone (portrait and landscape)-------  */
            @media only screen and (min-width: 320px) and (max-device-width: 480px){
                body{
                    padding: 0;
                    margin: 0;
                }
            }

            /* iPads (potrait and landscape)-------  */
            @media only screen and (min-device-width: 802px) and (max-device-width: 1020px){
                body{
                    width: 495px;
                }
            }

            @media (min-width:641px){
                table{
                    table-layout: fixed;
                }

                td{
                    width: 33%;
                }
            }

            .row{
                margin-top: 20px;
            }

            .today{
                background: yellow;
            }
        </style>
    </head>

<body>
   <div class="container">
    <div class="row">
        <div class="col-md-12">
            <?php
            $dateComponents=getdate();
            if(isset($_GET['month']) &&isset($_GET['year'])){
                $month=$_GET['month'];
                $year=$_GET['year'];
            }else{
                $month=$dateComponents['mon'];
                $year=$dateComponents['year'];
            }

            echo build_calendar($month, $year);

            ?>
        </div>
    </div>
   </div>   
   <script>
        // Refresh halaman setiap 5 detik (5000 milidetik)
        setTimeout(function() {
            location.reload();
        }, 5000);
    </script>   
</body>
    
</html>