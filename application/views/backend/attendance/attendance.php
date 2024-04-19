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
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Staff Management</a></li>
                        <li class="breadcrumb-item active">Attendance</li>
                    </ol>
                </div>
            </div>
            <div class="message"></div>
            <div class="container-fluid">
                <div class="row m-b-10"> 
                    <div class="col-12">
                        <button type="button" class="btn btn-info"><i class="fa fa-plus"></i><a href="<?php echo base_url(); ?>attendance/Add_attendance" class="text-white"><i class="" aria-hidden="true"></i> Add Attendance</a></button>
                <button type="button" class="btn btn-info"><a href="<?php echo base_url(); ?>attendance/Attendance_Report" class="text-white"><i class="" aria-hidden="true"></i> Attendance Report </a></button>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="card card-outline-info">
                            <div class="card-header">
                                <h4 class="m-b-0 text-white"><i class="fa fa-user-o" aria-hidden="true"></i> Attendance List</h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive ">
                                    <table id="employees123" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                            <th>Sno </th>
                                        <th>Employee Name</th>
                                        <th> Email</th>
                                        <th> Attendance Date</th>
                                        <th>Attendance Status</th>
                                        <!-- <th>Leave Type</th> -->
                                        <th>Action</th>
                                            </tr>
                                        </thead>
                                      
                                        <tbody>
                                           <?php
                                           $i1 = 1;
                                           foreach($attendance as $value){ 
                                            $sql = "SELECT fullname,email FROM `staff`   WHERE id='$value->user_id'";
                                             $query=$this->db->query($sql);
                                              $result = $query->result();       
                                              foreach($result as $value1){ 
                                                $name=$value1->fullname;
                                                $email=$value1->email;
                                              }      
                                             
                                            ?>
                                            <tr>
                                            <td><?php echo $i1++; ?></td>
                                        <td> <?php echo $name ?></td>
                                        <td> <?php echo $email ?></td>
                                         <td><?php echo $value->attendance_date ?> </td>
                                     
                                        <td> <?php echo $value->attendance_status ?></td>
                                       
                                                <td class="jsgrid-align-center ">
                                            
                                                    <!-- <a href="<?php echo base_url(); ?>attendance/view?I=<?php echo base64_encode($value->id); ?>" title="Edit" class="btn btn-sm btn-primary waves-effect waves-light"><i class="fa fa-pencil-square-o"></i></a> -->
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
        "aaSorting": [[0,'asc']],
        dom: 'Bfrtip',
        buttons: [
             'csv',  'print'
        ]
    });
</script>

      <script type="text/javascript">
        $(document).ready(function () {
            $(".deletexp").click(function (e) {
                e.preventDefault(e);
                // Get the record's ID via attribute  
                var iid = $(this).attr('data-id');
                   if(confirm('Are you sure?')){
                        $.ajax({
                            url: 'attanvalueDelet?id=' + iid,
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