<!--Author:WAR -->
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>Dashboard | Admin</title>

    <!-- Bootstrap CSS CDN -->
    <link rel="stylesheet" href="css/bootstrap.css">
    <!-- databale -->
    <!-- <script src="https://code.jquery.com/jquery-3.3.1.js"></script> -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.5/css/jquery.dataTables.min.css">
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>
<!-- databale -->

    <!-- Our Custom CSS -->
    <link rel="stylesheet" href="css/all.css">


        <link rel="stylesheet" href="css/style2.css?version=1.0">
    
    
    
<!-- ------------------------------------------------------------------ -->
    <script>
            var value = window.localStorage.getItem("Admin_login");
            if(value!='true'){
                window.location.href="index.php";
            //exit();
            }
        </script>
<script type='text/javascript'>

  function encodeImageFileAsURL() {
    var filesSelected = document.getElementById("Id_proof").files;
    if (filesSelected.length > 0) {
      var fileToLoad = filesSelected[0];
      var fileReader = new FileReader();
      fileReader.onload = function(fileLoadedEvent) {
        var srcData = fileLoadedEvent.target.result; // <--- data: base64
        var newImage = document.createElement('img');
        newImage.src = srcData;
       
               $('#image').val(srcData);
      }
      fileReader.readAsDataURL(fileToLoad);
    }
  }
  
  
</script>
<script type='text/javascript'>

  function encodeImageFileAsURL1() {
    var filesSelected = document.getElementById("p_image1").files;
    if (filesSelected.length > 0) {
      var fileToLoad = filesSelected[0];
      var fileReader = new FileReader();
      fileReader.onload = function(fileLoadedEvent) {
        var srcData = fileLoadedEvent.target.result; // <--- data: base64
        var newImage = document.createElement('img');
        newImage.src = srcData;
       
               $('#image3').val(srcData);
      }
      fileReader.readAsDataURL(fileToLoad);
    }
  }
  
  
</script>
<script type='text/javascript'>

  function encodeImageFileAsURL2() {
    var filesSelected = document.getElementById("cat_image").files;
    var flsize=$("#cat_image")[0].files[0].size;
    if(flsize>50000){ alert("Large Image Selected<br> Please Select Image under 50KB"); $("#cat_image").val(null);}
    else{
      var fileToLoad = filesSelected[0];
      var fileReader = new FileReader();
      fileReader.onload = function(fileLoadedEvent) {
        var srcData = fileLoadedEvent.target.result; // <--- data: base64
        var newImage = document.createElement('img');
        newImage.src = srcData;
        $('#cat_image_tmp').val(srcData);
        $("#AddCatImg").html("<img src="+srcData+" width='15%' height='15%'>");
      }
      fileReader.readAsDataURL(fileToLoad);
    }
  }
  
  
