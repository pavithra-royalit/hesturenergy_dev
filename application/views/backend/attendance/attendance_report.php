<?php $this->load->view('backend/header'); ?>
<?php $this->load->view('backend/sidebar'); ?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<style>
    .table td, .table th {
        padding:.5rem !important;
    }
</style>
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
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Monthly Attendance Report</h4>
                                <form method="post" action=""  class="form-material row">
                                    <!-- <div class="form-group col-md-3">
                                    <label class="mb-1">From Date</label>
                                        <input type="date" name="from_date"  class="form-control" placeholder="from" value="<?php echo $from_date; ?>">
                                    </div>
                                    <div class="form-group col-md-3">
                                    <label >To Date</label>
                                        <input type="date" name="to_date" id="date_to" class="form-control" value="<?php echo $to_date; ?>">
                                    </div> -->
                                    <div class="form-group col-md-3"></div>
                                    <div class="form-group col-md-3">
                                        <label>Search Month  </label>
                                    <input type="text" name="search_month" id="search_month" class="form-control mydatetimepicker" placeholder="month"value="<?php echo $search_month; ?>"  autocomplete="off" required>
                                       
                                    </div>
                                    <div class="col-md-3 form-group">
                                        <input type="submit" class="btn btn-success" value="Filter" name="submit" id="getAtdReport">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>



<?php if($search_month !=''){ ?>


                <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-header">
                                        <div class="row">
										<div class="col-6">
                                        <span class="ml-6" style="color:green"><b>Present= P</b></span>, <span style="color:red"> <b>Absent= A,</b></span> <span style="color:blue"><b>UnPaid Leave=UL,</b></span> <span style="color:blue"><b>Paid Leave=PL,</b></span> <span style="color:orange"><b>Half Day=HD</b></span>
										</div>
																				<div class="col-6">
                                        <div class="card-tools" style="float:right">
                                            
                                        <button type="button" onclick="location.href = '#" class="btn bg-gradient-success btn-sm" fdprocessedid="wlombjq"><i class="fa fa-download"></i> &nbsp;Download PDF</button>
                                        
                                        </div>
										</div>
										 										</div>
                                    </div>
                                    <!-- /.card-header -->
                                    <div  class="card-body table-responsive p-0">
                                        <table class="table table-bordered table-hover text-nowrap example1">
                                            <thead class="bg-navy disabled">
                                                <tr class="text-center">
                                                    <th>S No</th>
                                                    <th>Employee Name</th>
                                                    <?php foreach($monthattendance_data[0]['attendance'] as $mres){?>
                                                        <th><?= explode('-',$mres['month_date'])[0];?></th>
													<?php } ?>
													
		                                         </tr>
                                            </thead>
                                     
                                            <tbody>
                                                <?php $i=1; foreach ($monthattendance_data as $res) {
                                                                                                    ?>
                                                    <tr>
                                                        <td class="text-center"><?= $i++;?></td>
                                                        <td class="text-capitalize"><?= $res['empl_name'] ; ?></td>
                                                       
                                                        <?php foreach($res['attendance'] as $fres){?>
                                                        <td class="text-center"> <?php
                                                            if($fres['a_status']=="Present"){
                                                                echo "<b style='color:green;'>P</b>";
                                                            }
                                                            if($fres['a_status']=="Absent"){
                                                                echo "<b style='color:red;'>A</b>";
                                                            }
                                                            if($fres['a_status']=="Half day"){
                                                                echo "<b style='color:orange;'>HD</b>";
                                                            }
                                                            if($fres['a_status']=="Paid Leave"){
                                                                echo "<b style='color:blue;'>PL</b>";
                                                            }
                                                            if($fres['a_status']=="UnPaid Leave"){
                                                                echo "<b style='color:blue;'>UL</b>";
                                                            }
                                                            if($fres['a_status']=="Holiday"){
                                                                echo "<b style='color:red;'>H</b>";
                                                            }
                                                            if($fres['a_status']=="Sunday"){
                                                                echo "<b style='color:red;'>S</b>";
                                                            }
                                                           
                                                           
                                                         ?>    </td>
                                                        <?php } ?>
                                                     
                                                    </tr>
                                                <?php }$i++; ?>
                                            </tbody>


                                        </table>
                                       
                                    </div>
                                    <!-- /.card-body -->
                                </div>
                                <!-- /.card -->
                            </div>
                        </div>

<?php } ?>



                        <?php $this->load->view('backend/footer'); ?>

  