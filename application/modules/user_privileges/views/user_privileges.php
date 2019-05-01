<div class="col-lg-12">
<div  class="project_header col-lg-6 col-lg-offset-3">User Privileges Master</div>
</div>
<div class="clearfix"></div>

<div class="col-lg-8 col-lg-offset-2">
<br>
	<form method="post" id="form1" name="form1" ng-submit="fetch_data(x.user)" >
	   <div class="col-lg-4">
		Select User:
		<select ng-model="x.user" ng-change="reset_all()" id="user" class="input-default" required>
		  <option ng-repeat="user in username">{{user.username}}</option>
		</select> 
		</div>
		<div class="col-lg-4">
		<br>
	    <input type="submit" class="waves-effect waves-light brown btn" class="material-form" value="Show Privileges" ng-disabled="form1.$invalid" onClick="Materialize.toast('Assign desired privileges easily', 2000, 'rounded')">
		</div>
		<div class="col-lg-4" id="progress">
		<br>
            <img alt="loading..." src="<?=base_url()?>assets/img/progress/load1.gif">
        </div>
	</form>
	
    	<div class="pull-right">
                <button onClick="window.location.reload();" class="btn waves-effect white">
                <i class="icon icon-refresh"></i></button>
        </div>
    
	<br><br><br><br>
</div>
<div class="clearfix"></div>
<div class="container-fluid">
<ul class="collapsible" data-collapsible="accordion">
    <li>
      <div class="collapsible-header active"><span class="glyphicon glyphicon-view-module"> </span> Software Privileges</div>
      <div class="collapsible-body">
      <br>
        <form method="post" id="form2" name="form2" ng-submit="update_data(x)">
    {{modules}}
    <div class="col-lg-12 table-responsive">
    	<table class="table table-hover">
    		<thead>
    		<tr class="grey lighten-1">
    		    <th  width="20%">Module</th>
    			<th>Create/Add</th>
    			<th>Retrieve/View</th>
    			<th>Update/Edit</th>
    			<th>Delete/Trash</th>
    		</tr>
    		</thead>
    		<tbody>
    		<tr ng-repeat="x in user" >
    		    <td ng-if="!x.$edit">
        		    <a href="">{{x.module}}</a>
        		    <input type="hidden" name="module" value="{{x.module}}">
        		    <input type="hidden" name="username" value="{{x.username}}">
    		    </td>
    			<td>
    			  <input type="checkbox" id="add{{x.auto_id}}" value="1" name="add{{x.auto_id}}" ng-checked="x.add_data==1" ng-model="add.x.auto_id"/>
                  <label for="add{{x.auto_id}}"> </label>
                </td>
    			<td>
                  <input type="checkbox" id="view{{x.auto_id}}" value="1" name="view{{x.auto_id}}" ng-checked="x.view_data==1 || add.x.auto_id==true || upd.x.auto_id==true || del.x.auto_id==true"/>
                  <label for="view{{x.auto_id}}"> </label>
                </td>
                <td>
                  <input type="checkbox" id="update{{x.auto_id}}" value="1" name="update{{x.auto_id}}" ng-checked="x.update_data==1" ng-model="upd.x.auto_id"/>
                  <label for="update{{x.auto_id}}"> </label>
                </td>
                <td>
                  <input type="checkbox" id="delete{{x.auto_id}}" value="1" name="delete{{x.auto_id}}" ng-checked="x.delete_data==1" ng-model="del.x.auto_id"/>
                  <label for="delete{{x.auto_id}}"> </label>
                </td>
    		</tr>
    		</tbody>
    	</table>
    	
    	<button type="submit" class="btn waves-effect" id="btnsubmit"> Save </button>
    	<div id="resultt"></div>
    	<br><br>
    </div>
