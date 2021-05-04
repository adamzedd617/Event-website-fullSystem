<?php
    session_start();
    include '../config.php';
    include '../section/header.php';

    if($con==true)
    {
    
        $cname=@$_POST["cname"];
        $department=@$_POST["department"];
        //   $phone=@$_POST["phone"];
          $cemail=@$_POST["cemail"];
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
                header("Location: crewlogin-page.php");
                exit();
            } 
            else
                {
                    $_SESSION['submit']='NULL';$print= 'hidden';
                }
            }
      

?>
<style>
a,a:active,a:focus,a:hover{text-decoration:none;outline:0}a,a:active,a:focus{color:#333;text-decoration:none;transition-timing-function:ease-in-out;-ms-transition-timing-function:ease-in-out;-moz-transition-timing-function:ease-in-out;-webkit-transition-timing-function:ease-in-out;-o-transition-timing-function:ease-in-out;transition-duration:.2s;-ms-transition-duration:.2s;-moz-transition-duration:.2s;-webkit-transition-duration:.2s;-o-transition-duration:.2s}ul{margin:0;padding:0;list-style:none}img{max-width:100%;height:auto}input,textarea{padding:15px 25px;width:100%;}input,select,textarea{border:none;vertical-align:baseline;font-size:100%;-webkit-transition:all .25s ease;transition:all .25s ease}.signup-area{position:relative;padding:60px;box-shadow:0 0 27px 3px rgba(0,0,0,.1);background-size:cover;background-position:center;z-index:2;background-color:#fff}@media only screen and (max-width:991px){.signup-area{padding:30px}}.signup-area::after{position:absolute;content:'';top:0;right:0;width:70%;height:100%;background-color:#af1400;z-index:-1;clip-path:polygon(100% 0,0 0,100% 100%)}@media only screen and (max-width:991px){.signup-area::after{display:none}}.signup-area .title{margin-bottom:25px;font-size:2.4em}.signup-area p{margin-bottom:40px}.signup-area .signup-element{position:absolute;right:0;top:0;opacity:.2}@media only screen and (max-width:1199px){.signup-area .signup-element{display:none}}.signup-left-area{width:90%}@media only screen and (max-width:991px){.signup-left-area{width:100%}}.signup-form .formmm-group{position:relative}.signup-form input{box-shadow:0 0 27px 3px rgba(0,0,0,.1);color:#777}.signup-form input::placeholder{color:#777}.signup-right-area{margin-left:60px}@media only screen and (max-width:991px){.signup-right-area{display:none}}.signup-right-area .title{color:#fff}.signup-right-area p{color:#fff}.signup-right-area-two{margin-left:0}.control a{color:#af1400}.signup-form .form-group input[type=submit]{width:auto;background-color:#af1400;margin-top:30px;position:relative;padding:0 40px;text-align:center;display:inline-block;color:#fff;font-size:16px;font-weight:500;line-height:50px;overflow:hidden;text-transform:uppercase;transition:all .5s;z-index:1}.show-pass{position:absolute;top:0;right:0;height:45px;width:90px;text-align:center;line-height:54px;color:#777}.control-two{color:#af1400}.sign-up-option{display:flex;flex-wrap:wrap;margin:-5px;margin-bottom:-5px;margin-bottom:45px;margin-top:20px}.sign-up-option li{padding:5px;display:inline}.sign-up-option li a{display:flex;align-items:center;-webkit-border-radius:4px;-moz-border-radius:4px;border-radius:4px;text-transform:uppercase;color:#fff;background:#2a7bff;font-size:14px;font-weight:600;padding:8px 20px}.sign-up-option li a i{margin-right:5px}.sign-up-option li a.google{background:#af1400}.sign-up-option li a.facebook{background:#3b5998}
</style>


<section class="signup-section section-padding">
        <div class="container pt-5 pb-5">
            <div class="row">
                <div class="col-lg-12">
                    <div class="signup-area">
                        <div class="signup-element">
                            <img src="https://i.ibb.co/bRJVsq5/contact-us-box-bg.png" alt="signup">
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="signup-left-area">
                                    <h2 class="title">Sign Up</h2>
                                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.<br/> Error rem architecto commodi aut omnis officiis.</p>
                                    <div class="sign-up-form-area">
                                        <form class="signup-form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                                            <div class="row">
                                                <div class="col-lg-12 form-group">
                                                    <input type="text" name="cname" placeholder="Your Name" >
                                                </div>
                                                <div class="col-lg-12 form-group">
                                                    <input type="department" name="department" placeholder="Your department" >
                                                </div>
                                                <div class="col-lg-12 form-group">
                                                    <input type="email" name="cemail" placeholder="Your Email" >
                                                </div>
                                                <div class="col-lg-12 form-group">
                                                    <input type="username" name="cuname" placeholder="usernames"> 
                                                    <small style="color:red;visibility:<?=$print?>">Username does not exist</small>
                                                </div>
                                                <div class="col-lg-12 form-group">
                                                    <input type="password" name="cpass" placeholder="password" >
                                                    <a href="#0" id="show-pass-one" class="show-pass"><i class="fas fa-eye"></i></a>
                                                </div>
                                                <div class="col-lg-12 form-group text-left">
                                                    <span class="control">Already registered? <a href="crewlogin-page.php"> sign in</a></span>
                                                </div>
                                                <div class="col-lg-12 form-group">
                                                    <button  class="form-control submit-btn" name="submit">Submit</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="signup-right-area">
                                    <h2 class="title">Welcome To Lorem </h2>
                                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Error rem architecto commodi aut omnis officiis. Aut est recusandae minima explicabo?</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

<?php
        
    }
    else
    {
        mysql_close($con);
    }
    

    include '../section/footer.php';
    exit;
?>