// all custom js code 

$(function () {
$('#DataTable2').DataTable({
"paging": true,
"lengthChange": true,
"searching": true,
"ordering": true,
"info": true,
"autoWidth": true,
 "order": [[ 0, "desc" ]],
    'dom'        : 'Bfrtipl',
      buttons: [
            'copy', 'csv', 'excel', 'pdf', 
            {
                extend: 'print',
                exportOptions: 
                {
                    columns: [ 0,1,2,3,4,5,6,7,8,9,10 ]
                }
            }
        ]
});


$('#DataTable1').DataTable({
"paging": true,
"lengthChange": true,
"searching": true,
"ordering": true,
"info": true,
"autoWidth": true,
 "order": [[ 0, "desc" ]],
    'dom'        : 'Bfrtipl',
      buttons: [
            'copy', 'csv', 'excel', 'pdf', 
            {
                extend: 'print',
                exportOptions: 
                {
                    columns: [ 0,1,2 ]
                }
            }
        ]
});

});

$(function () {
//Initialize Select2 Elements
$('.select2').select2();
// $('.datepicker').datepicker();

});



$(document).ready(function(){


	$('.testPrice').on('blur',function(){

	    var tPrice = parseFloat($(this).val());

	        var vl = tPrice.toFixed(2);
	        $(this).val(vl);
	    // alert(tPrice.toFixed(2));
	})


});
