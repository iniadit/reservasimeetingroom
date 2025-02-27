<?php
$mysqli = new mysqli('localhost', 'root', '', 'bookingcalendar');
$date = isset($_GET['date']) ? $_GET['date'] : date('Y-m-d'); // Set a default date if not provided

$jasmine = array();
 // UBAH BOOKINGS SESUAI DATABASE
if (isset($_GET['date'])) {
    $date = $_GET['date']; 
    // UBAH BOOKINGS SESUAI DATABASE
    $stmt = $mysqli->prepare("select * from jasmine where date = ?");
    $stmt->bind_param('s', $date);
    
    if ($stmt->execute()) {
        $result = $stmt->get_result();
        
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $jasmine[] = $row['timeslot'];
                 // UBAH BOOKINGS SESUAI DATABASE
            }
        }

        $stmt->close();
    }
}



if(isset($_POST['submit'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $timeslot = $_POST['timeslot'];
                           // UBAH BOOKINGS SESUAI DATABASE
    $stmt = $mysqli->prepare ("select * from jasmine where date = ? AND timeslot =  ?");
    $stmt->bind_param('ss', $date, $timeslot);
    if($stmt->execute()){
        $result = $stmt->get_result();
        if($result->num_rows>0){
          $msg = "<div class='alert alert-Danger'>Already Booked</div>";
        }else{
            // UBAH BOOKINGS SESUAI DATABASE
          $stmt = $mysqli->prepare("INSERT INTO jasmine (name, timeslot, email, date) VALUES (?,?,?,?)");
          $stmt->bind_param('ssss', $name, $timeslot, $email, $date);
          $stmt->execute();
          $msg = "<div class='alert alert-success'>Booking Successfull</div>";
          $jasmine[] = $timeslot;
             // UBAH BOOKINGS SESUAI DATABASE
          $stmt->close();
          $mysqli->close();
        }
    }
   

}

$duration = 60;
$cleanup = 0;
$start = "08:00";
$end = "18:00";

function timeslots($duration, $cleanup, $start, $end) {
    $start = new DateTime($start);
    $end = new DateTime($end);
    $interval = new DateInterval("PT" . $duration . "M");
    $cleanupInterval = new DateInterval("PT" . $cleanup . "M");
    $slots = array();

    for($intStart = $start; $intStart < $end; $intStart->add($interval)->add($cleanupInterval)){
        $endPeriod = clone $intStart;
        $endPeriod->add($interval);
        if($endPeriod > $end){
            break;
        }
        $slots[] = $intStart->format("H:iA") . "-" . $endPeriod->format("H:iA");
    }
    return $slots;
}

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>

    <style>
        body {
            display: flex;
            min-height: 100vh;
            flex-direction: column;
        }
        main {
            flex: 1;
            display: flex;
            justify-content: center;
            align-items: center;
            text-align: center;
            color: red;
        }
        nav {
            margin-top: auto;
            padding: 20px;
            background-color: whitesmoke;
        }
        footer {
            text-align: center;
            background-color: gray;
            padding: 20px;
            color: black;
        }
    </style>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" 
    integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link  rel="stylesheet" href="css/.main.css">
  </head>
  <body> 
  <div class="container">
    <h1 class="text-center">Book For Date: <?php echo date('d/m/Y', strtotime($date)); ?></h1><hr>
    <div class="row">
        <div class="col-md-12">
            <?php echo (isset($msg)) ? $msg : ""; ?>
        </div>
        <?php $timeslots = timeslots($duration, $cleanup, $start, $end);
        foreach ($timeslots as $ts) { ?>
            <div class="col-md-2">
                <div class="form-group">  <!-- UBAH BOOKINGS SESUAI DATABASE --> 
                    <?php if (in_array($ts, $jasmine)) { ?>
                          
                        <button class="btn btn-danger"> <?php echo $ts; ?></button>
                    <?php } else { ?>
                        <button class="btn btn-success book" data-timeslots="<?php echo $ts; ?>"> <?php echo $ts; ?></button>
                    <?php } ?>
                </div>
            </div>
        <?php } ?>
    </div>
</div>


<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Bookings: <span id="slot"></span></h4>
      </div>
      <div class="modal-body">
        <div class="row">
            <div class="col-md-12">
            <form action="" method="post">
                    <div class="form-group">
                        <label for="">Timeslot</label>
                        <input required type ="text" readonly name="timeslot" id="timeslot" class="form-control">
                    </div>
                    <div class="form-group">
                    <label for="">Name</label>
                    <input required type="text" name="name" class="form-control">
                    </div>
                    <div class="form-group">
                     <label for="">Email</label>
                         <input required type="email" name="email" class="form-control">
                    </div>
                    <div class="form-group pull-right">
                        <button class="btn btn-primary" type="submit" name="submit">Submit</button>
                    </div>
                </form>
            </div>
        </div>
      </div>
    </div>

  </div>
</div>

 
<main>
        <p>Pastikan Pesanan Anda</p>
    </main>
    <nav>
        <ul>
            <li><a href=http://localhost/ta>Beranda</a></li>
            <li><a href="https://wa.me/62895372372009">Kontak</a></li>
            <p> <a href="sk.html">Syarat dan Ketentuan Pembatalan Booking</a></p>
        </ul>
    </nav>
    <footer>
        <p>&copy; 2024 Swiss Belcourt Bukit Cimanggu. Hak cipta dilindungi undang-undang.</p>
    </footer>
   
    <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" 
        integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" 
        crossorigin="anonymous"></script>
        <script>
    $(".book").click(function () {
        var timeslot = $(this).attr('data-timeslots');
        $("#slot").html(timeslot);
        $("#timeslot").val(timeslot);
        $("#myModal").modal("show");
    });
</script>

  </body>
</html>