</script>
<script type='text/javascript'>

  function encodeImageFileAsURL3() {
    var filesSelected = document.getElementById("cat_image1").files;
    if (filesSelected.length > 0) {
      var fileToLoad = filesSelected[0];
      var fileReader = new FileReader();
      fileReader.onload = function(fileLoadedEvent) {
        var srcData = fileLoadedEvent.target.result; // <--- data: base64
        var newImage = document.createElement('img');
        newImage.src = srcData;
       
               $('#cat_image_tmp1').val(srcData);
      }
      fileReader.readAsDataURL(fileToLoad);
    }
  }
  function encodeImageFileAsURLSub() {
    var filesSelected = document.getElementById("Subcat_image").files;
    var flsize=$("#Subcat_image")[0].files[0].size;
    if(flsize>50000){ alert("Large Image Selected<br> Please Select Image under 50KB"); $("#Subcat_image").val(null);}
    else{
      var fileToLoad = filesSelected[0];
      var fileReader = new FileReader();
      fileReader.onload = function(fileLoadedEvent) {
        var srcData = fileLoadedEvent.target.result; // <--- data: base64
        var newImage = document.createElement('img');
        newImage.src = srcData;
        $('#Subcat_image_tmp').val(srcData);
        $("#AddSubCatImg").html("<img src="+srcData+" width='15%' height='15%'>");
      }
      fileReader.readAsDataURL(fileToLoad);
    }
  }
  
  function encodeImageFileAsURLSub1() {
    var filesSelected = document.getElementById("Subcat_image1").files;
    var flsize=$("#Subcat_image1")[0].files[0].size;
    if(flsize>50000){ alert("Large Image Selected<br> Please Select Image under 50KB"); $("#Subcat_image1").val(null);}
    else{
      var fileToLoad = filesSelected[0];
      var fileReader = new FileReader();
      fileReader.onload = function(fileLoadedEvent) {
        var srcData = fileLoadedEvent.target.result; // <--- data: base64
        var newImage = document.createElement('img');
        newImage.src = srcData;
        $('#Subcat_image_tmp1').val(srcData);
        $("#AddSubCatImg1").html("<img src="+srcData+" width='15%' height='15%'>");
      }
      fileReader.readAsDataURL(fileToLoad);
    }
  }

  
</script>


<!-- ------------------------------------------------------------------------------------- -->




</head>


<body>
  <div class="loader">
    <div class="load">
        <i class="fa fa-spinner fa-spin"></i>
    </div>
  </div>

