/*
$(document).ready(function(){
	$('form#addProd').submit(function(e){
	    e.preventDefault();
        var Name = $('#Name').val();
	    var Qty = $('#Qty').val();
	    var Price = $('#Price').val();
	    var Discrption = $('#Discrption').val();

        var Admin_id  = window.localStorage.getItem("Admin_id");
    
    if(Name==''||Qty==''||Price==''){
        alert("Name/Quantity/Price/image Can not be blank");
    }else {
    var fData = new FormData($(this)[0]);
        $.ajax({
					type : 'post',
					url : 'http://kagroceryapp2.in/app/BetterBasket/admin/api/add_product.php',
			    	data: fData,
					cache: false,
					processData: false,
					contentType: false,
			    	beforeSend:function(){
						$("#status").html("Please Wait");
						$("#status").show();
				    },
					success : function (res){
						    console.log(res);
							$("#status").hide();
						    alert(res);
						}	
				});
        }
   });	
});	
*/
const IMGurl = 'api/';

function displayerror(jqXHR,exception){
	 var msg = '';
        if (jqXHR.status === 0) {
            msg = 'Not connect.\n Verify Network.';
        } else if (jqXHR.status == 404) {
            msg = 'Requested page not found. [404]';
        } else if (jqXHR.status == 500) {
            msg = 'Internal Server Error [500].';
        } else if (exception === 'parsererror') {
            msg = 'Requested JSON parse failed.';
        } else if (exception === 'timeout') {
            msg = 'Time out error.';
        } else if (exception === 'abort') {
            msg = 'Ajax request aborted.';
        } else {
            msg = 'Uncaught Error.\n' + jqXHR.responseText;
        }
        return msg;
}


function AdminLogout(){
	window.localStorage.clear();
	window.location.href="index.php";	
}	

function AdminLogin(){
	var user = $('#user').val();
	var password = $('#password').val();
		$.ajax({
					type : 'post',
					url : 'api/api.php',
					data : {'type':'0001','user':user, 'password':password},
					beforeSend:function(){
						
					},
					success : function (res)
						{
						// console.log(res); 							
						    // var data  = jQuery.parseJSON(res);						
						    var data  = JSON.parse(res);						

							$("#status").hide();
							var A_ID=data[0]; var type=data[1];
							if(isNaN(A_ID)==false){
								
								if(type=='ADMIN'){
								  	window.localStorage.setItem('Admin_id', A_ID); window.localStorage.setItem("Admin_login", "true"); window.location.href="Admin.php";
								}else{
								    window.localStorage.setItem('Admin_id', A_ID); window.localStorage.setItem("Admin_city", "true");  
								    window.localStorage.setItem('Admin_City', type); window.location.href="city.php";
								}
							

							}
							else if(res=='#001'){
								alert("Try Again");
							}
						}, error: function (jqXHR, exception) { var msg=displayerror(jqXHR, exception); alert(msg); },		
				});
}
function AddNewBanner(){
    $('.loader').show(); $("#addbnr").attr("disabled", true);
    var image3 = $('#image3').val();
    if(image3===''){alert("Select Valid Image");}else{
		$.ajax({
					type : 'post',
					url : 'api/api.php',
					data : {'type':'0014','image3':image3},
					beforeSend:function(){
					
					},
					success : function (res)
						{
						    $('.loader').hide(); $("#addbnr").attr("disabled", false);
						    alert(res);
						    loadbanner();
						
						}, error: function (jqXHR, exception) { var msg=displayerror(jqXHR, exception); alert(msg);  $('.loader').hide(); $("#addbnr").attr("disabled", false);},	
				});
    }
}
/*function LoadAllOrders(){
    $('.loader').show();
    $.ajax({
					type : 'post',
					url : 'api/api.php',
					data : {'type':'0003'},
					beforeSend:function(){
					
					},
					success : function (res)
						{
						   $('.loader').hide();
						   if(res=='null'){
							   alert("No Records Found");
						   }else{
						        	$("#dbData").html("");
							var data  = jQuery.parseJSON(res);						
							var the_table = '<table id="table1" class="class="display" cellspacing="0" width="100%" border=1><thead><tr><th>#ID</th><th>Name <br> Mobile</th><th>Address<br>PIN</th><th>Delivery<br>Total</th><th>Date</th><th>Status</th><th>Products</th><th>New Status</th></tr></thead><tbody>';
								$.each(data, function (i, item) {
								
								the_table=the_table+'<tr><td>'+data[i][0]+'</td><td>'+data[i][4]+'<br>'+data[i][5]+'</td><td>'+data[i][6]+'<br>'+data[i][7]+'</td><td>'+data[i][10]+'<br> Rs'+data[i][3]+'/- </td><td>'+data[i][8]+'</td><td>'+data[i][9]+' <br> <b>('+data[i][11]+')</b></td><td><button onclick="loadProducts('+data[i][2]+')">Products</button> <br> <button onclick="createbill('+data[i][2]+','+data[i][0]+')">Bill</button></td><td><select id=newstatus'+data[i][0]+'><option>'+data[i][9]+'</option><option Value=Verified>Verify</option><option Value=Cancel>Cancel</Option><option Value=Delivered>Delivered</Option></select> <br> <a href=# onclick=changestatus('+data[i][0]+',`'+data[i][5]+'`)>Update</a></td></tr>';
								 
							});
							the_table=the_table+"</tbody></table>"
							$("#dbData").html(the_table);
							$("#table1").DataTable();  
						   }
					     }, error: function (jqXHR, exception) { var msg=displayerror(jqXHR, exception); alert(msg);  $('.loader').hide(); },	
				}); 
}*/
function LoadAllOrders(){
    $('.loader').show();
    $.ajax({
					type : 'post',
					url : 'api/api.php',
					data : {'type':'0003'},
					beforeSend:function(){
					
					},
					success : function (res)
						{
						   $('.loader').hide();
						   if(res=='null'){
							   alert("No Records Found");
						   }else{
						        	$("#dbData").html("");
							var data  = jQuery.parseJSON(res);						
							var the_table = '<table id="table1" class="class="display" cellspacing="0" width="100%" border=1><thead><tr><th>#ID</th><th>Name <br> Mobile</th><th>Address<br>PIN</th><!--<th>Address</th>--><th>Delivery<br>Total</th><th>Date</th><th>Status</th><th>Products</th><th>New Status</th></tr></thead><tbody>';
								$.each(data, function (i, item) {
								
								the_table=the_table+'<tr><td>'+data[i][0]+'</td><td>'+data[i][4]+'<br>'+data[i][5]+'</td><td>'+data[i][6]+'<br>'+data[i][7]+'</td><!--<td><div id=ma'+data[i][0]+'></div><buton onclick="showmap(`'+data[i][0]+'`,`'+data[i][13]+'`)">ShowMap</buton></td>--><td>'+data[i][10]+'<br> Rs'+data[i][3]+'/-<br><!--Coupon Rs'+data[i][16]+'/---></td><td>'+data[i][8]+'</td><td>'+data[i][9]+' <br> <b>('+data[i][11]+')</b></td><td><button onclick="loadProducts('+data[i][2]+')">Products</button> <br> <button onclick="createbill('+data[i][2]+','+data[i][0]+')">Bill</button> </td><td><select id=newstatus'+data[i][0]+'><option>'+data[i][9]+'</option><option Value=Verified>Verify</option><option Value=Cancel>Cancel</Option><option Value=Delivered>Delivered</Option></select> <br> <a href=# onclick=changestatus('+data[i][0]+',`'+data[i][5]+'`)>Update</a></td></tr>';
								 
							});
							the_table=the_table+"</tbody></table>"
							$("#dbData").html(the_table);
							$("#table1").DataTable();  
						
					//	$('#table1').DataTable( {dom: 'Bfrtip',buttons: ['copyHtml5','excelHtml5','csvHtml5','pdfHtml5']} );
						
						   }
					     }, error: function (jqXHR, exception) { var msg=displayerror(jqXHR, exception); alert(msg);  $('.loader').hide(); },	
				}); 
}
function showmap(id,loc){
  //  alert(loc);
    $('#ma'+id).html(' <iframe src="https://maps.google.co.in/?q='+loc+'&z=60&output=embed" height=200px style=padding-top:0px;></iframe>');
}