</form>

      </div>
    </li>
    <li>
      <div class="collapsible-header"><span class="glyphicon glyphicon-privilege"></span> Other Privileges</div>
      <div class="collapsible-body">
      
      <div ng-if="!user_name" class="well">Please Select the User from the Select Box Above !!</div>
      <span ng-if="user_name">
      <form id="form3" name="form3" ng-submit="update_data_other(x)" ng-repeat="x in other_privileges">
            <input type="hidden" name="username" value="{{user_name}}">
            
            <div class="switch " style="padding-left:50px;margin:20px">
                <label> <label style="width:200px !important"> Website Privileges</label>
                    <input type="checkbox"  ng-model="x.website" ng-true-value="'1'" ng-false-value="'0'">
                    <span class="lever"></span>
                </label>
                <br><br>
                <small>Maintain the school's website like posting news, changing images, upload pictures, change page contents etc.</small>
                <input value="{{x.website}}" name="website" type="hidden">
                <hr>
             </div>
      
            <div class="switch " style="padding-left:50px;margin:20px">
                <label> <label style="width:200px !important">Send SMS</label>
                    <input type="checkbox"  ng-model="x.send_sms" ng-true-value="'1'" ng-false-value="'0'">
                    <span class="lever"></span>
                </label>
                <br><br>
                <small>Send Sms panel.</small>
                <input value="{{x.send_sms}}" name="send_sms" type="hidden">
                <hr>
             </div>
      
            <div class="switch " style="padding-left:50px;margin:20px">
                <label> <label style="width:200px !important">Schedule SMS</label>  
                    <input type="checkbox"  ng-model="x.schedule_sms" ng-true-value="'1'" ng-false-value="'0'">
                    <span class="lever"></span>
                </label>
                <br><br>
                <small>View the scheduled sms reports, check the status or cancel scheduled sms.</small>
                <input value="{{x.schedule_sms}}" name="schedule_sms" type="hidden">
                <hr>
             </div>
      
            <div class="switch" style="padding-left:50px;margin:20px;margin:20px">
                <label> <label style="width:200px !important">Delivery Reports</label>  
                    <input type="checkbox"  ng-model="x.delivery_reports" ng-true-value="'1'" ng-false-value="'0'">
                    <span class="lever"></span>
                </label>
                <br><br>
                <small>View the delivery status of sms which are sent</small>
                <input value="{{x.delivery_reports}}" name="delivery_reports" type="hidden">
                <hr>
             </div>
             <div class="switch" style="padding-left:50px;margin:20px;margin:20px">
                <label> <label style="width:200px !important">CSV SMS</label>  
                    <input type="checkbox"  ng-model="x.csv_sms" ng-true-value="'1'" ng-false-value="'0'">
                    <span class="lever"></span>
                </label>
                <br><br>
                <small>Send Csv Sms Panel.</small>
                <input value="{{x.csv_sms}}" name="csv_sms" type="hidden">
                <hr>
             </div>
             
             <div class="switch" style="padding-left:50px;margin:20px;margin:20px">
                <label> <label style="width:200px !important">Fees SMS Excel</label>  
                    <input type="checkbox"  ng-model="x.fees_csv" ng-true-value="'1'" ng-false-value="'0'">
                    <span class="lever"></span>
                </label>
                <br><br>
                <small>Fees simple sms reminder using csv upload.</small>
                <input value="{{x.fees_csv}}" name="fees_csv" type="hidden">
                <hr>
             </div>
             
             <div class="switch" style="padding-left:50px;margin:20px;margin:20px">
                <label> <label style="width:200px !important">Upload/Download Marksheets</label>  
                    <input type="checkbox"  ng-model="x.upload_marksheet" ng-true-value="'1'" ng-false-value="'0'">
                    <span class="lever"></span>
                </label>
                <br><br>
                <small>Result manager: Download and upload the marksheet of the students.</small>
                <input value="{{x.upload_marksheet}}" name="upload_marksheet" type="hidden">
                <hr>
             </div>
             
            <div class="col-xs-offset-1 col-xs-10">
                 <button type="submit" class="btn waves-effect green btn-block" style="width: 250px"> Save </button>
                 <br><br>
            </div>
        </form>
      </span>
      </div>
    </li>
  </ul>
  </div>
<br><br><br><br><br><br><br>
<div class="clearfix"></div>
