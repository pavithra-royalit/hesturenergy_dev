<?php $this->load->view('backend/header'); ?>
<?php $this->load->view('backend/sidebar'); ?>
      <div class="page-wrapper">
            <div class="message"></div>
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-themecolor"><i class="fa fa-braille" style="color:#1976d2"></i>&nbsp Dashboard</h3>
                </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                </div>
            </div>
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Row -->
                <?php if($this->session->userdata('user_type')=='DEALER'){ } else {?>
                <div class="row">
                    <!-- Column -->
                    <div class="col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex flex-row">
                                    <div class="round align-self-center round-primary"><i class="ti-user"></i></div>
                                    <div class="m-l-10 align-self-center">
                                        <h3 class="m-b-0">
                                    <?php 
                                        $this->db->where('status','ACTIVE');
                                        $this->db->where('em_role','DEALER');
                                        $this->db->from("employee");
                                        echo $this->db->count_all_results();
                                    ?>  Dealers</h3>
                                        <a href="<?php echo base_url(); ?>employee/Employees" class="text-muted m-b-0">View Details</a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                    <!-- Column -->
                    <div class="col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex flex-row">
                                    <div class="round align-self-center round-info"><i class="ti-file"></i></div>
                                    <div class="m-l-10 align-self-center">
                                        <h3 class="m-b-0">
                                          <?php 
                                        $this->db->where('doc_status','1');
                                        $this->db->from("employee");
                                        echo $this->db->count_all_results();
                                    ?>   Approvals
                                        </h3>
                                        <a href="#" class="text-muted m-b-0">View Details</a>
                                        </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                    <!-- Column -->
                    <div class="col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex flex-row">
                                    <div class="round align-self-center round-danger"><i class="fa fa-users"></i></div>
                                    <div class="m-l-10 align-self-center">
                                        <h3 class="m-b-0"> 
                                       <?php 
                                        $this->db->from("staff");
                                        echo $this->db->count_all_results();
                                    ?>     Employees
                                        </h3>
                                        <a href="<?php echo base_url(); ?>staff/Staffs" class="text-muted m-b-0">View Details</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                    <!-- Column -->
                    <div class="col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex flex-row">
                                    <div class="round align-self-center round-success"><i class="fa fa-bar-chart"></i></div>
                                    <div class="m-l-10 align-self-center">
                                        <h3 class="m-b-0">
                                       <?php 
                                        $this->db->from("leads");
                                        echo $this->db->count_all_results();
                                    ?>   Leads 
                                        </h3>
                                        <a href="<?php echo base_url(); ?>lead/Leads" class="text-muted m-b-0">View Details</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                </div>
                <?php } ?>
                <!-- Row -->
                <!-- Row -->
           
                <!-- ============================================================== -->
            </div> 
            <div class="container-fluid">
          <?php if($this->session->userdata('user_type')=='DEALER'){ } else {?>
                <!-- Row -->
                <div class="row">
                    
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Document Approvals/s</h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive" >
                                    <table class="table table-bordered table-hover earning-box">
                                        <thead>
                                            <tr>
                                                <th> Dealers  Name</th>
                                                <th>Status</th>
                                               <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $notice = $this->dashboard_model->GetdocApproval(); ?>
                                               <?php foreach($notice AS $value){ ?>
                                            <tr class="scrollbar" style="vertical-align:top">
                                                <td><?php echo $value->first_name .' '.$value->last_name; ?></td>
                                              <?php if($value->doc_status == '1'){ $doc_status = "Pending for approval" ; } ?>
                                                <td style="color:red"><?php echo $doc_status ?></td>
                                                <td> <a href="<?php echo base_url(); ?>employee/view?I=<?php echo base64_encode($value->em_id); ?>" title="View" class="btn btn-sm btn-primary waves-effect waves-light"><i class="fa fa-eye"></i></a></td>
                                              
                                            </tr>
                                            <?php } ?>
                                           
                                        
                                        </tbody>
                                    </table>
                                </div>                                
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                 
                </div>
               <?php } ?>
                                           
<?php $this->load->view('backend/footer'); ?>