function createbill(idfr,id){
    	window.localStorage.setItem('billLing_id', id);
		window.localStorage.setItem("billpro", idfr);
		window.open('bill.php','_blank');
	
}
function loadbill(){
var billLing_id = window.localStorage.getItem("billLing_id");
var idfr = window.localStorage.getItem("billpro");


 $.ajax({
					type : 'post',
					url : 'api/api.php',
					data : {'type':'0017','id':billLing_id},
					beforeSend:function(){
						$("#loading").show();
						$("#loading").html("Loading Please wait..");
					},
					success : function (res)
						{
						    						console.log(res);

						    var data  = jQuery.parseJSON(res);						
						$("#name").html(data[4]); 	$("#mobile").html(data[5]); $("#address").html(data[6]+" "+data[7]); $("#dateoforder").html(data[8]); $("#delivery_type").html(data[10]);
						$("#billid").html(data[0]); $("#order_type").html(data[9]);  $("#total").html(data[3]); 
						console.log(data[4]);
					     }	
				}); 
				
					$.ajax({
					type : 'post',
					url : 'api/api.php',
					data : {'type':'006','IDFR':idfr},
					beforeSend:function(){
						$("#loading").show();
					},
					success : function (res){
					console.log(res);
						var data  = jQuery.parseJSON(res);						
						var the_table = '<table border=1>';
						$.each(data, function (i, item) {
						the_table=the_table+'<tr><td>' + data[i][8]  + '</td><td> Price Rs:'+data[i][2]+' /- </td><td> Quantity '+data[i][3]+' (x '+data[i][9]+') </td><td> Total Rs:'+data[i][4]+' /- </td></tr>';							
						});
                        the_table=the_table+'</table>'
						$("#showbiggerimage").html(the_table);
					    
						$("#imgfordisplay").hide();
					}
					
					
				});

}
function ViewMyDateOrder(){
    var orderdate=$("#orderdate").val(); 
        $.ajax({
					type : 'post',
					url : 'api/api.php',
					data : {'type':'0008','orderdate':orderdate},
					beforeSend:function(){
						$("#loading").show();
						$("#loading").html("Loading Please wait..");
					},
					success : function (res)
						{
						   // console.log(res);
							$("#loading").hide();
						   if(res=='null'){
							   alert("No Records Found");
						   }else{
						       	$("#dbData").html("");
							var data  = jQuery.parseJSON(res);						
							var the_table = '<table id="table5" class="table table-striped table-bordered table-sm" border=1><tr><th>ID</th><th>Name</th><th>Address</th><th>PIN</th><th>Total</th><th>Date</th><th>Status</th><th>Products</th><th>New Status</th><th>Update</th></tr>';
								$.each(data, function (i, item) {
								
								the_table=the_table+'<tr><td>'+data[i][0]+'</td><td>'+data[i][4]+'</td><td>'+data[i][6]+'</td><td>'+data[i][7]+'</td><td>'+data[i][3]+'</td><td>'+data[i][8]+'</td><td>'+data[i][9]+'</td><td><button onclick="loadProducts('+data[i][2]+')">Products</button></td><td><select id=newstatus'+data[i][0]+'><option>'+data[i][9]+'</option><option Value=Verified>Verify</option><option Value=Cancel>Cancel</Option><option Value=Delivered>Delivered</Option></select></td><td><a href=# onclick=changestatus('+data[i][0]+',`'+data[i][5]+'`)>Update</a></td></tr>';
								 
							});
							the_table=the_table+"</table>"
							$("#dbData").html(the_table);
							   
						   }
					     }	
				}); 
}

function changestatus(ID,mno){
var Status=$('#newstatus'+ID).val();
    $.ajax({
					type : 'post',
					url : 'api/api.php',
					data : {'type':'0011', 'ID':ID, 'Status':Status, 'mno':mno},
					beforeSend:function(){

					},
					success : function (res){
    				    alert(res);
					    LoadAllOrders()
					},error: function (jqXHR, exception) { var msg=displayerror(jqXHR, exception); alert(msg);  $('.loader').hide(); },
					
					
				});
}

function addnewcourse(){
    var CatName=$('#CatName').val();
	var catdesc=$('#catdesc').val();
    var cat_image_tmp=$('#cat_image_tmp').val();
	var CatDuration  =$('#CatDuration').val();
    var Catcp =$('#Catcp').val();
    var Catsp=$('#Catsp') .val();
    if(CatName=='' || catdesc=='' || cat_image_tmp=='' || CatDuration=='' || Catcp=='' || Catsp==''){
		alert("details is blank");
}
    else{
    $.ajax({
					type : 'post',
					url : 'api/api.php',
					data : {'type':'0010', 'cat_image_tmp':cat_image_tmp, 'CatName':CatName, 'catdesc':catdesc, 'CatDuration':CatDuration, 'Catcp':Catcp, 'Catsp':Catsp},
					beforeSend:function(){
					},
					success : function (res){
					    $('.loader').hide(); $("#addnewcourse").attr("disabled", false);
					    if(res=="Updated Sucessfully"){
					    	alert(res);
    				        $("#dbData").html("");
				            // LoadAllCourse2();
					    }else{
					        alert(res);
					    }
					},error: function (jqXHR, exception){var msg=displayerror(jqXHR, exception); alert(msg); $('.loader').hide(); $("#addnewcourse").attr("disabled", false);},
					
					
				});
    }
    
}

function LoadAllCourse(){
     $('.loader').show();
    $.ajax({
					type : 'post',
					url : 'api/api.php',
					data : {'type':'0012'},
					beforeSend:function(){
					
					},
					success : function (res)
						{
					       $('.loader').hide();
						   if(res=='null'){
							   alert("No Records Found");
						   }else{
						   	$("#dbData").html("");
							var data  = jQuery.parseJSON(res);						
							var the_table = '<option value="">Select Course</option>';
								$.each(data, function (i, item) {
                                the_table=the_table+'<option value='+data[i][0]+'>'+data[i][1]+'</option>';

							});
							the_table=the_table+"</table>"
							$("#cat1").html(the_table);
							$("#cat2").html(the_table);
							$("#cat21").html(the_table);

								   
						   }
					     },error: function (jqXHR, exception){var msg=displayerror(jqXHR, exception); alert(msg); $('.loader').hide(); },	
				});     
}

function LoadAllCourse2(){
    $('.loader').show();
    $.ajax({
					type : 'post',
					url : 'api/api.php',
					data : {'type':'0012'},
					beforeSend:function(){
				
					},
					success : function (res)
						{
					       $('.loader').hide();
						   if(res=='null'){
							   alert("No Records Found");
						   }else{
						   	$("#dbData").html("");
							var data  = jQuery.parseJSON(res);	var btntxt;		
							console.log(data);			
							var the_table = '<table id="table1" border="1" ><thead><tr><th>ID</th><th>Image</th><th>Course Name</th><th>Descprition</th><th>Duration</th><th>Course price</th><th>Sale price</th><th>Status</th><th>Options</th></tr></thead><tbody>';
								$.each(data, function (i, item) {
							
                                if(data[i][11]=="Enable"){btntxt="Disable"}else{btntxt="Enable"}
the_table=the_table+'<tr><td>'+data[i][0]+'</td><td><img src="'+IMGurl+data[i][3]+'" width="100" height="100"></td><td>'+data[i][1]+'</td><td>'+data[i][0]+'</td><td>'+data[i][0]+'</td><td>'+data[i][0]+'</td><td>'+data[i][0]+'</td><td>'+data[i][11]+'</td><td><button onclick="changeCourseSts('+data[i][0]+',`'+btntxt+'`)">'+btntxt+'</button><br><button onclick="delCourse('+data[i][0]+')">Delete</button><br><button onclick="editCourse(`'+data[i]+'`)">Edit</button></td></tr>';

							});
							the_table=the_table+"</tbody></table>"
							$("#dbData").html(the_table);
							$("#table1").DataTable();
								   
						   }
					     },error: function (jqXHR, exception){var msg=displayerror(jqXHR, exception); alert(msg); $('.loader').hide(); },		
				}); 
}

