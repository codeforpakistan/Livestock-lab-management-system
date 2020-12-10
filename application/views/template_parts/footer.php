
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- select2 -->

<script src="<?php echo base_url() ?>public/plugins/select2/select2.min.js"></script>
<script src="<?php echo base_url() ?>public/plugins/select2/select2.full.min.js"></script>
<!-- DataTables -->
<script src="<?php echo base_url() ?>public/plugins/datatables/jquery.dataTables.js"></script>
<script src="<?php echo base_url() ?>public/plugins/datatables/dataTables.bootstrap4.js"></script>
<!-- Morris.js charts -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="<?php echo base_url() ?>public/plugins/morris/morris.min.js"></script>
<!-- Sparkline -->
<script src="<?php echo base_url() ?>public/plugins/sparkline/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script src="<?php echo base_url() ?>public/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="<?php echo base_url() ?>public/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- jQuery Knob Chart -->
<script src="<?php echo base_url() ?>public/plugins/knob/jquery.knob.js"></script>
<!-- daterangepicker -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js"></script>
<script src="<?php echo base_url() ?>public/plugins/daterangepicker/daterangepicker.js"></script>
<!-- datepicker -->
<script src="<?php echo base_url() ?>public/plugins/datepicker/bootstrap-datepicker.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="<?php echo base_url() ?>/public/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- chart.js -->
<script src="<?php echo base_url() ?>/public/plugins/chartjs-old/Chart.min.js"></script>
<!-- Slimscroll -->
<script src="<?php echo base_url() ?>/public/plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="<?php echo base_url() ?>/public/plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url() ?>/public/dist/js/adminlte.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="<?php echo base_url() ?>/public/dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url() ?>/public/dist/js/demo.js"></script>

<script src="<?php echo base_url() ?>/public/dist/js/adminlte.min.js"></script>

<script src="https://cdn.datatables.net/buttons/1.5.6/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.print.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.print.min.js"></script>

<script type="text/javascript" src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
<script src="<?php echo base_url() ?>/public/custom_files/custom.js"></script>

