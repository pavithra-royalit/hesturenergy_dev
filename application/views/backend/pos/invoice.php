<!-- https://github.com/eboominathan/Basic-Crud-in-Full-Calendar-Using-Codeigniter-3.0.3/tree/master/fullcalendar
https://www.patchesoft.com/fullcalendar-with-php-and-codeigniter/
 -->
 <?php $this->load->view('backend/header'); ?>
<?php $this->load->view('backend/sidebar'); ?>

<style>
    .fc-fri {
        background-color: #FFEB3B;
    }
    .fc-event, .fc-event-dot {
        background-color: #FF5722;
    }
    .fc-event {
        border: 0;
    }
    .fc-day-grid-event {
        margin: 0;
        padding: 0;
    }
    .dayWithEvent {
        background: #FFEB3B;
        cursor: pointer;
    }
</style>
         <div class="page-wrapper">
            <div class="message"></div>
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-themecolor"><i class="fa fa-bullhorn" style="color:#1976d2"></i> Customers</h3>
                </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item active">Customers</li>
                    </ol>
                </div>
            </div>
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">


                <!-- <div class="row m-b-10"> 
                    <div class="col-12">
                          <button type="button" class="btn btn-info"><i class="fa fa-plus"></i><a href="<?php echo base_url(); ?>pos/Add_quotation?id=<?php echo $cid; ?>" class="text-white"><i class="" aria-hidden="true"></i> Add Quotation</a></button>
                      
                     
                    </div>
                </div>   -->
                <div class="row">
                    <div class="col-12">
                        <div class="card card-outline-info">
                            <div class="card-header">
                                <h4 class="m-b-0 text-white"> Invoice List  </h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive ">
                                    <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                        <thead>
                                           

                                             <tr>
                                             <th>SNo </th>
                                              <th>Vehicle Name </th>
                                              <th>Model </th>
                                              <th>Invoice Number </th>
                                            
                                              <th>Amount (₹)</th>
                                               <th>Created Date</th>
                                              <th>Action </th>
                                          </tr>
                                        </thead>
                                      
                                        <tbody>
                                           <?php
                                           $i=1;
                                           foreach($invoice as $value){
                                             $date = $value->created_date;
                                                        $sql = "SELECT * FROM `tbl_vehicle`  WHERE id='$value->vehicle_id'";
                                                        $query=$this->db->query($sql);
                                                        $result = $query->result();       
                                                        foreach($result as $value1){ 
                                                            $name1=$value1->vehicle_name;
                                                        }
                                            ?>
                                            <tr>
                                               <td><?php echo $i++ ?></td>
                                                <td><?php echo $name1 ?></td>
                                                <td><?php echo $value->model ?></td>
                                                <td><?php echo $value->inov_num ?></td>
                                                <td><?php echo $value->amount ?></td>
                                                   <td>    <?php echo date('d-m-Y',strtotime($date)) ?></td>
                                               
                                                <td class="jsgrid-align-center ">
                                                    <a href="<?php echo base_url(); ?>customer/viewinvoice?I=<?php echo base64_encode($value->cid) ?>&id=<?php echo $value->inov_num ?>" title="Invoice"  class="btn btn-sm btn-info waves-effect waves-light " "><i class="fa fa-eye"></i></a>
                                                </td>
                                            </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
               
                        
      
<script type="text/javascript">
                                        $(document).ready(function () {
                                            $(".holidelet").click(function (e) {
                                                e.preventDefault(e);
                                                // Get the record's ID via attribute  
                                                var iid = $(this).attr('data-id');
                                                $.ajax({
                                                    url: 'CUSvalueDelet?id=' + iid,
                                                    method: 'GET',
                                                    data: 'data',
                                                }).done(function (response) {
                                                    console.log(response);
                                                    $(".message").fadeIn('fast').delay(3000).fadeOut('fast').html(response);
                                                    window.setTimeout(function(){location.reload()},2000)
                                                    // Populate the form fields with the data returned from server
												});
                                            });
                                        });
</script>                              
<?php $this->load->view('backend/footer'); ?>