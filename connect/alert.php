<?php
function loginsuccess()
{
  return "<script>
  
  toastr.options = {
    'closeButton': false,
    'debug': false,
    'newestOnTop': false,
    'progressBar': false,
    'positionClass': 'toast-top-right',
    'preventDuplicates': false,
    'onclick': null,
    'showDuration': '300',
    'hideDuration': '1000',
    'timeOut': '5000',
    'extendedTimeOut': '1000',
    'showEasing': 'swing',
    'hideEasing': 'linear',
    'showMethod': 'fadeIn',
    'hideMethod': 'fadeOut'
  }
  toastr.success(
    'Login Success !',
    '',
    {
      timeOut: 1000,
      fadeOut: 1000,
      onHidden: function () {
          window.location.replace('../../users/main/user_index.php');
        }
    }
  );
  
  </script>";
}
//Toast Alert Sweetalert
function success_1($msg, $redirect)
{
  return "<script>
           const Toast = Swal.mixin({
              toast: true,
               position: 'center',
              showConfirmButton: false,
               timer: 3000,
           })
           Toast.fire({
               icon: 'success',
               title: '$msg'
           }).then((result)=>{
               window.location = '$redirect';
           })
     </script>";
}
function warning_2($msg, $redirect)
{
  return "<script>
           const Toast = Swal.mixin({
              toast: true,
               position: 'center',
              showConfirmButton: false,
               timer: 3000,
           })
           Toast.fire({
               icon: 'info',
               title: '$msg'
           }).then((result)=>{
               window.location = '$redirect';
           })
     </script>";
}
function error_1($msg)
{
  return "<script>
           const Toast = Swal.mixin({
              toast: true,
               position: 'center',
              showConfirmButton: false,
               timer: 3000,
           })
           Toast.fire({
               icon: 'error',
               title: '$msg'
           })
     </script>";
}
function error_2($msg, $text)
{
  return "<script>
           const Toast = Swal.mixin({
              toast: true,
               position: 'center',
              showConfirmButton: false,
               timer: 3000,
           })
           Toast.fire({
               icon: 'error',
               title: '$msg',
               text: '$text',
           })
     </script>";
}
function warning($msg)
{
  return "<script>
  const Toast = Swal.mixin({
     toast: true,
      position: 'center',
     showConfirmButton: false,
      timer: 3000,
  })
  Toast.fire({
      icon: 'warning',
      title: '$msg'
  })
</script>";
}

function success($msg, $redirect)
{
  return "<script>
    Swal.fire({
        icon: 'success',
        title: '<h1>$msg</h1>',
        text: '',
        type: 'success',
        //showCancelButton: true,
        confirmButtonColor: '#3085d6',
        //cancelButtonColor: '#d33',
        confirmButtonText: 'ตกลง'
      }).then((result) => {
        window.location = '$redirect'
      })
    </script>";
}

function success_h3($msg, $redirect = '')
{
  $direction = '';
  if (empty($redirect)) {
    $direction = "window.history.go(-1);";
  } else {
    $direction = "window.location = '$redirect'";
  }

  return "<script>
    Swal.fire({
        title: '<h1>$msg</h1>',
        text: '',
        type: 'success',
        //showCancelButton: true,
        confirmButtonColor: '#3085d6',
        //cancelButtonColor: '#d33',
        confirmButtonText: 'ตกลง'
      }).then((result) => {
        $direction
      })
    </script>";
}

function error($msg, $redirect)
{

  return "<script>
    Swal.fire({
        icon: 'warning',
        title: '<h1>$msg</h1>',
        text: '',
        type: 'error',
        //showCancelButton: true,
        confirmButtonColor: '#3085d6',
        //cancelButtonColor: '#d33',
        confirmButtonText: 'ตกลง'
      }).then((result) => {
        window.location = '$redirect'
      })
    </script>";
}
