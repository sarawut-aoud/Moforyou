pdfMake.fonts = {
  THSarabun: {
    normal: "THSarabun.ttf",
    bold: "THSarabun-Bold.ttf",
    italics: "THSarabun-Italic.ttf",
    bolditalics: "THSarabun-BoldItalic.ttf",
  },
};
$(document).ready(function () {
  

  $("#example1")
    .DataTable({
      responsive: true,
      lengthChange: false,
      autoWidth: false,
      // dom: "Btrip",
      buttons: {
        dom: {
          button: {
            className: "btn btn-light ",
          },
        },
        buttons: [
          { extend: "csv", className: "btn btn-outline-info" },
          { extend: "excel", className: "btn btn-outline-success" },
          {
            // กำหนดพิเศษเฉพาะปุ่ม pdf
            extend: "pdf", // ปุ่มสร้าง pdf ไฟล์
            text: "PDF", // ข้อความที่แสดง
            pageSize: "A4", // ขนาดหน้ากระดาษเป็น A4
            className: "btn btn-outline-danger",
            customize: function (doc) {
              // ส่วนกำหนดเพิ่มเติม ส่วนนี้จะใช้จัดการกับ pdfmake
              // กำหนด style หลัก
              doc.defaultStyle = {
                font: "THSarabun",
                fontSize: 18,
              }; // กำหนดความกว้างของ header แต่ละคอลัมน์หัวข้อ
              // doc.content[1].table.widths = [50, "auto", "*", "*"];
              // doc.styles.tableHeader.fontSize = 16; // กำหนดขนาด font ของ header
            },
          }, //,
          {
            extend: "print",
            title: "โรงเรือน",
            messageTop: "โรงเรือน",
            className: "btn btn-outline-primary",
            exportOptions: {
              columns: ":visible",
            },
            customize: function (doc) {
              // ส่วนกำหนดเพิ่มเติม ส่วนนี้จะใช้จัดการกับ pdfmake
              // กำหนด style หลัก
              $(doc.document.body).find("table").addClass("table");
            },
          },
          ,
        ],
      },
    })
    .buttons()
    .container()
    .appendTo("#example1_wrapper .col-md-6:eq(0)");
});