<!-- InputMask -->
<script src="<?php echo base_url() ?>/public/plugins/input-mask/jquery.inputmask.js"></script>
<script src="<?php echo base_url() ?>/public/plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
<script src="<?php echo base_url() ?>/public/plugins/input-mask/jquery.inputmask.extensions.js"></script>
<!-- PIE CHART TESTTYPES COUNT (TOTALS, INPROGRESS, COMPLETED, CANCELLED) -->
<script>
  //-------------
  //- PIE CHART -
  //-------------
  // Get context with jQuery - using jQuery's .get() method.
  var pieChartCanvas = $('#pieTab2').get(0).getContext('2d')
  var pieChart       = new Chart(pieChartCanvas)
  var PieData        = [
    {
      value    : <?php echo $impression_smear;  ?>,
      color    : '#4287f5',
      highlight: '#4287f5',
      label    : 'Impression Smear'
    },
     {
      value    : <?php echo $haematology;  ?>,
      color    : '#42e3f5',
      highlight: '#42e3f5',
      label    : 'Haematology'
    },
     {
      value    : <?php echo $mastitis;  ?>,
      color    : '#2dc286',
      highlight: '#2dc286',
      label    : 'Mastitis'
    },
     {
      value    : <?php echo $culture_sensitivity;  ?>,
      color    : '#23d94d',
      highlight: '#23d94d',
      label    : 'Culture Sensitivity'
    },
     {
      value    : <?php echo $urine_examination;  ?>,
      color    : '#5ad923',
      highlight: '#5ad923',
      label    : 'Urine Examination'
    },
     {
      value    : <?php echo $mrt;  ?>,
      color    : '#84d923',
      highlight: '#84d923',
      label    : 'MRT'
    },
     {
      value    : <?php echo $rbpt;  ?>,
      color    : '#bbd923',
      highlight: '#bbd923',
      label    : 'RBPT'
    },
     {
      value    : <?php echo $spat_human;  ?>,
      color    : '#d9a823',
      highlight: '#d9a823',
      label    : 'Spat Human'
    },
     {
      value    : <?php echo $tuberculin_skin_test;  ?>,
      color    : '#d96323',
      highlight: '#d96323',
      label    : 'Tuberculin Skin Test (TST)'
    },
     {
      value    : <?php echo $water_bacteriology;  ?>,
      color    : '#d95d23',
      highlight: '#d95d23',
      label    : 'Water Bacteriology'
    },
    {
      value    : <?php echo $afs;  ?>,
      color    : '#a523d9',
      highlight: '#a523d9',
      label    : 'ACID FAST STUNNING (AFS)'
    },
    {
      value    : <?php echo $elisa_human;  ?>,
      color    : '#d9239f',
      highlight: '#d9239f',
      label    : 'Indirect Elisa Human'
    },
    {
      value    : <?php echo $elisa_animal;  ?>,
      color    : '#d92351',
      highlight: '#d92351',
      label    : 'Indirect Elisa Animal'
    },
    {
      value    : <?php echo $pcr_human; ?>,
      color    : '#d9232c',
      highlight: '#d9232c',
      label    : 'PCR Human'
    },
    {
      value    : <?php echo $pcr_animal;  ?>,
      color    : '#7e23d9',
      highlight: '#7e23d9',
      label    : 'PCR Animal'
    }
    
  ]
  var pieOptions     = {
    //Boolean - Whether we should show a stroke on each segment
    segmentShowStroke    : true,
    //String - The colour of each segment stroke
    segmentStrokeColor   : '#fff',
    //Number - The width of each segment stroke
    segmentStrokeWidth   : 1,
    //Number - The percentage of the chart that we cut out of the middle
    percentageInnerCutout: 50, // This is 0 for Pie charts
    //Number - Amount of animation steps
    animationSteps       : 100,
    //String - Animation easing effect
    animationEasing      : 'easeOutBounce',
    //Boolean - Whether we animate the rotation of the Doughnut
    animateRotate        : true,
    //Boolean - Whether we animate scaling the Doughnut from the centre
    animateScale         : false,
    //Boolean - whether to make the chart responsive to window resizing
    responsive           : true,
    // Boolean - whether to maintain the starting aspect ratio or not when responsive, if set to false, will take up entire container
    maintainAspectRatio  : false,
    //String - A legend template
    legendTemplate       : '<ul class="<%=name.toLowerCase()%>-legend"><% for (var i=0; i<segments.length; i++){%><li><span style="background-color:<%=segments[i].fillColor%>"></span><%if(segments[i].label){%><%=segments[i].label%><%}%></li><%}%></ul>',
    //String - A tooltip template
    tooltipTemplate      : '<%=value %> <%=label%> Tests'
  }
  //Create pie or douhnut chart
  // You can switch between pie and douhnut using the method below.
  pieChart.Doughnut(PieData, pieOptions)
  //-----------------
  //- END PIE CHART -
  //-----------------
</script>

 

<script>
  //-------------
  //- PIE CHART -
  //-------------
  // Get context with jQuery - using jQuery's .get() method.
  var pieChartCanvas = $('#pieTab').get(0).getContext('2d')
  var pieChart       = new Chart(pieChartCanvas)
  var PieData        = [
    {
      value    : <?php echo $cancelled;  ?>,
      color    : '#dc3545',
      highlight: '#dc3545',
      label    : 'Cancelled'
    },
    // {
    //   value    : <?php echo $registered;  ?>,
    //   color    : '#28a745',
    //   highlight: '#28a745',
    //   label    : 'Total'
    // },
    {
      value    : <?php echo $pending; ?>,
      color    : '#ffc107',
      highlight: '#ffc107',
      label    : 'In Progress'
    },
    {
      value    : <?php echo $posted;  ?>,
      color    : '#17a2b8',
      highlight: '#17a2b8',
      label    : 'Completed'
    }
    
  ]
  var pieOptions     = {
    //Boolean - Whether we should show a stroke on each segment
    segmentShowStroke    : true,
    //String - The colour of each segment stroke
    segmentStrokeColor   : '#fff',
    //Number - The width of each segment stroke
    segmentStrokeWidth   : 1,
    //Number - The percentage of the chart that we cut out of the middle
    percentageInnerCutout: 50, // This is 0 for Pie charts
    //Number - Amount of animation steps
    animationSteps       : 100,
    //String - Animation easing effect
    animationEasing      : 'easeOutBounce',
    //Boolean - Whether we animate the rotation of the Doughnut
    animateRotate        : true,
    //Boolean - Whether we animate scaling the Doughnut from the centre
    animateScale         : false,
    //Boolean - whether to make the chart responsive to window resizing
    responsive           : true,
    // Boolean - whether to maintain the starting aspect ratio or not when responsive, if set to false, will take up entire container
    maintainAspectRatio  : false,
    //String - A legend template
    legendTemplate       : '<ul class="<%=name.toLowerCase()%>-legend"><% for (var i=0; i<segments.length; i++){%><li><span style="background-color:<%=segments[i].fillColor%>"></span><%if(segments[i].label){%><%=segments[i].label%><%}%></li><%}%></ul>',
    //String - A tooltip template
    tooltipTemplate      : '<%=value %> <%=label%> Tests'
  }
  //Create pie or douhnut chart
  // You can switch between pie and douhnut using the method below.
  pieChart.Doughnut(PieData, pieOptions)
  //-----------------
  //- END PIE CHART -
  //-----------------
