$("#provinces").change(function () {
  var id_province = $(this).val();

  $.ajax({
    type: "POST",
    url: "../../connect/api_map.php",
    data: { id: id_province, function: "provinces" },
    success: function (data) {
      $("#amphures").html(data);
      $("#districts").html(" ");
      $("#districts").val(" ");
      $("#amphures").prop("disabled", false);
    },
  });
});

  $("#amphures").change(function () {
    var id_amphures = $(this).val();
  
    $.ajax({
      type: "POST",
      url: "../../connect/api_map.php",
      data: { id: id_amphures,  function: "amphures" },
      success: function (data) {
        $("#districts").html(data);
        $("#districts").prop("disabled", false);
      },
    });
  });

