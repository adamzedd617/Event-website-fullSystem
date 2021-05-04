<?php
session_start();
include '../config.php';



if(isset ($_SESSION["cusername"]))
{ 
    include '../section/adheader.php';
    $username=$_SESSION["cusername"]; 

    ?>
    <section class="page-content">
        <section class="search-and-user">
            <?php
                $user=@$_POST['users'];
                $city=@$_POST['city'];
                $email=@$_POST['email'];
                $c= @$_POST['user'];
            ?>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <select class="input-group-text" type="select"  name="user">
                        <option value="" disabled selected hidden>User type</option>
                        <option value="participate">participate</option>
                        <option value="crew">crew</option>
                    </select> 
                </div>
                <input type="search" name="users" id="users" placeholder="Search Name...">      
            </div>
        
            <button type="submit" aria-label="submit form">
            <svg aria-hidden="true">
                <use xlink:href="#search"></use>
            </svg>
            </button>
        </form>
        <div class="admin-profile">
            <span class="greeting">Hello <a href="update.php?id=1&user=crew"><?php echo "$username"; ?></a></span>
            <div class="notifications">
            <svg>
                <use xlink:href="#users"></use>
            </svg>
            </div>
        </div>
        </section>
        <section class="grid ">
            <article class="card  text-center border-0 table-responsive-lg" id="table-participate " style="height:auto;">
                <div class='p-3 table-responsive'>
    <?php
    if(empty($_SESSION['form_submit'])){
        if(($user || $city || $email) && $c === "participate"){
            $sql="SELECT * FROM $c WHERE name LIKE '%$user%' AND city LIKE '%$city%' AND email LIKE '%$email%'";
            $result = mysqli_query($con,$sql);

            echo "
                
                <div class='p-5'>
                    <h2 class='h2'>found list of participate register</h2>
                    <div class='brand_border'>
                        <i class='fa fa-minus' aria-hidden='true'></i> 
                        <i class='fas fa-handshake'></i>
                        <i class='fa fa-minus' aria-hidden='true'></i>
                    </div>
                    <tr>
                    <table class='table table-hover '>
                    <thead class='card-title lead table-warning'>
                        <tr>
                            <th scope='col'>Id </th>
                            <th scope='col'>Name</th>
                            <th scope='col'>Phone</th>
                            <th scope='col'>Email</th>
                            <th scope='col'>Address</th>
                            <th scope='col'>City</th>
                            <th scope='col'>Postcode</th>
                            <th scope='col'>Username</th>
                            <th scope='col'>Action</th>
                        </tr>
                    </thead>

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
                echo "  <td>
                                <a class='btn btn-primary' role='button' href='update.php?id=$ww[0]&user=participate'>Update</a>
                                <a class='btn btn-dark' role='button' href='view.php?id=$ww[0]&user=participate'>View</a>
                                <a class='btn btn-danger' role='button' href='delete.php?id=$ww[0]&user=participate'>Delete</a>
                        </td>";
                echo "</tr>";
            }
            echo "</table>
                </div>";
            }
            else if($email || $c  === "crew"){
                $sql="SELECT * FROM $c WHERE cname LIKE '%$user%' AND cemail LIKE '%$email%'";
                $result = mysqli_query($con,$sql);

                echo "
                <div class='p-5 table-responsive'>
                    <h2 class='h2'>found list of Crew register</h2>
                    <div class='brand_border'>
                        <i class='fa fa-minus' aria-hidden='true'></i> 
                        <i class='fas fa-handshake'></i>
                        <i class='fa fa-minus' aria-hidden='true'></i>
                    </div>
                    <table class='table table-hover '>
                        <thead class='card-title lead table-warning'>
                            <tr>
                                <th>User ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Username</th>
                                <th>Password</th><th>Date Created</th>
                            </tr>
                        </thead>";
                while($row = mysqli_fetch_array($result,MYSQLI_NUM)) {
                    echo "<tr>";
                    echo "<td>" . $row[0] . "</td>";
                    echo "<td>" . $row[1] . "</td>";
                    echo "<td>" . $row[2] . "</td>";
                    echo "<td>" . $row[3] . "</td>";
                    echo "<td >" . $row[4] . "</td>";
                    echo "<td>" . $row[5] . "</td>";           
                    echo "</tr>";
                }
                echo "
                    <caption> List of users</caption>
                    </table>
                </div>";
            }
    else{
            echo "  
            <div class='p-5 table-responsive'>
            
                    <h2 class='h2'>table of Crew register</h2>
                    <div class='brand_border'>
                        <i class='fa fa-minus' aria-hidden='true'></i> 
                        <i class='fas fa-handshake'></i>
                        <i class='fa fa-minus' aria-hidden='true'></i>
                    </div>
                    <table class='table table-hover '>
                    <thead class='card-title lead table-warning'>
                        <tr>
                            <td>Id </td>
                            <td>Name</td>
                            <td>Department</td>
                            <td>Email</td>
                            <td>Username</td>
                            <td>Password</td>
                            <td>Create At</td>
                            <td>Botton</td>
                        </tr>
                    </thead>";
            $query="SELECT * FROM crew";
            $result=mysqli_query($con,$query) or die("Cannot execute sql.");
            while($ww=mysqli_fetch_array($result,MYSQLI_NUM))
            {
                echo "<tr>
                <td>$ww[0]</td>
                <td>$ww[1]</td>
                <td>$ww[2]</td>
                <td>$ww[3]</td>
                <td>$ww[4]</td>
                <td>$ww[5]</td>
                <td>$ww[6]</td>
                <td>
                <a class='btn btn-primary' role='button' href='update.php?id=$ww[0]&user=crew'>Update</a>
                <a class='btn btn-dark' role='button' href='view.php?id=$ww[0]&user=crew'>View</a>
                <a class='btn btn-danger' role='button' href='delete.php?id=$ww[0]&user=crew'>Delete</a>
                </td>

                </tr>
                
                ";
                
            }
        }
    }
    ?>              <caption> List of users</caption>
                    </div>
                    
                </table>
            </article>
        </section>
    </section>
    <?php
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
            ?>
            <script type="text/javascript">
            setTimeout(function () {
            window.location.href = "../index.html";
            }, 2000);
            
            </script>
        <?php
}



?>