</script>




<script>
function GetQuartors(vl)
{
  var q_id = vl;
  // alert(q_id);
    if(q_id!='') {
    $.ajax({
        dataType:"json",
        type:"POST",
        data:{q_id:q_id},
        url:"<?=base_url('Login/GetQuartors/');?>",
        success:function(data)
        {
              $('#total').html(data.total);
              $('#completed').html(data.completed);
              $('#progress').html(data.progress);
              $('#cancelled').html(data.cancelled);
              $('#ims').html(data.ims);
              $('#hemt').html(data.hemt);
              $('#mast').html(data.mast);
              $('#urine').html(data.urine);
              $('#brucella').html(data.brucella);
              $('#banimal').html(data.banimal);
              $('#bhuman').html(data.bhuman);
              $('#tuberculin').html(data.tuberculin);
              $('#waterbact').html(data.waterbact);
              $('#afs').html(data.afs);
        }

      });
    }else{
              $('#total').empty();
              $('#completed').empty();
              $('#progress').empty();
              $('#cancelled').empty();
              $('#ims').empty();
              $('#hemt').empty();
              $('#mast').empty();
              $('#urine').empty();
              $('#brucella').empty();
              $('#banimal').empty();
              $('#bhuman').empty();
              $('#tuberculin').empty();
              $('#waterbact').empty();
              $('#afs').empty();

            }
}
</script>




<script>
  $(document).ready(function(){

    // $(body).click(function(e){
    //  if(e.which==1){
    //    //do the work here this checks for left mouse button.
    //   }
  });


$("#client_name").keyup(
     function () {
         this.value = this.value.substr(0, 1).toUpperCase() + this.value.substr(1).toLowerCase();
     }
 );
  
  $('.testHelp_id').change(function(){
       var t_id = $(this).val();
        if(t_id!='') {
          $.ajax({
              dataType:"json",
              type:"POST",
              data:{t_id:t_id},
              url:"<?= base_url('Login/getTestFee/'); ?>",
              success:function(data)
              {
                  if(data!='')
                  {
                    $('.testHelp_fee').val(data.test_fee);
                  }else
                  {
                    $('.testHelp_fee').val('0.00');
                  }
                   
                    
              }

            });
          }else{
                       $('.testHelp_fee').val('0.00');
                  }
  });

   $('.testItemFee').change(function(){
       var t_id = $(this).val();
        if(t_id!='') {
          $.ajax({
              dataType:"json",
              type:"POST",
              data:{t_id:t_id},
              url:"<?= base_url('Login/getTestItemFee/'); ?>",
              success:function(data)
              {
                  if(data!='')
                  {
                    $('.testHelp_Itemfee').val(data.testHelp_fee);
                  }else
                  {
                    $('.testHelp_Itemfee').val('');
                  }
                   
                    
              }

            });
          }else{
                       $('.testHelp_fee').val('');
                  }
  });

</script>
<script type="text/javascript">
    function base_url() {
        return "<?php echo base_url(); ?>";
    }
</script>

<?php
 $uri = $this->uri->segment(2);
  if($uri=='updateTestDetailsRecord')
  {
?>
<?php
  }
?>
<script>

    function checkUnCheckData(obj, one, two, three) {
      // alert(obj);
        if ($(obj).prop('checked') == true) {
            $(obj).closest('tr').find('.'+one).prop('checked',false);
            $(obj).closest('tr').find('.'+two).prop('checked',false);
            $(obj).closest('tr').find('.'+three).prop('checked',false);
        }
    }


