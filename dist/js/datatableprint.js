$(document).ready(function() {
    $('#example1').DataTable({
        "responsive": true,
         "lengthChange": false,
        "autoWidth": false,
        dom: 'Bfrtip',
        buttons: ["copy", "csv", "excel", "pdf",{
                extend: 'print',
                customize: function (win) {
                    $(win.document.body).addClass('white-bg');
                    $(win.document.body).css('font-size', '10px');
    
                    $(win.document.body).find('table')
                            .addClass('compact')
                            .css('font-size', 'inherit');
                },
                exportOptions: {
                    columns: ':visible'
                }
            },
            'colvis'
        ],
        columnDefs: [{
            targets: -1,
            visible: false
        }],
        language: {
            buttons: {
                colvis: 'Change columns'
            }
        }
        
    });
});