<div class="wrapper">
        <!-- Sidebar  -->
        <nav id="sidebar">
            <div class="sidebar-header">
                <h3>Admin</h3>
            </div>
            <ul class="list-unstyled components">
                <li class="active">
                    <a href="#">Dashboard</a>
                </li>
                <li>
                    <a href="#" onclick="LoadAllLecture()">All Lecture</a>
                </li>
                   <li>
                    <a href="#" onclick="AllUSerLoad()">All Students</a>
                </li>
                  
                   <li>
                    <a href="#" onclick="LoadAllCourse2()">All Course</a>
                </li>
                <li>
                    <a href="#" data-toggle="modal" data-target="#myModal">Add Lecture</a>
                </li>
                <li>
                    <a href="#" data-toggle="modal" data-target="#myModal2">Add Course</a>
                </li>
                <!-- <li>
                    <a href="#" onclick="loadbanner()">All Banners</a>
                </li> -->
                <li>
                    <a href="#" data-toggle="modal" data-target="#myModal6">Add Contact</a>
                </li>   
                <li>
                    <a href="#" onclick="LoadContactOption()">Load Contact</a>
                </li>   
                 <li>
                    <a href="#" data-toggle="modal" data-target="#myModal4">Change Password</a>
                </li>
                <!-- <li>
                    <a href="#" onclick="MinimumOrder()">Minimum Order</a>
                </li> -->
                 <!-- <li>
                    <a href="#" data-toggle="modal" data-target="#myModal5" >Add Delivery Boy</a>
                </li>  
                <li > -->
                    <!-- <a href="#" onclick="LoadcityAdmin()">All Delivery Boy</a>
                </li>   -->
                <!--<li>
                    <a href="#" onclick="referAmount()">Refer Order</a>
                </li>-->
                <li>
                     <a class="nav-link" href="#" data-toggle="modal" data-target="#myModal7">Add Coupon</a>
                 </li>  
                <li>
                    <a class="nav-link" href="#" onclick="Loadcouponcode()">ALL Coupon</a>
                 </li> 
                <!--<li>
                                <a class="nav-link" href="#" data-toggle="modal" data-target="#pincodefilter">Add Pin Code</a>
                 </li>  
                            
                <li>
                                <a class="nav-link" href="#" onclick="Loadpincode()">ALL Pin Code</a>
                </li> -->

                <!--<li>
                    <a href="#" data-toggle="modal" data-target="#myModalSubCat">Add Sub Category</a>
                </li>
                <li>
                    <a href="#" onclick="loadsubcategory()">All Sub Category</a>
                </li>-->
                <br>
            </ul>

            <ul class="list-unstyled CTAs">
                <!--<li>
                    <a href="http://softwarezsolution.com/app/growcity/Growcity-release.2406540.71.apk" class="download"><i class="fas fa-download"></i> Download App</a>
                </li>-->
                <br>
                <li>
                    <a href="" class="download" onclick="AdminLogout()"><i class="fas fa-sign-out-alt"></i> Logout</a>
                </li>
            </ul>
        </nav>

        <!-- Page Content  -->
        <div id="content">

       <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
          
                <div class="container-fluid">

                    <button type="button" id="sidebarCollapse" class="btn">
                        <i class="fas fa-align-justify fa-2x" style="color:#fff;"></i>
                    </button>
          

                    <div class="collapse navbar-collapse">
                        <ul class="nav navbar-nav ml-auto">
                            <!-- <li class="nav-item active">
                                <a class="nav-link" href="#" data-toggle="modal" data-target="#myModal5" >Add Delivery Boy</a>
                            </li>   -->
                            <!-- <li class="nav-item active">
                                <a class="nav-link" href="#" onclick="LoadcityAdmin()">All Delivery Boy</a>
                            </li>   -->
                            <li class="nav-item active">
                                <a class="nav-link" href="#" onclick="AdminLogout()">Logout</a>
                            </li>                    
                        </ul>
                    </div>
                </div>
            </nav>

            <div class="container" style="padding:0;margin:0">
            <div class="row">
    <div class="col-sm-4 col-6"><button class="btn-all btn-alp" onclick="LoadAllLecture2()"><i class="fas fa-boxes"></i>All Lecture</button></div>
     <div class="col-sm-4 col-6"><button class="btn-all btn-alu" onclick="AllUSerLoad();"><i class="fas fa-users"></i> All Students</button></div>
      <!-- <div class="col-sm-3 col-6"><button class="btn-all btn-alo" onclick="LoadAllOrders()"><i class="fas fa-dolly"></i> All Order</button></div> -->
     <div class="col-sm-4 col-6"><button class="btn-all btn-alc"  onclick="LoadAllCourse2()"><i class="fas fa-list"></i> All Course</button></div>
    </div>
    <br>
            <div class="row">
    <div class=" col-6"><button class="btn-all btn-ap" data-toggle="modal" data-target="#myModal"><i class="fas fa-box-open"></i> Add Lecture</button></div>
     <div class=" col-6"><button class="btn-all btn-ac" data-toggle="modal" data-target="#myModal2"><i class="fas fa-tags"></i> Add Course</button></div>
<!-- <div class="col-sm-3 col-6"><button class="btn-all btn-app" data-toggle="modal" data-target="#myModal3" onclick=""><i class="fas fa-download"></i> Add New Slot</button></div> -->
     <!-- <div class="col-sm-3 col-6"><button class="btn-all btn-app" onclick="loadslot()"><i class="fas fa-download"></i> Current Slot</button></div> -->

    </div>
    <br>
    <!-- <div class="row">
    <div class="col-sm-3 col-6"><button class="btn-all btn-alu" id="openclose" onclick="openclose();" value="Booking closed"><i class="fas fa-booking"></i> close/open booking </button></div>
</div> -->
<br>
    <!-- <div class="row">
       <div class="col-sm-6 col-12">
           <div class="input-group">
  <div class="input-group-prepend">
    <span class="input-group-text" style="background-color:#364251;color: #fff" onclick="AddNewBanner()"  id="addbnr">Upload Banner</span>
  </div>
  <div class="custom-file">
    <input type="file" class="custom-file-input" id="p_image1" name="p_image1" aria-describedby="inputGroupFileAddon01" onchange="encodeImageFileAsURL1();">
    <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
  </div>