</script>
<script>
    $(document).ready(function(){
$("#Updatedirectorate_id").trigger('change');
$('#fimpression_smear').hide();
$('#fmastitis').hide();
$('#afb').hide();
$('#f_human').hide();
$('#f_animal').hide();
$('#fhaematology').hide();
$('#fculture_sensitivity').hide();
$('#furine_examination').hide();
$('#fbrucella_animal_combine').hide();
$('#fBrucell_Animal_ind').hide();
$('#fbrucella_human').hide();
$('#ftb_and_vph').hide();
      // alert($(this).val());
      // getStations();
});
function GetClient_cnic()
{
  var cnic = $('.clientCnic').val();
  // alert(cnic);
    if(cnic!='') {
    $.ajax({
        dataType:"json",
        type:"POST",
        data:{cnic:cnic},
        url:"<?= base_url('Login/GetClient_cnic/'); ?>",
        success:function(data)
        {
          // alert(data);
            if(data!=0)
            {
              $('select[name="district_id"]').find('option[value="'+data.district_id+'"]').prop("selected",true);
              GetTehsils(data.district_id);
              $('.client_name').val(data.client_name);
              $('.client_contact').val(data.client_contact);
              $('.client_address').val(data.client_address);
              $('.client_vil_uc_area').val(data.client_vil_uc_area);
              $('select[name="tehsil_id"]').find('option[value="'+data.tehsil_id+'"]').prop("selected",true);
            }
            else
            {
              // alert('dfds');
              $('.client_name').val('');
              $('.client_contact').val('');
              $('.client_address').val('');
              $('.client_vil_uc_area').val('');
              $('select[name="district_id"]').find('option[value=""]').prop("selected",true);
              $('.tehsil_id').empty();
              $('.tehsil_id').append('<option value="">-select-</option>');
            }
             
              
        }

      });
    }else{
                 
            }
}


 function GetTestFee(obj)
 {
      var t_id = $(obj).val();
      
      var rw  =  $(obj).closest(".modal").find(".Old_utestHelp_fee").val();
        // alert(t_id);
        // alert(rw);
         if(t_id!='') {
            $.ajax({
                dataType:"json",
                type:"POST",
                data:{t_id:t_id},
                url:"<?= base_url('Login/getTestItemFee/'); ?>",
                success:function(data)
                {
                    if(data!='')
                    {
                      $(obj).closest(".modal").find(".utestHelp_fee").val(data.testHelp_fee);
                    }else
                    {
                      $(obj).closest(".modal").find(".utestHelp_fee").val(rw);
                    }
                     
                      
                }

              });
        }else{
                     $(obj).closest(".modal").find(".utestHelp_fee").val(rw);
                }


      
  }

function GetTehsils(vl)
{
  var district_id = vl;
  // alert(district_id);
    if(district_id!='') {
    $.ajax({
        dataType:"json",
        type:"POST",
        data:{district_id:district_id},
        url:"<?= base_url('Login/GetTehsils/'); ?>",
        success:function(data)
        {
                   // alert(data);
              $('.tehsil_id').empty();
              $('.tehsil_id').append('<option value="">-select-</option>');
              $.each(data, function(key, value) {
              $('.tehsil_id').append('<option value="'+ value.tehsil_id +'">'+value.tehsil_name+'</option>');
              });
              
        }

      });
    }else{
            $('.tehsil_id').empty();
         }
}

function GetBreeds(vl)
{
  var cattle_id = vl;
  // alert(center_station_id);
    if(cattle_id!='') {
    $.ajax({
        dataType:"json",
        type:"POST",
        data:{cattle_id:cattle_id},
        url:"<?= base_url('Login/GetBreeds/'); ?>",
        success:function(data)
        {
                   // alert(data);
              $('.breed_id').empty();
              $('.breed_id').append('<option value="">-select-</option>');
              $.each(data, function(key, value) {
              $('.breed_id').append('<option value="'+ value.breed_id +'">'+value.breed_name+'</option>');
              });
              
        }

      });
    }else{
                 $('.breed_id').empty();
            }
}
function GetStations(vl)
{
  var directorate_id = vl;
    if(directorate_id!='') {
    $.ajax({
        dataType:"json",
        type:"POST",
        data:{directorate_id:directorate_id},
        url:"<?= base_url('Login/getStations/'); ?>",
        success:function(data)
        {
                   // alert(data);
                   $('.center_station_id').empty();
                    $('.center_station_id').append('<option value="">-select-</option>');
              $.each(data, function(key, value) {
              $('.center_station_id').append('<option  value="'+ value.center_station_id +'">'+value.center_station_name+'</option>');
              });
              
        }

      });
    }else{
            $('.center_station_id').empty();
        }
}

