$(document).ready(function () {
  $(window).scroll(function () {
    if ($(this).scrollTop() > 100) {
      $("#back-to-top").fadeIn();
    } else {
      $("#back-to-top").fadeOut();
    }
  });

  $("#back-to-top").click(function () {
    $("html, body").animate({ scrollTop: 0 }, 600);
    return false;
  });
});
// $(document).ready(function(){
//     $(".scroll-top").click(function() {
//         $("html, body").animate({ 
//             scrollTop: 0 
//         }, "slow");
//         return false;
//     });
// });
