<?php
session_start();
include '../config.php';


//fetch logged as admin
$id=$_GET['id'];
$user=$_GET['user'];
if(isset($_SESSION["cusername"]) )
{
  include '../section/adheader.php';
  ?>
    <section class="page-content">
      <section class="grid">
          <article>
            <div class="card p-5 border-0 table-responsive-lg">
              <h1>Update User Profile<a class="anchorjs-link" ></a></h1>
              <p>Your user profile contains the personal information that is necessary for you to use the online services.</p>
              
              <p><a class="btn btn-primary" href="#" role="button">Learn more</a></p>
              
            </div>
          </article>
          <article class="card p-5 border-0 table-responsive-lg" id="table-participate " style="height:auto;">

          
<?php
          //catch select id user from URL
  if($id && $user === "participate"){
    $query=mysqli_query($con,"SELECT * FROM $user where userid='$id'") or die("sql error");
    $row=mysqli_fetch_array($query,MYSQLI_NUM);
      ?>
      <h1 style="text-transform:capitalize;"><?php echo "$user"; ?> Profile</h1>
        <div>
            <h5>Please Fill-out All Fields</h5>
            <form method="post" action="#"  >
              <div class="form-group row">
                <label class="col-lg-3 col-form-label form-control-label">Register Dated</label>
                <div class="col-lg-9">
                  <label ><?php echo $row[9]; ?></label>
                </div>
              <div class="form-group row">
                <label class="col-lg-3 col-form-label form-control-label">Fullname</label>
                <div class="col-lg-9">
                  <input type="text" class="form-control" name="name" style="width:20em;" placeholder="Enter your Fullname" value="<?php echo $row[1]; ?>" required />
                </div>
              </div>
              <div class="form-group row">
                <label class="col-lg-3 col-form-label form-control-label">Study</label>
                <div class="col-lg-9">
                  <input type="text" class="form-control" name="study" style="width:20em;" required placeholder="Enter your Study" value="<?php echo $row[2]; ?>"></textarea>
                </div>  
              <div class="form-group row">
                <label class="col-lg-3 col-form-label form-control-label">Phone</label>
                <div class="col-lg-9">
                  <input type="text" class="form-control" name="phone" style="width:20em;" placeholder="Enter your phone" required value="<?php echo $row[3]; ?>" />
                </div>
              </div>
              <div class="form-group row">
                <label class="col-lg-3 col-form-label form-control-label">Email</label>
                <div class="col-lg-9">
                <input type="text" class="form-control" name="email" style="width:20em;" placeholder="Enter your email" value="<?php echo $row[4]; ?>">
                </div>
              </div>
              <div class="form-group row">
                <label class="col-lg-3 col-form-label form-control-label">Address</label>
                <div class="col-lg-9">
                  <input type="text" class="form-control" name="address" style="width:20em;" required placeholder="Enter your Address" value="<?php echo $row[5]; ?>"></textarea>
                </div>
              </div>
              <div class="form-group row">
                <label class="col-lg-3 col-form-label form-control-label">city</label>
                <div class="col-lg-9">
                  <input type="text" class="form-control" name="city" style="width:20em;" required placeholder="Enter your city" value="<?php echo $row[6]; ?>"></textarea>
                </div>
              </div>
              <div class="form-group row">
                    <label class="col-lg-3 col-form-label form-control-label"></label>
                    <div class="col-lg-9 text-right">
                      <button type="submit" name="submit" class="btn btn-primary"  >Update</button><br><br>
                    </div>
              </div>
            </form>
          </div>
          </html>
          <?php
          if(isset($_POST['submit'])){
            $name = $_POST['name'];
            $study = $_POST['study'];
            $phone = $_POST['phone'];
            $email = $_POST['email'];
            $address = $_POST['address'];
            $city = $_POST['city'];
            $query = "UPDATE $user 
                        SET name = '$name',study = '$study',phone = '$phone',email = '$email',  address = '$address',city = '$city'
                        WHERE userid = '$id'";
            $result = mysqli_query($con, $query) or die(mysqli_error($con));
            // session_destroy();
                        ?>
                        <script type="text/javascript">
                alert("Update Successfull.");
                window.location = "index.php";
            </script>
            <?php
                }
  }else{
    $query=mysqli_query($con,"SELECT * FROM $user where crewid=$id") or die("sql error");
    $row=mysqli_fetch_array($query,MYSQLI_NUM);
      ?>
      <h1 style="text-transform:capitalize;"><?php echo "$user"; ?> Profile</h1>
        <div class="profile-input-field">
            <h5>Please Fill-out All Fields</h5>
            <form method="post" action="#" >
                
                <div class="form-group row">
                <label class="col-lg-3 col-form-label form-control-label">Register Dated</label>
                <div class="col-lg-9">
                  <label ><?php echo $row[6]; ?></label>
                </div>
                <div class="form-group row">
                <label class="col-lg-3 col-form-label form-control-label">ID Crew</label>
                <div class="col-lg-9">
                  <input type="text" class="form-control" name="name" style="width:20em;" placeholder="Enter your Fullname" disabled value="<?php echo $row[0]; ?>" required />
                </div>
              </div>
              <div class="form-group row">
                <label class="col-lg-3 col-form-label form-control-label">Fullname</label>
                <div class="col-lg-9">
                  <input type="text" class="form-control" name="name" style="width:20em;" placeholder="Enter your Fullname" value="<?php echo $row[1]; ?>" required />
                </div>
              </div>
              <div class="form-group row">
                <label class="col-lg-3 col-form-label form-control-label">Department</label>
                <div class="col-lg-9">
                  <input type="text" class="form-control" name="department" style="width:20em;" placeholder="Enter your Department" value="<?php echo $row[2]; ?>" />
                </div>
              </div>
              <div class="form-group row">
                <label class="col-lg-3 col-form-label form-control-label">Email</label>
                <div class="col-lg-9">
                  <input type="text" class="form-control" name="email" style="width:20em;" placeholder="Enter your Email" required value="<?php echo $row['3']; ?>" />
                </div>
              </div>
              <div class="form-group row">
                <label class="col-lg-3 col-form-label form-control-label">Username</label>
                <div class="col-lg-9">
                  <input type="text" class="form-control" name="username" style="width:20em;" placeholder="Enter your Username" value="<?php echo $row[4]; ?>">
                </div>
              </div>
              <div class="form-group row">
                <label class="col-lg-3 col-form-label form-control-label">Password</label>
                <div class="col-lg-9">
                  <input type="password" class="form-control" name="password" style="width:20em;" required placeholder="Enter your Password" value="<?php echo $row[5]; ?>"></textarea>
                </div>
              </div>
              <div class="form-group row">
                    <label class="col-lg-3 col-form-label form-control-label"></label>
                    <div class="col-lg-9 text-right">
                      <button type="submit" name="submit" class="btn btn-primary"  >Update</button><br><br>
                    </div>
              </div>
            </form>
          </div>
          <?php
          if(isset($_POST['submit'])){
            $name = $_POST['name'];
            $department = $_POST['department'];
            $email = $_POST['email'];
            $username = $_POST['username'];
            $password = $_POST['password'];
            $query = "UPDATE $user 
                        SET cname = '$name',department='$department', cemail = '$email',  cusername = '$username',cpassword = '$password'
                        WHERE crewid = '$id'";
            $result = mysqli_query($con, $query) or die(mysqli_error($con));
            // session_destroy();
                        ?>
                        <script type="text/javascript">
                alert("Update Successfull.");
                window.location = "listc.php";
            </script>
            <?php
                }
  }
  if($user === "participate"){
  $query = mysqli_query($con,"SELECT * FROM participate WHERE username='$row[7]'")or delete();
  $count = mysqli_num_rows($query);
  $print= 'hidden';
?>
          </article>
          <article class="card p-5 border-0 table-responsive-lg" id="table-participate " style="height:auto;">
              <div>
              <h1 style="text-transform:capitalize;"><?php echo "$user"; ?> Account</h1>
              <div class="profile-input-field">
                  <h5>Please Fill-out All Fields</h5>
              <form method="post" action="" >
                  <div class="form-group row">
                    <label class="col-lg-3 col-form-label form-control-label">Username</label>
                    <div class="col-lg-9">
                      <input type="text" class="form-control" name="username" style="width:20em;" disabled placeholder="Enter your Username" value="<?php echo $row[7]; ?>"></textarea>
                      <small style="color:red;visibility:<?=$print?>">Username has been registered</small>
                    </div>  
                  </div>
                  <div class="form-group row">
                    <label class="col-lg-3 col-form-label form-control-label">Password</label>
                    <div class="col-lg-9">
                      <input type="text" class="form-control" name="password" style="width:20em;" required placeholder="Enter your password" value="<?php echo $row[8]; ?>"></textarea>
                    </div>  
                  </div>
                  <div class="form-group row">
                        <label class="col-lg-3 col-form-label form-control-label"></label>
                        <div class="col-lg-9 text-right">
                          <button name="update" class="btn btn-primary"  >Update</button><br><br>
                        </div>
                  </div>
                </form>
              </div>
              <?php
                if($_SERVER['REQUEST_METHOD'] == 'POST'){
                  if($count >=1){
                    $print= 'hidden';
                      $pass =$_POST['password'];
                      $query = "UPDATE $user 
                                  SET password='$pass'
                                  WHERE userid = '$id'";
                      $result = mysqli_query($con, $query) or die(mysqli_error($con));
                      // session_destroy();
                                  ?>
                                  <script type="text/javascript">
                          alert("Update Successfull.");
                          window.location = "index.php";
                      </script>
                      <?php
                  }else{
                    $print= 'visible';
                    
                  }
                }
              }  
              ?>
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

    
?>