function editCourse(data) {
	var x = data.split(",");
	$('#myModalp3').modal("show");
	$('#CourseName').val(x[1]);
	$('#Descpritione').val(x[2]);
	$('#Duration').val(x[4]);
	$('#Courseprice').val(x[7]);
	$('#Saleprice').val(x[8]);

}

function LoadAllCourse2CITY(){
    $('.loader').show();
    $.ajax({
					type : 'post',
					url : 'api/api.php',
					data : {'type':'0012'},
					beforeSend:function(){
				
					}, 
					success : function (res)
						{
					       $('.loader').hide();
						   if(res=='null'){
							   alert("No Records Found");
						   }else{
						   	$("#dbData").html("");
							var data  = jQuery.parseJSON(res);	var btntxt;					
							var the_table = '<table id="table5" class="table table-striped table-bordered table-sm" border=1><thead><tr><th>ID</th><th>Title</th><th>Descprition</th><th>Content</th><th>Image</th></tr></thead><tbody>';
								$.each(data, function (i, item) {
								var a=encodeURI(data[i][1]);
								var b=encodeURI(data[i][2]);
								var c=encodeURI(data[i][4]);
                                if(data[i][3]=="Enable"){btntxt="Disable"}else{btntxt="Enable"}
the_table=the_table+'<tr><td>'+data[i][0]+'</td><td><img src='+data[i][4]+'  width="80px"></td><td>'+data[i][1]+'</td><td>'+data[i][2]+'</td><td>'+data[i][3]+'</td></tr>';

							});
							the_table=the_table+"</tbody></table>"
							$("#dbData").html(the_table);
							$("#table5").DataTable();
								   
						   }
					     },error: function (jqXHR, exception){var msg=displayerror(jqXHR, exception); alert(msg); $('.loader').hide(); },		
				}); 
}
function EditCat(id,name,desc,imgk){
    var a=decodeURI(name);
    var b=decodeURI(desc);
    var c=decodeURI(imgk); //UpdateCatImg
    $("#Namecat1").val(a);
    $("#desccat1").val(b);
    $("#catid3").val(id);
    $("#cat_image_tmp1").val(c);
    $("#UpdateCatImg").html("<img src="+c+" width='15%' height='15%'>");
}
function Updatecat2(){
     $('.loader').show(); $("#Updatecat2btn").attr("disabled", true);
    var catid=$('#catid3').val();
    var name=$('#Namecat1').val();
    var desc=$('#desccat1').val();    
    var cat_image_tmp1=$('#cat_image_tmp1').val();      
    $.ajax({
					type : 'post',
					url : 'api/api.php',
					data : {'type':'0016','catid3':catid,'Namecat1':name,'desccat1':desc,'cat_image_tmp1':cat_image_tmp1},
					beforeSend:function(){},
					success : function (res){
			        	$('.loader').hide(); $("#Updatecat2btn").attr("disabled", false);
						$("#loading").hide();
						alert(res);
						// LoadAllCourse2();
					 },error: function (jqXHR, exception){var msg=displayerror(jqXHR, exception); alert(msg); $('.loader').hide(); $("#Updatecat2btn").attr("disabled", false);},	
				});
}
function updateCatStatus(cat_id,sts){
     $('.loader').show();
       $.ajax({
					type : 'post',
					url : 'api/api.php',
					data : {'type':'0013', 'cat_id':cat_id,'sts':sts},
					beforeSend:function(){

					},
					success : function (res){
					    $('.loader').hide();
    			    	alert(res);
					    $("#dbData").html("");
				        LoadAllCourse2();
					},error: function (jqXHR, exception){var msg=displayerror(jqXHR, exception); alert(msg); $('.loader').hide();},
					
					
				});
}

function enablecourse(cat_id){
       $.ajax({
					type : 'post',
					url : 'api/api.php',
					data : {'type':'0015', 'cat_id':cat_id},
					beforeSend:function(){

					},
					success : function (res){
					console.log(res);
    				alert(res);
					$("#dbData").html("");
				    LoadAllCategory2();

					}
					
					
				});
}
function loadLecture(IDFR){
    $('.loader').show();
    $("#imgfordisplay").html('<button data-toggle="modal" data-target="#myModal1" id="biggerimage">Loading.....</button>');
	$("#imgfordisplay").show();
	$("#biggerimage").click();
	$.ajax({
					type : 'post',
					url : 'api/api.php',
					data : {'type':'006','IDFR':IDFR},
					beforeSend:function(){
						$("#loading").show();
					},
					success : function (res){
					    $('.loader').hide();
						var data  = jQuery.parseJSON(res);						
						var the_table = '';
						$.each(data, function (i, item) {
						the_table=the_table+'<li data-icon=shop><img src='+ data[i][7] +' width=100px ><h5>' + data[i][8]  + '</h5><p>Price Rs:'+data[i][2]+' /-</p><p>Quantity '+data[i][3]+' ( '+data[i][9]+') Total Rs:'+data[i][4]+' /- </p></li>';							
						});
						$("#showbiggerimage").html(the_table);
						$("#imgfordisplay").hide();
					},error: function (jqXHR, exception){var msg=displayerror(jqXHR, exception); alert(msg); $('.loader').hide();},
					
					
				});
}
function LoadAllLecture2(){
    $('.loader').show();
    $.ajax({
					type : 'post',
					url : 'api/api.php',
					data : {'type':'0004'},
					beforeSend:function(){
					
					},
					success : function (res)
						{
						    $('.loader').hide();
						    console.log(res);
						   if(res=='null'){
							   alert("No Records Found");
						   }else{
						       	$("#dbData").html("");
							var data  = jQuery.parseJSON(res);	var btntxt;					
							var the_table = '<table id="table1" class="table table-striped table-bordered table-sm" border=1><thead><tr><th></th><th>Title</th><th>Descprition</th><th> Content</th><th>Option</th><th>Date</th><th>Status</th></tr></thead><tbody>';
								$.each(data, function (i, item) {
								console.log(data[i]);
								if(data[i][7]=="Enable"){btntxt="Disable"}else{btntxt="Enable"}
								the_table=the_table+'<tr><td>'+data[i][0]+'</td><td>'+data[i][1]+'</td><!--<td>'+data[i][2]+'</td>--><td>'+data[i][2]+'</td><td>'+data[i][4]+'</td><td><button data-toggle="modal" data-target="#" onclick="EditLectureSelcted(`'+data[i]+'`)">Edit</button> <br> <button onclick=disable_pro_real('+data[i][0]+',`'+btntxt+'`)>'+btntxt+'</button> <br> <button onclick=disable_pro('+data[i][0]+')>DELETE</button> </td><td>'+data[i][6]+'</td><td>'+data[i][7]+'</td></tr>';
								 
							});
							the_table=the_table+"</tbody></table>"
							$("#dbData").html(the_table);
							 $('#table1').DataTable();
 
						   }
					     },error: function (jqXHR, exception){var msg=displayerror(jqXHR, exception); alert(msg); $('.loader').hide();},	
				}); 
}

