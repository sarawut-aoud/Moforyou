$(document).ready(function () {
  $("#example1")
    .DataTable({
      responsive: true,
      lengthChange: false,
      autoWidth: false,
      dom: "Btrip",
      buttons: {
        dom: {
          button: {
            className: "btn btn-light  ",
          },
        },
        buttons: [
          {
            extend: "colvis",
            className: "btn btn-outline-info",
          },
        ],
      },
      language: {
        buttons: {
          colvis: "Change columns",
        },
      },
    })
    .buttons()
    .container()
    .appendTo("#example1_wrapper .col-md-6:eq(0)");
});

$(document).ready(function () {
  $("#example2")
  .DataTable({
    responsive: true,
    lengthChange: false,
    autoWidth: false,
    dom: "Btrip",
    buttons: {
      dom: {
        button: {
          className: "btn btn-light  ",
        },
      },
      buttons: [
        {
          extend: "colvis",
          className: "btn btn-outline-info",
        },
      ],
    },
    
    language: {
      buttons: {
        colvis: "Change columns",
      },
    },
  })
  .buttons()
  .container()
  .appendTo("#example2_wrapper .col-md-6:eq(0)");
});
