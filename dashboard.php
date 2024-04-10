<?php 
  include 'connect.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="css/dashboard_styles.css">
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
                        echo "<img src=images/" .$row['picture']." alt=profilepic>";
                    ?>
                    <!-- <img src="images/jl.jpg" alt="profilepic"> -->
                </div>
                    <?php
                        $sql = "SELECT * FROM tbluseraccount WHERE useraccountid='$data'"; 
                        $result = mysqli_query($connection,$sql);  
                        if($result){
                            $row=mysqli_fetch_assoc( $result );
                            echo "<h3  class=name>" . $row['username'] . "</h3>";
                        }
                    ?>
            </div>

            <div class="sidebar-items">
                <a href="#" class="sidebar-item">
                    <div class="si-img-box">
                        <img src="images/heart.png" alt="">
                    </div>
                    <h4 class="si-name active">Matches</h4>
                </a>

                <a href="#" class="sidebar-item">
                    <div class="si-img-box">
                        <img src="images/preference.png" alt="">
                    </div>
                    <h4 class="si-name">Preferences</h4>
                </a>

                <a href="#" class="sidebar-item">
                    <div class="si-img-box">
                        <img src="images/chat_req.png" alt="">
                    </div>
                    <h4 class="si-name">Chat Request</h4>
                </a>

                <a href="settings.php?data=<?php
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

                <a href="#" class="sidebar-item">
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


        <div class="main">
            <div class="header">
                <h1>Date</h1>
                <div class="searchdiv">
                <form class="search-bar" method="post">
                    <input type="text" placeholder="Search..." name="txtSearch">
                    
                    <button name="btnSearch">Search</button>
                </form>
                
               
                    <table class="table">
                        <?php
                        if(isset($_POST['btnSearch'])){
                            $search=$_POST['txtSearch'];
                            // $sql="Select * from 'useraccount' where acctid= '$search' or username= '$search'";
                            $sql="SELECT * FROM tbluseraccount WHERE useraccountid = '$search' OR username = '$search'";

                            $result=mysqli_query($connection,$sql);
                            if($result){
                            if(mysqli_num_rows($result) >0){
                                while($row=mysqli_fetch_assoc($result)) {
                                    echo '<tbody>
                                    <tr>
                                    <td><a href="profile.php?data='.$row['useraccountid'].'">'.$row['username'].'</a></td>
                                    <td>'.$row['useraccountid'].'</td>
                                    </tr>
                                    </tbody>';
                                }
                            } }else{
                                echo  "No Record Found!";
                            }
                        }?>
                
              
                    </table>
                </div>

                <div class="profile">
                    <!-- TODO: BUTNGI PROFILE -->
                </div>
            </div>
            
        </div>
    </div>

    <div class="circle-1"></div>
    <div class="circle-2"></div>
    <div class="circle-3"></div>
</body>
</html>