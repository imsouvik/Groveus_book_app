<div class="col-lg-12">
<div  class="project_header col-lg-6 col-lg-offset-3">User Privileges Master</div>
</div>
<div class="clearfix"></div>
<div class="col-lg-8 col-lg-offset-2">
<br>
	<form method="post" id="form1" name="form1" ng-submit="fetch_data(x.user)" >
	   <div class="col-lg-4">
		Select User:
		<select ng-model="x.user" id="user" class="form-control" required>
		  <option>root</option>
		  <option>User2</option>
		  <option>User3</option>
		</select> 
		</div>
		<div class="col-lg-4">
		<br>
	    <input type="submit" class="waves-effect waves-light blue btn" class="material-form" value="Show Privileges" ng-disabled="form1.$invalid">
		</div>
		<div class="col-lg-4" id="progress">
		<br>
            <img alt="loading..." src="<?=base_url()?>assets/img/progress/load1.gif">
        </div>
	</form>
	<br>
	
	<br><br><br>
</div>
<div id="result" class="col-lg-12" align="center"></div>
<div class="col-lg-12">
	<table class="table table-bordered">
		<tr class="blue accent-1">
		    <th>Module</th>
			<th>Create/Add</th>
			<th>Retrieve/View</th>
			<th>Update/Edit</th>
			<th>Delete/Trash</th>
		</tr>
		<tr ng-repeat="x in user" >
		    <td ng-if="!x.$edit"><a href="">{{x.module}}</a></td>
			<td>{{x.add_data}}</td>
			<td>
              <input type="checkbox" id="add{{x.auto_id}}"  />
              <label for="add{{x.auto_id}}"> </label>
            </td>
			<td><span>{{x.view_data}}</span></td>
			<td>{{x.edit_data}}</td>
			<td>{{x.delete_data}}</td>
			
		</tr>
	</table>
</div>

<div class="clearfix"></div>