<?php $this->load->view('backend/header'); ?>
<?php $this->load->view('backend/sidebar'); ?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
         <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-themecolor"><i class="fa fa-users" aria-hidden="true"></i> Staff Management</h3>
                </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item ">Staff Management</li>
                        <li class="breadcrumb-item active">Employee</li>
                    </ol>
                </div>
            </div>
            <div class="message"></div>
            <div class="container-fluid">
                <div class="row m-b-10"> 
                    <div class="col-12">
                        <button type="button" class="btn btn-info"><i class="fa fa-plus"></i><a href="<?php echo base_url(); ?>staff/Add_staff" class="text-white"><i class="" aria-hidden="true"></i> Add Staff</a></button>
               
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="card card-outline-info">
                            <div class="card-header">
                                <h4 class="m-b-0 text-white"><i class="fa fa-user-o" aria-hidden="true"></i> Staff List</h4>
                            </div>
                              <div class="card-body">
                                    <form method="post" action="" id="salaryform" class="form-material row">
                                        <div class="form-group col-md-3">
                                        <label>Created Date </label>
                                            <input type="date" name="created_date" id="date_from" class="form-control" placeholder="from" value="<?php echo $created_date; ?>">
                                        </div>
                                       
                                        <div class="col-md-3 form-group mt-4">
                                            <input type="submit" class="btn btn-success" value="Filter" name="submit" id="BtnSubmit">
                                        </div>
                                    </form>
                           
                                <div class="table-responsive ">
                                    <table id="employees123" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                            <th>Sno </th>
                                        <th>Full Name</th>
                                        <th>Email</th>
                                        <!--<th>Phone</th>-->
                                        <!--<th>Office Shift</th>-->
                                        <th>Location</th>
                                        <th>Status</th>
                                        <th>Created Date</th>
                                        <th>Action</th>
                                            </tr>
                                        </thead>
                                      
                                        <tbody>
                                           <?php
                                           $i = 1;
                                           foreach($staff as $value){ 
                                                   $date = $value->created_date;                                   
                                            ?>
                                            <tr>
                                            <td><?php echo $i++; ?></td>
                                        <td> <?php echo $value->fullname ?></td>
                                         <td><?php echo $value->email ?> </td>
                                        <!--<td> <?php echo $value->phone ?></td>-->
                                        <!--<td> <?php echo $value->shift_name ?></td>-->
                                        <td><?php echo $value->location ?></td>
                                        <td><?php echo $value->status ?></td>
                                     <td> <?php echo date('d-m-Y',strtotime($date)) ?></td>
                                     
                                                <td class="jsgrid-align-center ">
                                            
                                                    <a href="<?php echo base_url(); ?>staff/view?I=<?php echo base64_encode($value->id); ?>" title="Edit" class="btn btn-sm btn-primary waves-effect waves-light"><i class="fa fa-pencil-square-o"></i></a>
                                                    <a href="#" title="Delete" class="btn btn-sm btn-info waves-effect waves-light deletexp" data-id="<?php echo $value->id ?>"><i class="fa fa-trash-o"></i></a>
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
<?php $this->load->view('backend/footer'); ?>
<script>
    $('#employees123').DataTable({
        "aaSorting": [[1,'asc']],
        dom: 'Bfrtip',
        buttons: [
           'csv', 'print'
        ]
    });
</script>
<script>
      function changeStatus(lead_id, status_id){
    
        if(confirm('Are you sure?')){
          $.ajax({
            type : "POST",
            url: "ajax_update",
            data : {
              lead_id : lead_id,
              status_id : status_id
            },
            success : function(data){
              if(data==1){
                alert("Status Updated Successfully");
                window.location.reload();
              }else{
                alert("Something Went Wrong");
              }
            }
         
          });
        }else{
          return false;
        }
      }
      </script>
      <script type="text/javascript">
        $(document).ready(function () {
            $(".deletexp").click(function (e) {
                e.preventDefault(e);
                // Get the record's ID via attribute  
                var iid = $(this).attr('data-id');
                   if(confirm('Are you sure?')){
                        $.ajax({
                            url: 'staffvalueDelet?id=' + iid,
                            method: 'GET',
                            data: 'data',
                        }).done(function (response) {
                            console.log(response);
                            $(".message").fadeIn('fast').delay(3000).fadeOut('fast').html(response);
                            window.setTimeout(function(){location.reload()},2000)
                            // Populate the form fields with the data returned from server
						});
                     }else{
                        return false;
                        }
                    });
                });
</script>   