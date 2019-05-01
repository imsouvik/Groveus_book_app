 <style>
.button {
    background-color: #364aa5;
    border: none;
    color: white;
    padding: 10px 10px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 10px;
    margin: 4px 2px;
    cursor: pointer;
}

.button2 {
    background-color: #0667f1;
    border: none;
    color: white;
    padding: 10px 10px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 10px;
    margin: 4px 2px;
    cursor: pointer;
}
</style>
 
 <div class="col-sm-14">
    <div class="table_horizontal">
		<div class="input-group custom_addon">
            <div class="input-group-addon"  style="box-shadow:none; -webkit-box-shadow:none;"><i class="fa fa-search"></i></div>
				<input type="text" ng-model="search_text" placeholder="Search here...">
			</div>
		</div>
		<div class="table-data">
			<table class="table table-hover">
				<thead>
					<tr class="active">
					   
						<th class="text-center">Name</th>
						<th class="text-center">Username</th>
						<th class="text-center">Business Type</th>
                        <th class="text-center">Email</th>
                        <th class="text-center">Phone</th>
                        <th class="text-center">City</th>
                       <th class="text-center">Zip</th>
                       <th class="text-center">Status</th>
                       <th class="text-center"></th>
                       <th class="text-center"></th>
                  </tr>
				</thead>
				<tbody>
				<tr dir-paginate="y in users | filter: search_text | itemsPerPage: 10" pagination-id="contact">
			        <td>{{y.name}}</td>
			        <td>{{y.username}}</td>
			        <td>{{y.b_type}}</td>
			        <td>{{y.email}}</td>
			        <td>{{y.phone}}</td>
			        <td>{{y.city}}</td>
			        <td>{{y.zip}}</td>
			        <td>{{y.status}}</td>
			        <td><a ng-click="document_details(y)" data-toggle="modal" data-target="#image_modal">
    					<button class="button"> View Documents</button></a></td>
					<td><a ng-click="orders(y)" data-toggle="modal" data-target="#image_modal2">
					<button class="button2"> View Orders</button></a></td>
		        </tr>
				</tbody>
			</table>
        </div>
        <div class="col-sm-12">
            <dir-pagination-controls boundary-links="true"pagination-id="user" on-page-change="pageChangeHandler(newPageNumber)" template-url="app/pagination"></dir-pagination-controls>
        </div>
   </div>
   
     
   <div class="modal fade" id="image_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">{{user}} <small>Documents</small></h4>
      </div>
      <div class="modal-body">
        <p ng-if="!documents" class="alert alert-danger">No documents Found...</p>
        <table class="table table-hover" ng-if="documents">
          <tr>
            <th>Document Name</th>
            <th>Type</th> 
            <th>Image</th> 
            <th>Description</th>
          </tr>
          <tr ng-repeat="d in documents">
            <td>{{d.doc_name}}</td>
            <td>{{d.doc_type}}</td>
            <td><img src="http://clientfiling.com/assets/uploads/documents/{{d.image}}"></td>
            <td>{{d.description}}</td>
          </tr>
        </table>
      </div>
      <div class="modal-footer">
      </div>
    </div>
  </div>
</div>

 <div class="modal fade" id="image_modal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-lg" role="order">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">{{user}} <small>Order Details</small></h4>
      </div>
      <div class="modal-body">
      <?php $this->load->view("order/data")?>
<!--         <p ng-if="!orders" class="alert alert-danger">No Order Found...</p> -->
<!--         <table class="table table-hover" ng-if="orders"> -->
<!--           <tr> -->
<!--             <th>Order Number</th> -->
<!--             <th>Tax Id</th> -->
<!--             <th>Plan</th>  -->
<!--             <th>Price</th>  -->
<!--             <th>Date</th> -->
<!--             <th>Time</th> -->
<!--           </tr> -->
<!--           <tr ng-repeat="o in orders"> -->
<!--             <td>{{o.order_id}}</td> -->
<!--             <td>{{o.txnid}}</td> -->
<!--             <td>{{o.plan}}</td> -->
<!--             <td>{{o.price}}</td> -->
<!--             <td>{{o.time}}</td> -->
<!--           </tr> -->
<!--         </table> -->
      </div>
      <div class="modal-footer">
      </div>
    </div>
  </div>
</div>