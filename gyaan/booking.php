<?php 
session_start();

	include("Connection.php");
	include("Function.php");

    $user_data = check_login($con);
    $uni="select * from booking ";
    $query = mysqli_query($con,$uni);
    $nums =mysqli_num_rows($query);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My University</title>
    <script defer src="https://use.fontawesome.com/releases/v5.15.4/js/all.js" integrity="sha384-rOA1PnstxnOBLzCLMcre8ybwbTmemjzdNlILg8O7z1lUkLXozs4DHonlDtnE7fpc" crossorigin="anonymous"></script>
</head>
<link rel="stylesheet" href="tailwind.min.css">
<style>
    .dropdown {
  display: inline-block;
  position: relative;
  width: 100px;
  height: 30px;
  text-align: center;
}
.dropdown-content {
  display: none;
  position: absolute;
  width: 100%;
  overflow: auto;
  box-shadow: 0px 10px 10px 0px rgba(0,0,0,0.4);
}
.dropdown:hover .dropdown-content {
  display: block;
}
.dropdown-content a {
  display: block;
  color: #000000;
  padding: 5px;
  text-decoration: none;
}
.dropdown-content a:hover {
  color: #FFFFFF;
  background-color: #00A4BD;
}

        table {
            margin: 0 auto;
            font-size: large;
            border: 1px solid black;
        }
 
        h1 {
            text-align: center;
            color: #006600;
            font-size: xx-large;
            font-family: 'Gill Sans', 'Gill Sans MT',
            ' Calibri', 'Trebuchet MS', 'sans-serif';
        }
 
        td {
            background-color: #E4F5D4;
            border: 1px solid black;
        }
 
        th,
        td {
            font-weight: bold;
            border: 1px solid black;
            padding: 10px;
            text-align: center;
            width: 525px;
        }
 
        td {
            font-weight: lighter;
        }
    
</style>

<body>
<header class=" absolute top-0 left-0 right-0 text-black body-font bg-teal-300">
    <div class="container mx-auto flex flex-wrap p-3 flex-col md:flex-row items-center">
      <a href="index.php" class="flex title-font font-medium items-center text-black mb-4 md:mb-0">
        <img src="pictures/logo.png" style="width: 70px;">
        <span class="ml-3 text-xl">GYAAN</span>
      </a>
          <nav class="md:ml-auto md:mr-auto flex flex-wrap items-center text-black justify-center">
            <a href="index.php" class="mx-10 hover:text-black">Home</a>
            <a href="About.html" class="mr-10 hover:text-black">About Us</a>
            <a href="Book.php" classs="mx-10 hover:text-black">Book Slot</a>
            <a href="newuniversity.php" class="mx-10 hover:text-black">Add University</a>
          </nav>
          <?php echo $user_data['First_Name']; ?>&nbsp;&nbsp;
          <div class="dropdown">
                    <button class="inline-flex items-center bg-gray-100 border-0 py-1 px-3 focus:outline-none hover:bg-gray-200 rounded text-black mt-4 md:mt-0 dropdown">Account <i class="fas fa-solid fa-caret-down"></i></button>
                    <div class="dropdown-content bg-gray-100">
                    <a href="profile.php">Profile</a>
                    <a href="#">My University</a>
                    <a href="logout.php">Log Out</a>
                    </div>
            </div>
        </div>
      </header>

      <section>
        <h1 style="margin-top:120px;">Slots Booked </h1>
        <!-- TABLE CONSTRUCTION -->
        <table>
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>University</th>
               
            </tr>
            <!-- PHP CODE TO FETCH DATA FROM ROWS -->
            <?php
                 if($nums>0)
                 {
                  while($row=mysqli_fetch_assoc($query))
                  {
                    
                    ?>
            <tr>
                <!-- FETCHING DATA FROM EACH
                    ROW OF EVERY COLUMN -->
                <td><?php echo $row['id'];?></td>
                <td><?php echo $row['name'];?></td>
                <td><?php echo $row['university'];?></td>
               
            </tr>
            <?php
                  }
                 }
                 
                 ?>
        </table>
    </section>