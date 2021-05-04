<?php
    session_start();
    include '../config.php';
    include '../section/header.php';
     

    if($con==true)
    {
    
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

          session_start();
          // Store data in session variables
          $_SESSION["cusername"]= $cuname;
          $_SESSION["cname"]= $cname;
          //go to admin.php page
          header("location: process.php");
          exit();
        }
        
      }  
      else
      {
          $_SESSION['submit']='NULL';$print= 'hidden';
      }
      
      
      
?>


    <section class="participate section-padding" id="participate" >
      <div class="container py-5">
        <div class="row">
          
          <div class="col-lg-5 mr-lg-5 col-12">
            <div class="google-map w-100">
            <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15937.806380730071!2d101.7323237!3d2.972107!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xf3a7c27fdaf295!2sMasjid%20UNITEN!5e0!3m2!1sen!2smy!4v1619603719980!5m2!1sen!2smy" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
            </div>

            <div class="contact-info d-flex justify-content-between align-items-center py-4 px-lg-5">
                <div class="contact-info-item">
                  <h3 class="mb-3 text-white">Contact Us</h3>
                  <p class="footer-text mb-0">010 020 0960</p>
                  <p><a href="mailto:hello@fitz.co">hello@fitz.co</a></p>
                </div>

                <ul class="social-links">
                     <li><a href="#" class="uil uil-dribbble" data-toggle="tooltip" data-placement="left" title="Dribbble"></a></li>
                     <li><a href="#" class="uil uil-instagram" data-toggle="tooltip" data-placement="left" title="Instagram"></a></li>
                     <li><a href="#" class="uil uil-youtube" data-toggle="tooltip" data-placement="left" title="Youtube"></a></li>
                </ul>
            </div>
          </div>

          <div class="col-lg-6 col-12">
            <div class="contact-form">
              <h2 class="mb-5">Come and join us for our charity fun run at uniten!</h2>

              <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" id="form">
                <div class="row">
                  <div class="col-12">
                    <input type="name" class="form-control" placeholder="your name" name="name" id="name" required>
                  </div>

                  <div class="col-lg-6 col-12">
                    <input type="study" placeholder="Study in" class="form-control" name="study" id="study" required>
                  </div>

                  <div class="col-lg-6 col-12">
                    <input type="tel" class="form-control" placeholder="Phone Number" name="phone"  id="phone" required> 
                  </div>

                  <div class=" col-12">
                    
                    <input type="email" class="form-control" name="email" placeholder="your@email.com" id="email" required>
                  </div>

                  <div class="col-12 col-lg-6">
                    <input type="address" placeholder="Address" class="form-control" name="address" id="address" required>
                  </div>

                  <div class="col-lg-6 col-12">
                    <input type="city" placeholder="City" class="form-control" name="city" id="city" required>
                  </div>

                  <div class="col-lg-6 col-12">
                    <input type="username" placeholder="Username" class="form-control" name="username" id="username" required>
                    <small style="color:red;visibility:<?=$print?>">Username has been created</small>
                  </div>

                  <div class="col-lg-6 col-12">
                    <input type="password" placeholder="Password" class="form-control" name="password" id="password" required>
                  </div>
                  <div class="col-lg-12 form-group text-left">
                    <span class="control">Already registered? <a href="crewlogin-page.php"> Sign In</a></span>
                  </div>

                  <div class="ml-lg-auto col-lg-5 col-12">
                    <button  class="form-control submit-btn">Submit</button>
                  </div>
                </div>
              </form>
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
?>