<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">
 <!-- Toastr -->
<link rel="stylesheet" type="text/css" href="files\bower_components\toastr\toastr.css">
<!-- Toastr -->
    <script type="text/javascript" src="files\bower_components\toastr\toastr.min.js"></script>
<script type="text/javascript" src="files\bower_components\jquery\js\jquery.min.js"></script>
<form action="abc" method="POST">
        <input type="hidden" name="p_id" id="p_id" value="<?php echo $rows['p_id']; ?>">
        <button class="btn btn-danger" name="archive" type="submit" onclick="archiveFunction()">
            <i class="fa fa-archive"></i>
                Archive
        </button>
</form>

<script type="text/javascript">
  function archiveFunction() {
event.preventDefault(); // prevent form submit
var form = event.target.form; // storing the form
        swal({
  title: "Are you sure?",
  text: "But you will still be able to retrieve this file.",
  type: "warning",
  showCancelButton: true,
  confirmButtonColor: "#DD6B55",
  confirmButtonText: "Yes, archive it!",
  cancelButtonText: "No, cancel please!",
  closeOnConfirm: false,
  closeOnCancel: false
},
function(isConfirm){
  if (isConfirm) {
    form.submit();      
            
  } else {
    swal("Cancelled", "Your imaginary file is safe :)", "error");
  }
});
}
</script>
