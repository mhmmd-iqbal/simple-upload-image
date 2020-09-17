<html>
	<head>
	    <meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta content="" name="keywords">
		<meta content="" name="description">
		<title>View</title>
		<link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/css/bootstrap.css">
		<!-- Font Awesome -->
		<link rel="stylesheet" href="<?=base_url()?>assets/font-awesome/css/font-awesome.min.css">
		<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.css">
	    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.6.1/css/buttons.dataTables.min.css">
		<!-- Ionicons -->
		<style type="text/css">
			.container{
				margin-top: 20px;
			}
		</style>
		<style type="text/css">
			#imgView{  
		    padding:5px;
		}
		.loadAnimate{
		    animation:setAnimate ease 2.5s infinite;
		}
		@keyframes setAnimate{
		    0%  {color: #000;}     
		    50% {color: transparent;}
		    99% {color: transparent;}
		    100%{color: #000;}
		}
		.custom-file-label{
		    cursor:pointer;
		}
		</style>
		<style type="text/css">
	        .form-control{
	          color: black
	        }
	       .gambar
	        {
	          max-width: 500px;
	          /*width: 400px;*/
	          height: auto;
	          float: none;
	          margin-right: auto;
	          margin-left: auto;
	          margin-bottom: none;
	        }
	        .gambar img
	        {
	          object-fit: cover;
	          width: 100%;
	        }
	        .gambar2
	        {
	          max-width: 700px;
	          /*width: 800px;*/
	          height: auto;
	          float: none;
	          margin-right: auto;
	          margin-left: auto;
	          margin-bottom: none;
	          border: 1px solid black;
	        }
	        .gambar2 img
	        {
	          object-fit: cover;
	          width: 100%;
	        }
	        /*.btn-primary{
	          background-color: #428bca;
	        }*/
	        table{
	          font-size: 13px
	        }
	    </style>
		<script type="text/javascript" src="<?=base_url()?>assets/jquery.js"></script>
		<script type="text/javascript" src="<?=base_url()?>assets/js/bootstrap.js"></script>
		<script type="text/javascript" src="<?=base_url()?>assets/sweetalert/sweetalert.min.js"></script>
		<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.js"></script>
	    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/1.6.1/js/dataTables.buttons.min.js"></script>
	    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.flash.min.js"></script>
	    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.html5.min.js"></script>
	    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.print.min.js"></script>
	    
		<script src="https://cdnjs.cloudflare.com/ajax/libs/clipboard.js/2.0.4/clipboard.min.js"></script>
		
	  	<script type="text/javascript">
	      	function notif(title, text, icon) {
	        	swal({ 
		          	title: title,
		          	text: text,
		          	icon: icon,
		          	buttons: false,
		          	timer: 1500,
	        	});
	      	}
	      	function loading(){
	        	swal({
	           		title: "Memeriksa...",
	            	text: "Sedang diproses. Harap menunggu...",
	            	icon: "<?=base_url()?>assets/logo/loader.gif",
	            	button: false,
	         	});
	      	}
	    </script>
		
	    
	</head>
	<body class="">
		<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
		  <a class="navbar-brand" href="#">
		    <img src="<?=base_url()?>assets/logo/download.png" height="30" class="d-inline-block align-top" alt="">
		   <!--  MY MARKET -->
		  </a>
		  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
		    <span class="navbar-toggler-icon"></span>
		  </button>

		  <div class="collapse navbar-collapse" id="navbarSupportedContent">
		    <ul class="navbar-nav mr-auto">
		      <li class="nav-item active">
		        <a class="nav-link" href="<?=site_url()?>Welcome">Dashboard <span class="sr-only">(current)</span></a>
		      </li>
		      <li class="nav-item ">
		        <a class="nav-link" href="<?=site_url()?>Welcome/logout">Logout </span></a>
		      </li>
		    </ul>
		  </div>
		</nav>
		<!-- view in here --- -->
		<?php $this->load->view($page) ?>
		<!-- end view -->
	</body>
</html>
<script type="text/javascript" src="<?=site_url()?>action/<?=$aksi?>"></script>
