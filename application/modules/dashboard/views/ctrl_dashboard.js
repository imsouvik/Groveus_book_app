//blank line is required
app.controller('ctrl_dashboard',function($scope,$http){
	$http.get('login/check_valid_session').success (function(data) {if(data!=1){window.location.assign('<?=site_url("login")?>');}});
	
//	$http.get("dashboard/fetch_cards_data").success(function(data){
//		$scope.department_row=data['department_row'];

	
});