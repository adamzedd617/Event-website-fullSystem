<?php
session_start();
include '../config.php';

if(isset ($_SESSION["cusername"]))
        {
            ?>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                <input class="form-control" name="users" type="text" id="users" placeholder="Name">
                <input class="form-control" name="city" type="text" placeholder="City">
                <input class="form-control" name="email" type="text" placeholder="Email">
                <select class="form-control" name="user" placeholder="User Type">
                    <option value="participate">participate</option>
                    <option value="crew">crew</option>
                </select>
                <input class="form-control" type="submit" value='Go!'>
            </form>
            <br>
            <div id="txtHint"><b>Person info will be listed here.</b></div>
            
            <?php

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $user=@$_POST['users'];
        $city=@$_POST['city'];
        $email=@$_POST['email'];
        $c= @$_POST['user'];

        if(($user || $city || $email) && $c === "participate"){
            $sql="SELECT * FROM $c WHERE name LIKE '%$user%' AND city LIKE '%$city%' AND email LIKE '%$email%'";
            $result = mysqli_query($con,$sql);

            echo "<table>
                    <tr>
                    <th>User ID</th>
                    <th>Name</th>
                    <th>Study</th>
                    <th>Phone</th>
                    <th>Email</th>
                    <th>Address</th>
                    <th>City</th><th>Username</th>
                    </tr>";
            while($row = mysqli_fetch_array($result,MYSQLI_NUM)) {
                echo "<tr>";
                echo "<td>" . $row[0] . "</td>";
                echo "<td>" . $row[1] . "</td>";
                echo "<td>" . $row[2] . "</td>";
                echo "<td>" . $row[3] . "</td>";
                echo "<td>" . $row[4] . "</td>";
                echo "<td>" . $row[5] . "</td>";
                echo "<td>" . $row[6] . "</td>";
                echo "<td>" . $row[7] . "</td>";
                echo "</tr>";
            }
            echo "</table>";
            }
            else if($email || $c  === "crew"){
                $sql="SELECT * FROM $c WHERE cname LIKE '%$user%' AND cemail LIKE '%$email%'";
                $result = mysqli_query($con,$sql);

                echo "<table>
                        <tr>
                            <th>User ID</th>
                            <th>Name</th><th>Department</th>
                            <th>Email</th>
                            <th>Username</th>
                            <th>Password</th><th>Date</th>
                        </tr>";
                while($row = mysqli_fetch_array($result,MYSQLI_NUM)) {
                    echo "<tr>";
                    echo "<td>" . $row[0] . "</td>";
                    
                    echo "<td>" . $row[2] . "</td>";
                    echo "<td>" . $row[3] . "</td>";
                    echo "<td>" . $row[4] . "</td>";
                    echo "<td>" . $row[5] . "</td>";  
                    echo "<td>" . $row[6] . "</td>";         
                    echo "</tr>";
                }
                echo "</table>";
            }
            else{
                echo "please enter details";
                }
        }
        include '../section/adfooter.php';
    } 
    else
        {
        ?>
            <link rel="stylesheet" href="../assets/css/popup.css">
            <div class="popup-msg">
                <h2 class="pop-h2">Oh no!</h2>
                <p class="pop-p">No session exist or session is expired. Please <b><a href="../function/crewlogin-page.php">log-in</a></b> back as Crew</p>
                
            </div>
        <?php
        refresh();
        }     

        


?>