function EditLectureSelcted(data) {
	var x = data.split(",");
 $('#myModalp').modal("show");
 $('#title').val(x[1]);
 $('#editDescprition').val(x[2]);
 $('#editcontent').val(x[4]);
}

function LoadAllSalesManCITY(){
    $('.loader').show();
    $.ajax({
					type : 'post',
					url : 'api/api.php',
					data : {'type':'0004'},
					beforeSend:function(){
					
					},
					success : function (res)
						{
						    $('.loader').hide();
						    console.log(res);
						   if(res=='null'){
							   alert("No Records Found");
						   }else{
						       	$("#dbData").html("");
							var data  = jQuery.parseJSON(res);	var btntxt;					
							var the_table = '<table id="table1" class="table table-striped table-bordered table-sm" border=1><thead><tr><th>ID</th><th>Category</th><th>Name</th><th>QTY</th><th>₹</th><th>Image</th><th>Discrption</th><th>Status</th></tr></thead><tbody>';
								$.each(data, function (i, item) {
								var a=encodeURI(data[i][1]);
								var b=encodeURI(data[i][2]);
								var c=encodeURI(data[i][3]);
								var d=encodeURI(data[i][5]);
								var e=encodeURI(data[i][4]);
								var f=encodeURI(data[i][10]);
								if(data[i][8]=="Enable"){btntxt="Disable"}else{btntxt="Enable"}
								the_table=the_table+'<tr><td>'+data[i][0]+'</td><td>'+data[i][11]+'</td><td>'+data[i][1]+'</td><td>'+data[i][2]+'</td><td>'+data[i][3]+'</td><td><img src='+data[i][4]+' height=150px width=150px onclick=ShowImagePOPUP(\'' + data[i][4] + '\')></td><td>'+data[i][5]+'</td><td>'+data[i][8]+'</td></tr>';
								 
							});
							the_table=the_table+"</tbody></table>"
							$("#dbData").html(the_table);
							 $('#table1').DataTable();
 
						   }
					     },error: function (jqXHR, exception){var msg=displayerror(jqXHR, exception); alert(msg); $('.loader').hide();},	
				}); 
}
function disable_pro_real(id,sts){
     
    var k=confirm("Do You Want To "+sts+ "?");
    if(k){ 
        $('.loader').show();
	    $.ajax({
					type : 'post',
					url : 'api/api.php',
					data : {'type':'0034','id':id,'sts':sts},
					beforeSend:function(){
					//	$("#loading").show();
					},
					success : function (res){
					 $('.loader').hide();
					 alert(res);
					 LoadAllLecture2();
					}
					
					
				});
    }		
}
function changeCourseSts(id,sts){
     
    var k=confirm("Do You Want To "+sts+ "?");
    if(k){ 
        $('.loader').show();
	    $.ajax({
					type : 'post',
					url : 'api/api.php',
					data : {'type':'00344','id':id,'sts':sts},
					beforeSend:function(){
					//	$("#loading").show();
					},
					success : function (res){
					 $('.loader').hide();
					 alert(res);
					 LoadAllCourse2();
					}
					
					
				});
    }		
}

function disable_pro(id){
    var k=confirm("Do You Want To Delete?");
    if(k){
        $('.loader').show();
	    $.ajax({
					type : 'post',
					url : 'api/api.php',
					data : {'type':'0009','id':id},
					beforeSend:function(){
					//	$("#loading").show();
					},
					success : function (res){
					 $('.loader').hide();
					 alert(res);
					 LoadAllLecture2();
					}
					
					
				});
    }		
}
function delCourse(id){
    var k=confirm("Do You Want To Delete?");
    if(k){
        $('.loader').show();
	    $.ajax({
					type : 'post',
					url : 'api/api.php',
					data : {'type':'00099','id':id},
					beforeSend:function(){
					//	$("#loading").show();
					},
					success : function (res){
					 $('.loader').hide();
					 alert(res);
					 LoadAllCourse2();
					}
					
					
				});
    }		
}
function ShowImagePOPUP(pic){
    	//alert(0);
    	$("#showimg").html('<img src='+pic+' width=300px>');
    	$("#IDBIGIMAGE").click();
}

function EditProductSelcted(id, pname, pqty, price, pdesc,pimg,fakeprice){
    var a=decodeURI(pname);
	var b=decodeURI(pqty);    
	var c=decodeURI(price);
	var d=decodeURI(pdesc);
	var e=decodeURI(pimg);
	var f=decodeURI(fakeprice);
    var product = [id,a,b,c,d,e,f];
    window.localStorage.setItem("product", JSON.stringify(product));
    window.location.href="editproduct.php";

}
function loadpro(){
    var produc  = window.localStorage.getItem("product"); var product = JSON.parse(produc);
    $("#type").val('0007'); 
    $("#type1").val(product[0]); 
    $("#Name").val(product[1]); 
    $("#Qty").val(product[2]); 
    $("#Price").val(product[3]); 
    $("#Discrption").val(product[4]); 
    $("#curr_image").val(product[5]); 
    $("#fakePrice").val(product[6]); 

$("#currimg1").html("<img src="+product[5]+">"); 
}
function AddNewLecture(){
    $('.loader').show(); $("#addprodu-btn").attr("disabled", true);
	$('#type').val("0005");
	var cat1 = $('#cat1').val();
    var Title = $('#Title').val();
	var Descprition = $('#Descprition').val();
	var Content = $('#Content').val();
	var lectype = $('#lectype').val();
	var p_image = $('#p_image').val();
    var Admin_id  = window.localStorage.getItem("Admin_id");
    $('#Admin_id').val(Admin_id);   
    if(cat1==''||Title==''||Descprition==''||Content==''||lectype==''){
	var Descprition = $('#Descprition').val();
        alert("Title/ /Descprition/Content/image/Course Can not be blank");
        $('.loader').hide(); $("#addprodu-btn").attr("disabled", false);
    }else{ 
      
	    var form = $('#lecform')[0]; // You need to use standart javascript object here
        var fdata = new FormData(form);
	    $.ajax({
	                 url:"api/api.php",
					 method:"post",
                     data: fdata,
                     contentType: false,
                     processData: false,
					// data : {'type':'0005','Title':Title,'Descprition':Descprition,'Content':Content,'p_image':p_image, },
					beforeSend:function(){
					},
					success : function (res){
						        $('.loader').hide(); $("#addprodu-btn").attr("disabled", false);
								if(res=="Success: Details Added Successfully" || res=="Success: Details Updated Successfully" ){
                                    alert(res);
								    console.log(res);	
								    window.location.href="welcome.php";								    
								}else{
								    alert(res);
								    console.log(res);	
								}

					},error: function (jqXHR, exception){var msg=displayerror(jqXHR, exception); alert(msg); $('.loader').hide(); $("#addprodu-btn").attr("disabled", false);},	
				});
			
        }		
}


function Updatemyproduct(){
    $('.loader').show(); $("#addprodu").attr("disabled", false);
	$('#type').val("0007");
    var Name = $('#Name').val();
	var Qty = $('#Qty').val();
	var Price = $('#Price').val();
	var Discrption = $('#Discrption').val();
	var cat1 = $('#cat1').val();
	var subcat1 = $('#subcat1').val();

     if(Name==''||Qty==''||Price==''||cat1=="10101"){
        alert("Name/Quantity/Price/Category image Can not be blank");
    }else{
	    var form = $('form')[0]; // You need to use standart javascript object here
        var fdata = new FormData(form);
	    //console.log(fdata);
	    $.ajax({
	                 url:"api/api.php",
					 method:"post",
                     data: fdata,
                     contentType: false,
                     processData: false,
					//data : {'type':'0005','college_id':college_id,'website':website, 'logo':logo,'College_Description':College_Description, 'line1':line1,'city':city,'state':state,'pin':pin},
					beforeSend:function(){
					
					},
					success : function (res){
							       $('.loader').hide(); $("#addprodu").attr("disabled", false);
								   rs=res.trim();
								if(rs=="Success"){
                                    alert(res);
								    console.log(res);	
								    window.location.href="Admin.php";								    
								}else{
								    alert(res);
								}

					},error: function (jqXHR, exception){var msg=displayerror(jqXHR, exception); alert(msg); $('.loader').hide(); $("#addprodu").attr("disabled", false);},	
				});
			}
}


