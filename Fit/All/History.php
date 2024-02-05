<?php
    include "db_conn.php";
     if(isset($_GET['Email'])) {
    $em = $_GET['Email'];
    $sel = "SELECT * FROM `status` where `Email` = '$em'";
    $res = mysqli_query($conn, $sel);    
    $rows = mysqli_fetch_assoc($res);
  }

  ?>
  <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Check In History</title>
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
              <li class="nav-item"><a href="Profile.php?Email=<?php echo $rows['Email'] ?>" class="text-decoration-none px-3 py-2 d-block"><i class="fa-solid fa-user"></i> Profile </a></li>
              <li class="nav-item"><a href="CheckIn.php?Email=<?php echo $rows['Email'] ?>" class="text-decoration-none px-3 py-2 d-block"><i class="fa-solid fa-clock"></i> Check-In</a></li>
              <li class="active"><a href="History.php?Email=<?php echo $rows['Email'] ?>" class="text-decoration-none px-3 py-2 d-block"><i class="fa-solid fa-clock-rotate-left"></i> History </a></li> 
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
  <h2 class="fs-5 fw-bold">HISTORY</h2>

                <div class="d-flex  flex-row bd-highlight me-5 justify-content-end">
                  <div class="p-0 bd-highlight">
                    <input type="text" id="searchInput" class="form-control" placeholder="Search..." name="search">
                    </div>
                 </div>
                 <?php
                        include "db_conn.php";
                        if(isset($_GET['Email'])) {
                        $em = $_GET['Email'];
                        $select = "SELECT * FROM `checkin` WHERE `Email` = '$em' ORDER BY `Date` DESC"; 
                        $result = mysqli_query($conn, $select);

                         // Count the number of records
                        $recordCount = mysqli_num_rows($result);
                        echo "<h6 class='ps-5 m-0 pb-1'>Total Visit: $recordCount times</h6>";

                   if ($recordCount > 0) {
                     ?>
                    <div class="table-wrapper-scroll-y my-custom-scrollbar ms-5 me-5">
                     <table class="table table-dark table-hover align-middle table-striped ">
                       <thead>
                         <tr class = "text-center sticky-top table-dark">
                           <th scope="col">Date</th>
                           <th scope="col">Time In</th>
                           <th scope="col">Time Out</th>
                         </tr>
                       </thead>
                       <tbody>
                       <?php
                        while($rows = mysqli_fetch_assoc($result)){ 
                       ?>
                           <tr class="text-center ">
                               <td><?php echo $rows['Date'] ?></td>
                               <td><?php echo $rows['Time_In'] ?></td>
                               <td><?php echo $rows['Time_Out'] ?></td>
                           </tr>
                       <?php 
                        }  
                      } 
                    }  
                       ?>
                        </tbody>
                     </table>
                   </div>
    
</div>
</div>



    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script>
    $(document).ready(function() {
        // Attach an input event listener to the search input field
        $('#searchInput').on('input', function() {
            // Get the value from the input field
            var searchValue = $(this).val().toLowerCase();

            // Loop through each row in the table body
            $('tbody tr').each(function() {
                // Get the text content of the Date, Email, and First Name columns in lowercase
                var dateText = $(this).find('td:eq(0)').text().toLowerCase();
                var emailText = $(this).find('td:eq(1)').text().toLowerCase();
                var firstNameText = $(this).find('td:eq(2)').text().toLowerCase();

                // Check if the search value is found in any of the columns
                if (dateText.includes(searchValue) || emailText.includes(searchValue) || firstNameText.includes(searchValue)) {
                    // Show the row if the search value is found in any column
                    $(this).show();
                } else {
                    // Hide the row if the search value is not found in any column
                    $(this).hide();
                }
            });
        });
    });
</script>
    
</body>
</html>
