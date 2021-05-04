<?php
    
    session_start();
    include '../config.php';
    
    
    if($con==true)
    {
      if(isset($_SESSION['cusername'])){

        include '../section/adheader.php';

        $name=@$_POST["name"];
        $study=@$_POST["study"];
        $phone=@$_POST["phone"];
        $email=@$_POST["email"];
        $address=@$_POST["address"];
        $city=@$_POST["city"];
        $password=@$_POST["password"];
        $username=@$_POST["username"];
      
        
        // $search = array($username => null, 'second' => 4);
        // $sql_result =mysqli_query($query) or delete();
        
        $query = mysqli_query($con,"SELECT * FROM participate WHERE username='$username'")or delete();
        $count = mysqli_num_rows($query);
        $print= 'hidden';
        
        if($_SERVER['REQUEST_METHOD'] == 'POST' && empty($_SESSION['form_submit']) )
          {
            
            if($count>=1){
              $print= 'visible';
            }
            else{
              $print= 'hidden';
              $insert_sql="INSERT INTO participate VALUES(null, '$name','$study','$phone','$email','$address','$city','$username','$password',null)";
              $sql_result =mysqli_query($con,$insert_sql) or delete();

              
              // session_start();
              // Store data in session variables
              // $_SESSION["cusername"]=$cuname;
              
              ?>
              <script type="text/javascript">
                window.location.href = '../function/process.php';
              </script>
              <?php
              
            }
            
    
          }  
          else
          {
              $_SESSION['submit']='NULL';$print= 'hidden';
          }
      
?>

<section class="page-content">
  <section class="grid ">
    <article class="card p-3  border-0 table-responsive-lg" id="table-participate " style="height:auto;" ">
      <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" id="form">
        <!-- form user info -->
        <div class="card card-outline-secondary">
              <div class="card-header">
                <h3 class="mb-0">Participant Information</h3>
              </div>
              <div class="card-body">
                <form autocomplete="off" class="form" role="form">
                  <div class="form-group row">
                    <label class="col-lg-3 col-form-label form-control-label">Full Name</label>
                    <div class="col-lg-9">
                        <input type="name" class="form-control" placeholder="your name" name="name" id="name" required>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-lg-3 col-form-label form-control-label">Study</label>
                    <div class="col-lg-9">
                        <input type="study" placeholder="Degree in.." class="form-control" name="study" id="study" >
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-lg-3 col-form-label form-control-label">Email</label>
                    <div class="col-lg-9">
                        <input type="email" class="form-control" name="email" placeholder="your@email.com" id="email" >
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-lg-3 col-form-label form-control-label">Phone Number</label>
                    <div class="col-lg-9">
                        <input type="tel" class="form-control" placeholder="012-3456789" name="phone" id="phone" >
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-lg-3 col-form-label form-control-label">Address</label>
                    <div class="col-lg-9">
                        <input type="address" placeholder="Address" class="form-control" name="address" id="address" >
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-lg-3 col-form-label form-control-label">City</label>
                    <div class="col-lg-9">
                        <input type="city" placeholder="City" class="form-control" name="city" id="city" >
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-lg-3 col-form-label form-control-label">Username</label>
                    <div class="col-lg-9">
                        <input type="username" placeholder="Username" class="form-control" name="username" id="username" >
                        <small style="color:red;visibility:<?=$print?>">Username has been register</small>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-lg-3 col-form-label form-control-label">Password</label>
                    <div class="col-lg-9">
                        <input type="password" placeholder="Password" class="form-control" name="password" id="password" >
						            <small class="form-text text-muted" id="passwordHelpBlock">Your password must be 8-20 characters long, contain letters and numbers, and must not contain spaces, special characters, or emoji.</small>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-lg-3 col-form-label form-control-label"></label>
                    <div class="col-lg-9 text-right">
					              <button class="btn btn-primary submit-btn" data-toggle="modal" data-target="#exampleModal">Save Changes</button>
                        <button class="btn btn-secondary" type="reset">Reset</button>
                    </div>
                  </div>
                </form>
              </div>
            </div>
      </form>
    </article>
  </section>

</section>
<?php
include '../section/adfooter.php';
  }else{
    
            echo " <link href='../assets/css/popup.css'>
            <div class='popup-msg'>
                <h2 class='pop-h2'>Oh no!</h2>
                <p class='pop-p'>No session exist or session is expired. Please <b><a href='../function/crewlogin-page.php'>log-in</a></b> back as Crew</p>
            </div>";
            
            ?>
              <script type="text/javascript">
              setTimeout(function () {
                window.location.href = "../index.html";
              }, 2000);
                
              </script>
            <?php
  }
}



?>