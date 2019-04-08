<html>
<head>
	<meta name="viewpoint" content="width=device-width,initial-scale=1">
	<style type="text/css">
	.myslides{
	display: none;
	background: estate;
	}
	</style>
<title>home</title>
	</head>
<body>	
	<div class="w3-content w3-section" style="max_width:500px">
	<div class="text"> 
	<div class="navMenu">
	<ul>
	<li><a href="login.php">LOGIN</a></li>
	</ul>
	<ul>
	<li><a href="buyerterms.php">SIGNUP</a></li>
	</ul>
	<p><h2><br><br>Are you a developer or tenant looking for house or piece of land to buy or lease? For affordable, realiable and legal deals, sign up to buy, sell or lease your property with us </h2></p>
	</div>
	 </div> 
	  <img class="myslides" src="images\3.jpg" style="width:100%" height="100%"> 
      <img class="myslides" src="images\8.jpg" style="width:100%" height="100%">
      <img class="myslides" src="images\4.jpg" style="width:100%" height="100%">
      <img class="myslides" src="images\10.jpg" style="width:100%" height="100%"> 
      <img class="myslides" src="images\11.jpg" style="width:100%" height="100%"> 
      <img class="myslides" src="images\13.jpg" style="width:100%" height="100%"> 
      <img class="myslides" src="images\9.jpg" style="width:100%" height="100%"> 
      <img class="myslides" src="images\12.jpg" style="width:100%" height="100%"> 
 	<style type="text/css">
 		.text{
 		color: black;
 		font-size: 20px;
 		position: absolute;
 		text-align: center;
 		}
 		.navMenu ul {
		margin: 0;
		padding: 0;
		list-style-type: none;
		}
		.navMenu ul li{
		float: right;
		width: 100px;
		height: 50px;
		background-color: #17a2b8;
		opacity: .8;
		line-height: 40px;
		text-align: center;
		font-size: 20px;
		margin-right: 12px;
		}
		.navMenu ul li a{
		text-decoration:none;
		display: block;
		color: white; 
		}
		.navMenu ul li a:hover{
		background-color:green;
		}
		.footer{
			
			color: #17a2b8;
		}
	</style>
</html>
<script >
		var myIndex=0;
		estate();
		function estate(){
		var i;
		var x=document.getElementsByClassName("myslides");
	for(i=0;i<x.length;i++){

	x[i].style.display="none";
}
		myIndex++;
		if(myIndex>x.length){myIndex=1}
	x[myIndex-1].style.display="block";
	setTimeout(estate,4000);//change image every 4seconds
}
</script>
	<a href="index.php">Back</a>
</body>
<footer class="footer">
	<label><h3>Follow us:<h3></label><a href="https://web.whatsapp.com"><img src="images\whatsapp.png" height="20px"> </a> 
	<a href="https://www.fb.com"><img src="images\fb.png" height="20px"></a> 
	<a href="https://www.twitter.com"><img src="images\twitter.png" height="20px"></a>
</footer>
</html>