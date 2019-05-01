<div class="heading">
    <ol class="breadcrumb">
      <li><a href="#/">Dashboard</a></li> 
      <li><a href="javascript:void(0)">Admin profile</a></li>
    </ol>
</div>
<style>
.deco
{
font-family: "Times New Roman", Times, serif;
color:#87CEEB;
font-size: 16px;
}
</style>
<div class="col-sm-12 well">
     <div class="col-sm-12">
       <form action="" id="form1" method="post">
         <input name="id"  ng-model="y.id" hidden>
            <div class="clearfix"></div>
            <div class="col-sm-12">
                <div class="col-sm-6">
                    <label class="deco">Name</label>
                    <input name="name" class="form-control" ng-model="y.name"   required style="width:400px;">               
                </div>
                <div class="col-sm-6">
                    <label class="deco" >UserName</label>
                    <input name="username" class="form-control" ng-model="y.username"   required style="width:400px;">               
                </div>
            </div>

            <div class="clearfix"></div><br>
            <div class="col-sm-12 ">
                <div class="col-sm-6 ">
                    <label class="deco">Password</label>
                    <input type="password" name="password" class="form-control" ng-model="y.password"   required style="width:400px;">               
                </div>
                <div class="col-sm-6 ">
                    <label class="deco">Business Name</label>
                    <input name="business_name" class="form-control" ng-model="y.business_name"   required style="width:400px;">               
                </div>
            </div>
           
            <div class="clearfix"></div><br>
            <div class="col-sm-12">
                <div class="col-sm-6 ">
                    <label class="deco">Email</label>
                    <input name="admin_email" class="form-control" ng-model="y.admin_email" style="width:400px;"   required>               
                </div>
                <div class="col-sm-6 ">
                    <label class="deco">Phone</label>
                    <input name="phone" class="form-control" ng-model="y.phone" style="width:400px;"   required>               
                </div>
            </div>
           
            <div class="clearfix"></div><br>
            <div class="col-sm-12 ">
                <div class="col-sm-6 ">
                    <label class="deco">Bank Ac No</label>
                    <input name="bank_acc" class="form-control" ng-model="y.bank_acc" style="width:400px;"   required>               
                </div>
                 <div class="col-sm-6 ">
                    <label class="deco">Gst No</label>
                    <input name="gst_no" class="form-control" ng-model="y.gst_no" style="width:400px;"    required>               
                </div>
            </div>
           
            <div class="clearfix"></div><br>
            <div class="col-sm-12 ">
                <div class="col-sm-6 "> 
                    <label class="deco">Ifsc Code</label>
                    <input name="ifsc_code" class="form-control" ng-model="y.ifsc_code" style="width:400px;"   required>               
                </div>
            </div>   	
           
             <div class="clearfix"></div>
             <div class="col-sm-12 ">
                <div class="col-sm-6 ">
                     <label class="deco">Address</label>
        			<summernote config="options" ng-model="y.address"></summernote>
        			<textarea name="address" ng-model="y.address" hidden></textarea>              
                </div>
            </div>          
            <div class="clearfix"></div><br> 
            <div class="col-sm-12"> 
                <div id="webprogress" style="display: none">
                    <img src="<?=base_url()?>/assets/images/progress/load1.gif">
                </div>
               <button type="submit" id="submitbtn" accesskey="s" ng-click="save_data(y)" class="btn btn-info"  ng-disabled="form1.$invalid"><u><b>S</b></u>ave</button>
               <a class="btn btn-default" accesskey="c" ng-click="filter_new()"><u><b>C</b></u>lear</a>
               <br><br> 
            </div>
            </form>
    </div>

 <?php include 'data.php';?>
</div>  