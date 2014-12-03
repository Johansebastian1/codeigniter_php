var app = angular.module('MyApp', []);

app.controller('searchController', function($scope, $http){

	$scope.list=[];
	
	$scope.res=[];

	$scope.onKeyPressResult = "";

	var indice = null;

	jwplayer("myElement").setup({
        file: "http://www.youtube.com/watch?v=8CjdLYBDUqw",
        height: 198,
        width: 264
    });

    var getKeyboardEventResult = function (keyEvent, keyEventDesc){
      return keyEventDesc + " (keyCode: " + (window.event ? keyEvent.keyCode : keyEvent.which) + ")";
    };


	//aqui pueden poner cualquier cosa que necesiten inicializar apenas se carga la página

	$scope.add=function(i){
		console.log("add");
		$scope.list.push(i);

		$scope.videoId = i.id.videoId;
		$scope.titulo = i.snippet.title;
		$scope.urlimagen = i.snippet.thumbnails.default.url;
		console.log($scope.videoId);
		console.log($scope.titulo);
		console.log($scope.urlimagen);

		$http({method: 'POST', url: '/codeigniter_php/video/guardar', headers: {'Content-Type': 'application/json'},
               data: { 'videoId': $scope.videoId, 'titulo': $scope.titulo, 'urlimagen' : $scope.urlimagen } })
	};

	$scope.nextVideo=function(){
		console.log("nextvideo");
		$scope.$apply(function(){
			$scope.remove(indice);
		});
		console.log("remove");
		if($scope.list.length > 0){
			$scope.showItem($scope.list[0]);
		}
	};

	$scope.onKeyPress = function ($event) {
    	$scope.onKeyPressResult = getKeyboardEventResult($event, "Key press");
    	if($event.charCode==13){
      		$scope.search();
      	}
    };

	$scope.remove=function(i){
		var codigo = i.id.videoId;
		for(i=0; i < $scope.list.length; i++){
			if(codigo==$scope.list[i].id.videoId){
				$scope.list.splice(i,1);
				$scope.nextVideo();
			}
		}
	};

	$scope.search = function() {
		$("#text").css("display","none");
		var q = $scope.inputSearch;
		var request = gapi.client.youtube.search.list({
			maxResults: 15,
			order: 'relevance',
			part: 'snippet',
			q: q,
			type: 'video',
			videoDuration : "medium"
		});

		request.execute(function(response){
			if(response.result) {
				// aqui ya procesan uds la lista de resultados de la variable response.result.items
				$scope.$apply(function(){
					$scope.res = response.result.items;
					var requestDuration = null;
					//console.log($scope.res);
					for (var i = 0; i < $scope.res.length; i++){
							requestDuration = gapi.client.youtube.videos.list({
								id: $scope.res[i].id.videoId,
 								part: 'contentDetails'
 							});
 							requestDuration.execute(function(response){
							for (var i = 0; i < $scope.res.length; i++){
								var codigo = $scope.res[i].id.videoId;
								//console.log(response);
								if(response.items[0].id==codigo){
									$scope.$apply(function(){
										var duration = response.items[0].contentDetails.duration;
	 									duration = duration.replace('PT', '').replace('M',':').replace('S','');
	 									$scope.res[i].duration = duration;	
 									});	
								}
							console.log($scope.res[i]);
							}
						});
					}
				});
			}
		});
	}	

	$scope.selection = function (){
     	var codigo = indice.id.videoId;
     	var i = 0;
     	jQuery('#'+codigo).addClass('videoSelected');
		
    };

	$scope.showItem=function(i){
		indice = i;
		var codigo = i.id.videoId;
		jwplayer("myElement").setup({
        	file: "http://www.youtube.com/watch?v="+codigo,
        	height: 198,
        	width: 264
    	}).play(true).onComplete($scope.nextVideo);
    	$scope.selection();
	};
});

function googleApiClientReady() {
    var apiKey = 'AIzaSyCfoe2MOj-uEQpg0OYvHiY9BmmsGB5_FUs';
    gapi.client.setApiKey(apiKey);
    gapi.client.load('youtube', 'v3', function() {
        isLoad = true;
		console.log('API Loaded');
    });
}