</div></div>
        <input type="hidden" id="image3"> -->

     <!--<div class="col-sm-6 col-12 view_o">
    <div class="input-group mb-3">
  <input type="text" class="form-control" id="date" name="date" placeholder="mm/dd/yyyy">
  <div class="input-group-append">
    <span style="background-color:#364251;color: #fff" class="input-group-text" id="basic-addon2" onclick="ViewMyDateOrder()">View Order</span>
  </div>
</div>
</div> -->
       </div>

       
       <br>
       <div class="row">
           <div class="col-sm-12">
       <div id="loading"></div>
           <div id="dbData"></div></div>
       </div></div>

    </div>






  <!--   ---------------------------------------------------------------------------------------------------------------------------------------- -->


   
    </div>
  </div>

  <div data-role="footer">
    
  </div>
</div>

<!-- Modal for Products -->
<div id="myModal1" class="modal fade" role="dialog">
  <div class="modal-dialog">
  <!--  <script src="js/myscript.js"></script>-->
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Lecture</h4>
      </div>
      <div class="modal-body">
        <div>
                 <div id="imgfordisplay"></div>
                <p id="showbiggerimage"></p>         
            
        </div>    
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
<!--End of products Modal-->

<!-- Modal for Product Addition signup-->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">
  <!--  <script src="js/myscript.js"></script>-->
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Add New Lecture</h4>
      </div>
      <div class="modal-body">
        <div>
        <form enctype="multipart/form-data" id="lecform" >    
            <input type="hidden" placeholder="type" id="type" name="type" class="form-control"><br>
            <input type="hidden" placeholder="type" id="Admin_id" name="Admin_id" class="form-control"><br>
           <Select id="cat1" name="cat1" class="form-control"></select><br>
            <input type="text" placeholder="Title" id="Title" name="Title" class="form-control"><br>
            <select name="lectype" id="lectype" class="form-control">
              <option value="">Select type</option>
              <option value="video">Video</option>
              <option value="assignment">Assignment</option>
            </select><br>
            <textarea placeholder="Descprition" id="Descprition" name="Descprition" class="form-control"></textarea><br>
            <input type="text" placeholder="Content" id="Content" name="Content" class="form-control"><br>
             

                <div id="status"></div>
            <a href="#" class="ui-btn btn-primary btn-block a_product" id="addprodu-btn" onclick="AddNewLecture()">Add Lecture</a>
        </form>
        </div>    
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
    <!--End of model-->


  </div>
</div>
<!--End of product Addition Modal-->



<!-- Modal for category
<div id="myModal5" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <!-- <div class="modal-content"> -->
      <!-- <div class="modal-header"> -->
        <!-- <button type="button" class="close" data-dismiss="modal">&times;</button> -->
        <!-- <h4 class="modal-title">Add  Delivery Boy</h4> -->
      <!-- </div> -->
      <!-- <div class="modal-body"> -->
        <!-- <div> -->
                <!-- <input type="text" placeholder="User Name" id="cityUserName" name="cityUserName" class="form-control"><br> -->
                <!-- <input type="text" placeholder="User Password" id="cityUserPass" name="cityUserPass" class="form-control"><br> -->
                <!-- <a href="#" class="btn-primary btn-block a_category" onclick="addnewcityAdmin()" >Add </a> -->
         
        <!-- </div>     -->
      <!-- </div> -->
      <!-- <div class="modal-footer"> -->
        <!-- <button type="button" class="btn btn-default" data-dismiss="modal">Close</button> -->
      <!-- </div> -->
    <!-- </div> --> 
    <!--End of model-->


  </div>
</div>
<!--End of categiry Modal-->





