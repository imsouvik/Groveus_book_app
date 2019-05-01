<div class="inner-content">
    <div class="panel theme-panel">
        <div class="panel-heading">
            <span class="panel-title"><h2>User Privileges</h2></span>
        </div>
        <div class="panel-body">
            <div class="row clearfix">
               <div class="col-lg-8 col-lg-offset-2">
                    <br>
                    	<form method="post" id="form1" name="form1" ng-submit="fetch_data(x.user)" >
                    	   <div class="col-lg-4">
                    		Select User:
                    		<select ng-model="x.user" ng-change="reset_all()" id="user" class="form-control" required>
                    		  <option value="">--Select User</option>
                    		  <option ng-repeat="u in users" value="{{u.user_id}}">{{u.username}}</option>
                    		</select> 
                    		</div>
                    		<div class="col-lg-4">
                    		<br>
                    	    <input type="submit"class="btn btn-info" value="Show Privileges" ng-disabled="form1.$invalid">
                    		</div>
                    		<div class="col-lg-4" id="progress">
                    		<br>
                                <img src="<?=base_url()?>assets/images/progress/load1.gif">
                            </div>
                    	</form>
                    	<br><br><br><br>
                </div>
               
                
            </div>
            <div class="col-sm-12" ng-if="user">
                 <form method="post" id="form2" name="form2" ng-submit="update_data(x)">
                    <div class="col-lg-12 table-responsive">
                    	<table class="table table-hover">
                    		<thead>
                    		<tr class="grey lighten-1">
                    		    <th  width="20%">Module</th>
                    			<th>Create/Add</th>
                    			<th>Page View</th>
                    			<th>Update/Edit</th>
                    			<th>Delete/Trash</th>
                    		</tr>
                    		</thead>
                    		<tbody>
                    		<tr ng-repeat="x in user" >
                    		    <td>
                        		    <label class="title">{{modules[x.module]}}</label>
                        		    <input type="hidden" name="module" value="{{x.module}}">
                        		    <input type="hidden" name="user_id" value="{{x.user_id}}">
                    		    </td>
                    			<td>
                    			  <input type="checkbox" id="add{{x.auto_id}}" value="1" name="add{{x.auto_id}}" ng-checked="x.add==1" ng-model="add.x.auto_id"/>
                                  <label for="add{{x.auto_id}}"> </label>
                                </td>
                    			<td>
                                  <input type="checkbox" id="view{{x.auto_id}}" value="1" name="view{{x.auto_id}}" ng-checked="x.view==1 || add.x.auto_id==true || upd.x.auto_id==true || del.x.auto_id==true"/>
                                  <label for="view{{x.auto_id}}"> </label>
                                </td>
                                <td>
                                  <input type="checkbox" id="update{{x.auto_id}}" value="1" name="update{{x.auto_id}}" ng-checked="x.update==1" ng-model="upd.x.auto_id"/>
                                  <label for="update{{x.auto_id}}"> </label>
                                </td>
                                <td>
                                  <input type="checkbox" id="delete{{x.auto_id}}" value="1" name="delete{{x.auto_id}}" ng-checked="x.delete==1" ng-model="del.x.auto_id"/>
                                  <label for="delete{{x.auto_id}}"> </label>
                                </td>
                    		</tr>
                    		</tbody>
                    	</table>
                    	
                    	<button type="submit" class="btn btn-success" id="btnsubmit"> Save </button>
                    	<div id="resultt"></div>
                    	<br><br>
                    </div>
                </form>
            </div>            
         </div>
    </div>
</div>
<style>
.column{
    cursor:pointer;
}
input[type=checkbox]{
    width:20px;height:30px;
}
.title{
    font-size:1.6rem !important;
    
}
</style>