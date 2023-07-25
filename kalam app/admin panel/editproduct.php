<html>
    <head>
          <!-- Bootstrap CSS CDN -->
    <link rel="stylesheet" href="css/bootstrap.css">
        <!-- databale -->
    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>
<!-- databale -->

    <!-- Our Custom CSS -->
    <link rel="stylesheet" href="css/all.css">


        <link rel="stylesheet" href="css/style2.css?version=1.0">
        <script src="js/myscript.js"></script>
        <style>
            #qwert
            {
                border-style:dotted;
                margin-top:20px;
                padding-top:20px;
            }
        </style>

    </head>
    <body>
        <div class="row">
              <div class="col-md-3"></div>
              <div class="col-md-6" id="qwert">
  <form enctype="multipart/form-data">    
            <input type="hidden" placeholder="type" id="type" name="type" class="form-control">
            <input type="hidden" placeholder="type" id="type1" name="type1" class="form-control">
            Select Category <br>
            <Select id="cat1" name="cat1" class="form-control"></select><br>
            <!--<Select id="cat1" name="cat1" class="form-control" onchange="loadsubcat()"></select><br>
            <Select id="subcat1" name="subcat1" class="form-control" ></select><br>-->

            Name<br><input type="text" placeholder="Name" id="Name" name="Name" class="form-control"><br>
            Quantity<br><input type="text" placeholder="Quantity(Eg 1 Pc)" id="Qty" name="Qty" class="form-control"><br>
            Price<br><input type="text" placeholder="Price" id="Price" name="Price" class="form-control"><br>
            Fake Price<input type="number" placeholder="Fake Price" id="fakePrice" name="fakePrice" class="form-control"><br>
            Discrption<br><textarea placeholder="Discrption" id="Discrption" name="Discrption" class="form-control"></textarea><br>
             Image<input type="file" placeholder="image" id="p_image" name="p_image"  class="form-control"><br>
            <input type="hidden" name="p_image_tmp" id="p_image_tmp" disabled>
            <input type="hidden" name="curr_image" id="curr_image" >
                <div id="currimg1"></div>

                <div id="status"></div>
            <a href="#" class="btn-primary btn-block" id="addprodu" onclick="Updatemyproduct()">Update Product</a>
        </form>
        </div>
              <div class="col-md-3"></div>
        </div>
        <script>
loadpro();
LoadAllCategory();
</script>
     </body>
</html>