<!-- Modal for category-->
<div id="myModal2" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!--<script src="js/myscript.js"></script>-->
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Add New Course</h4>
      </div>
      <div class="modal-body">
        <div>
                <div id="AddCatImg"></div>
                Image<input type="file" placeholder="image" id="cat_image" name="cat_image"  class="form-control" onchange="encodeImageFileAsURL2();"><br>
                <input type="hidden" name="cat_image_tmp" id="cat_image_tmp" disabled>
                <input type="text" placeholder="Course Name" id="CatName" name="CatName" class="form-control"><br>
                <input type="text" placeholder="Descprition" id="catdesc" name="catdesc" class="form-control"><br>
                <input type="text" placeholder="Duration" id="CatDuration" name="Duration" class="form-control"><br>
                <input type="text" placeholder="Course price" id="Catcp" name="catcp" class="form-control"><br>
                <input type="text" placeholder="sale price" id="Catsp" name="catsc" class="form-control"><br>


                

                <div id="status1"></div>
            <a href="#" class="btn-primary btn-block a_category" onclick="addnewcourse()" >Add Course</a>
         
        </div>    
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
    <!--End of model-->


  </div>
</div>
<!--End of categiry Modal-->


<!-- Modal for Slot-->
<!-- <div id="myModal3" class="modal fade" role="dialog">
  <div class="modal-dialog"> -->
   <!-- <script src="js/myscript.js"></script>-->
    <!-- Modal content-->
    <!-- <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Add New Slot</h4>
      </div>
      <div class="modal-body">
        <div>
               -->
                <!-- <input type="text" placeholder="Slot Name" id="SlotName" name="SlotName" class="form-control"><br>
                <input type="number" placeholder="Value (0 for Free)" id="SlotValue" name="SlotQty" maxlength="4" class="form-control"><br>
                <div id="statusslot"></div>
            <a href="#" class="btn-primary btn-block a_category" onclick="addnewslot()" id="">Add Slot</a>
         
        </div>    
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div> -->
    <!--End of model-->


  </div>
</div>
<!--End of Slot Modal-->




<!-- Modal for Slot-->
<div id="myModal4" class="modal fade" role="dialog">
  <div class="modal-dialog">
   <!-- <script src="js/myscript.js"></script>-->
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Update Password</h4>
      </div>
      <div class="modal-body">
        <div>
              
                <input type="text" placeholder="New Password" id="newpass" name="newpass" class="form-control"><br>
                <a href="#" class="btn-primary btn-block a_category" onclick="changepassword()" id="">Change Password</a>
         
        </div>    
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
    <!--End of model-->


  </div>
</div>





<!-- Update Products Modal content-->

<div id="myModalp" class="modal fade" role="dialog">
  <div class="modal-dialog">
   <!-- <script src="js/myscript.js"></script>-->

    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Update Lecture</h4>
      </div>
      <div class="modal-body">
        <div>
        <form enctype="multipart/form-data">    
            <input type="hidden" placeholder="type" id="type1" name="type" class="form-control"><br>
            Title<br><input type="text" placeholder="title" id="title" name="title" class="form-control"><br>
            Descprition<br><input type="text" placeholder="Descprition" id="editDescprition" name="editDescprition" class="form-control"><br>
            <select name="editlectype" id="editlectype" class="form-control">
              <option value="">Select type</option>
              <option value="video">Video</option>
              <option value="assignment">Assignment</option>
            </select><br>
           
            Content<br><input type="text" placeholder="content" id="editcontent" name="editcontent" class="form-control"><br>
           
            <!--onchange="encodeImageFileAsURL();"-->
                <div id="status"></div>
            <a href="#" class="btn-primary btn-block" id="addprodu" onclick="UpdatemyLecture()">Update Lecture</a>
        </form>
        </div>    
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
    <!--End of model-->

