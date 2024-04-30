<?php 
  include 'connect.php';
?>
<?php	
	if(isset($_POST['btnLogin'])){
		$uname=$_POST['login-user'];
		$pwd=$_POST['login-txtpassword'];
		//check tbluseraccount if username is existing
		$sql ="SELECT * FROM tbluseraccount WHERE username='".$uname."'";
		
		$result = mysqli_query($connection,$sql);	
		
		$count = mysqli_num_rows($result);
		$row = mysqli_fetch_array($result);
		
		if($count== 0){
			echo "<script language='javascript'>
						alert('username not existing.');
				  </script>";
		}else if($row[3] != $pwd) {
			echo "<script language='javascript'>
						alert('Incorrect password');
				  </script>";
		}else{
			$_SESSION['username']=$row[0];
			// header('location: dashboard.php');
      $rows=mysqli_fetch_assoc($result);
      header("Location: dashboard.php?data=" . $row['useraccountid']);
    
      exit();
		}
	}
?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <link rel="stylesheet" href="styles.css" />
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Jost&family=Red+Hat+Display&family=Wix+Madefor+Display&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">


    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Jost&family=Red+Hat+Display&family=Wix+Madefor+Display:wght@600&display=swap" rel="stylesheet">

  
    <title>TEKNOPIDU</title>

    <script src="js/script.js"></script>
  </head>

  
  <body>
    <!-- <img src="backgroundfinal.png" alt="asdasd" id="background"> -->

    <!-- THIS IS FOR NAVIGATION BAR ONLY -->
    <div class="navigations">
      <nav>

        <a href="index.php" class="logo" id="logo">
          <img src="images/cit.png" alt="cit_logo">
          <h2>TEKNO<span>PIDU</span></h2>
        </a>

          <ul>
            <li><a href="home.html">Home</a></li>
            <li><a href="about_us.html">About Us</a></li>
            <li><a href="#contacts">Contact Us</a></li>
          </ul>
  
          <div class="all-btn">
            <div class="btn" id="reg_btn" onclick="Register()" >Register</div>
            <div class="btn" id="login_btn" onclick="Login()">Login</div>
          </div>
      </nav>
    </div>

    <div class="landing_page">
      <div class="header">
        <h1>CIT LOVES AGAIN!</h1>
        <p>Feeling Lonely? Spark a connection with someone special
          here in CIT-U!!
        </p>
      </div>
      <!-- <h1>CIT LOVES <br><span> AGAIN!</span></h1> -->
      <!-- <div class="header_details">
        <p>Feeling Lonely? Spark a connection with someone special
          here in CIT-U!!
        </p>
      </div> -->
    </div>




    <div class="login_pop" id="login_pop">

      <form action="index.php" method="post" class="center" id="login">
        <h1>Log In</h1>

        <div class="emailfield">
          <h3></h3>
          
          <p>Need an account? <a onclick="Register()">Sign up</a></p>
        </div>
        <div class="toflex">
                <img src="images/user.png" id="logos"alt="">
                <input type="text" name="login-user" placeholder="Username">

          </div>
          <p id="usernameError">Username not existing</p>
      
          <div class="toflex">
                <img src="images/padlock.png" id="logos"alt="">
                <input type="password" name="login-txtpassword" placeholder="Password">

          </div>
          <p id="passwordError">Incorrect password</p>
       
        <input type="submit" name=btnLogin id="submit" value="Login" >
       
      </form>
    </div>



    <div class="register-pop" id="register-pop" >
      <div class="center">
     
        <form class="register-form" method="post" >
               <h1>Signup</h1>
          
              <!-- <label for="#email">Email</label><br> -->
              <!-- <label for="txtgender">Gender</label> -->
              <!-- <label for="#firstname">first name</label><br> -->
              <!-- <input type="text" id="firstname" placeholder="Firstname" name="txtfirstname"> UCOMMENT IF NEC-->
              <div class="form-floating mb-3">
                <input
                  type="text"
                  class="form-control"
                  name="txtfirstname"
                  id="formId1"
                  placeholder=""
                />
                <label for="formId1">First Name</label>
              </div>
              
              <br>
              
              <!-- <label for="#lastname">last name</label><br> -->
              <!-- <input type="text" id="lastname"  placeholder="Lastname" name="txtlastname"><br> UNCOMMENT IF NEC-->
              <div class="form-floating mb-3">
                <input
                  type="text"
                  class="form-control"
                  name="txtlastname"
                  id="formId1"
                  placeholder=""
                />
                <label for="formId1">Last Name</label>
              </div>
              
              <div class="toflex">
                <!-- <img src="images/mail.png" id="logos"alt=""> -->
                <input type="email" id="email" name="txtemail" placeholder="Email"><br>

              </div>
          <div class="toflex">
                <img src="images/woman.png" id="gender"alt="">
                <select id="txtgender" name="txtgender">
                <option value="Male">Male</option>
                <option value="Female">Female</option>
              </select><br>
          </div>
              <!-- <label for="#username">Username</label><br> -->
              <input type="text" id="username"  placeholder="Username" name="txtusername"><br>
       
              <!-- <label for="#password">Password</label><br> -->
              <input type="password" id="password"  placeholder="Password" name="txtpassword"><br>

              <!-- <label for="#checkPassword">Confirm password</label><br> -->
              <input type="password" id="checkPassword"  placeholder="Confirm Password" name="checkPassword"><br>
 
              <input type="submit" name=btnRegister id="submit" value="Register" >
 
           
     
