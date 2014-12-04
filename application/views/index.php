<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/styless.css" rel="stylesheet">
	<link href="css/perfect-scrollbar.css" rel="stylesheet">
	<title>On Line Video Player</title>
</head>
<body ng-app="MyApp" class="main">
	<div ng-controller="searchController">
		<header>	
			<div class="row">
				<nav class="col-xs-12 col-sm-12 col-md-12 col-lg-12 navbar navbar-default color" role="navigation">
					<div class="container-fluid container-first">	
	    				<div class="col-lg-4 navbar-header">
		     	 			<button class="navbar-toggle collapsed button-navbar" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" type="button">
			        			<span class="sr-only">Toggle navigation</span>
			        			<span class="icon-bar"></span>
								<span class="icon-bar"></span>
			       	 			<span class="icon-bar"></span>
	     		 			</button>
	     					<div class="logo-d">
	     		 				<img class ="logo"src="img/logo.fw.png" alt="">
					 			<h3 class="musictwo">Musictwo</h3>
	     		 			</div>	 
   					 	</div>
				 		<div class="collapse navbar-collapse social-links" id="bs-example-navbar-collapse-1">
							<ul class="nav navbar-nav links col-lg-4">
								<li class="dropdown">
									<button class="dropdown-toggle button-home" data-toggle="dropdown" type="button" ng-click="cokie()">
										<img class="link-home" src="img/home.png" alt="">
									</button>
								</li>
								<li class="dropdown">
									<button class="dropdown-toggle button-home" data-toggle="dropdown" type="button">
										<img class="link-home" src="img/reloj.fw.png" alt="">
									</button>
								</li>
								<li class="dropdown">
									<button class="dropdown-toggle button-home" data-toggle="dropdown" type="button">
										<img class="link-home" src="img/etiqueta.png" alt="">
									</button>	
								</li>
								<li class="dropdown">
									<button class="dropdown-toggle button-home" data-toggle="dropdown" type="button">
										<img class="link-home" src="img/document.fw.png" alt="">
									</button>		
								</li>	
							</ul>
							<form class="navbar-form navbar-left" role="search">
								<div class="search">
									<div class="form-group">
					         			<input id="query" class="search-bar" ng-model="inputSearch" ng-keypress="onKeyPress($event)" type="text" placeholder="Search">
					         				<a id="search-button" ng-click="search()" href="#" class="button">
												<img src="img/lupa.fw.png" alt="submit">
											</a>
					        		</div>
								</div>
							</form>
					 		<div class="form-group navbar-right ">
								<a href=""><img class="avatar" src="img/avatar.jpg" alt=""></a>
							</div>
						</div>
					</div>
				</nav>
			</div>
		</header>
		<section>	
		    <div class="col-xs-12 col-md-3 col-lg-3 div-playlist">
				<div id="myElement"></div>
				<div class="col-xs-12 content-list">
					<div id="description2">
						<div class="content-playlist">
							<div class="div-img-list" ng-repeat="i in list">
								<div id="{{i.id.videoId}}" class="selection">
									<div>
										<button class="glyphicon glyphicon-play-circle btn btn-default btn-l button-play" ng-click="showItem(i)">
										</button>
										<button class="glyphicon glyphicon-remove-circle btn btn-default btn-l  button-remove" ng-click="remove(i)">
										</button>
										<img class="img-list" src="{{i.snippet.thumbnails.default.url}}" alt="">
									</div>
									<div class="div-list-name-video">
										<h6 class="name-video">{{i.snippet.title}}</h6>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>	
			</div>
			<div class="col-xs-12 col-sm-9 col-md-9 col-lg-9 container-second">
				<div class="row">
					<h2 class="discover">Discover Tracks</h2>
				</div>
				<div id="text" class="col-xs-12">
					<h1>Welcome to your musictwo video player!</h1>
					<h2>Enters the search field the name of the video you want to see.</h2>
				</div>	
				<div id="description">
					<div class="row">
						<div id="search-container-{{$index}}" class="col-xs-9 col-sm-2 col-md-3 col-lg-3 container-imgvideo" ng-repeat="i in res">
							<div>
								<button class="glyphicon glyphicon-ok-sign btn btn-default btn-l button-add" ng-click="add(i)">
								</button>
								<img class="img-search" src="{{i.snippet.thumbnails.default.url}}" alt="">
							</div>
							<div class="div-search-name-video">
								<h4 class="name-video">{{i.snippet.title}}</h4>
								<h6>{{i.duration}}</h6>
							</div>
						</div>	
			  		</div>	
				</div>
			</div>	
		</section>
		<footer>
		</footer>
	</div>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script> 
	<script src="js/angular.min.js"></script>
	<script src="jwplayer/jwplayer.js"></script>
    <script>jwplayer.key="pwfe/Co2VoPL4fCv6vkOS/OqCoSfHYljuLezRQ==";</script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/angular.js/1.2.20/angular.min.js"></script>
    <script src="js/search.js"></script>
    <script src="https://apis.google.com/js/client.js?onload=googleApiClientReady"></script>
    <script src="js/perfect-scrollbar.js"></script>
    <script type="text/javascript">
    $(document).ready(function ($) {
    	$('#description').perfectScrollbar();
        $('#description2').perfectScrollbar();
     });
    </script>
</body>
</html>