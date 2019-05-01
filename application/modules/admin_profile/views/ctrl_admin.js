//blank line is required
app.controller('ctrl_admin',function($scope,$http){
	$http.get('login/check_valid_session').success (function(data) {if(data!=1){window.location.assign('<?=site_url("login")?>');}});
	$scope.x={};
	
	$scope.loader=function(){
		$http.get("admin_profile/view").success(function(data){
			$scope.y=data[0];
			$scope.fill_map();
		})
	}
	$scope.loader();
	
	$scope.filter_new=function(){
		$("#form1").trigger('reset');
		$scope.y={};
	}
	
	$scope.update=function(z){
		$scope.y=z;
	}
	$scope.fill_map=function(){
		$("#map").html($scope.y.google_map);
	}
	
	$scope.options = {
		    height: 100,
		    toolbar: [
		               ['style', ['style','bold', 'italic', 'underline']],
      		           ['fontname', ['fontname']],
      		           ['fontsize', ['fontsize']],
      		           ['color', ['color']],
      		           ['table',['table']],
      		           [ 'insert', [ 'link' ]],
      	               ["view", ["codeview"]]
		        ]
		  };
	
	
	

	
	$scope.save_data=function(x){
		$('#form1').ajaxForm({
			type: "POST",
			url: "admin_profile/add",
			beforeSend: function()
			{
				$('#webprogress').css('display','inline');
			},
			success: function(data){
				console.log(data);
				if(data=="1")
				{
					$scope.loader();
					messages("success", "Success!","page Saved Successfully", 3000);
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
		if(confirm("Deleting Service may hamper your data associated with it."))
		{
			if(confirm("Are you Sure to DELETE ??"))
			{
				$http.get("plans/delete_data?id="+id).success(function(data){
					if(data=="1")
					{
						messages("success", "Success!","service Deleted Successfully", 3000);
					}
					else
					{
						messages("danger", "Warning!","service not Deleted", 4000);
					}
					$scope.loader();
				})
			}
		}
	}
});