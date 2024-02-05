
<?php
session_start();

include "db_conn.php";

if (isset($_SESSION["Username"])) {
    $username = $_SESSION["Username"];
    $sql = "SELECT * FROM `status` WHERE Email = '$username'";
    $result = mysqli_query($conn, $sql);
    $rows = mysqli_fetch_assoc($result);

    

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Member Profile</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="smembers.css">

    
</head>
<body>
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



<div class="main-container fixed-top d-flex">
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
              <li class="active"><a href="Profile.php?Email=<?php echo $rows['Email'] ?>" class="text-decoration-none px-3 py-2 d-block"><i class="fa-solid fa-user"></i> Profile </a></li>
              <li class="nav-item"><a href="CheckIn.php?Email=<?php echo $rows['Email'] ?>" class="text-decoration-none px-3 py-2 d-block"><i class="fa-solid fa-clock"></i> Check-In</a></li>
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


     
<div class="content">
  <div class="dashboard-content px-5 pt-3">
    <div class="d-flex justify-content-center" id ="Nmember1">
      <form method="POST" enctype="multipart/form-data">
        <div class="d-flex">
            <div class="p-1 py-3 flex-grow-2 bd-highlight">
                <img src ="upload/<?php echo $rows['Image']?>" id = "output" style = "width:150px; height:150px">
                <p class = "px-5 py-2"><?php echo $rows['Status']?></p>
            </div>
          <div class="p-1 py-5 flex-grow-1 bd-highlight">
            <div class="d-flex bd-highlight">
              <div class="p-1 flex-grow-1 bd-highlight">
                <label for="message-text" class="col-form-label">Full Name:</label>
                <p><?php echo $rows['First_Name']?> <?php echo $rows['Last_Name']?></p>
                <a href="UpdateMember.php?Email=<?php echo $rows['Email'] ?>" class="btn btn-outline-danger fw-bold btn-sm px-3">Edit</a>
              </div>
            </div>

          </div>
        </div>

        <div class="d-flex bd-highlight">
          <div class="p-1 flex-grow-1 bd-highlight">
             <label for="recipient-name" class="col-form-label">Address:</label>
          <div class="input-group">
             <p><?php echo $rows['Address']?></p>
            </div>
          </div>
        </div>

        <div class="d-flex bd-highlight">
          <div class="p-1 flex-grow-1 bd-highlight">
          <label for="message-text" class="col-form-label">Age</label>
          <div class="input-group">
          <p><?php echo $rows['Age']?></p>
            </div>
          </div>
          <div class="p-1 flex-grow-1 bd-highlight">
          <label for="message-text" class="col-form-label">Contact Number:</label>
            <div class="input-group">
              <p><?php echo $rows['Contact_Number']?></p>
            </div>
          </div>
          <div class="p-1 flex-grow-1 bd-highlight">
              <label for="message-text" class="col-form-label">Gender:</label>
            <div class="input-group">
              <p><?php echo $rows['Gender']?></p>
            </div>
          </div>
          
        </div>


        <div class="d-flex bd-highlight">
          <div class="p-1 flex-grow-1 bd-highlight">
            <label for="message-text" class="col-form-label">Start Date: </label>
            <p><?php echo $rows['Start_Date']?></p>
          </div>
          <div class="p-1 flex-grow-1 bd-highlight">
            <label for="message-text" class="col-form-label">End Date: </label>
            <p><?php echo $rows['End_Date']?></p>
          </div>
          <div class="p-1 flex-grow-1 bd-highlight">
          <label for="message-text" class="col-form-label">ID Issued:</label>
          <p><?php echo $rows['Id_Issue']?></p>
          </div>
        </div>

        <div class="d-flex bd-highlight">
          <div class="p-1 pb-2 flex-grow-1 bd-highlight">
            <label for="message-text" class="col-form-label">Email:</label>
            <div class="input-group">
              <p><?php echo $rows['Email']?></p>
            </div>
          </div>
          <div class="p-1 pb-2 flex-grow-1 bd-highlight"hidden>
            <label for="message-text" class="col-form-label">Password:</label>
            <div class="input-group">
              <p> <?php echo $rows['Password']?></p>
            </div>
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
