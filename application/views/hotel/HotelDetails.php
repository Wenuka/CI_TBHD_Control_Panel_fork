
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 2 | Dashboard</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="../../assets/bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../assets/dist/css/AdminLTE.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
  folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="../../assets/dist/css/skins/_all-skins.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="../../assets/plugins/iCheck/flat/blue.css">
  <!-- Morris chart -->
  <link rel="stylesheet" href="../../assets/plugins/morris/morris.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="../../assets/plugins/jvectormap/jquery-jvectormap-1.2.2.css">
  <!-- Date Picker -->
  <link rel="stylesheet" href="../../assets/plugins/datepicker/datepicker3.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="../../assets/plugins/daterangepicker/daterangepicker-bs3.css">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="../../assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
  <link href="../../assets/dist/css/bootstrap-dialog.css" rel='stylesheet' type='text/css'/>

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
  <style type="text/css">
  form {
    &.is-readonly {
      .btn-save {
        display: none;
      }
      input,textarea{
        &[disabled] {
          cursor: text;
          background-color: #fff;
          border-color: transparent;
          outline-color: transparent;
          box-shadow: none;
        }
      }
    }
    &.is-editing { 
      .btn-edit{
        display: none;
      }
    }
  }
  </style>
</head>
<body class="hold-transition skin-blue sidebar-mini">


  <div class="wrapper">
    <header class="main-header">
      <!-- Logo -->  
      <!-- Header Navbar: style can be found in header.less -->
      <?php include 'hotelTopMost.php';?>
    </header>
    <!-- Left side column. contains the logo and sidebar -->
    <?php include 'hotelSidebar.php';?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper" style="background-color:rgb(235, 235, 235);">
      <!-- Content Header (Page header) -->
      <section class="content-header" style="padding-right:5%;padding-left:5%;padding-top:5%;">
          <h1 style="font-weight:bold;font-size: 2em;">
          Edit Property Details
         <small>Control panel</small>
        </h1>
        <ol class="breadcrumb">
          <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
          <li class="active">Edit Details</li>
        </ol>
      </section>
      <!-- Main content -->
      <section class="content" style="padding-right:5%;padding-left:5%;">
        <div style="background:white;padding: 20px;box-shadow: 0 0px 8px 0 rgba(0, 0, 0, 0.06), 0 1px 0px 0 rgba(0, 0, 0, 0.02);-webkit-border-radius: 5px;border-radius: 5px;">
          <h2 style="padding: 6px 15px 6px 15px;margin: 1px;font: bold 15px arial, sans-serif;color: #464646;margin-bottom: 20px;background: linear-gradient(to bottom, rgba(250,250,250,1) 0%, rgba(232,232,232,1) 100%);">Hotel Description</h2>
          <div class="small-box" id="hotelDes" style="box-shadow:none;">
            <div style="background: white;" >
              <div class="row">
                <div class="col-md-12">
                  <div class="box box-info" style="border-color:gray;">
                    <div class="box-body pad" style="color: black;">
                      <form class="is-readonly" method="POST" action="<?php echo site_url(); ?>/EditDetailsController/updateHotelDescription" id="form2" role="form" data-toggle="validator">
                       <textarea id="editor1" name="editor1" style="width: 100%;" rows="8" disabled><?php echo $data2->listing_desc ?></textarea>
                       <div class ="row" style="margin-top:2%;">
                        <button type="button" id="save_btn" class="btn btn-default btn-lg btn-save js-save" style='float:right;background-color: #222d32;color:white;' disabled>Save</button>
                        <button type="button" id="edit_btn" class="btn btn-default btn-lg btn-edit js-edit" style='float:right;background-color:#222d32;color:white;'>Edit</button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <h2 style="padding: 6px 15px 6px 15px;margin: 1px;font: bold 15px arial, sans-serif;color: #464646;margin-bottom: 20px;background: linear-gradient(to bottom, rgba(250,250,250,1) 0%, rgba(232,232,232,1) 100%);">Basic Facilities</h2>
        <div class="small-box" id="hotelDes" style="box-shadow:none;">
          <div style="background: white;" >
            <div class="row"  >
              <div class="col-md-12">
                <div class="box box-info" style="border-color:gray;">
                  <div class="box-body pad">
                    <form class="is-readonly" method="POST" action="<?php echo site_url(); ?>/EditDetailsController/updateFacilities" id="form1" role="form" data-toggle="validator">
                     <div class="row" style="color:black;font-size: 1.2em;" >
                      <br>
                      <div class ='col-md-12'>
                        <?php
                        $s = 0;
                        $y = -1;
                        $facilities = array('Wifi', 'TV', 'Room Service', 'Laundry Service','Parking','Beverages','Lobby','Restaurant');
                        $data = json_decode($data2->main_facilities, TRUE);

                        while ($y < sizeof($facilities) - 1) {
                          $y++;


                          if (in_array($facilities[$y], $data)) {

                            ?>

                            <div class ="col-md-4" style="text-align: left;">

                              <label>
                                <input type="checkbox" name="check_list[]" checked disabled="true"   value="<?php echo $facilities[$y] ?>"><?php echo $facilities[$y] ?>
                              </label>
                            </div>
                            <?php } else { ?>
                            <div class ="col-md-4" style="text-align: left;">
                              <label>
                                <input type="checkbox" name="check_list[]" disabled="true"   value="<?php echo $facilities[$y] ?>"><?php echo $facilities[$y] ?>
                              </label>
                            </div>
                            <?php } if (($y + 1) % 3 == 0) { ?>
                            <br><br>
                            <?php } ?>
                            <?php }
                            ?>
                          </div>        
                        </div>
                        <div class ="row" style="margin-top:2%;">

                         <button type="button" id="save_btn_fac" class="btn btn-default btn-lg btn-save js-save" style='float:right;background-color: #222d32;color:white;' disabled>Save</button>
                         <button type="button" id="edit_btn_fac" class="btn btn-default btn-lg btn-edit js-edit" style='float:right;background-color:#222d32;color:white;'>Edit</button>

                       </div>

                     </form>
                   </div>
                 </div>
               </div>
             </div>
           </div>
         </div>
       </div>
     </section>

     <!-- /.content -->





     <!-- jQuery 2.2.0 -->
     <script src="../../assets/plugins/jQuery/jQuery-2.2.0.min.js"></script>
     <!-- jQuery UI 1.11.4 -->
     <script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
     <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
     <script>
     $.widget.bridge('uibutton', $.ui.button);
     </script>
     <!-- Bootstrap 3.3.6 -->
     <script src="../../assets/bootstrap/js/bootstrap.min.js"></script>
     <!-- FastClick -->
     <script src="../../assets/plugins/fastclick/fastclick.js"></script>
     <script src="../../assets/dist/js/validator.min.js"></script>

     <script>
     function setIgnore(){
       $.ajax({
        type : 'POST',
        data : 'roomid='+val+'&roomquantitybed='+quantity1+'&roomquantitybreakfast='+quantity2,
        url : "<?php echo base_url(); ?>index.php/HotelController/setRooms",
        dataType: 'json',
        success :   function(data){}
      });
     }
     $(document).ready(function(){

      $('#edit_btn_fac').on('click', function(){

        var $form = $('#form1');
        $form.removeClass('is-readonly').addClass('is-editing');
        var isReadonly  = $form.hasClass('is-readonly');
        $form.find('input,textarea').prop('disabled', isReadonly);
        document.getElementById("save_btn_fac").disabled = false;
        document.getElementById("edit_btn_fac").disabled = true;
      });
      $('#save_btn_fac').on('click', function(){
        var $form = $('#form1');
        $form.removeClass('is-editing').addClass('is-readonly');
        document.getElementById("edit_btn_fac").disabled = false;
        document.getElementById("save_btn_fac").disabled = true;
        $('#form1').submit();
      });

      $('#form1').validator().on('submit', function (e) {
        if (e.isDefaultPrevented()) {
              alert("Please fix all the errors before submitting.");// handle the invalid form...
            } else {

            }
          });

      $('#edit_btn').on('click', function(){

        var $form = $('#form2');
        $form.removeClass('is-readonly').addClass('is-editing');
        var isReadonly  = $form.hasClass('is-readonly');
        $form.find('input,textarea').prop('disabled', isReadonly);
        document.getElementById("save_btn").disabled = false;
        document.getElementById("edit_btn").disabled = true;
      });
      $('#save_btn').on('click', function(){
        var $form = $('#form2');
        $form.removeClass('is-editing').addClass('is-readonly');
        document.getElementById("edit_btn").disabled = false;
        document.getElementById("save_btn").disabled = true;
        $('#form2').submit();
      });



      $('#form2').validator().on('submit', function (e) {
        if (e.isDefaultPrevented()) {
              alert("Please fix all the errors before submitting.");// handle the invalid form...
            } else {

            }
          });




    });
$('#form2').validator().on('submit', function (e) {
  if (e.isDefaultPrevented()) {
              alert("Please fix all the errors before submitting.");// handle the invalid form...
            } else {

            }
          });


</script>
</script>
</body>
</html>