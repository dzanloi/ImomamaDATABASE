<?php 
  include 'connect.php';
  $data=$_GET['data'];
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PREFERENCE</title>
    <link rel="stylesheet" href="css/preference.css">
</head>
<body>

    <div class="dashboard">
        <div class="sidebar">
            <div class="profile">
                <div class="profile-img-box">
                    <?php
                        echo "<img src=images/" .$row['picture']. " alt = profilepic>";
                    ?>
                    <img src="images/jl.jpg" alt="profilepic">
                </div>
                    <?php
                        $sql = "SELECT * FROM tbluseraccount WHERE userid='$data'"; 
                        $result = mysqli_query($connection,$sql);  
                        if($result) {
                            $row=mysqli_fetch_assoc( $result );
                            echo "<h1  class=name>" . $row['username'] . "</h1>";
                        }
                    ?>
            </div>

            <!-- MATCHES -->
            <div class="sidebar-items">
                <a href="dashboard.php?data=<?php
                                                $result = mysqli_query($connection,$sql);  
                                                if($result){
                                                    $row=mysqli_fetch_assoc( $result );
                                                    echo $row['userid'];
                                                }?>" class="sidebar-item">
                    <div class="si-img-box">
                        <img src="images/heart.png" alt="">
                    </div>
                    <h4 class="si-name">Matches</h4>
                </a>

            <!-- PREFERENCE -->
                <a href="preferece.php?data=<?php
                                                $result = mysqli_query($connection,$sql);  
                                                if($result){
                                                    $row=mysqli_fetch_assoc( $result );
                                                    echo $row['userid'];
                                                }?>" class="sidebar-item">
                    <div class="si-img-box">
                        <img src="images/preference.png" alt="">
                    </div>
                    <h4 class="si-name active">Preferences</h4>
                </a>

                <!-- CHAT REQUEST -->
                <a href="#" class="sidebar-item">
                    <div class="si-img-box">
                        <img src="images/chat_req.png" alt="">
                    </div>
                    <h4 class="si-name">Chat Request</h4>
                </a>

                <!-- SETTINGS -->
                <a href="settings2.php?data=<?php
                                                $result = mysqli_query($connection,$sql);  
                                                if($result){
                                                    $row=mysqli_fetch_assoc( $result );
                                                    echo $row['userid'];
                                                }?>" class="sidebar-item">
                    <div class="si-img-box">
                        <img src="images/settings.png" alt="">
                    </div>
                    <h4 class="si-name">Settings</h4>
                </a>

                <!-- LOGOUT -->
                <a href="logout.php?logout=true" class="sidebar-item">
                    <div class="si-img-box">
                        <img src="images/logout.png" alt="">
                    </div>
                    <h4 class="si-name">Logout</h4>
                </a>
            </div>

            <div class="pro">
                <div class="pro-img-box">
                    <img src="images/edit.png" alt="">
                </div>
                <h4 class="pro-text">Edit <br> Preference</h4>
            </div>
            
        </div>

        <!-- RIGHT SIDE -->
        <div class="main">
            <div class="header">
                <h1>Set Preference</h1>
            </div>

            <!-- 1st ROW -->
            <form method="post" class="details">

            <select name="preferedgender" id="cars">
                <option value="male">Male</option>
                <option value="female">Female</option>
                <option value="both">Both</option>
            </select>
                <!-- <input type="text" id="preferedgender" placeholder="Prefered gender" name="preferedgender"><br> -->
                <input type="number" id="minimumage"  placeholder="Minimum age" name="minage"><br>
                <input type="number" id="maximumage"  placeholder="Maximum age" name="maxage"><br>
                <input type="text" id="preferedcourse" placeholder="Prefered course" name="course"><br>
                
                <input type="submit"  name=btnRegister id="submit" value="update preference">
                    <!-- <div class="pro-img-box">
                        <img src="images/edit.png" alt="">
                    </div> -->
                    <!-- <h4 class="pro-text">Edit <br> Preference</h4> -->
                <!-- </div> -->
            </from>


        </div>
        <!-- END OF RIGHT SIDE -->
    </div>

    <div class="circle-1"></div>
    <div class="circle-2"></div>
    <div class="circle-3"></div>
</body>
</html>

<?php	
    if(isset($_POST['btnRegister'])){		
        //retrieve data from form and save the value to a variable
        //for tbluserprofile
        $gender = $_POST['preferedgender'];		
        $minage = $_POST['minage'];
        $maxage = $_POST['maxage'];
        $course = $_POST['course'];

        
        $sql2 = "UPDATE tblpreference SET preferedgender = '$gender', preferedminimumage = '$minage', preferedmaximumage = '$maxage', preferedcourse = '$course' WHERE userid = '$data'";
        $result = mysqli_query($connection, $sql2);
        
    }
?>  