function GetSections(vl)
{
  var center_station_id = vl;
  // alert(center_station_id);
    if(center_station_id!='') {
    $.ajax({
        dataType:"json",
        type:"POST",
        data:{center_station_id:center_station_id},
        url:"<?= base_url('Login/GetSections/'); ?>",
        success:function(data)
        {
                   // alert(data);
              $('.section_id').empty();
              $('.section_id').append('<option value="">-select-</option>');
              $.each(data, function(key, value) {
              $('.section_id').append('<option value="'+ value.section_id +'">'+value.sectionHelp_name+'</option>');
              });
              
        }

      });
    }else{
                 $('.section_id').empty();
            }
}
function GetLabs(vl)
{
  var section_id = vl;
  // alert(testid);
    if(section_id!='') {
    $.ajax({
        dataType:"json",
        type:"POST",
        data:{section_id:section_id},
        url:"<?= base_url('Login/getLabs/'); ?>",
        success:function(data)
        {
              $('.lab_id').empty();
              $('.lab_id').append('<option value="">-select-</option>');
              $.each(data, function(key, value) {
              $('.lab_id').append('<option value="'+ value.lab_id +'">'+value.lab_name+'</option>');
              });
              
        }

      });
    }else{
                $('.lab_id').empty();
            }
}

</script>
<script>
  $(document).ready(function(){
      $('.datepicker').datepicker({
       dateFormat: 'dd/mm/yy' 
      });
// $('input[id$=tbDate]').datepicker({
//     dateFormat: 'dd/mm/yy'
// });

      var type = $('#client_type').val();
      if(type=='')
      {
        $('#source_row').hide();
        $('#source_info').hide();
      }
      else if(type=='farmer' || type=='farm_visited')
      { 
          $('#source_row').show();
          $('#source_info').show();
          $('#source_info').html('Source Information');  
          $('#lebClient').html('Farmer/Owner/CNIC#');  
          $('.div_source_cnic').show();
          $('.div_source_Name').show();
          $('.div_source_contact').show();
          $('.div_source_address').show();
          $('.div_deptName').hide();
          $('.div_dept_phone').hide();
          $('.animalAge').css({'display':''});
          $('.humanAge').css({'display':'none'});
      }else if(type=='Patient')
      { 
          
          $('#source_row').show();
          $('#source_info').show();
          $('#source_info').html('Source Information');  
          $('#lebClient').html('Patient/Guardian CNIC#');  
          $('.div_source_cnic').show();
          $('.div_source_Name').show();
          $('.div_source_contact').show();
          $('.div_source_address').show();
          $('.div_deptName').hide();
          $('.div_dept_phone').hide();
          $('.animalAge').css({'display':'none'});
          $('.humanAge').css({'display':''});
      }
      else if(type=='own_dept')
      {
          $('#source_row').show();
          $('#source_info').show();
          $('#source_info').html('Own Department Information');
          $('.div_deptName').show();
          $('.div_dept_phone').show();
          $('.div_source_cnic').hide();
          $('.div_source_Name').hide();
          $('.div_source_contact').hide();
          $('.div_source_address').hide();
          $('.animalAge').css({'display':''});
          $('.humanAge').css({'display':'none'});

      }else if(type=='other_dept')
      {
          $('#source_row').show();
          $('#source_info').show();
          $('#source_info').html('Other Department Information');
          $('.div_source_cnic').show();
          $('.div_source_Name').show();
          $('.div_deptName').show();
          $('.div_source_contact').show();
          $('.div_dept_phone').show();
          $('.div_source_address').show();
          $('.animalAge').css({'display':''});
          $('.humanAge').css({'display':'none'});

      }
  });

</script>


      
  
