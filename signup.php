

<?php
include 'session-file.php';
include "signup_process.php";
//include 'handlers/register_handler.php';
//include 'handlers/login_handler.php';
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Register now</title>

    <style>

body{   display: flex;
    justify-content: center;
     align-items: center;
      height: 100dvh;
  }
  input{
    margin-bottom: 10px;
    width: 200px;
    padding: 6px;
    display: block;
     border-radius: 5px;
     box-shadow: 1px 5px rgb(228, 39, 77);
  }
  h2{
    text-align: center;
    background-color: orange;
    padding: 5px;
  }
  #box{
    
    box-shadow: 9px 9px 9px 9px green;
    padding: 10px;
    border-radius: 8px;

  }
  button{background-color: rgb(19, 165, 213);
          width: 202px;
          padding: 6px;
          color: white;
          border-radius: 5px;
          border: none;

}
h4{
    text-align: center;
    background-color: orange;
    font-size: 13px;
    padding: 4px;}
    a{
    text-decoration: none;
      }

      #gender input{
        margin-top: 20px;
        display: inline;
        box-shadow: none;
      }
    </style>
</head>
<body>


  
  <div id="box">
   <h2>REGISTER NOW</h2>
    
                <form action="signup_process.php" method="POST">

                    <!-- First Name -->
                    <label>First name</label>
                    <input type="text" name="reg_fname" placeholder="First Name"  required>
                    
                    <!-- Last Name -->
                    <label>Last name</label>
                    <input type="text" name="reg_lname" placeholder="Last Name" required>
                    

                    <!-- Username -->
                    <label>Username</label>
                    <input type="text" name="username" placeholder="Username (Cannot be changed)" value="<?php if (isset($_SESSION['username'])) {
                        echo $_SESSION['username'];
                    } ?>" required>
                    <?php
                        if(in_array("Username already exists", $error_array)){ echo "<p class='alert'>Username already exists</p>";}
                        else if(in_array("Username must be between 2 and 20", $error_array)) {echo "<p class='alert'>Username must be between 2 and 20</p>";}
                        else if(in_array("You username can only contain english characters or numbers", $error_array)) echo "<p class='alert'>You username can only contain english characters or numbers</p>";
                    ?>

                    <!-- Email -->
                    <label>Email</label>
                    <input type="email" name="reg_email" placeholder="Email" value="<?php if (isset($_SESSION['reg_email'])) {
                        echo $_SESSION['reg_email'];
                    } ?>" required>

                    
                    <?php
                        if (in_array("Email already in use", $error_array)) echo "<p class='alert'>Email already in use</p>";
                        else if (in_array("Email is invalid format", $error_array)) echo "<p class='alert'>Email is invalid format</p>";
                        
                    ?>

                    <!-- Password -->
                    <label>Password</label>
                    <span class="pswd_icon_bg"  onclick="reg_pswd_toggale()"><i class="fa-regular fa-eye" id="reg_pswd_show" style="margin: auto;"></i></span>
                    <input type="password" id="register_pswd" name="reg_password" placeholder="Password"  required>
                    <?php 
                        
                    ?>
                    
                    
                    <?php 
                        
                         if(in_array("Your password can only contain english characters or numbers", $error_array)) echo "<p class='alert'>Your password can only contain english characters or numbers</p>";
                        else if(in_array("Your password must be between 5 and 30 characters or numbers", $error_array)) echo "<p class='alert'>Your password must be between 5 and 30 characters or numbers</p>";
                    ?>

                    <div id="gender">
                      <!-- Gender -->
                    <label>Gender</label>
                    <tr>
                        <td>
                            <input style="width:10px; height:10px;" type="radio" name="gender" value="Male" <?php if (isset($_POST['gender']) && $_POST['gender'] == "Male"){
                            ?> checked <?php
                            } ?> required> Male
                            <input style="width:10px; height:10px;" type="radio" name="gender" value="Female" <?php if (isset($_POST['gender']) && $_POST['gender'] == "Female"){
                            ?> checked <?php
                            } ?> required> Female
                        </td>
                    </tr>
                    </div>

                    <!-- Birthday -->
                    <br>      
                    <!-- <label>Birthday</label> -->
                    <tr>
                        <td>Birthday
                        &nbsp;&nbsp;
                        <input type="date" name="dob" value="<?php if (isset($_SESSION['dob'])) {
                            echo $_SESSION['dob'];
                        } ?>" requred>
                        </td>
                    </tr>
                    

                    <!-- Submit Button -->
                    <button type="submit"  style="margin-bottom:20px" name="reg_user" >Sign me up!</button>         
                    
                </form>
                <a href="login.php"><h4>ALREADY HAVE AN ACCOUNT</h4></a>
            </div>




        
    </form>
    
   </div>
</body>
</html>