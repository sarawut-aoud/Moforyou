<?php

//Toast Alert
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
function warning($msg){
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

function error($msg, $redirect )
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

function error_h3($msg, $redirect = '')
{
  $direction = '';
  if (empty($redirect)) {
    $direction = "window.history.back();";
  } else {
    $direction = "window.location = '$redirect'";
  }

  return "<script>
    Swal.fire({
        title: '<h3>$msg</h3>',
        text: '',
        type: 'error',
        //showCancelButton: true,
        confirmButtonColor: '#3085d6',
        //cancelButtonColor: '#d33',
        confirmButtonText: 'ตกลง'
      }).then((result) => {
        $direction
      })
    </script>";
}