<!-- Modal for category-->
<div id="myModal9" class="modal fade" role="dialog">
  <div class="modal-dialog">
  <!--  <script src="js/myscript.js"></script>-->
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">SEND Notification</h4>
      </div>
      <div class="modal-body">
        <div>
              
               
                <input type="hidden" placeholder="ID's" id="mnumberso" name="mnumberso" class="form-control" disabled><br>
                <input type="text" placeholder="Title" id="nottitle" name="nottitle" class="form-control" ><br>
                <textarea class="form-control" id="smstosend"  placeholder="Type Your SMS Here"></textarea><br>
                <div id="status1"></div>
            <a href="#" class="btn-primary btn-block a_category" onclick="sendsmstouser()" id="sendsms-btn">SEND</a>
         
        </div>    
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
    <!--End of model-->


  </div>
</div>
<!--End of categiry Modal-->





<!-- Modal for category-->
<div id="myModal6" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Add Contact Details</h4>
      </div>
      <div class="modal-body">
        <div>
               
                <select id="contacttypeof" class="form-control"> <br>
                    <option value="Email">Email</option>
                    <option value="Mobile">Mobile</option>
                    <option value="Whatsapp">Whatsapp</option>
                <select> <br> 
                <input type="text" placeholder="Detail" id="contactdetails" name="contactdetails" class="form-control"><br>
                <a href="#" class="btn-primary btn-block a_category" onclick="AddContactOption()" >Add Contact</a>
         
        </div>    
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
    <!--End of model-->


  </div>
</div>
<!--End of categiry Modal-->


<!-- Update cat Modal content-->

<div id="myModalp3" class="modal fade" role="dialog">
  <div class="modal-dialog">
  <!--  <script src="js/myscript.js"></script>-->

    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Update Course</h4>
      </div>
      <div class="modal-body">
        <div>
            <div id="UpdateCatImg"></div>
            <input type="hidden" placeholder="Name" id="catid3" name="" class="form-control"><br>
            Image<input type="file" placeholder="image" id="cat_image1" name="cat_image1"  class="form-control" onchange="encodeImageFileAsURL3();"><br>
            <input type="hidden" name="cat_image_tmp1" id="cat_image_tmp1" disabled>
            Course Name<br><input type="text" placeholder="Course Name" id="Course Name" name="Course Name" class="form-control"><br>
            Descprition<br><input type="text" placeholder="Descprition" id="Descprition" name="Descprition" class="form-control"><br>
            Duration<br><input type="text" placeholder="Duration" id="Duration" name="Duration" class="form-control"><br>
            Course price<br><input type="text" placeholder="Course price" id="Course price" name="Course price" class="form-control"><br>
            Sale price<br><input type="text" placeholder="Sale price" id="Sale price" name="Sale price" class="form-control"><br>
            
                <div id="status3"></div>
            <a href="#" class="btn-primary btn-block" id="Updatecat2btn" onclick="Updatecat2()">Update Course</a>
        </div>    
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
    <!--End of model-->
    
    <!-- Modal for subcategory-->
<div id="myModalSubCat" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!--<script src="js/myscript.js"></script>-->
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
       <!-- <h4 class="modal-title">Add New Sub Category</h4>-->
      </div>
      <div class="modal-body">
        <div>
                <!--<div id="AddSubCatImg"></div>
                Image<input type="file" placeholder="image" id="Subcat_image" name="Subcat_image"  class="form-control" onchange="encodeImageFileAsURLSub();"><br>
                <input type="hidden" name="Subcat_image_tmp" id="Subcat_image_tmp" disabled>-->
                <input type="text" placeholder="Sub Category Name" id="SubCatName" name="SubCatName" class="form-control"><br>
                <!--<input type="text" placeholder="Descprition" id="Subcatdesc" name="SubCatQty" class="form-control"><br>-->
                <select id="cat2" name="cat2" class="form-control"><option value="10101">Select Course</option></select><br>
                <div id="status1"></div>
            <a href="#" class="btn-primary btn-block a_category" onclick="addnewSubcategory()" id="addnewSubcategory1">Add SubCourse</a>
         
        </div>    
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
    <!--End of model-->
  </div>
