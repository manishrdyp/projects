<?php 
session_start();

	include("Connection.php");
	include("Function.php");

	$user_data = check_login($con);
    $uni="select * from university ";
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
      <section class="text-gray-600 body-font">
        <div class="container px-5 py-24 mx-auto" style="margin-top:30px;">
          <div class="flex flex-wrap -m-4">
            <?php
                 if($nums>0)
                 {
                  while($row=mysqli_fetch_assoc($query))
                  {
                    if( $row['owner_name']== $user_data['First_Name'])
                    {
                    ?>
                    <div class="lg:w-1/3 md:w-1/2 p-4 w-full">
                    <a class="block relative h-48 rounded overflow-hidden">
                      <img alt="ecommerce" class="object-cover object-center w-full h-full block" src="<?php echo $row['image']?>">
                    </a>
                    <div class="mt-4">
                      <h2 class="text-gray-900 title-font text-lg font-medium"><?php echo $row['name']?></h2>
                      <p class="mt-1"><?php echo $row['courses']?></p>
                     <a href="Description.php?id=<?php echo $row['Id'];?>"> View Details </a> 
                    </div>
                  </div>
                    <?php
                  }
                 }
                 }
                 ?>
            </div>
            </div>
        </section>
     
</body>
</html>