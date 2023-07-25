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
    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>
<!-- databale -->

    <!-- Our Custom CSS -->
    <link rel="stylesheet" href="css/all.css">


        <link rel="stylesheet" href="css/style2.css?version=1.0">
    
    
    
<!-- ------------------------------------------------------------------ -->
    <script src="js/myscript.js"></script>
    <script>
            var value = window.localStorage.getItem("Admin_login");
            if(value!='true'){
                window.location.href="index.php";
            //exit();
            }
            loadbill();
        </script>



</head>


<body>
<div class="bill-section">
    <h4>BetterBasket</h4>
<table border=1>
    <tr><td>Bill#</td> <td id="billid"></td></tr>
    <tr><td>Name</td><td id="name"></td></tr>
     <tr><td>Mobile</td><td id="mobile"></td></tr>
    <tr><td>Address</td><td id="address">4Th Floor Rospa Tower Main Road Ranchi</td></tr>
    <tr><td>Date</td><td id="dateoforder">12/12/2020</td></tr>    
    <tr><td>Delivery Type</td><td id="delivery_type">Express</td></tr>    
    <tr><td>Order Status</td><td id="order_type">Delivered</td></tr>    
    <tr><td>Order Total</td><td id="total">Delivered</td></tr>    

</table>  
<div class="product-head">
			--------------------------Products--------------------------
</div>
<div id="showbiggerimage"></div>
<table border=1>

</table>  
</div>
        <!-- jQuery CDN - Slim version (=without AJAX) -->
    <!-- Bootstrap JS -->
    <script src="js/bootstrap.js"></script>


    <script src="js/all.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>

    
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


<!-- --------------------------------------------------------------------------------------------------------------------------------------------------- -->



</body>

</html>