$(document).ready(function() {
    $('.loading').fadeOut(200);

    $('#table,#table2').DataTable();
    $('.dataTablesJenis').DataTable();

    $(".selector").flatpickr();

    
    $('.select2').select2({
        dropdownCssClass: "myFont",
        selectionCssClass: "myFont"
    });
})