/*function AllUSerLoad(){
     $('.loader').show(); 
    $.ajax({
					type : 'post',
					url : 'api/api.php',
					data : {'type':'0006'},
					beforeSend:function(){
						$("#loading").show();
						$("#loading").html("Loading Please wait..");
					},
					success : function (res){
						    $('.loader').hide();
							$("#loading").hide();
						   if(res=='null'){
							   alert("No Records Found");
						   }else{
						       	$("#dbData").html("");
							var data  = jQuery.parseJSON(res);	 var newapp;					
							var the_table = ' <div id="smsdata">  <span style="background-color:#364251;color: #fff; width: 15%" class="input-group-text" data-toggle="modal" data-target="#myModal9" onclick="setnumberforsms()" >Send Notification</span></div> <br><table id="table2" class="table table-striped table-bordered table-sm" border=1><thead><tr><th><input type="checkbox" onclick="checkUncheck()" id="th-main"></th><th>ID</th><th>Name</th><th>Mobile</th><th>New?</th><th>DOR</th></thead><tbody>';
								$.each(data, function (i, item) {
                                if((data[i][4]).length>0){newapp="Yes"}else{newapp="N0"}
								the_table=the_table+'<tr><td><input type="checkbox" class="sel" name="selected[]" value='+data[i][4]+' class="cb-element"></td><td>'+data[i][0]+'</td><td>'+data[i][1]+'</td><td>'+data[i][2]+'</td><td>'+newapp+'</td><td>'+data[i][5]+'</td></tr>';
								 
							});
							the_table=the_table+"</tbody></table>"
							$("#dbData").html(the_table);
                            $('#table2').DataTable();
  
						   }
					     },error: function (jqXHR, exception){var msg=displayerror(jqXHR, exception); alert(msg); $('.loader').hide();},		
				}); 
} */
function AllUSerLoad(){
     $('.loader').show(); 
    $.ajax({
					type : 'post',
					url : 'api/api.php',
					data : {'type':'0006'},
					beforeSend:function(){
						$("#loading").show();
						$("#loading").html("Loading Please wait..");
					},
					success : function (res){
						    $('.loader').hide();
							$("#loading").hide();
						   if(res=='null'){
							   alert("No Records Found");
						   }else{
						       	$("#dbData").html("");
							var data  = jQuery.parseJSON(res);						
							var the_table = '<table id="table2" class="table table-striped table-bordered table-sm" border=1><thead><tr><th>ID</th><th>Name</th><th>Mobile</th><th>DOR</th><!--<th>My Code</th><th>Reffered Code</th><th>Wallet</th><th>Option</th>--></thead><tbody>';
								$.each(data, function (i, item) {

								the_table=the_table+'<tr><td>'+data[i][0]+'</td><td>'+data[i][1]+'</td><td>'+data[i][2]+'</td><td>'+data[i][5]+'</td><!--<td>'+data[i][8]+'</td><td>'+data[i][9]+'</td><td>'+data[i][10]+'</td><td><button onclick="addtouserwallet('+data[i][0]+','+data[i][10]+')">ADD</td>--></tr>';
								 
							});
							the_table=the_table+"</tbody></table>"
							$("#dbData").html(the_table);
                            $('#table2').DataTable();
  
						   }
					     },error: function (jqXHR, exception){var msg=displayerror(jqXHR, exception); alert(msg); $('.loader').hide();},		
				}); 
}


function checkUncheck(){
 
 var rows = $('#table2').dataTable().fnGetNodes();
    const main_checked = $("#th-main").prop('checked');
    for(var i=0;i<rows.length;++i){
     $(rows[i]).find('.sel').prop("checked",main_checked);    
   } 
 
 /*  if($("#th-main").prop('checked') == true){
      $('input[type="checkbox"]').prop("checked", true);    
   }else{
        $('input[type="checkbox"]').prop("checked", false); 
   }*/

}
function setnumberforsms(){
    var favorite = new Array(); // var favorite=[];
       var chk=0; var mno; //alert(oc_caller_id);
                $.each($("input[name='selected[]']:checked"), function(){            
                    mno=$(this).val();   // favorite.push($(this).val());
                    if(mno.length == 0 || mno === "undefined"  || typeof(mno) === "undefined" || mno==''){chk=1;}
                    else if(mno.length>0){
                        chk=2;
                       	favorite.push(mno);
                       	//favorite+=[mno]+",";
                    }
                });
            if(chk==0){alert("No Row Selected")}else{  
                
                	$("#mnumberso").val(favorite);
            }
        
            //alert(favorite.join(", "));
}

function sendsmstouser(){
     $('.loader').show(); 
    var mnos = $("#mnumberso").val(); //smstosend
    var nottitle = $("#nottitle").val();
     var smstosend = $("#smstosend").val();
     var tokanarray= mnos.split(",");
     var mnoss=JSON.stringify(tokanarray);
    	$.ajax({
					type : 'post',
					url : 'api/api.php',
					data : {'type':'0038','mnos':mnoss,'nottitle':nottitle,'smstosend':smstosend},
					beforeSend:function(){
					
					},
					success : function (res){
					     $('.loader').hide(); 
					console.log(res);
					var data  = jQuery.parseJSON(res);
					var data1  = jQuery.parseJSON(data);
                    alert("Notification Sent Total Sent: "+data1.success+" Fail: "+data1.failure);
					},error: function (jqXHR, exception){var msg=displayerror(jqXHR, exception); alert(msg); $('.loader').hide();},	
					
					
				});
    
}


