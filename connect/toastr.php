<?php
//Toastr Alert
function success_toast($msg, $name, $redirect)
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
      '$msg',
      '$name',
      {
        timeOut: 1000,
        fadeOut: 1000,
        onHidden: function () {
            window.location.replace('$redirect');
          }
      }
    );
              </script>";
}
function success_toasts($msg, $redirect)
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
       '$msg',
       '',
       {
         timeOut: 1000,
         fadeOut: 1000,
         onHidden: function () {
             window.location.replace('$redirect');
           }
       }
     );
               </script>";
}

function warning_toast($msg)
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
       toastr.warning(
        '$msg',
       
      );
                </script>";
}

function info_toast($msg)
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
       toastr.info(
         '$msg',
         
       );
                 </script>";
}
function error_toast($msg, $redirect)
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
       toastr.error(
         '$msg',
         '',
         {
           timeOut: 1000,
           fadeOut: 1000,
           onHidden: function () {
            location.reload();
             }
         }
       );
                 </script>";
}