<script>
function GetClientType(vl)
{
  // var type = $('#client_type').val();
  var type = vl;
  if(type=='')
  {
      $('#source_row').hide();
      $('#source_info').hide();
      $('.ownDeptt').val('');
      $('.ownDeptt_phone').val('');
      $('.animal_info').show();
  }
     else if(type=='farmer' || type=='farm_visited')
      { 
          $('#source_row').show();
          $('#source_info').show();
          $('#source_info').html('Source Information');  
          $('#lebClient').html('Farmer/Owner/CNIC#');  
          $('.div_source_cnic').show();
          $('.div_source_Name').show();
          $('.div_source_contact').show();
          $('.div_source_address').show();
          $('.div_deptName').hide();
          $('.div_dept_phone').hide();
          $('.animalAge').css({'display':''});
          $('.humanAge').css({'display':'none'});
      }else if(type=='Patient')
      { 
          $('#source_row').show();
          $('.animal_info').hide();
          $('#source_info').show();
          $('#source_info').html('Source Information');  
          $('#lebClient').html('Patient/Guardian CNIC#');  
          $('.div_source_cnic').show();
          $('.div_source_Name').show();
          $('.div_source_contact').show();
          $('.div_source_address').show();
          $('.div_deptName').hide();
          $('.div_dept_phone').hide();
          $('.animalAge').css({'display':'none'});
          $('.humanAge').css({'display':''});
      }else if(type=='own_dept')
      {
      $('#source_row').show();
      $('#source_info').show();
      $('#source_info').html('Own Department Information');
      $('.div_deptName').show();
      $('.div_dept_phone').show();
      $('.div_source_cnic').hide();
      $('.div_source_Name').hide();
      $('.div_source_contact').hide();
      $('.div_source_address').hide();
      $('.animal_info').show();
      <?php 
         $res = $this->API_m->singleRecord('center_station',['center_station_id'=>$this->session->userdata('user')['center_id']]); 
      ?>
      var ownName  = '<?php echo  $res->center_station_name; ?>';
      var ownPhone = '<?php echo  $res->center_station_phone; ?>';
      $('.ownDeptt').val(ownName);
      $('.ownDeptt_phone').val(ownPhone);
      $('.animalAge').css({'display':''});
     $('.humanAge').css({'display':'none'});
  }else if(type=='other_dept')
  {
      $('#source_row').show();
      $('#source_info').show();
      $('.animal_info').show();
      $('#source_info').html('Other Department Information');
      $('#lebClient').html('CNIC#');  
      $('.div_source_cnic').show();
      $('.div_source_Name').show();
      $('.div_deptName').show();
      $('.ownDeptt').val('');
      $('.ownDeptt_phone').val('');
      $('.div_source_contact').show();
      $('.div_dept_phone').show();
      $('.div_source_address').show();
      $('.animalAge').css({'display':''});
      $('.humanAge').css({'display':'none'});
  }
  // else if(type=='Patient')
  // {
  //     $('.animal_info').hide();
  // }
  // alert(type);


}
function GetSample()
{
  var testid   = $('#test_id').val();
  // alert(testid);
    if(testid!='') {
    $.ajax({
        dataType:"json",
        type:"POST",
        data:{test_id:testid},
        url:"<?= base_url('Login/getTestSamples/'); ?>",
        success:function(data)
        {
                   // alert(data);
              $('#test_sample_id').html('<option value="">-select-</option>');
              $.each(data, function(key, value) {
              $('#test_sample_id').append('<option value="'+ value.sample_id +'">'+value.sample_name+'</option>');
              });
        }

      });

     $.ajax({
        dataType:"json",
        type:"POST",
        data:{test_id:testid},
        url:"<?= base_url('Login/getTestHelpId/'); ?>",
        success:function(data)
        {
           if(data.testHelp_id==11)
            {
              $("#afb").show(1000);
              // $("#afb").find(":text, select").each(function () {
              //            $(this).prop('required',true);
              //         });
             
            }
            else
            {
             
              $("#afb").hide();
              // $("#afb").find(":text, select").each(function () {
              //            $(this).prop('required',false);
              //         });
              
            }
               if(data.testHelp_id==3)
                {
                  $("#fmastitis").show(1000);
                  $("#fmastitis").find(":text, select").each(function () {
                             $(this).prop('required',true);
                          });
                 
                }
                else
                {
                 
                  $("#fmastitis").hide();
                  // $('#test_sample_id').empty();
                  $("#fmastitis").find(":text, select").each(function () {
                             $(this).prop('required',false);
                          });
                  
                }
                if(data.testHelp_id==8 || data.testHelp_id==12 || data.testHelp_id==14)
                {
                  $("#f_human").show(1000);
                  $("#f_human").find(":text, select").each(function () {
                             $(this).prop('required',true);
                          });
                 
                }
                else
                {
                 
                  $("#f_human").hide();
                  // $('#test_sample_id').empty();
                  $("#f_human").find(":text, select").each(function () {
                             $(this).prop('required',false);
                          });
                  
                }
                if(data.testHelp_id==6 || data.testHelp_id==7 || data.testHelp_id==13 || data.testHelp_id==15)
                {
                  $("#f_animal").show(1000);
                  $("#f_animal").find(":text, select").each(function () {
                             $(this).prop('required',true);
                          });
                 
                }
                else
                {
                 
                  $("#f_animal").hide();
                  // $('#test_sample_id').empty();
                  $("#f_animal").find(":text, select").each(function () {
                             $(this).prop('required',false);
                          });
                  
                }
        }

      });

    }else{
                $('#test_sample_id').empty();
                // $("#impression_smear").hide();
                // $('#test_sample_id').empty();
                // $("#mastitis").hide();
                // $('#test_sample_id').empty();
                // $("#haematology").hide();
                // $('#test_sample_id').empty();
                // $("#culture_sensitivity").hide();
                // $('#test_sample_id').empty();
                // $("#urine_examination").hide();
                // $('#test_sample_id').empty();
                // $("#brucella_animal_combine").hide();
                // $('#test_sample_id').empty();
                // $("#Brucell_Animal_ind").hide();
                // $('#test_sample_id').empty();
                // $("#brucella_human").hide();
                // $('#test_sample_id').empty();
                // $("#tb_and_vph").hide();
              // $("#impression_smear,#mastitis,#haematology,#culture_sensitivity,#urine_examination,#brucella_animal_combine,#Brucell_Animal_ind,#brucella_human,#tb_and_vph").find(":text, select").each(function () {
              //    $(this).prop('required',false);
              // });
            }

   
   
}

