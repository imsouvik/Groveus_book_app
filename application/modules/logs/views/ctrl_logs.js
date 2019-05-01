//blank line is required
app.controller('ctrl_logs',function($scope,$http){
	$http.get('login/check_valid_session').success (function(data) {if(data!=1){window.location.assign('<?=site_url("login")?>');}});
	
	$http.get("logs/view_data?data=auto_id,user,date,time,timestamp,data_title").success(function(data){
		$scope.datadb=data;
	})
	$scope.fetch_log=function(id){
		 console.log(id);
	 	$(".modal-body").html('');
	 	$("#modalbtn").trigger('click');
	 	$("#myModalLabel").html("Log Details");
	 	$.get("logs/get_object?id="+id, function(data, status){
	 		$(".modal-body").html(data);
	     });
	 }
	

});