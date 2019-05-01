//blank line is required
app.controller('ctrl_school_master',function($scope,$http){
	$http.get('login/check_valid_session').success (function(data) {if(data!=1){window.location.assign('<?=site_url("login")?>');}});
	$scope.y={};
	
	$scope.loader=function(){
		$http.get("school_master/view_data").success(function(data){
			$scope.datadb=data;
		})
	}
	
//	$http.get("page/view_data?data=page_id,title").success(function(data){
//		console.log(data);
//		$scope.pages=data;
//	})
	
	
	$scope.loader();
	
	$scope.update_call=function(y){
		console.log(y);
		$scope.y=y;
	}
	
	$scope.filter_new=function(){
		$scope.y={};
	}
	
	$scope.save_data=function(x){
		console.log(x);
		$('#form1').ajaxForm({
			type: "POST",
			url: "school_master/save_data",
			beforeSend: function()
			{
				$('#submitbtn').attr('disabled',true);
				$('#webprogress').css('display','inline');
			},
			success: function(data)
			{
				console.log(data);
				if(data=="1")
				{
					$scope.loader();
					messages("success", "Success!","page Saved Successfully", 3000);
					//$scope.loader();
					$scope.filter_new();
				}
				else if(data=="0")
				{
					messages("warning", "Info!","No Data Affected", 3000);
				}
				else
				{
					messages("danger", "Warning!",data, 4000);
				}
				$('#webprogress').css('display','none');
				$('#submitbtn').attr('disabled',false);
			}
		});
	}
	
	$scope.delete_data=function(id)
	{

		if(confirm("Deleting shelf may hamper your data associated with it."))
		{
			if(confirm("Are you Sure to DELETE ??"))
			{
				$http.get("school_master/delete_data?school_id="+id).success(function(data){
					console.log(data);
					if(data=="1")
					{
						messages("success", "Success!","School Deleted Successfully", 3000);
					}
					else
					{
						messages("danger", "Warning!","School not Deleted", 4000);
					}
					$scope.loader();
				})
			}
		}
	}
	
});