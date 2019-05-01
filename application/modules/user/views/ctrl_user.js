//blank line is required
app.controller('ctrl_user',function($scope,$http){
	$http.get('login/check_valid_session').success (function(data) {if(data!=1){window.location.assign('<?=site_url("login")?>');}});
	
	$scope.loader=function(){
		$http.get("user/view_data").success(function(data){
			$scope.users=data;
		})
	}
	$scope.loader();
	
	$scope.update_call=function(y){
		$scope.x=y;
	}
	
	
	$scope.filter_new=function(){
		$scope.x={};
	}
	$scope.document_details=function(s){
		$scope.user=s.name;
		$http.get("doc_manager/view_data?user_id="+s.user_id).success(function(data){
			if(data.length>0)
				$scope.documents=data;
			else $scope.documents='';
		})
	}
	
	$scope.orders=function(s){
		$scope.user=s.name;
		$http.get("order/view_data?user_id="+s.user_id).success(function(data){
			if(data.length>0)
				$scope.datadb=data;
			else $scope.datadb='';
		})
	}
	
	$scope.save_data=function(y){
		$('#submitbtn').attr('disabled',true);
		$.ajax({
			type: "POST",
			url: "user/save_data",
			data: $("#form1").serialize(),
			beforeSend: function()
			{
				$('#webprogress').css('display','inline');
			},
			success: function(data){
				console.log(data);
				if(data=="1")
				{
					$scope.x={};
					messages("success", "Success!","Menu Saved Successfully", 3000);
					$scope.loader();
					
				}
				else if(data=="0")
				{
					messages("warning", "Info!","No Data Affected", .3000);
				}
				else
				{
					messages("danger", "Warning!",data, 8000);
				}
				$('#webprogress').css('display','none');
			}
		});
		$('#submitbtn').attr('disabled',false);
	}
	$scope.delete_data=function(id)
	{
		if(confirm("Deleting user may hamper your data associated with it."))
		{
			if(confirm("Are you Sure to DELETE ??"))
			{
				$http.get("user/delete_data?id="+id).success(function(data){
					console.log(data);
					if(data=="1")
					{
						messages("success", "Success!","user Deleted Successfully", 3000);
					}
					else
					{
						messages("danger", "Warning!","user not Deleted", 4000);
					}
					$scope.loader();
				})
			}
		}
	}
	
});