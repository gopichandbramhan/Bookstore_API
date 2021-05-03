<?php session_start();?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>BookStore</title>
    <meta charset="UTF-8">
    <meta name="description" content="Book Store">
    <meta name="keywords" content="HTML, CSS, JavaScript">
    <meta name="author" content="Gopichand">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/styles.css">
    <link rel="icon" href="images/logo.png" type="image" sizes="16x16">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/script.js"></script>

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <style>
        .hero-image {
  background-image:linear-gradient(rgba(0, 0, 0, -0.5), rgba(0, 0, 0, -0.5)), url("images/book2.jpg")
    </style>
</head>

<body>
	  	<?php include('php_files/db.php'); ?><!--database connection file-->
    <nav class="navbar navbar-inverse">
        <div class="container">
            <div class="navbar-header">
                <a class="navbar-brand" href="#">
                    <div class="ligoMain d-flex">
                        <img src="images/logo.png" class="img logo" alt="Logo" />
                        <p class="logoTitle m-auto ">Book<span class="themecolor">Store</span></p>
						
						<input type="hidden"  id="isLogin" value="<?php  if(isset($_SESSION['username']))echo $_SESSION['username']; else echo '0'; ?>" />
                    </div>
                </a>
            </div>
			
            <ul class="nav navbar-nav navbar-right">
			
			<li> <a><?php  if(isset($_SESSION['username']))echo 'Welcome, '.$_SESSION['username']; ?></a></li>
			
                <li class="navicon userIcon"><a href="#"><span class="glyphicon glyphicon-user"  id="login1"data-toggle="tooltip" title="log in!" ></span></a></li>
				
				
				
                <li class="navicon userIcon"><a href="#"><span class="glyphicon glyphicon-log-out"  data-toggle="tooltip" title="Logout!" id="logout" ></span></a></li>
				
				
				
					
                <li class="navicon CartIcon pos-rel"><a href="#"><span class="glyphicon glyphicon-shopping-cart"></span>
                        <p class="c-count themebg">
						<?php 
						$sql = "SELECT COUNT(*) 'total_item_in_cart' FROM `tbl_product` where is_in_cart=1";
				$res = mysqli_fetch_object(mysqli_query($con, $sql));
				$totalItemsIncart = $res->total_item_in_cart;
				echo $totalItemsIncart;
				?></p>
                    </a></li>
            </ul>
        </div>
    </nav>
    <div class="Main">
        <div class="hero-image">
            <div class="hero-text">
                <h1 style="font-size:50px">Book<span class="themecolor">Store</span></h1>
                <p>Explore you World</p>
                <button>Enter to the world of Your interest</button>
            </div>
        </div>
        <div class="container">
            <div class="productSectionMain">
                <div class="row">
                    <div class="col-md-6">
                        <h4 class="sectionTitle">Find Your Interest</h4>
                    </div>
                    <div class="col-md-6">
                        <div class="serachMain">
                            <form class="example f-right" action="/action_page.php">
                                <input type="text" placeholder="Search.." name="search2">
                                <button type="submit" class="serchbtn themebg"><i class="fa fa-search"></i></button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="productlistMain">
                    <div class="row">
					
						<?php
							/*How many records you want to show in a single page.*/
				$limit = 10;
				/*How may adjacent page links should be shown on each side of the current page link.*/
				$adjacents = 2;
				/*Get total number of records */
				$sql = "SELECT COUNT(*) 'total_rows' FROM `tbl_product`";
				$res = mysqli_fetch_object(mysqli_query($con, $sql));
				$total_rows = $res->total_rows;
				/*Get the total number of pages.*/
				$total_pages = ceil($total_rows / $limit);
				
				
				if(isset($_GET['page']) && $_GET['page'] != "") {
					$page = $_GET['page'];
					$offset = $limit * ($page-1);
				} else {
					$page = 1;
					$offset = 0;
				}
				
				
				
				
				
				$query  = "select * from `tbl_product` limit $offset, $limit";
				$result = mysqli_query($con, $query);
				if(mysqli_num_rows($result) > 0) {
					while($row = mysqli_fetch_object($result)) {
					
				

						?>
                        <div class="col-md-3 col-sm-4 col-xs-12">
                          <div  <?php if($row->is_in_cart=="0"){ echo 'class="card"';}else 
									echo 'class="card isInCart"';?>  >


                                <img src="<?php echo $row->image; ?>" alt="Product Image" class="img productimg">
                                <h3 class="productTitle"><?php echo $row->title; ?></h3>
							
							<!--<h6 class="productDescription">Price: 200 Rs</h6>-->
                                <p class="productDescription"><?php echo $row->description; ?>.</p>
								
								
                                <p class="addtocartmain" <?php if($row->is_in_cart=="0"){}else 
									echo 'style="display:none;"'?>><button class="addtocartbtn themebg" data-id="<?php echo $row->id; ?>"  data-isInCart="<?php echo $row->is_in_cart; ?>" > Add to Cart</button></p>
								
								   <p class="addtocartmain" <?php if($row->is_in_cart==1){}else 
									echo 'style="display:none;"'?>><button class="addtocartbtn themebg" data-id="<?php echo $row->id; ?>" data-isInCart="<?php echo $row->is_in_cart; ?>">Remove From Cart</button></p>
						
                            </div>
                        </div>
                  
					
					<?php
					}
				}
					//Checking if the adjacent plus current page number is less than the total page number.
				//If small then page link start showing from page 1 to upto last page.
				if($total_pages <= (1+($adjacents * 2))) {
					$start = 1;
					$end   = $total_pages;
				} else {
					if(($page - $adjacents) > 1) {				   //Checking if the current page minus adjacent is greateer than one.
						if(($page + $adjacents) < $total_pages) {  //Checking if current page plus adjacents is less than total pages.
							$start = ($page - $adjacents);         //If true, then we will substract and add adjacent from and to the current page number  
							$end   = ($page + $adjacents);         //to get the range of the page numbers which will be display in the pagination.
						} else {								   //If current page plus adjacents is greater than total pages.
							$start = ($total_pages - (1+($adjacents*2)));  //then the page range will start from total pages minus 1+($adjacents*2)
							$end   = $total_pages;						   //and the end will be the last page number that is total pages number.
						}
					} else {									   //If the current page minus adjacent is less than one.
						$start = 1;                                //then start will be start from page number 1
						$end   = (1+($adjacents * 2));             //and end will be the (1+($adjacents * 2)).
					}
				}
				//If you want to display all page links in the pagination then
				//uncomment the following two lines
				//and comment out the whole if condition just above it.
				/*$start = 1;
				$end = $total_pages;*/
				?>
				  </div>
				</div>
				<?php if($total_pages > 1) { ?>
					<ul class="pagination pagination-sm justify-content-center">
						<!-- Link of the first page -->
						<li class='page-item <?php ($page <= 1 ? print 'disabled' : '')?>'>
							<a class='page-link' href='?page=1'>&lt;&lt;</a>
						</li>
						<!-- Link of the previous page -->
						<li class='page-item <?php ($page <= 1 ? print 'disabled' : '')?>'>
							<a class='page-link' href='?page=<?php ($page>1 ? print($page-1) : print 1)?>'>&lt;</a>
						</li>
						<!-- Links of the pages with page number -->
						<?php for($i=$start; $i<=$end; $i++) { ?>
						<li class='page-item <?php ($i == $page ? print 'active' : '')?>'>
							<a class='page-link' href='?page=<?php echo $i;?>'><?php echo $i;?></a>
						</li>
						<?php } ?>
						<!-- Link of the next page -->
						<li class='page-item <?php ($page >= $total_pages ? print 'disabled' : '')?>'>
							<a class='page-link' href='?page=<?php ($page < $total_pages ? print($page+1) : print $total_pages)?>'>&gt;</a>
						</li>
						<!-- Link of the last page -->
						<li class='page-item <?php ($page >= $total_pages ? print 'disabled' : '')?>'>
							<a class='page-link' href='?page=<?php echo $total_pages;?>'>&gt;&gt;</a>
						</li>
					</ul>
				<?php } ?>
				<?php mysqli_close($con); ?>
				<!--<div class="text-center"><button class="viewmoreprobtn themebg btn">View More</button></div>-->
                </div>
            </div>
        </div>
        <div class="container">
            <button type="button" class="btn btn-info btn-lg hide modalopenbtn" data-toggle="modal" data-target="#myModal">Open Modal</button>
            <!-- Modal -->
            <div class="modal fade" id="myModal" role="dialog">
                <div class="modal-dialog">
                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Come Join Us</h4>
                        </div>
                        <div class="modal-body">
                            <form class="" action="" method="post">
                                <div class="imgcontainer">
                                    <span class="glyphicon glyphicon-user loginuser"></span>
                                </div>
                                <div class="text-center">
                                    <div class="form-group">
                                        <label for="uname"><b>Username</b></label>
                                        <input type="text" id="username" class="form-control" placeholder="Enter Username" name="uname" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="psw"><b>Password</b></label>
                                        <input type="password" id="password" class="form-control" placeholder="Enter Password" name="psw" required>
                                    </div>
                                    <div class="form-group">
                                        <button type="button" class="btn themebg" id="login">Login</button>
                                    </div>
                                    <label>
                                        <input type="checkbox" checked="checked" name="remember"> Remember me
                                    </label>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn themebg" data-dismiss="modal">Cancel</button>
                                    <span class="psw themecolor">Forgot <a href="#">password?</a></span>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <footer class="fooMain">
        <p class="footerText">
            All rights are reserved <a href="">Book<span class="themecolor">Store</span></a>
        </p>
    </footer>
</body>

</html>