function loadbanner(){
     $('.loader').show(); 
     $.ajax({
					type : 'post',
					url : 'api/api.php',
					data : {'type':'0023'},
					beforeSend:function(){
					
					},
					success : function (res){
						  $('.loader').hide(); 
						
						   if(res=='null'){
							   alert("No Records Found");
						   }else{
						       	$("#dbData").html("");
							var data  = jQuery.parseJSON(res);						
							var the_table = '<table id="table5" class="table table-striped table-bordered table-sm" cellspacing="0" width="100%"><thead><tr><th>ID</th><th>Image</th><th>Option</th></thead><tbody>';
								$.each(data, function (i, item) {

								the_table=the_table+'<tr><td>'+data[i][0]+'</td><td><img src="'+data[i][1]+'"></td><td><button onclick="deletebanner('+data[i][0]+')">Delete</button></td></tr>';
								 
							});
							the_table=the_table+"</tbody></table>"
							$("#dbData").html(the_table);
                            $('#table5').DataTable();

							   
						   }
					     },error: function (jqXHR, exception){var msg=displayerror(jqXHR, exception); alert(msg); $('.loader').hide();},	
				}); 
}
function deletebanner(sid){
         $('.loader').show(); 
    	$.ajax({
					type : 'post',
					url : 'api/api.php',
					data : {'type':'0024','sid':sid},
					beforeSend:function(){
						$("#loading").show();
					},
					success : function (res){
					    $('.loader').hide(); 
                        alert(res);
                        loadbanner();
					},error: function (jqXHR, exception){var msg=displayerror(jqXHR, exception); alert(msg); $('.loader').hide();},
				});
}
function addnewslot(){
    $('.loader').show(); 
    var SlotName=$("#SlotName").val(); 
    var SlotValue=$("#SlotValue").val(); 
   if(SlotName==''||SlotValue==''){
       alert("Please Enter Proper Details");
        $('.loader').hide(); 
   }else{
    	$.ajax({
					type : 'post',
					url : 'api/api.php',
					data : {'type':'0018','SlotName':SlotName,'SlotValue':SlotValue},
					beforeSend:function(){
					
					},
					success : function (res){
					    $('.loader').hide(); 
                        alert(res);
                        loadslot();
					},error: function (jqXHR, exception){var msg=displayerror(jqXHR, exception); alert(msg); $('.loader').hide();},
					
					
				});
   }
}
function loadslot(){
     $('.loader').show(); 
     $.ajax({
					type : 'post',
					url : 'api/api.php',
					data : {'type':'0019'},
					beforeSend:function(){
						
					},
					success : function (res){
						   $('.loader').hide(); 
							
						   if(res=='null'){
							   alert("No Records Found");
						   }else{
						       	$("#dbData").html("");
							var data  = jQuery.parseJSON(res);						
							var the_table = '<table id="table5" class="table table-striped table-bordered table-sm" cellspacing="0" width="100%"><thead><tr><th>ID</th><th>Name</th><th>Value</th><th>Option</th></thead><tbody>';
								$.each(data, function (i, item) {

								the_table=the_table+'<tr><td>'+data[i][0]+'</td><td>'+data[i][1]+'</td><td>'+data[i][2]+'</td><td><button onclick="deleteslot('+data[i][0]+')">Delete</button></td></tr>';
								 
							});
							the_table=the_table+"</tbody></table>"
							$("#dbData").html(the_table);
                            $('#table5').DataTable();

							   
						   }
					     },error: function (jqXHR, exception){var msg=displayerror(jqXHR, exception); alert(msg); $('.loader').hide();},	
				}); 
}
function loadslotCITY(){
     $('.loader').show(); 
     $.ajax({
					type : 'post',
					url : 'api/api.php',
					data : {'type':'0019'},
					beforeSend:function(){
						
					},
					success : function (res){
						   $('.loader').hide(); 
							
						   if(res=='null'){
							   alert("No Records Found");
						   }else{
						       	$("#dbData").html("");
							var data  = jQuery.parseJSON(res);						
							var the_table = '<table id="table5" class="table table-striped table-bordered table-sm" cellspacing="0" width="100%"><thead><tr><th>ID</th><th>Name</th><th>Value</th></thead><tbody>';
								$.each(data, function (i, item) {

								the_table=the_table+'<tr><td>'+data[i][0]+'</td><td>'+data[i][1]+'</td><td>'+data[i][2]+'</td></tr>';
								 
							});
							the_table=the_table+"</tbody></table>"
							$("#dbData").html(the_table);
                            $('#table5').DataTable();

							   
						   }
					     },error: function (jqXHR, exception){var msg=displayerror(jqXHR, exception); alert(msg); $('.loader').hide();},	
				}); 
}
function deleteslot(sid){
    $('.loader').show(); 
    	$.ajax({
					type : 'post',
					url : 'api/api.php',
					data : {'type':'0020','sid':sid},
					beforeSend:function(){
					
					},
					success : function (res){
					    $('.loader').hide(); 
                        alert(res);
                        loadslot();
					},error: function (jqXHR, exception){var msg=displayerror(jqXHR, exception); alert(msg); $('.loader').hide();},
					
					
				});
}
function changepassword(){
        $('.loader').show(); 
        var newpass=$("#newpass").val(); 
        if(newpass.length<5){
            alert("Enter valid New Password of At least 5 Digit Length");
            $('.loader').hide(); 
        }else{
        	$.ajax({
					type : 'post',
					url : 'api/api.php',
					data : {'type':'0021','newpass':newpass},
					beforeSend:function(){
						
					},
					success : function (res){
				    	$('.loader').hide(); 
                        alert(res);
					},error: function (jqXHR, exception){var msg=displayerror(jqXHR, exception); alert(msg); $('.loader').hide();},
					
					
				});
        }	
}
function AddContactOption(){
     $('.loader').show(); 
    var contacttypeof = $('#contacttypeof').val();
    var contactdetails = $('#contactdetails').val();
    if(contacttypeof==''||contactdetails==''){
        alert("Please Enter Proper Details");
        $('.loader').hide(); 
    }else{
		$.ajax({
					type : 'post',
					url : 'api/api.php',
					data : {'type':'0031','contacttypeof':contacttypeof,'contactdetails':contactdetails},
					beforeSend:function(){
					
					},
					success : function (res)
						{
						    $('.loader').hide(); 
						    alert(res);
						    LoadContactOption();
						},error: function (jqXHR, exception){var msg=displayerror(jqXHR, exception); alert(msg); $('.loader').hide();},	
				});
    }		
     
}
function LoadContactOption(){
    $('.loader').show(); 
        $.ajax({
					type : 'post',
					url : 'api/api.php',
					data : {'type':'0032'},
					beforeSend:function(){
						
					},
					success : function (res)
						{
						   $('.loader').hide(); 
						   if(res=='null'){
						       	$("#dbData").html("");
							   alert("No Records Found");
						   }else{
						       	$("#dbData").html("");
							var data  = jQuery.parseJSON(res);						
							var the_table = '<table border=1><tr><th>ID</th><th>Type</th><th>Detail</th><th>Option</th></tr>';
							
								$.each(data, function (i, item) {
								the_table=the_table+'<tr><td>'+data[i][0]+'</td><td>'+data[i][1]+'</td><td>'+data[i][2]+'</td><td><button onclick=DeleteContactOption('+data[i][0]+')>Delete</button></td></tr>';
								

								 
							});
							the_table=the_table+"</table>"
							$("#dbData").html(the_table);
						


						   }
					     },error: function (jqXHR, exception){var msg=displayerror(jqXHR, exception); alert(msg); $('.loader').hide();},	
				}); 
}
function DeleteContactOption(A_ID){
      var k=confirm("Do You Want To Delete?");
    if(k){
        $('.loader').show(); 
		$.ajax({
					type : 'post',
					url : 'api/api.php',
					data : {'type':'0033','A_ID':A_ID},
					beforeSend:function(){
						
					},
					success : function (res)
						{
						    $('.loader').hide(); 
						    alert(res);
						    LoadContactOption();
						},error: function (jqXHR, exception){var msg=displayerror(jqXHR, exception); alert(msg); $('.loader').hide();},	
				});
    }		
}
function MinimumOrder(){
    var MIN_ORDER = prompt("Type Minimum Order Value", "");
    if(MIN_ORDER!=null){
             $('.loader').show(); 
        	$.ajax({
					type : 'post',
					url : 'api/api.php',
					data : {'type':'0030','MIN_ORDER':MIN_ORDER},
					beforeSend:function(){
					},
					success : function (res){
					    $('.loader').hide(); 
                        alert(res);
					},error: function (jqXHR, exception){var msg=displayerror(jqXHR, exception); alert(msg); $('.loader').hide();},
					
	
				});
    }		
}
function addnewcityAdmin(){
    ///var cityName = $('#cityforuser').val();
    var cityUserName = $('#cityUserName').val();
    var cityUserPass = $('#cityUserPass').val();
     $('.loader').show(); 
    if(cityUserName=='' || cityUserPass==''){
        alert("Enter Proper Details");  $('.loader').hide(); 
    }else{
		$.ajax({
					type : 'post',
					url : 'api/api.php',
					data : {'type':'0035','cityUserName':cityUserName,'cityUserPass':cityUserPass},
					beforeSend:function(){ },
					success : function (res)
						{
						    console.log(res);
						    alert(res);
						LoadcityAdmin();
						}	
				});
    }	
     
}
function LoadcityAdmin(){
     $('.loader').show(); 
        $.ajax({
					type : 'post',
					url : 'api/api.php',
					data : {'type':'0036'},
					beforeSend:function(){},
					success : function (res)
						{
						   $('.loader').hide(); 
						   if(res=='null'){
							   alert("No Records Found");
						   }else{
						       	$("#dbData").html("");
							var data  = jQuery.parseJSON(res);						
							var the_table = '<table border=1><tr><th>ID</th><th>Name</th><th>Type</th><th>Status</th><th>DOR</th><th>Option</th></tr>';
							
								$.each(data, function (i, item) {
								the_table=the_table+'<tr><td>'+data[i][0]+'</td><td>'+data[i][1]+'</td><td>'+data[i][3]+'</td><td>'+data[i][4]+'</td><td>'+data[i][5]+'</td><td><button onclick=DeleteAdmin('+data[i][0]+')>Delete</button></td></tr>';
								

								 
							});
							the_table=the_table+"</table>"
							$("#dbData").html(the_table);
						

//slotcity
 
						   }
					     }	
				}); 
}
function DeleteAdmin(A_ID){
      $('.loader').show(); 
     var k=confirm("Do You Want To Delete");
    if(k){
		$.ajax({
					type : 'post',
					url : 'api/api.php',
					data : {'type':'0037','A_ID':A_ID},
					beforeSend:function(){
						$("#status").show();
						$("#status").html("Processing Please wait..");
					},
					success : function (res)
						{
						    $('.loader').hide(); 
						    alert(res);
						    LoadcityAdmin();
						}	
				});
    }else{ $('.loader').hide(); }
}

