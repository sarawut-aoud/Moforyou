pdfMake.fonts = {
  THSarabun: {
    normal: "THSarabun.ttf",
    bold: "THSarabun-Bold.ttf",
    italics: "THSarabun-Italic.ttf",
    bolditalics: "THSarabun-BoldItalic.ttf",
  },
};
$(document).ready(function () {
  $("#example1").DataTable({
    responsive: true,
    lengthChange: false,
    autoWidth: false,
    dom: "Bfrtip",
    buttons: [
      "copy",
      "csv",
      "excel",
      {
        // กำหนดพิเศษเฉพาะปุ่ม pdf
        extend: "pdf", // ปุ่มสร้าง pdf ไฟล์
        text: "PDF", // ข้อความที่แสดง
        pageSize: "A4", // ขนาดหน้ากระดาษเป็น A4
 
        customize: function (doc) {
          // ส่วนกำหนดเพิ่มเติม ส่วนนี้จะใช้จัดการกับ pdfmake
          // กำหนด style หลัก
          doc.defaultStyle = {
            font: "THSarabun",
            fontSize: 16,
          }; // กำหนดความกว้างของ header แต่ละคอลัมน์หัวข้อ
          doc.content[1].table.widths = [50, "auto", "*", "*"];
          doc.styles.tableHeader.fontSize = 16; // กำหนดขนาด font ของ header
          var rowCount = doc.content[1].table.body.length; // หาจำนวนแะวทั้งหมดในตาราง // วนลูปเพื่อกำหนดค่าแต่ละคอลัมน์ เช่นการจัดตำแหน่ง
          for (i = 1; i < rowCount; i++) {
            // i เริ่มที่ 1 เพราะ i แรกเป็นแถวของหัวข้อ
            doc.content[1].table.body[i][0].alignment = "center"; // คอลัมน์แรกเริ่มที่ 0
            doc.content[1].table.body[i][1].alignment = "center";
            doc.content[1].table.body[i][2].alignment = "left";
            doc.content[1].table.body[i][3].alignment = "right";
          }
          console.log(doc); // เอาไว้ debug ดู doc object proptery เพื่ออ้างอิงเพิ่มเติม
        },
      }, // สิ้นสุดกำหนดพิเศษปุ่ม pdf
      {
        extend: "print",
        exportOptions: {
          columns: ":visible",
        },
      },
      "colvis",
    ],
    columnDefs: [
      {
        targets: -1,
        visible: false,
      },
    ],
    language: {
      buttons: {
        colvis: "Change columns",
      },
    },
  });
});