</form>
       
      </div>
    </div>




    <footer>
      <!-- <div class="cit_logo_footer"> -->
        <img id="citlogo" src="images/logocit-1.png" alt="citfooter">
      <!-- </div> -->

      <div class="box1" id="contacts">
        <h1>Contact Us</h1>

        <p>Carreon, John Loi D.</p>
        <ul>
          <li>155-6 Sanciangko St., Cebu City</li>
          <li>0969-533-1788</li>
        </ul>

        <p>Abadiano, Jan Edward V.</p>
        <ul>
          <li>Banilad, Cebu City</li>
          <li>09numbersninico</li>
        </ul>
      </div>


      <div class="box2">
        <h1>Get in Touch</h1>
        <div class="icons">
          <a href="https://www.facebook.com/apollo.raval" target="_blank"><img src="images/fb.png" ></a>
          <a href="http://www.instagram.com" target="_blank"><img src="images/ig.png"></a>
          <a href="linkedin.com" target="_blank"><img src="images/linkedin.png"></a>
          <a href="http://"><img src="images/twitter.png"></a>
        </div>
        
        
        <div class="search">
          <input type="text" placeholder="Search">

          <div id="search_background">
            <img src="images/search.png" alt="">
          </div>
        </div>
        
      </div>




    </footer>
  </body>
</html>





<?php	
    if(isset($_POST['btnRegister'])){		
        //retrieve data from form and save the value to a variable
        //for tbluserprofile
        $fname = $_POST['txtfirstname'];		
        $lname = $_POST['txtlastname'];
        $gender = $_POST['txtgender'];
        
        //for tbluseraccount
        $email = $_POST['txtemail'];		
        $uname = $_POST['txtusername'];
        $pword = $_POST['txtpassword'];
        $sql2 = "SELECT * FROM tbluseraccount WHERE username='$uname'";
        $result = mysqli_query($connection, $sql2);
        $row = mysqli_num_rows($result);
        if($row == 0){

        
        //save data to tbluserprofile			
        $sql1 = "INSERT INTO tbluser (firstname, lastname, gender) VALUES ('$fname', '$lname', '$gender')";
        mysqli_query($connection, $sql1);
       
      
        //Check tbluseraccount if username is already existing. Save info if false. Prompt msg if true.
          $user_id =mysqli_insert_id($connection);
          
          
         
            $sql = "INSERT INTO tbluseraccount (email,username,password,userid) VALUES ('$email', '$uname', '$pword','$user_id')";
            mysqli_query($connection, $sql);
            
            // echo "<script language='javascript'>
            //             alert('New record saved.');
            //       </script>";
           
            // header("location: index.php?data='.$rows['acctid'].'");
        } else {
            echo "<script language='javascript'>
                        alert('Username already existing');
                  </script>";
        }    
    }
?>  