function loadsubcat(){
    var cat1 = $('#cat1').val(); //cat1
     $('.loader').show();
    $.ajax({
					type : 'post',
					url : 'api/api.php',
					data : {'type':'0039','cat1':cat1},
					beforeSend:function(){
					
					},
					success : function (res)
						{
					       $('.loader').hide();
						   if(res=='null'){
							    alert("No Subcategory Found");
							   	$("#subcat1").html('<option value="10101">Select Sub Category</option>');
						   }else{
						   	$("#dbData").html("");
							var data  = jQuery.parseJSON(res);						
							var the_table = '<option value="10101">Select Sub Category</option>';
								$.each(data, function (i, item) {
                                the_table=the_table+'<option value='+data[i][0]+'>'+data[i][2]+'</option>';

							});
							the_table=the_table+"</table>"
							$("#subcat1").html(the_table);
								   
						   }
					     },error: function (jqXHR, exception){var msg=displayerror(jqXHR, exception); alert(msg); $('.loader').hide(); },	
				});     

}

function addnewSubcategory(){
     $('.loader').show(); $("#addnewSubcategory1").attr("disabled", true);
    var SubCatName=$('#SubCatName').val();
    var Subcatdesc=$('#Subcatdesc').val();
    var Subcat2=$('#cat2').val();
    var Subcat_image_tmp=$('#Subcat_image_tmp').val();
    if(SubCatName=='' || Subcatdesc=='' || Subcat2==''){alert("Category Name or Image or details is blank"); $('.loader').hide(); $("#addnewSubcategory1").attr("disabled", false);}
    else{
    $.ajax({
					type : 'post',
					url : 'api/api.php',
					data : {'type':'0043', 'SubCatName':SubCatName, 'Subcatdesc':Subcatdesc, 'Subcat2':Subcat2, 'Subcat_image_tmp':Subcat_image_tmp},
					beforeSend:function(){
					},
					success : function (res){
					    $('.loader').hide(); $("#addnewSubcategory1").attr("disabled", false);
					    if(res=="Updated Sucessfully"){
					    	alert(res);
    				        $("#dbData").html("");
				            LoadAllCategory2();
					    }else{
					        alert(res);
					    }
					},error: function (jqXHR, exception){var msg=displayerror(jqXHR, exception); alert(msg); $('.loader').hide(); $("#addnewSubcategory1").attr("disabled", false);},
					
					
				});
    }
    
}

