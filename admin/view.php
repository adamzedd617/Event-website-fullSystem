<?php
session_start();
include '../config.php';

//catch select id user from URL
if(isset ($_SESSION["cusername"]))
	{	
		$id=$_GET['id'];
		$user=$_GET['user'];
		include '../section/adheader.php';
		if($id && $user === "participate"){
			$query=mysqli_query($con,"SELECT * FROM $user where userid='$id'");
			$row=mysqli_fetch_array($query,MYSQLI_NUM);

			?>
			<link rel="stylesheet" href="../assets/css/profile.css">

				<section class="page-content">
					<section class="grid">
						<article class="card  p-5 border-0 table-responsive-lg" id="table-participate " style="height:auto;">
						

							<div class="container emp-profile">
										<form method="post">
										<div class="row">
											<div class="col-md-4">
												<div class="profile-img">
													<img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS52y5aInsxSm31CvHOFHWujqUx_wWTS9iM6s7BAm21oEN_RiGoog" alt="profile_pic"/>
													
												</div>
											</div>
											<div class="col-md-6">
												<div class="profile-head">
															<h5>
																<?php echo "$row[1]"; ?>
															</h5>
															<h6>
															<?php echo "$row[2]"; ?>
															</h6>
															<p class="proile-rating">Date Registered : <span><?php echo "$row[9]"; ?></span></p>
													<ul class="nav nav-tabs" id="myTab" role="tablist">
														<li clas"nav-item">
															<a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">About</a>
														</li>
														<li class="nav-item">
															<a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Details</a>
														</li>
													</ul>
												</div>
											</div>
											<div class="col-md-2">
												<a class="btn btn-secondary" role="button"  href='<?php echo"update.php?id=$row[0]&user=$user"; ?>'>Edit Profile</a>
											</div>
											</div>
											<div class="row">
												<div class="col-md-4">
													<div class="profile-work">
														<p>WORK LINK</p>
														<a href="">Website Link</a><br/>
														<a href="">Bootsnipp Profile</a><br/>
														<a href="">Bootply Profile</a>
														<p>SKILLS</p>
														<a href="">Web Designer</a><br/>
														<a href="">Web Developer</a><br/>
														<a href="">WordPress</a><br/>
														<a href="">WooCommerce</a><br/>
														<a href="">PHP, .Net</a><br/>
													</div>
												</div>
												<div class="col-md-8">
													<div class="tab-content profile-tab" id="myTabContent">
														<div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
															<div class="row">
																<div class="col-md-6">
																	<label>User Id</label>
																</div>
																<div class="col-md-6">
																	<p><?php echo "$row[0]"; ?></p>
																</div>
															</div>
															<div class="row">
																<div class="col-md-6">
																	<label>Name</label>
																</div>
																<div class="col-md-6">
																	<p><?php echo "$row[1]"; ?></p>
																</div>
															</div>
															<div class="row">
																<div class="col-md-6">
																	<label>Email</label>
																</div>
																<div class="col-md-6">
																	<p><?php echo "$row[4]"; ?></p>
																</div>
															</div>
															<div class="row">
																<div class="col-md-6">
																	<label>Phone</label>
																</div>
																<div class="col-md-6">
																	<p><?php echo "$row[3]"; ?></p>
																</div>
															</div>
															<div class="row">
																<div class="col-md-6">
																	<label>Study In</label>
																</div>
																<div class="col-md-6">
																	<p><?php echo "$row[2]"; ?></p>
																</div>
															</div>
														</div>
														<div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
															<div class="row">
																<div class="col-md-6">
																	<label>Address</label>
																</div>
																<div class="col-md-6">
																	<p><?php echo "$row[5]"; ?></p>
																</div>
															</div>
															<div class="row">
																<div class="col-md-6">
																	<label>City</label>
																</div>
																<div class="col-md-6">
																	<p><?php echo "$row[6]"; ?></p>
																</div>
															</div>
															<div class="row">
																<div class="col-md-6">
																	<label>English Level</label>
																</div>
																<div class="col-md-6">
																	<p>Expert</p>
																</div>
															</div>
															<div class="row">
																<div class="col-md-6">
																	<label>Availability</label>
																</div>
																<div class="col-md-6">
																	<p>6 months</p>
																</div>
															</div>
												</div>
											</div>
										</div>
									</div>
								</form>           
							</div>
						</article>
					</section>
				</section>
		<?php
		}
		else{
			$query=mysqli_query($con,"SELECT * FROM $user where crewid='$id'");
			$row=mysqli_fetch_array($query,MYSQLI_NUM);


			?>

<section class="page-content">
					<section class="grid">
						<article class="card  p-5 border-0 table-responsive-lg" id="table-participate " style="height:auto;">
						

							<div class="container emp-profile">
										<form method="post">
										<div class="row">
											<div class="col-md-4">
												<div class="profile-img">
													<img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS52y5aInsxSm31CvHOFHWujqUx_wWTS9iM6s7BAm21oEN_RiGoog" alt="profile_pic"/>
													
												</div>
											</div>
											<div class="col-md-6">
												<div class="profile-head">
															<h5>
																<?php echo "$row[1]"; ?>
															</h5>
															<h6>
															<?php echo "$row[2]"; ?>
															</h6>
															<p class="proile-rating">Date Registered : <span><?php echo "$row[6]"; ?></span></p>
													<ul class="nav nav-tabs" id="myTab" role="tablist">
														<li class="nav-item">
															<a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">About</a>
														</li>
														<li class="nav-item">
															<a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Details</a>
														</li>
													</ul>
												</div>
											</div>
											<div class="col-md-2">
												<a type="submit" class="profile-edit-btn" name="btnAddMore" href='<?php echo"update.php?id=$row[0]&user=$user"; ?>'>Edit Profile</a>
											</div>
											</div>
											<div class="row">
												<div class="col-md-4">
													<div class="profile-work">
														<p>WORK LINK</p>
														<a href="">Website Link</a><br/>
														<a href="">Bootsnipp Profile</a><br/>
														<a href="">Bootply Profile</a>
														<p>SKILLS</p>
														<a href="">Web Designer</a><br/>
														<a href="">Web Developer</a><br/>
														<a href="">WordPress</a><br/>
														<a href="">WooCommerce</a><br/>
														<a href="">PHP, .Net</a><br/>
													</div>
												</div>
												<div class="col-md-8">
													<div class="tab-content profile-tab" id="myTabContent">
														<div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
															<div class="row">
																<div class="col-md-6">
																	<label>User Id</label>
																</div>
																<div class="col-md-6">
																	<p><?php echo "$row[0]"; ?></p>
																</div>
															</div>
															<div class="row">
																<div class="col-md-6">
																	<label>Name</label>
																</div>
																<div class="col-md-6">
																	<p><?php echo "$row[1]"; ?></p>
																</div>
															</div>
															<div class="row">
																<div class="col-md-6">
																	<label>Department</label>
																</div>
																<div class="col-md-6">
																	<p><?php echo "$row[2]"; ?></p>
																</div>
															</div>
														</div>
														<div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
															
															<div class="row">
																<div class="col-md-6">
																	<label>Email</label>
																</div>
																<div class="col-md-6">
																	<p><?php echo "$row[4]"; ?></p>
																</div>
															</div>
															<div class="row">
																<div class="col-md-6">
																	<label>Phone</label>
																</div>
																<div class="col-md-6">
																	<p><?php echo "$row[3]"; ?></p>
																</div>
															</div>
															<div class="row">
																<div class="col-md-6">
																	<label>Username</label>
																</div>
																<div class="col-md-6">
																	<p><?php echo "$row[5]"; ?></p>
																</div>
															</div>
															<div class="row">
																<div class="col-md-6">
																	<label>Password</label>
																</div>
																<div class="col-md-6">
																	<p><?php echo "$row[6]"; ?></p>
																</div>
															</div>
												</div>
											</div>
										</div>
									</div>
								</form>           
							</div>
						</article>
					</section>
				</section>
			<?php
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
		<script type="text/javascript">
          setTimeout(function () {
          window.location.href = "../index.html";
          }, 2000);
        </script>
	<?php
	}     

	

	?>