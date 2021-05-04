<?php
session_start();
include '../config.php';

 if(isset ($_SESSION["cusername"]))
 { 
    include '../section/adheader.php';
    $cname=@$_POST["cname"];
        //   $phone=@$_POST["phone"];
          $cemail=@$_POST["cemail"];
          $department=@$_POST["department"];
          $cuname=@$_POST["cuname"];
          $cpass=@$_POST["cpass"];
    
          
    
          $query = mysqli_query($con,"SELECT * FROM crew WHERE cusername='$cuname'")or delete();
          $count = mysqli_num_rows($query);
          $print= 'hidden';
          if(isset($count ) == 0){
            $print= 'visible';
            }
        else{
            if($_SERVER['REQUEST_METHOD'] == 'POST' && empty($_SESSION['form_submit'])  )
            { 
                $print= 'hidden';
                $_SESSION['submit']='true'; 
                $crew_sql="INSERT INTO crew VALUES(null, '$cname','$department','$cemail','$cuname','$cpass',null)";
                mysqli_query($con,$crew_sql) ;
    
    
                // Store data in session variables
                $_SESSION["cusername"]= $cuname;
                //go to admin.php page
                ?>
                        <script type="text/javascript">
                            alert("New crew Successfull.");
                            window.location = "../function/crewlogin-page.php";
                        </script>
                <?php
            } 
            else
                {
                    $_SESSION['submit']='NULL';$print= 'hidden';
                }
            }



?>
<section class="page-content">
  <section class="grid ">
    <article class="card p-3 border-0 table-responsive-lg" id="table-participate " style="height:auto;" ">
        <!-- form user info -->
        <div class="card card-outline-secondary ">
            <div class="card-header">
            <h3 class="mb-0">Crew Information</h3>
            </div>
            <div class="card-body">
                <form class="signup-form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                    <div class="form-group row">
                    <label class="col-lg-3 col-form-label form-control-label">Full Name</label>
                    <div class="col-lg-9">
                        <input type="text" class="form-control" name="cname" placeholder="Your Name" >
                    </div>
                    </div>
                    <div class="form-group row">
                    <label class="col-lg-3 col-form-label form-control-label">Department</label>
                    <div class="col-lg-9">
                        <input type="department" class="form-control" name="department" placeholder="Developer" id="department" >
                    </div>
                    </div>
                    <div class="form-group row">
                    <label class="col-lg-3 col-form-label form-control-label">Email</label>
                    <div class="col-lg-9">
                        <input type="email" class="form-control" name="cemail" placeholder="your@email.com" id="email" >
                    </div>
                    </div>
                    <div class="form-group row">
                    <label class="col-lg-3 col-form-label form-control-label">Username</label>
                    <div class="col-lg-9">
                        <input type="username" class="form-control" name="cuname" placeholder="usernames"> 
                        <small style="color:red;visibility:<?=$print?>">Username has register</small>
                    </div>
                    </div>
                    <div class="form-group row">
                    <label class="col-lg-3 col-form-label form-control-label">Password</label>
                    <div class="col-lg-9">
                        <input type="password" class="form-control" name="cpass" placeholder="password" >
                        <a href="#0" id="show-pass-one" class="show-pass"><i class="fas fa-eye"></i></a>
                        <small class="form-text text-muted" id="passwordHelpBlock">Your password must be 8-20 characters long, contain letters and numbers, and must not contain spaces, special characters, or emoji.</small>
                    </div>
                    </div>
                    <div class="form-group row">
                    <label class="col-lg-3 col-form-label form-control-label"></label>
                    <div class="col-lg-9 text-right">
                        <button  class="btn btn-primary submit-btn" name="submit">Add</button>
                        <input class="btn btn-secondary" type="reset" value="Reset"> 
                    </div>
                    </div>
                </form>
            </div>
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