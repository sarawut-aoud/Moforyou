<?php

function success($msg,$redirect)
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

function success_h3($msg,$redirect = '')
{
  $direction = '';
  if(empty($redirect)){
      $direction = "window.history.go(-1);";
    }
    else{
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

function error($msg,$redirect = '')
{
  $direction = '';
  if(empty($redirect)){
      $direction = "window.history.go(-1);";
    }
    else{
      $direction = "window.location = '$redirect'";   
    }
    
    return "<script>
    Swal.fire({
        title: '<h1>$msg</h1>',
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

function error_h3($msg,$redirect = '')
{
  $direction = '';
  if(empty($redirect)){
      $direction = "window.history.back();";
    }
    else{
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