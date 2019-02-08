<?php require_once("autoload.php"); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="tr-TR">

<head>
   <title>
      <?php echo $lang['project_name'];?>
   </title>
   <script src="javascript/jquery.min.js"></script>
   <script src="javascript/bootstrap.min.js"></script>
   <link rel="stylesheet" href="css/bootstrap.min.css" />
   <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
</head>
<?php 
 $user_name = 'hakan';
 $password  = 'b714337aa8007c433329ef43c7b8252c'; 
 if($auth->auth_f($user_name,$password)!='1'){
    echo '<div class="alert alert-danger" style="text-align: center;margin: 400px;">
             '.$lang["login_failure"].'
          </div>';
    die('');
 } else {
    $token = md5(sha1($user_name.$password));
 }
?>
<body>
   <div class="container">
      <br />
      <h3 align="center">
         <?php echo $lang['project_name'];?>
      </h3>
      <br />
      <div align="right" style="margin-bottom:5px;">
         <button type="button" name="add_button" id="add_button" class="btn btn-success btn-xs">
            <?php echo $lang['add'];?></button>
      </div>

      <div class="table-responsive">
         <table class="table table-bordered table-striped">
            <thead>
               <tr>
                  <th>
                     <?php echo $lang['name'];?>
                  </th>
                  <th>
                     <?php echo $lang['surname'];?>
                  </th>
                  <th>
                     <?php echo $lang['update'];?>
                  </th>
                  <th>
                     <?php echo $lang['delete'];?>
                  </th>
               </tr>
            </thead>
            <tbody></tbody>
         </table>
      </div>
   </div>
</body>

</html>

<div id="apiFormModal" class="modal fade" role="dialog">
   <div class="modal-dialog">
      <div class="modal-content">
         <form method="post" id="api_add_form">
            <div class="modal-header">
               <button type="button" class="close" data-dismiss="modal">&times;</button>
               <h4 class="modal-title">
                  <?php echo $lang['add'];?>
               </h4>
            </div>
            <div class="modal-body">
               <div class="form-group">
                  <label>
                     <?php echo $lang['name'];?></label>
                  <input type="text" name="first_name" id="first_name" class="form-control" />
               </div>
               <div class="form-group">
                  <label>
                     <?php echo $lang['surname'];?></label>
                  <input type="text" name="last_name" id="last_name" class="form-control" />
               </div>
            </div>
            <div class="modal-footer">
               <input type="hidden" name="hidden_id" id="hidden_id" />
               <input type="hidden" name="token" value="<?php echo $token; ?>" />
               <input type="hidden" name="action" id="action" value="Ekle" />
               <input type="submit" name="button_action" id="button_action" class="btn btn-info" value="<?php echo  $lang['add'];?>" />
               <button type="button" class="btn btn-default" data-dismiss="modal">
                  <?php echo $lang['close'];?></button>
            </div>
         </form>
      </div>
   </div>
</div>

<script type="text/javascript">
   $(document).ready(function () {

      fetch_data();

      function fetch_data() {
         $.ajax({
            url: "fetch.php",
            success: function (data) {
               $('tbody').html(data);
            }
         })
      }

      $('#add_button').click(function () {
         $('#action').val('insert');
         $('#button_action').val("<?php echo $lang['add'];?>");
         $('.modal-title').text("<?php echo $lang['add'];?>");
         $('#apiFormModal').modal('show');
      });

      $('#api_add_form').on('submit', function (event) {
         event.preventDefault();
         if ($('#first_name').val() == '') {
            alert("<?php echo $lang['enter_name'];?>");
         } else if ($('#last_name').val() == '') {
            alert("<?php echo $lang['enter_surname'];?>");
         } else {
            var form_data = $(this).serialize();
            $.ajax({
               url: "action.php",
               method: "POST",
               data: form_data,
               success: function (data) {
                  fetch_data();
                  $('#api_add_form')[0].reset();
                  $('#apiFormModal').modal('hide');
                  if (data == 'insert') {
                     alert("<?php echo $lang['added'];?>");
                  }
                  if (data == 'update') {
                     alert("<?php echo $lang['updated'];?>");
                  }
               }
            });
         }
      });

      $(document).on('click', '.edit', function () {

         var id = $(this).attr('id');
         var action = 'fetch_single';
         $.ajax({
            url: "action.php",
            method: "POST",
            data: {
               id: id,
               action: action
            },
            dataType: "json",
            success: function (data) {
               $('#hidden_id').val(id);
               $('#first_name').val(data.first_name);
               $('#last_name').val(data.last_name);
               $('#action').val("update");
               $('#button_action').val("<?php echo $lang['update'];?>");
               $('.modal-title').text("<?php echo $lang['update'];?>");
               $('#apiFormModal').modal('show');
            }
         })
      });

      $(document).on('click', '.delete', function () {
         var id = $(this).attr("id");
         var action = 'delete';
         if (confirm("<?php echo $lang['sure'];?>")) {
            $.ajax({
               url: "action.php",
               method: "POST",
               data: {
                  id: id,
                  action: action
               },
               success: function (data) {
                  fetch_data();
                  alert("<?php echo $lang['deleted'];?>");
               }
            });
         }
      });

   });
</script>