<div class="heading">
    <ol class="breadcrumb">
      <li><a href="#/">Dashboard</a></li> 
      <li><a href="javascript:void(0)">Book Details</a></li>
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
<div class="col-sm-12 well ng-scope">
     <div class="col-sm-12">
       <form action="" id="form1" method="post">
         <input name="id"  ng-model="y.id" hidden>
            <div class="clearfix"></div>
 			<div class="col-sm-12">
            <div class="col-sm-4">
            		<label class="deco">Select Supplier</label>
            		<select class="form-control" name="supplier_id" ng-model="y.supplier_id">
                    	<option value="">Select</option>
           				<option ng-repeat="s in suppliers" value="{{s.supplier_id}}">{{s.supplier_name}}</option>
					</select>
            	</div>
             <div class="col-sm-4">
            		<label class="deco">Select Search Category</label>
            		<select class="form-control" name="search_id[]" ng-model="y.search_id" multiple>
                    	<option value="">Select</option>
           				<option ng-repeat="sr in search" value="{{sr.search_id}}">{{sr.search_category}}</option>
					</select>
            	</div>
        
             </div>
            
            <div class="clearfix"></div><br>
            <div class="col-sm-12">
 				<div class="col-sm-4">
                    <label class="deco">Book Name</label>
                    <input name="book_name" class="form-control" ng-model="y.book_name"   required >               
                </div>
            	<div class="col-sm-4">
                    <label class="deco" >Author Name</label>
                    <input name="author_name" class="form-control" ng-model="y.author_name"   required >               
                </div>
                <div class="col-sm-4 ">
                    <label class="deco">Publisher Name</label>
                    <input name="pub_name" class="form-control" ng-model="y.pub_name"   required>               
                </div>
			</div>
                      
            <div class="clearfix"></div><br>
            <div class="col-sm-12">
            	<div class="col-sm-3">
            		<label class="deco">Genre</label>
            		<select class="form-control" name="genre_id" ng-model="y.genre_id">
                    	<option value="">Select</option>
           				<option ng-repeat="gr in genre" value="{{gr.genre_id}}">{{gr.genre_name}}</option>
					</select>
            	</div>
    			<div class="col-sm-3 ">
                    <label class="deco">ISBN No</label>
                    <input name="isbn" class="form-control" ng-model="y.isbn"   required>               
                </div>    			
				<div class="col-sm-3 ">
                    <label class="deco">Total Quantity</label>
                    <input name="total_quant" class="form-control" ng-model="y.total_quant"  required>               
                </div>
				
            </div>
            <div class="clearfix"></div><br>
             <div class="col-sm-12">
             	<div class="col-sm-3 ">
                    <label class="deco">Purchase Rate</label>
                    <input name="pur_rate" class="form-control" ng-model="y.pur_rate" required>               
                </div>
                 <div class="col-sm-3 ">
                    <label class="deco">Selling Rate</label>
                    <input name="sell_rate" class="form-control" ng-model="y.sell_rate"  required>               
                </div>
             	<div class="col-sm-2">
            		<label calss="deco">Shelf Number</label>
            		<select class="form-control" name="shelf_id" ng-model="y.shelf_id">
                    	<option value="">Select</option>
           				<option ng-repeat="sh in shelf" value="{{sh.shelf_id}}">{{sh.shelf_number}}</option>
					</select>
            	</div>
            	<div class="col-sm-2">
                    	<label class="deco">Shelf Name</label>
							<select class="form-control" name="shelf_id" ng-model="y.shelf_id">
                    			<option value="">Select</option>
           						<option ng-repeat="sh in shelf" value="{{sh.shelf_id}}">{{sh.shelf_name}}</option>
							</select>
               		 </div>
            	<div class="col-sm-2">
                    	<label class="deco">Shelf Row</label>
							<select class="form-control" name="shelf_id" ng-model="y.shelf_id">
                    			<option value="">Select</option>
           						<option ng-repeat="sh in shelf" value="{{sh.shelf_id}}">{{sh.shelf_row}}</option>
							</select>
               		 </div>
               	
             </div>
                        
            <div class="clearfix"></div><br>
               <button type="submit" id="submitbtn" accesskey="s" ng-click="save_data(y)" class="btn btn-info"  ng-disabled="form1.$invalid"><u><b>S</b></u>ave</button>
               <a class="btn btn-default" accesskey="c" ng-click="filter_new()"><u><b>C</b></u>lear</a>
               <br><br>    
        </form>
        </div>
    </div>

 <?php include 'data.php';?>
</div>  