</div>
<!--End of categiry Modal-->




<!-- Modal for edit subcategory-->
<div id="editsubcat" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!--<script src="js/myscript.js"></script>-->
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <!--<h4 class="modal-title">Update New Sub Category</h4>-->
      </div>
      <div class="modal-body">
        <div>
                <div id="AddSubCatImg1"></div>
                Image<input type="file" placeholder="image" id="Subcat_image1" name="Subcat_image1"  class="form-control" onchange="encodeImageFileAsURLSub1();"><br>
                <input type="hidden" name="Subcat_image_tmp1" id="Subcat_image_tmp1" disabled>
                 <input type="hidden" name="subcat_id" id="subcat_id" disabled>
                <input type="text" placeholder="Sub Category Name" id="SubCatName1" name="SubCatName1" class="form-control"><br>
                <input type="text" placeholder="Descprition" id="Subcatdesc1" name="SubCatQty1" class="form-control"><br>
                <select id="cat21" name="cat21" class="form-control"><option value="10101">Select Category</option></select><br>
                <div id="status1"></div>
            <a href="#" class="btn-primary btn-block a_category" onclick="UpdatenewSubcategory()" id="UpdatenewSubcategory1">Update SubCategory</a>
         
        </div>    
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
    <!--End of model-->
  </div>
</div>
<!--End of categiry Modal-->


<!-- Modal for category-->
<div id="myModal7" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Add Coupon Code</h4>
      </div>
      <div class="modal-body">
        <div>
                <input type="text" placeholder="Coupon CODE*" id="Coupon_CODE" name="Coupon_CODE" class="form-control"><br>
                <input type="text" placeholder="Coupon Value*" id="Coupon_Value" name="Coupon_Value" class="form-control"><br>
                <input type="text" placeholder="Minumun Order*" id="MIN_Order" name="Minumun_Order" class="form-control"><br>
                <input type="text" placeholder="Coupon Remark" id="Coupon_Remark" name="Coupon_Remark" class="form-control"><br>
                <a href="#" class="btn-primary btn-block a_category" onclick="addcouponcode()" >Add Coupon</a>
         
        </div>    
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
    <!--End of model-->


  </div>
</div>
<!--End of categiry Modal-->


<!-- Modal for category-->
<div id="pincodefilter" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Add Area/Pin Code</h4>
      </div>
      <div class="modal-body">
        <div>
                <input type="text" placeholder="PIN CODE/Area" id="PIN_CODE" name="PIN_CODE" class="form-control"><br>
                <a href="#" class="btn-primary btn-block a_category" onclick="addpincode()" >Add Pin</a>
         
        </div>    
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
    <!--End of model-->


  </div>
</div>
<!--End of categiry Modal-->


<!-- <script src="https://code.jquery.com/jquery-3.7.0.js" integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM=" crossorigin="anonymous"></script> -->
    <!-- jQuery CDN - Slim version (=without AJAX) -->
    <!-- Bootstrap JS -->
    <script src="js/jquery.min.js"></script
    <script src="js/bootstrap.js"></script>
    <script src="js/all.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script>
    <script src="js/myscript.js"></script>
   <script type="text/javascript">
      /*
       $(document).ready(function () {
$('#table1').DataTable();
$('.dataTables_length').addClass('bs-select');
});
*/
   </script>


    <script type="text/javascript">
        $(document).ready(function () {

    $('#sidebarCollapse').on('click', function () {
        $('#sidebar').toggleClass('active');
    });

});

</script>

<script>
    // $('.loader').show();
    $(document).ready(function(){
      var date_input=$('input[name="date"]'); //our date input has the name "date"
      var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
      var options={
        format: 'mm/dd/yyyy',
        container: container,
        todayHighlight: true,
        autoclose: true,
      };
      date_input.datepicker(options);
    })
</script>

<script>
LoadAllCourse();
</script>

<!-- -------------------------------------</html>