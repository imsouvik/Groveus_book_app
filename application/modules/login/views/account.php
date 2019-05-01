<div class="heading">
<ol class="breadcrumb">
 <li><a href="#/">Dashboard</a></li> 
<li><a href="javascript:void(0)">Change Password</a></li>
</ol>
</div>


<div class="col-sm-12 well" style="padding: 10px 10px 20px 10px">
     <div class="col-sm-12">
         <form name="form1" id="form1" ng-submit="save_data()">
        
            
            <div class="col-sm-6 col-sm-offset-3">
                    <label>Current Password </label>
                    <input class="form-control span10" ng-model="old" name="currentpass" id="currentpass" type="password" placeholder=" Enter Current Password" autofocus required>
                
                      <div class="form-group">
                        <label>New Password</label>
                        <input type="password"  ng-model="new" class="form-control" name="newpass" placeholder="Enter New Password "required>
                      </div>
                     
                     <div class="form-group">
                        <label>Confirm Password</label>
                        <input type="password" ng-model="conf" class="form-control" name="cmpassword"  placeholder="Confirm Your New Password" required>
                      </div>
                      <br>
                <div id="webprogress" style="display: none">
                    <img src="<?=base_url("assets/images/progress/load1.gif")?>">
                </div>
                <div id="result"></div>
                <button type="submit" id="submitbtn" class="btn btn-info" ng-disabled="form1.$invalid" accesskey="s">Change</button>
                <a class="btn btn-default"  accesskey="c" ng-click="filter_new()"><u><b>C</b></u>lear</a> 
                <br><br>
            </div>
        </form>
    </div>
</div>