$(document).ready(function(){
  // $(".HideForms").hide();
  // GetSample();
  // $('#test_id').change();
  
  $('[data-mask]').inputmask()
});

</script>


<!-- chart.js -->


<script>
  $(document).ready(function(){
    /* ChartJS
     * -------
     * Here we will create a few charts using ChartJS
     */

    //--------------
    //- AREA CHART -
    //--------------

    // Get context with jQuery - using jQuery's .get() method.
    var areaChartCanvas = $('#areaChart').get(0).getContext('2d')
    // This will get the first returned node in the jQuery collection.
    var areaChart       = new Chart(areaChartCanvas)

    var areaChartData = {
      labels  : ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
      datasets: [
        {
          label               : 'Electronics',
          fillColor           : 'rgba(210, 214, 222, 1)',
          strokeColor         : 'rgba(210, 214, 222, 1)',
          pointColor          : 'rgba(210, 214, 222, 1)',
          pointStrokeColor    : '#c1c7d1',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(220,220,220,1)',
          data                : [65, 59, 80, 81, 56, 55, 40]
        },
        {
          label               : 'Digital Goods',
          fillColor           : 'rgba(60,141,188,0.9)',
          strokeColor         : 'rgba(60,141,188,0.8)',
          pointColor          : '#3b8bba',
          pointStrokeColor    : 'rgba(60,141,188,1)',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(60,141,188,1)',
          data                : [28, 48, 40, 19, 86, 27, 90]
        }
      ]
    }

    var areaChartOptions = {
      //Boolean - If we should show the scale at all
      showScale               : true,
      //Boolean - Whether grid lines are shown across the chart
      scaleShowGridLines      : false,
      //String - Colour of the grid lines
      scaleGridLineColor      : 'rgba(0,0,0,.05)',
      //Number - Width of the grid lines
      scaleGridLineWidth      : 1,
      //Boolean - Whether to show horizontal lines (except X axis)
      scaleShowHorizontalLines: true,
      //Boolean - Whether to show vertical lines (except Y axis)
      scaleShowVerticalLines  : true,
      //Boolean - Whether the line is curved between points
      bezierCurve             : true,
      //Number - Tension of the bezier curve between points
      bezierCurveTension      : 0.3,
      //Boolean - Whether to show a dot for each point
      pointDot                : false,
      //Number - Radius of each point dot in pixels
      pointDotRadius          : 4,
      //Number - Pixel width of point dot stroke
      pointDotStrokeWidth     : 1,
      //Number - amount extra to add to the radius to cater for hit detection outside the drawn point
      pointHitDetectionRadius : 20,
      //Boolean - Whether to show a stroke for datasets
      datasetStroke           : true,
      //Number - Pixel width of dataset stroke
      datasetStrokeWidth      : 2,
      //Boolean - Whether to fill the dataset with a color
      datasetFill             : true,
      //String - A legend template
      legendTemplate          : '<ul class="<%=name.toLowerCase()%>-legend"><% for (var i=0; i<datasets.length; i++){%><li><span style="background-color:<%=datasets[i].lineColor%>"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>',
      //Boolean - whether to maintain the starting aspect ratio or not when responsive, if set to false, will take up entire container
      maintainAspectRatio     : true,
      //Boolean - whether to make the chart responsive to window resizing
      responsive              : true
    }

    //Create the line chart
    areaChart.Line(areaChartData, areaChartOptions)

    //-------------
    //- LINE CHART -
    //--------------
    var lineChartCanvas          = $('#lineChart').get(0).getContext('2d')
    var lineChart                = new Chart(lineChartCanvas)
    var lineChartOptions         = areaChartOptions
    lineChartOptions.datasetFill = false
    lineChart.Line(areaChartData, lineChartOptions)

    //-------------
    //- PIE CHART -
    //-------------
    // Get context with jQuery - using jQuery's .get() method.
    var pieChartCanvas     = $('#pieDChart').get(0).getContext('2d')
    // var pieChart        = new Chart(pieChartCanvas)
    // var pieChartCanvas  = $('#pieChart')
    var pieChart       = new Chart(pieChartCanvas)
    var PieData        = [
      {
        value    : 700,
        color    : '#f56954',
        highlight: '#f56954',
        label    : 'Chrome'
      },
      {
        value    : 500,
        color    : '#00a65a',
        highlight: '#00a65a',
        label    : 'IE'
      },
      {
        value    : 400,
        color    : '#f39c12',
        highlight: '#f39c12',
        label    : 'FireFox'
      },
      {
        value    : 600,
        color    : '#00c0ef',
        highlight: '#00c0ef',
        label    : 'Safari'
      },
      {
        value    : 300,
        color    : '#3c8dbc',
        highlight: '#3c8dbc',
        label    : 'Opera'
      },
      {
        value    : 100,
        color    : '#d2d6de',
        highlight: '#d2d6de',
        label    : 'Navigator'
      }
    ]
    var pieOptions     = {
      //Boolean - Whether we should show a stroke on each segment
      segmentShowStroke    : true,
      //String - The colour of each segment stroke
      segmentStrokeColor   : '#fff',
      //Number - The width of each segment stroke
      segmentStrokeWidth   : 2,
      //Number - The percentage of the chart that we cut out of the middle
      percentageInnerCutout: 50, // This is 0 for Pie charts
      //Number - Amount of animation steps
      animationSteps       : 100,
      //String - Animation easing effect
      animationEasing      : 'easeOutBounce',
      //Boolean - Whether we animate the rotation of the Doughnut
      animateRotate        : true,
      //Boolean - Whether we animate scaling the Doughnut from the centre
      animateScale         : false,
      //Boolean - whether to make the chart responsive to window resizing
      responsive           : true,
      // Boolean - whether to maintain the starting aspect ratio or not when responsive, if set to false, will take up entire container
      maintainAspectRatio  : true,
      //String - A legend template
      legendTemplate       : '<ul class="<%=name.toLowerCase()%>-legend"><% for (var i=0; i<segments.length; i++){%><li><span style="background-color:<%=segments[i].fillColor%>"></span><%if(segments[i].label){%><%=segments[i].label%><%}%></li><%}%></ul>'
    }
    //Create pie or douhnut chart
    // You can switch between pie and douhnut using the method below.
    // pieChart.Doughnut(PieData, pieOptions);

  
  })
</script>



</body>
</html>