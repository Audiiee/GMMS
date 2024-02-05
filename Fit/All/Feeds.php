<?php
$em = null;
    include "db_conn.php";
     if(isset($_GET['No'])) {
    $no = $_GET['No'];
    $sel = "SELECT * FROM `feedback` WHERE `No` = '$no'";
    $res = mysqli_query($conn, $sel);    
    $rows = mysqli_fetch_assoc($res);
  }
  ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GYM MEMBER Feedback</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="smembers.css">
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
      </form> 
    </div> 
      </div>
    </div>

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
      </form> 
    </div> 
      </div>
    </div>

    <div class="main-container fixed-top d-flex">
        <div class="sidebar" id="side_nav">
            <div class="header-box px-4 pt-3 pb-4 d-flex">
            <h1 class="fs-4">
                <a class="navbar-brand" href="Nmember.php">
                    <i class="fas fa-dumbbell fa-sm" style="color: #f54324;"></i>
                <span class="text-white">GYM ROAR</span>
                </a>
            </h1>
        </div>

            <ul class="list-unstyled px-2">
                <li class="nav-item"><a href="Nmember.php" class="text-decoration-none px-3 py-2 d-block"><i class="fa-solid fa-user-plus fa-sm"></i> New Member</a></li>
                <li class="nav-item"><a href="Members.php" class="text-decoration-none px-3 py-2 d-block"><i class="fa-solid fa-users"></i> Members</a></li>
                <li class="active"><a href="NotificationAdmin.php" class="text-decoration-none px-3 py-2 d-block"><i class="fa-solid fa-bell"></i> Notification</a></li> 
                <li class="nav-item"><a href="Report.php" class="text-decoration-none px-3 py-2 d-block"><i class="fa-solid fa-magnifying-glass-chart"></i>  Reports </a></li>
                <li class="nav-item"><a href="Announcement.php" class="text-decoration-none px-3 py-2 d-block"><i class="fa-solid fa-bullhorn"></i> Announcements</a></li>
            </ul>
            <div class="dropdown  px-4 pt-6 pb-5 d-flex">
                <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="fa fa-user"></i> &nbsp Sign Out</a>
                <ul class="dropdown-menu justify-content-end dropdown-menu-dark text-small shadow">
                    <li><a class="dropdown-item"  data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@mdo" href="#"><i class="fa-solid fa-right-from-bracket fa-2xs"></i> Sign out</a></li>
                </ul>
            </div>
        </div>


     
   <div class="content">
            <div class="dashboard-content px-5 pt-4">
                <h2 class="fs-5 mb-3">FEEDBACK</h2>
                <button type="submit" name="pending" class="btn btn-outline-light btn-md">
                   <a class="nav-link" href="NotificationAdmin.php">
                         Back
                    </a>
                </button> <br><br><br>

                    <button type="button" name="pending" class="btn btn-danger btn-lg ms-5 ps-5 pe-5 ">
                    <h6 class="m-5 p-5 text-white"><?php echo $rows['Feedback'] ?></h6> 
                    </button>
                    
                </div>
            </div>
        </div>
    </div>
          


      

    


    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
