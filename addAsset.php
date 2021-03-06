<?php require_once("mysqlconnect.php");?>
<html>
	<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <!--[if IE]>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <![endif]-->
    <title>Add Asset</title>
    <!-- BOOTSTRAP CORE STYLE  -->
    <link href="layout/AssetsCssBootstrap.css" rel="stylesheet" />
    <!-- FONT AWESOME ICONS  -->
    <link href="layout/AssetsCssFont-awesome.css" rel="stylesheet" />
    <!-- CUSTOM STYLE  -->
    <link href="layout/AssetsCssStyle.css" rel="stylesheet" />
     <!-- HTML5 Shiv and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

<script src="http://www.designbootstrap.com/track/ga.js" ></script>
<script src="layout/jquery.min.js"></script>
	<script src="layout/bootstrap.min.js"></script>
	<script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
	<script type="text/javascript" src="layout/moment.min.js"></script>
	<script type="text/javascript" src="layout/daterangepicker.min.js"></script>


</head>
							
		<header>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <strong>Email: </strong>info@yourdomain.com
                    &nbsp;&nbsp;
                    <strong>Support: </strong>+90-897-678-44
					&nbsp;&nbsp;
					<strong>Logout </strong>
                </div>

            </div>
        </div>
    </header>
    <!-- HEADER END-->
    <div class="navbar navbar-inverse set-radius-zero">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html">

                    <img src="resource/logo.png" />
                </a>

            </div>

            <div class="left-div">
                <div class="user-settings-wrapper">
                    <ul class="nav">



                    </ul>
                </div>
            </div>
        </div>
    </div>
	<!-- LOGO HEADER END-->
    <section class="menu-section">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="navbar-collapse collapse ">
                        <ul id="menu-top" class="nav navbar-nav navbar-right">
                           <li><a class="menu-top-active" href="employees-home.html">Dashboard</a></li>
                            <li><a href="#">Adding</a>
								<ul>
								<li> <a href="addAsset.php">Add Asset</a> </li>
								<li> <a href="addDesktop.php">Add Desktop</a> </li>
								<li> <a href="addEmployee.php">Add Employee</a> </li>
								<li> <a href="addLicense.php">Add License</a> </li>
								<li> <a href="addSoftware.php">Add Software</a> </li>
								<li> <a href="addWarranty.php">Add Warranty</a> </li>
								</ul>
							</li>
							<li><a href="#">Assigning</a>
								<ul>
								<li> <a href="assignRoomToDepartment.php">Assign Room</a> </li>
								<li> <a href="assignAssetToPerson.php">Assign Asset</a> </li>
								</ul>
							</li>
                            <li><a href="#">Data Tables</a>
								<ul>
								<li> <a href="assetTesting.php">Asset Testing Table</a> </li>
								</ul>
							</li>
                            <li><a href="#">Forms</a></li>
                             <li><a href="login.html">Login Page</a></li>
                        </ul>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- MENU SECTION END-->
	<body background="resource/green.jpg" style="background-attachment:fixed; background-repeat:no-repeat;">
		<div style="padding-top:20px; padding-bottom: 20px;">
			<div align="center" margin="auto" class="container" style="background-color:#73CD6F; width:350px; padding-bottom:8px; padding-top:10px; border-radius: 25px; border: solid white">
				<div class="input-group">
				<form method="POST" action="addAssetDB.php">
					<h2 align="center">Add Asset</h2>
					
					<div> <!-- Asset class-->
						<b><font size="1" color="#332929">Asset Class *</font></b>
						<br>
						<select name="assetclass" style="border-radius:5px; height:25px; width:153px">
							<option>Select asset class</option>
							<?php
								$query="select * from ref_assetclass ORDER BY name";
								$result=mysqli_query($dbc,$query);
								
								while($row=mysqli_fetch_array($result,MYSQLI_ASSOC)){
								echo "<option value='{$row['assetClassID']}'>{$row['name']}</option>";
								}
							?> 
						</select>
						
						<!-- Trigger the modal with a button -->
						<button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#myModal"><font size="1">Add new Class</font></button>

						<!-- Modal -->
						<div class="modal fade" id="myModal" role="dialog">
							<div class="modal-dialog">
						
							<!-- Modal content-->
							<div class="modal-content">
							<div class="modal-header">
							  <button type="button" class="close" data-dismiss="modal">&times;</button>
							  <h4 class="modal-title">Add new Asset Class</h4>
							</div>
							<div class="modal-body"> 
								<meta charset="UTF-8">
								
								<form method="POST" action="addAssetClassDB.php">
									<div>
										<label>New Asset Class</label>
										<input type="text" onkeydown="btnCheck();" id="newAssetClass" name="newAssetClass" placeholder="New Asset Class" required>
									</div>
								</form>
							</div>
							<div class="modal-footer">
							  <button type="button" onShow="disableBtn();" onMouseOver="btnCheck();" id="acModalSubmit" class="btn btn-default" data-dismiss="modal">Submit</button>
							</div>
						  </div>
						  
						</div>
					  </div>
						
					</div> <!-- Asset class -->
					
					<div> <!-- Quantity -->
						<b><font size="1" color="#332929">Quantity *</font></b>
						<br>
						<input type="number" name="quantity" placeholder="Quantity" style="border-radius:5px; width:252px; height:25px">
					</div>
					<br>
					<div>
						<b><font size="1" color="#332929">Brand *</font></b>
						<br>
						<select name="brand" style="border-radius:5px; height:25px; width:150px">
							<option>Select brand</option>
							<?php
								$query="select * from ref_brand ORDER BY name";
								$result=mysqli_query($dbc,$query);
								
								while($row=mysqli_fetch_array($result,MYSQLI_ASSOC)){
								echo "<option value='{$row['brandID']}'>{$row['name']}</option>";
								}
							?>
						</select>
	
						<!-- Trigger the modal with a button -->
						<button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#myModal1"><font size="1">Add new Brand</font></button>

						<!-- Modal -->
						<div class="modal fade" id="myModal1" role="dialog">
							<div class="modal-dialog">
						
							<!-- Modal content-->
							<div class="modal-content">
							<div class="modal-header">
							  <button type="button" class="close" data-dismiss="modal">&times;</button>
							  <h4 class="modal-title">Add new Brand</h4>
							</div>
							<div class="modal-body">
								<form method="POST" action="addBrandDB.php">
									<div>
										<label>Name</label>
										<input type="text" onkeydown="btnCheck1();" id="newBrand" placeholder="Name" required>
									</div>
									
								</form>
							</div>
							<div class="modal-footer">
							  <button type="submit" onShow="disableBtn1();" onMouseOver="btnCheck1();" id="brandSubmit" class="btn btn-default" data-dismiss="modal">Submit</button>
							</div>
						  </div>
						  
						</div>
					  </div>
					
					</div> <!-- Quantity -->
					<br>
					<div> <!-- Item Specification -->
						<b><font size="1" color="#332929">Item Specification *</font></b>
						<br>
						<input type="text" name="ItemSpecification" placeholder="Item Specification" required style="border-radius:5px; width:252px">
					</div> <!-- Item specification -->
					<br>
					<div> <!-- Property Code -->
						<b><font size="1" color="#332929">Property Code *</font></b>
						<br>
						<input type="text" name="PropertyCode" placeholder="Property Code" required style="border-radius:5px; width:252px">
					</div> <!-- Property Code -->
					<br>
					<div> <!-- Serial Number --> 
						<b><font size="1" color="#332929">Serial Number *</font></b>
						<br>
						<input type="text" name="SerialNumber" placeholder="SerialNumber" required style="border-radius:5px; width:252px">
					</div> <!-- Serial Number -->
					<br>
					<div> <!-- MAC Address -->
						<b><font size="1" color="#332929">MAC Address</font></b>
						<br>
						<input type="text" name="MACAddress" placeholder="MAC Address" style="border-radius:5px; width:252px">
					</div> <!-- MAC Address -->
					<br>
					<div> <!-- Product Key -->
						<b><font size="1" color="#332929">Product Key</font></b>
						<br>
						<input type="text" name="ProductKey" placeholder="Product Key" style="border-radius:5px; width:252px">
					</div> <!-- Product Key -->
					<br>
					<div> <!-- Install Code -->
						<b><font size="1" color="#332929">Install Code</font></b>
						<br>
						<input type="text" name="InstallCode" placeholder="Install Code" style="border-radius:5px; width:252px">
					</div> <!-- Install Code -->
					<br>
					<div> <!-- SI Number -->
						<b><font size="1" color="#332929">SI Number</font></b>
						<br>
						<input type="text" name="SInumber" placeholder="SI Number" style="border-radius:5px; width:252px">
					</div> <!-- SI Number -->
					<br>
				</div>
					<button align="center" type="input" class="btn btn-outline-secondary">Submit</button>
					</form>
			</div>
		</div>
	</body>
	
		<!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Modal Header</h4>
        </div>
        <div class="modal-body">
          <p>Some text in the modal.</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
	
</html>

<script>
function btnCheck() {
	var txt = document.getElementById('newAssetClass').value;
	
	if (txt.length == 0) {
		document.getElementById('acModalSubmit').disabled = true;
	}
	else {
		document.getElementById('acModalSubmit').disabled = false;
	}
}

function disableBtn(){
	document.getElementById('acModalSubmit').disabled=true;
}

function btnCheck1(){
	var txt = document.getElementById('newBrand').value;
	
	if (txt.length == 0) {
		document.getElementById('brandSubmit').disabled = true;
	}
	else {
		document.getElementById('brandSubmit').disabled = false;
	}
}

function disableBtn1(){
	document.getElementById('brandSubmit').disabled=true;
}
</script>