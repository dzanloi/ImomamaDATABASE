<?php 
  include 'connect.php';
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

    <?php
        $data=$_GET['data'];
    ?>

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
                        $sql = "SELECT * FROM tbluseraccount WHERE useraccountid='$data'"; 
                        $result = mysqli_query($connection,$sql);  
                        if($result){
                            $row=mysqli_fetch_assoc( $result );
                            echo "<h1  class=name>" . $row['username'] . "</h1>";
                        }
                    ?>
            </div>

            <div class="sidebar-items">
                <a href="dashboard.php?data=<?php
                                $result = mysqli_query($connection,$sql);  
                                if($result){
                                    $row=mysqli_fetch_assoc( $result );
                                    echo $row['useraccountid'];
                                }?>" class="sidebar-item">
                    <div class="si-img-box">
                        <img src="images/heart.png" alt="">
                    </div>
                    <h4 class="si-name">Matches</h4>
                </a>

                <a href="preference.php?data=<?php
                                $result = mysqli_query($connection,$sql);  
                                if($result){
                                    $row=mysqli_fetch_assoc( $result );
                                    echo $row['useraccountid'];
                                }?>" class="sidebar-item">
                    <div class="si-img-box">
                        <img src="images/preference.png" alt="">
                    </div>
                    <h4 class="si-name active">Preferences</h4>
                </a>

                <a href="#" class="sidebar-item">
                    <div class="si-img-box">
                        <img src="images/chat_req.png" alt="">
                    </div>
                    <h4 class="si-name">Chat Request</h4>
                </a>

                <a href="settings2.php?data=<?php
                                $result = mysqli_query($connection,$sql);  
                                if($result){
                                    $row=mysqli_fetch_assoc( $result );
                                    echo $row['useraccountid'];
                                }?>" class="sidebar-item">
                    <div class="si-img-box">
                        <img src="images/settings.png" alt="">
                    </div>
                    <h4 class="si-name">Settings</h4>
                </a>

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
            <div class="details">
                <input type="text" id="firstname" placeholder="Prefered gender" name="txtfirstname"><br>
                <input type="text" id="minimumage"  placeholder="Minimum age" name="txtlastname"><br>
                <input type="text" id="maximumage"  placeholder="Maximum age" name="txtlastname"><br>
                <input type="text" id="preferedgender" placeholder="Prefered gender" name="txtfirstname"><br>
                <input type="text" id="preferedcourse" placeholder="Prefered course" name="txtfirstname"><br>
                
                <div class="pro" name=btnRegister id="submit" value="Edit preference">
                    <div class="pro-img-box">
                        <img src="images/edit.png" alt="">
                    </div>
                    <h4 class="pro-text">Edit <br> Preference</h4>
                </div>
            </div>

        </div>
        <!-- END OF RIGHT SIDE -->
    </div>

    <div class="circle-1"></div>
    <div class="circle-2"></div>
    <div class="circle-3"></div>
</body>
</html>