function loadsubcategory(){
    $('.loader').show();
    $.ajax({
					type : 'post',
					url : 'api/api.php',
					data : {'type':'0040'},
					beforeSend:function(){
				
					},
					success : function (res)
						{
					       $('.loader').hide();
						   if(res=='null'){
							   alert("No Records Found");
						   }else{
						   	$("#dbData").html("");
							var data  = jQuery.parseJSON(res);	var btntxt;					
							var the_table = '<table id="table5" class="table table-striped table-bordered table-sm" border=1><thead><tr><th>ID</th><!--<th>Image</th>--><th>Category</th><th>Sub-Category</th><!--<th>Descprition</th>--><th>Option</th><th>Edit</th><th>Status</th></tr></thead><tbody>';
								$.each(data, function (i, item) {
								var a=encodeURI(data[i][2]);
								var b=encodeURI(data[i][3]);
								var c=encodeURI(data[i][5]);
                                if(data[i][4]=="Enable"){btntxt="Disable"}else{btntxt="Enable"}
the_table=the_table+'<tr><td>'+data[i][0]+'</td><!--<td><img src='+data[i][5]+'  width="80px"></td>--><td>'+data[i][6]+'</td><td>'+data[i][2]+'</td><!--<td>'+data[i][3]+'</td>--><td><button onclick="updateSubCatStatus('+data[i][0]+',`'+btntxt+'`)">'+btntxt+'</button></td><td><button data-toggle="modal" data-target="#editsubcat" onclick=editsubcat('+data[i][0]+',`'+a+'`,`'+b+'`,`'+c+'`)>Edit</button></td><td>'+data[i][4]+'</td></tr>';

							});
							the_table=the_table+"</tbody></table>"
							$("#dbData").html(the_table);
							$("#table5").DataTable();
								   
						   }
					     },error: function (jqXHR, exception){var msg=displayerror(jqXHR, exception); alert(msg); $('.loader').hide(); },		
				}); 
}
function updateSubCatStatus(cat_id,sts){
      $('.loader').show();
       $.ajax({
					type : 'post',
					url : 'api/api.php',
					data : {'type':'0042', 'cat_id':cat_id,'sts':sts},
					beforeSend:function(){

					},
					success : function (res){
					    $('.loader').hide();
    			    	alert(res);
					    $("#dbData").html("");
				        loadsubcategory();
					},error: function (jqXHR, exception){var msg=displayerror(jqXHR, exception); alert(msg); $('.loader').hide();},
					
					
				});
}
function editsubcat(id,name,desc,imgk){
    var a=decodeURI(name);
    var b=decodeURI(desc);
    var c=decodeURI(imgk); //UpdateCatImg
    $("#SubCatName1").val(a);
    $("#Subcatdesc1").val(b);
    $("#subcat_id").val(id);
    $("#Subcat_image_tmp1").val(c);
    $("#AddSubCatImg1").html("<img src="+c+" width='15%' height='15%'>");

}
function UpdatenewSubcategory(){
     $('.loader').show(); $("#UpdatenewSubcategory1").attr("disabled", true);
    var SubCatName=$('#SubCatName1').val();
    var Subcatdesc=$('#Subcatdesc1').val();
    var Subcat2=$('#cat21').val();
     var subcat_id=$('#subcat_id').val();
    var Subcat_image_tmp=$('#Subcat_image_tmp1').val();
    if(SubCatName=='' || Subcatdesc=='' || Subcat2=='10101'){alert("Category Name or Image or details is blank"); $('.loader').hide(); $("#UpdatenewSubcategory1").attr("disabled", false);}
    else{
    $.ajax({
					type : 'post',
					url : 'api/api.php',
					data : {'type':'0041', 'SubCatName':SubCatName, 'Subcatdesc':Subcatdesc, 'Subcat2':Subcat2, 'Subcat_image_tmp':Subcat_image_tmp,'subcat_id':subcat_id},
					beforeSend:function(){
					},
					success : function (res){
					    $('.loader').hide(); $("#UpdatenewSubcategory1").attr("disabled", false);
					    if(res=="Updated Sucessfully"){
					    	alert(res);
    				        $("#dbData").html("");
				            loadsubcategory();
					    }else{
					        alert(res);
					    }
					},error: function (jqXHR, exception){var msg=displayerror(jqXHR, exception); alert(msg); $('.loader').hide(); $("#UpdatenewSubcategory1").attr("disabled", false);},
					
					
				});
    }
    
}
function addcouponcode(){
     $('.loader').show(); 
    var Coupon_CODE = $('#Coupon_CODE').val(); var Coupon_Value = $('#Coupon_Value').val(); var MIN_Order = $('#MIN_Order').val(); var Coupon_Remark = $('#Coupon_Remark').val();
    if(Coupon_CODE.length<4 || Coupon_Value=='' || MIN_Order==''){ alert("Please Enter Valid Details For Creating a Coupon")}else{
		$.ajax({
					type : 'post',
					url : 'api/api.php',
					data : {'type':'00388','Coupon_CODE':Coupon_CODE,'Coupon_Value':Coupon_Value,'MIN_Order':MIN_Order,'Coupon_Remark':Coupon_Remark},
					beforeSend:function(){
					
					},
					success : function (res)
						{
						     $('.loader').hide(); 
						    console.log(res);
						    alert(res);
						Loadcouponcode();
						}	
				});
    }	
     
}
function Loadcouponcode(){
     $('.loader').show(); 
        $.ajax({
					type : 'post',
					url : 'api/api.php',
					data : {'type':'00399'},
					beforeSend:function(){
						$("#loading").show();
						$("#loading").html("Loading Please wait..");
					},
					success : function (res)
						{
						   $('.loader').hide(); 
							$("#loading").hide();
						   if(res=='null'){
							   alert("No Records Found");
						   }else{
						       	$("#dbData").html("");
							var data  = jQuery.parseJSON(res);						
							var the_table = '<table border=1><tr><th>ID</th><th>Code</th><th>Value</th><th>Minumum Order</th><th>Remark</th><th>DOR</th><th>STATUS</th><th>OPTION</th></tr>';
							var btntxt;
								$.each(data, function (i, item) {
								    if(data[i][6]=="Enable"){btntxt="Disable"}else{btntxt="Enable"}
								the_table=the_table+'<tr><td>'+data[i][0]+'</td><td>'+data[i][1]+'</td><td>'+data[i][2]+'</td><td>'+data[i][3]+'</td><td>'+data[i][4]+'</td><td>'+data[i][5]+'</td><td>'+data[i][6]+'</td><td><button onclick="Statuscouponcode('+data[i][0]+',`'+btntxt+'`)">'+btntxt+'</button><br><button onclick="Delcouponcode('+data[i][0]+')">Delete</button></td></tr>';
								

								 
							});
							the_table=the_table+"</table>"
							$("#dbData").html(the_table);
						

//slotcity
 
						   }
					     }	
				}); 
}
function Statuscouponcode(A_ID,sts){
     $('.loader').show(); 
     var k=confirm("Do You Want To " +sts);
    if(k){
		$.ajax({
					type : 'post',
					url : 'api/api.php',
					data : {'type':'00404','A_ID':A_ID,'sts':sts},
					beforeSend:function(){
					
					},
					success : function (res)
						{
						    $('.loader').hide(); 
						    console.log(res);
						    alert(res);
						Loadcouponcode();
						}	
				});
    }
}

function Delcouponcode(co_ID){
     $('.loader').show(); 
     var k=confirm("Do You Want To delete");
    if(k){
		$.ajax({
					type : 'post',
					url : 'api/api.php',
					data : {'type':'004040','co_ID':co_ID},
					beforeSend:function(){
					
					},
					success : function (res)
						{
						    $('.loader').hide(); 
						    console.log(res);
						    alert(res);
						Loadcouponcode();
						}	
				});
    }
}

function referAmount(){
    var MIN_ORDER = prompt("Type Refer Amount Value", "");
    if(MIN_ORDER!=null){
             $('.loader').show(); 
        	$.ajax({
					type : 'post',
					url : 'api/api.php',
					data : {'type':'003888','MIN_ORDER':MIN_ORDER},
					beforeSend:function(){
					},
					success : function (res){
					    $('.loader').hide(); 
                        alert(res);
					},error: function (jqXHR, exception){var msg=displayerror(jqXHR, exception); alert(msg); $('.loader').hide();},
					
	
				});
    }		
} 
function addtouserwallet(idu,currBal){
    var MIN_ORDER = prompt("Type Amount To Add", currBal);
    if(MIN_ORDER!=null){
             $('.loader').show(); 
        	$.ajax({
					type : 'post',
					url : 'api/api.php',
					data : {'type':'003909','MIN_ORDER':MIN_ORDER,'idu':idu},
					beforeSend:function(){
					},
					success : function (res){
					    $('.loader').hide(); 
                        alert(res);
					},error: function (jqXHR, exception){var msg=displayerror(jqXHR, exception); alert(msg); $('.loader').hide();},
					
	
				});
    }	
}
function addpincode(){
    var PIN_CODE = $('#PIN_CODE').val();
     $('.loader').show(); 
		$.ajax({
					type : 'post',
					url : 'api/api.php',
					data : {'type':'0025','PIN_CODE':PIN_CODE},
					beforeSend:function(){
						$("#status").show();
						$("#status").html("Processing Please wait..");
					},
					success : function (res)
						{
						     $('.loader').hide(); 
						    alert(res);
						Loadpincode();
						}	
				});
     
}
function Loadpincode(){
     $('.loader').show(); 
        $.ajax({
					type : 'post',
					url : 'api/api.php',
					data : {'type':'0026'},
					beforeSend:function(){
					
					},
					success : function (res)
						{
						    $('.loader').hide(); 
						   if(res=='null'){
							   alert("No Records Found");
						   }else{
						       	$("#dbData").html("");
							var data  = jQuery.parseJSON(res);						
							var the_table = '<table border=1><tr><th>ID</th><th>Code</th><th>Option</th></tr>';
							
								$.each(data, function (i, item) {
								the_table=the_table+'<tr><td>'+data[i][0]+'</td><td>'+data[i][1]+'</td><td><button onclick=Deletepincode('+data[i][0]+')>Delete</button></td></tr>';
								

								 
							});
							the_table=the_table+"</table>"
							$("#dbData").html(the_table);
						

//slotcity
 
						   }
					     }	
				}); 
}
function Deletepincode(A_ID){
     //var cityName = $('#cityName').val();
     var k=confirm("Do You Want To Delete");
    if(k){
         $('.loader').show(); 
		$.ajax({
					type : 'post',
					url : 'api/api.php',
					data : {'type':'027','A_ID':A_ID},
					beforeSend:function(){
				
					},
					success : function (res)
						{
						    $('.loader').hide(); 
						    alert(res); Loadpincode();
						}	
				});
    }
}

function openclose() {
    


   var open_close = $('#openclose').val();
   
   $.ajax({
       url     : "api/api.php",
       type    : "POST",
       data    :{'type':'001122','open_close':open_close},
       success : function (res) {
           alert(res);
           $("#dbData").html(res);
           if(res==='Booking closed') {
           $('#openclose').val("Booking open");
           $('#openclose').html("Open Booking");
           
           }else{ $('#openclose').val("Booking closed"); 
               $('#openclose').html("Close Booking"); 
           }
       }
       
   })
}



 
