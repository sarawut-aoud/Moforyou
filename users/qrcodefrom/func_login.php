<?php
function login($id, $user, $fullname, $person_id, $phone, $email, $farm_id)
{

    return "<script>
    $.post(
        'login_session.php', {

            'id': $id,
            'user': '" . $user . "',
            'fullname': '" . $fullname . "',
            'person_id': $person_id,
            'phone': $phone,
            'email': '" . $email . "',
            'farmid': $farm_id,
        },function(){
            if(!'" . $id . "'){
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
                  toastr.error('login failed');
            }else{
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
                          window.location.href = './givefood.php';
                        }
                    }
                  );
            }
        }
       
    );
            </script>";
};
