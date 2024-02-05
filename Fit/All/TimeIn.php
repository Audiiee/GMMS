<?php
    include "db_conn.php";
     if(isset($_GET['Email'])) {
    $em = $_GET['Email'];
    $del = "SELECT * FROM `status` where `Email` = '$em'";
    $res = mysqli_query($conn, $del);    
    $rows = mysqli_fetch_assoc($res);
  }
  
  $alert = "";
  if(isset($_POST['submit'])!= ''){
    $em = $_GET['Email'];
    $fname = $_POST['firstname'];
    $lname =$_POST['lastname'];
    $sel = "SELECT * FROM `status` where `Email` = '$em'";
    $res = mysqli_query($conn, $sel);  
    $date = $_POST['date'];
    $timeIn = $_POST['timeIn'];
    
  if (empty($_POST["date"]) and empty($_POST["timeIn"])) {
      $alert = "Please enter both date and time";
  } else if (empty($_POST["date"])) {
      $alert = "Please enter the date";
  } else if (empty($_POST["timeIn"])) {
      $alert = "Please enter the time";
  } else {
    $ins = "INSERT INTO `checkin`(`First_Name`, `Last_Name`,`Date`, `Time_In`, `Email`) VALUES ('$fname', '$lname','$date','$timeIn','$em')";
    $result = mysqli_query($conn, $ins);
    $alert = "Check-In Successfully!";
  }
  }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Time In</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="smembers.css">
</head>
<body>
    <div class="main-container d-flex">
        <div class="sidebar" id="side_nav">
            <div class="header-box px-4 pt-3 pb-4 d-flex">
                <h1 class="fs-4">
                    <a class="navbar-brand" href="Profile.php?Email=<?php echo $rows['Email'] ?>">
                        <i class="fas fa-dumbbell fa-sm" style="color: #f54324;"></i>
                    <span class="text-white">GYM ROAR</span>
                    </a>
                </h1>
            </div>

            <ul class="list-unstyled px-2 py-3">
              <li class="nav-item"><a href="Profile.php?Email=<?php echo $rows['Email'] ?>" class="text-decoration-none px-3 py-2 d-block"><i class="fa-solid fa-user"></i> Profile </a></li>
              <li class="active"><a href="CheckIn.php?Email=<?php echo $rows['Email'] ?>" class="text-decoration-none px-3 py-2 d-block"><i class="fa-solid fa-clock"></i> Check-In</a></li>
              <li class="nav-item"><a href="History.php?Email=<?php echo $rows['Email'] ?>" class="text-decoration-none px-3 py-2 d-block"><i class="fa-solid fa-clock-rotate-left"></i> History </a></li> 
              <li class="nav-item"><a href="Notification.php?Email=<?php echo $rows['Email'] ?>" class="text-decoration-none px-3 py-2 d-block"><i class="fa-solid fa-bell"></i> Notification</a></li>
            </ul>
            <div class="dropdown  px-4 pt-3 pb-5 d-flex">
              <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                  <i class="fa fa-user"></i> &nbsp Sign Out</a>
              <ul class="dropdown-menu justify-content-end dropdown-menu-dark text-small shadow">
              <li><a class="dropdown-item" href="Feedback.php?Email=<?php echo $rows['Email'] ?>"> <i class="fa-solid fa-message fa-2xs"></i> Give Feedback</a></li> 
                <li><a class="dropdown-item"  data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@mdo" href="#"><i class="fa-solid fa-right-from-bracket fa-2xs"></i> Sign out</a></li>
              </ul>
          </div>
      </div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-md">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fw-bold fs-5" id="exampleModalLabel"><i class="fa-solid fa-right-from-bracket"></i> Log out</h1>
        <button type="button" id="button-close" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <h1 class="fs-5 text-center">Are you sure you want to log-out?
        </h1>
       </div>
 
      <div class="modal-footer justify-content-around">
        <a type="button" id="modal-footer" name="submit" class="btn btn-danger btn-md" href="/Fit/Index.php">Yes</a>
        <button type="button" id="modal-footer" class="btn btn-secondary btn-md" data-bs-dismiss="modal">No</button>
      </div>
  </div> 
    </div>
  </div>




  <div class="content ">
    <div class="dashboard-content px-5 pt-2">
        <div class="d-flex" id="cancelbtn">
        <a href="CheckIn.php?Email=<?php echo $rows['Email'] ?>" class="btn btn-outline-light fw-bold btn-md">Back</a>
          </div>
  
        <div class="d-flex flex-column justify-content-center align-items-center" id="time">
            <div class="p-3 bd-highlight">
                <h2 class="fw-bold fs-2 mb-3 mt-4 text-center">CHECK-IN</h2>
                <?php echo $alert?>
            </div>
            <div class="p-1 bd-highlight">
                <h6 class="fw-bold fa-sm">
                    To time-in, please fill out the form below.
                </h6>
            </div>
            <form method="POST" enctype="multipart/form-data">
            <div class="p-1 py-5 flex-grow-1 bd-highlight" hidden>
                        <div class="d-flex bd-highlight">
                          <div class="p-1 flex-grow-1 bd-highlight">
                            <label for="message-text" class="col-form-label">First Name:</label>
                            <input type="text" class="form-control" value = "<?php echo $rows['First_Name'] ?>" name="firstname">
                          </div>
                          <div class="p-1 flex-grow-1 bd-highlight">
                            <label for="message-text" class="col-form-label">Last Name:</label>
                            <input type="text" class="form-control" value = "<?php echo $rows['Last_Name'] ?>" name="lastname">
                          </div>
                        </div>
                    </div>
            <div class="p-1 flex-grow-1 bd-highlight">
                <div class="row mb-3 mx-3">
                    <div class="col-12">
                        <label for="message-text" class="col-form-label">Date:</label>
                        <input type="date" class="form-control" name="date">
                    </div>
                </div>
                <div class="row mb-3 mx-3 ">
                    <div class="col-12">
                        <label for="message-text" class="col-form-label">Time-In:</label>
                        <input type="time" class="form-control" name="timeIn">
                    </div>
                </div>
                <div class="row mb-3 text-center">
                    <div class="col-12">
                        <button class="btn btn-outline-light fw-bold btn-md" name="submit" onclick = "insertFunc()" type="submit"> Time-In </button>
                    </div>
                </div>
            </div>
          </form>
        </div>
    </div>
</div>
  
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>




