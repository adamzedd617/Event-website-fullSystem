<?php
    session_start();
    include '../config.php';
    include '../section/adheader.php';

    
    $update = 'update.php';
    $delete = 'delete.php';
    $logout = 'logout.php';
    if (!isset($_SESSION["crewid"]) === " ")
    {
        
        session_destroy();
        unset($_SESSION["crewid"]);
        unset($_SESSION["cusername"]);
        header("location: ../function/crewlogin-page.php");
        exit();
    }else{
    
        //call this function to check if session is exists or not
        //if session is exists
        if(isset ($_SESSION["cusername"]))
        { 
            $username=$_SESSION["cusername"]; 
            $query="SELECT * FROM participate";
            $result=mysqli_query($con,$query) or die("Cannot execute sql.");
?>






<!-- section 1 -->
  <section class="page-content">
    <section class="search-and-user">
        <?php
            $user=@$_POST['users'];
            $city=@$_POST['city'];
            $email=@$_POST['email'];
            $c= @$_POST['user'];
        ?>
      <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <div class="input-group ">
            <input type="search" name="users" id="users" placeholder="Search by Name...">  
            <input type="search" name="city" id="users" placeholder="Search by City...">
            <input type="search" name="email" id="users" placeholder="Search by Email...">    
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

    <?php
    
        if(empty($_SESSION['form_submit'])){
                
                if($user || $city || $email){
                    $sql="SELECT * FROM participate WHERE name LIKE '%$user%' AND city LIKE '%$city%' AND email LIKE '%$email%'";
                    $result = mysqli_query($con,$sql);
        
                    echo "
                        
                        <div class='p-1'>
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
                                    <th scope='col'>Study</th>
                                    <th scope='col'>Phone</th>
                                    <th scope='col'>Email</th>
                                    <th scope='col'>Address</th>
                                    <th scope='col'>City</th>
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
                                    <a class='btn btn-primary' role='button' href='update.php?id=$row[0]&user=participate'>Update</a>
                                    <a class='btn btn-dark' role='button' href='view.php?id=$row[0]&user=participate'>View</a>
                                    <a class='btn btn-danger' role='button' href='delete.php?id=$row[0]&user=participate'>Delete</a>
                                </td>";
                        echo "</tr>";
                    }
                    echo "</table>
                        </div>";
                    }
                    else{
                        echo "<div class='card card-outline-secondary p-1  border-1 '>
                                <div class=' card-body text-center table-responsive'>
                                <h2 class='h2'>table participate register</h2>
                                <div class='brand_border'>
                                    <i class='fa fa-minus' aria-hidden='true'></i> 
                                    <i class='fa fa-minus' aria-hidden='true'></i>
                                </div>
                                ";
                        echo "  <table class='table table-hover table-responsive-lg'>
                                    <thead class='card-title lead table-warning'>
                                        <tr>
                                            <th scope='col'>Id </th>
                                            <th scope='col'>Name</th>
                                            <th scope='col'>Study</th>
                                            <th scope='col'>Phone</th>
                                            <th scope='col'>Email</th>
                                            <th scope='col'>Address</th>
                                            <th scope='col'>City</th>
                                            <th scope='col'>Username</th>
                                            <th scope='col'>Action</th>
                                        </tr>
                                    </thead>
                            ";
                        
                        while($ww=mysqli_fetch_array($result,MYSQLI_NUM))
                        {
                                echo "<tbody>
                                        <tr>
                                            <td scope='row'>$ww[0]</td>
                                            <td>$ww[1]</td>
                                            <td>$ww[2]</td>
                                            <td>$ww[3]</td>
                                            <td>$ww[4]</td>
                                            <td>$ww[5]</td>
                                            <td>$ww[6]</td>
                                            <td>$ww[7]</td>
                                            <td>
                                                <a class='btn btn-primary' role='button' href='update.php?id=$ww[0]&user=participate'>Update</a>
                                                <a class='btn btn-dark' role='button' href='view.php?id=$ww[0]&user=participate'>View</a>
                                                <a class='btn btn-danger' role='button' href='delete.php?id=$ww[0]&user=participate'>Delete</a>
                                            </td>
                                        </tr>
                                    </tbody>
                                    ";
                            
                        }
                        echo "  </table>
                                </div>
                            </div>
                        </div>"; 
        
                    }
            }
            
    ?>  
        </article>
        <article>
            <div class="card p-5 border-0 ">
                <h1>Log Out<a class="anchorjs-link" href="#function_admin"><span class="anchorjs-icon"></span></a></h1>
                <p>
                    You can log out here from admin dashboard.
                    <a class="nav-link " href="logout.php">Logout <i class="fas fa-sign-out-alt" aria-hidden="true"></i></a></p>
            </div>
        </article> 
        <article>
            <div class="card p-5 border-0 table-responsive-lg">
                <h1>Add Participants<a class="anchorjs-link" href="#hello,-world!"><span class="anchorjs-icon"></span></a></h1>
                <p> 
                    Add more participants to joins our events!
                    <a class="nav-link " href="addP.php">
                        <span>Add Participate <i class="fas fa-sign-out-alt" aria-hidden="true"></i></span>
                    </a>
                </p>
                
                
            </div>
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
                <script type="text/javascript">
                    setTimeout(function () {
                    window.location.href = "../index.html";
                    }, 2000);
                </script>
        
                <?php
            }
           
    }
?>