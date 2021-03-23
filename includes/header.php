<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<div class="agile-banner">
		
			<nav class="navbar w3-navbar">
				
					<div class="container-fluid">
						<div class="nav-top">
							<div class="w3-contact">
								<a> <span class="fa fa-volume-control-phone" aria-hidden="true"> </span>+1 234 567 8910</a>
								<a href="mailto:abcd@yoursite.com"><span class="fa fa-envelope-o" aria-hidden="true" ></span>service@receipe.com</a>
							</div>
							<div class="w3-socials">
										<a href="#"><span class="fa fa-facebook"></span></a>
										<a href="#"><span class="fa fa-vk"></span></a>
										<a href="#"><span class="fa fa-pinterest-p"></span></a>
										<a href="#"><span class="fa fa-twitter"></span></a>
							</div>
						</div>
						
						<div class="row">

							<div class="navbar-header">
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							  </button>

							  <!-- Logo -->
							  <div class="logo-container">
								  <a href="main.php" class="scroll">	Receipe</a>
							  </div>
							</div> <!-- end navbar-header -->


							<div class="nav-wrap">
								<div class="collapse text-center navbar-collapse w3ls-nav navbar-collapse">

									<ul class="nav navbar-nav w3ls-nav1 text-center">
                    <li>
											<a href="main.php" class="scroll">Home</a>
										</li>
										<li>
											<a href="chooseR.php" class="scroll">Start to Creating</a>
										</li>
										<li>
											<a href="myR.php" class="scroll">View my Recipes</a>
										</li>
										<li>
											<a href="account" class="scroll">My account</a>
										</li>
       <?php
        if(!isset($_SESSION['login']))
        {
          echo'<li><a href="login.php">login</a></li>';
        }
        else
        {
          echo'<li><a href="logout.php">logout</a></li>';
        }
        ?>
									</ul>
								</div>
							</div> <!-- end col -->
						</div> <!-- end row -->
					</div> <!-- end container -->
				
			</nav> <!-- end navbar -->
  