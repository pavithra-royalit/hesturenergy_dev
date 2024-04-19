       
        <aside class="left-sidebar">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- User profile -->
                        <?php 
                        $id = $this->session->userdata('user_login_id');
                        $basicinfo = $this->employee_model->GetBasic($id); 
                        ?>                
                <div class="user-profile">
                    <!-- User profile image -->
                    <div class="profile-img"> 
                         <!--<img src="<?php echo base_url(); ?>assets/images/users/<?php echo $basicinfo->em_image ?>" alt="user" /> -->
                         <!--this is blinking heartbit-->
                         <!--<div class="notify setpos"> <span class="heartbit"></span> <span class="point"></span> </div> -->
                    </div>

                    <!-- User profile text-->
                    <div class="profile-text">
                        <h5 class='text-white mt-4'><?php echo $basicinfo->first_name.' '.$basicinfo->last_name; ?></h5>
                           <h6 class='text-white mt-3'>(<?php echo $basicinfo->em_role ?>)</h6>
                        <!--<a href="<?php echo base_url(); ?>settings/Settings" class="dropdown-toggle u-dropdown" role="button" aria-haspopup="true" aria-expanded="true"><i class="mdi mdi-settings"></i></a>-->
                        <!--<a href="<?php echo base_url(); ?>login/logout" class="" data-toggle="tooltip" title="Logout"><i class="mdi mdi-power"></i></a>-->
                    </div> 
                </div>
                <!-- End User profile text-->
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <li class="nav-devider"></li>
                        
                        <li> <a href="<?php echo base_url(); ?>" ><i class="mdi mdi-gauge"></i><span class="hide-menu">Dashboard </span></a></li>
                        <?php if($this->session->userdata('user_type')=='DEALER'){ ?>
                          <li> <a class="waves-effect waves-dark" href="<?php echo base_url(); ?>employee/view?I=<?php echo base64_encode($basicinfo->em_id); ?>" >
                          <i class="fa fa-user-circle" aria-hidden="true"></i><span class="hide-menu">My Profile </span></a>
                        </li>
                           <li> <a class="waves-effect waves-dark" href="<?php echo base_url(); ?>vehicle/Vehicle" >
                          <i class="fa fa-motorcycle" aria-hidden="true"></i><span class="hide-menu">Vehicle </span></a>
                        </li>
                        <li> <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="fa fa-users" aria-hidden="true"></i><span class="hide-menu">Customers </span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="<?php echo base_url(); ?>customer/Customers"> Customers List  </a></li>
                                <li><a href="<?php echo base_url(); ?>pos/Pos"> POS  </a></li>
                                <li><a href="<?php echo base_url(); ?>pos/Invoice">POS Invoices  </a></li>
                                <li><a href="<?php echo base_url(); ?>pos/Jobcard"> Job Cards  </a></li>
                                   <li><a href="<?php echo base_url(); ?>pos/JCInvoice">JC Invoices  </a></li>
                                <li><a href="<?php echo base_url(); ?>pos/GatePass"> Gate Pass  </a></li>
                                
                            </ul>
                        </li>
                         <li> <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="fa fa-sitemap" aria-hidden="true"></i><span class="hide-menu">Stock / Item </span></a>
                            <ul aria-expanded="false" class="collapse">
                                  <li><a href="#"> Category </a></li>
                                <li><a href="#"> Items </a></li>
                                <li><a href="#"> Item Request  </a></li>
                                <li><a href="#"> Stock Reports  </a></li>
                                 <li><a href="#"> Vehicle Request  </a></li>
                               
                            </ul>
                        </li>
                         <li> <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="fa fa-exclamation-circle" aria-hidden="true"></i><span class="hide-menu">Warranty </span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="#">  Claim Request </a></li>
                          
                            </ul>
                        </li>
                           <li> <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="fa fa-ticket" aria-hidden="true"></i><span class="hide-menu">Support </span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="#">  Active Tickets</a></li>
                                  <li><a href="#">  Closed Tickets</a></li>
                          
                            </ul>
                        </li>
                             <li> <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="mdi mdi-settings"></i><span class="hide-menu">Settings </span></a>
                            <ul aria-expanded="false" class="collapse">
                              <li><a href="<?php echo base_url(); ?>settings/Settings">Settings </a></li>
                                <li><a href="<?php echo base_url(); ?>login/logout">Logout</a></li>
                          
                            </ul>
                        </li>
                        <?php } else { ?>
                        <li> <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="fa fa-bar-chart" aria-hidden="true"></i><span class="hide-menu">Sales Department </span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="<?php echo base_url(); ?>lead/Add_lead">Add Leads  </a></li>
                                  <li><a href="<?php echo base_url(); ?>lead/Leads"> Leads List </a></li>
                               
                            </ul>
                        </li>
                        <li> <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="mdi mdi-account-multiple"></i><span class="hide-menu">Staff Management </span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="<?php echo base_url(); ?>staff/Staffs"> Employees  </a></li>
                                 <li><a href="<?php echo base_url(); ?>role/Roles"> Roles  </a></li>
                                  <li><a href="<?php echo base_url(); ?>attendance/Attendances"> Attendance  </a></li>
                                    <li><a href="<?php echo base_url(); ?>officeshifts/Shift"> Office Shift  </a></li>
                                      <li><a href="<?php echo base_url(); ?>holiday/Holidays"> Holidays  </a></li>
                            </ul>
                        </li>
                         <li> <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="fa fa-user-circle" aria-hidden="true"></i><span class="hide-menu">Dealers </span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="<?php echo base_url(); ?>employee/Employees"> Dealers  </a></li>
                                 <li><a href="<?php echo base_url(); ?>employee/Inactive_Employee"> Inactive Dealers  </a></li>
                                <!--<li><a href="#"> KYC Update  </a></li>-->
                                <li><a href="<?php echo base_url(); ?>pos/Invoice"> POS Invoices  </a></li>
                                <li><a href="<?php echo base_url(); ?>pos/JCInvoice"> JC Invoices  </a></li>
                                 <li><a href="<?php echo base_url(); ?>pos/GatePass""> Gate Pass  </a></li>
                               
                            </ul>
                        </li>
                         <li> <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="fa fa-shopping-bag" aria-hidden="true"></i><span class="hide-menu">Show Rooms </span></a>
                            <ul aria-expanded="false" class="collapse">
                                <!--<li><a href="#"> Customers  </a></li>-->
                                <!--<li><a href="#"> Sales/Purchase </a></li>-->
                                <!--<li><a href="#"> Services  </a></li>-->
                                <!--<li><a href="#"> Gate Pass  </a></li>-->
                                
                                   <li><a href="#"> POS Invoices  </a></li>
                                <li><a href="#"> JC Invoices  </a></li>
                                 <li><a href="#"> Gate Pass  </a></li>
                               
                            </ul>
                        </li>
                         <li> <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="fa fa-sitemap" aria-hidden="true"></i><span class="hide-menu">Stock / Item </span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="#"> Category  </a></li>
                                <li><a href="#"> Items </a></li>
                                <li><a href="#"> Stock Request  </a></li>
                                <li><a href="#"> Stock Report  </a></li>
                               
                            </ul>
                        </li>
                          <li> <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="fa fa-exclamation-circle" aria-hidden="true"></i><span class="hide-menu">Warranty </span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="#"> Warranty Info  </a></li>
                                <li><a href="#"> Warranty due Request </a></li>
                          
                            </ul>
                        </li>
                           <li> <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="fa fa-file" aria-hidden="true"></i><span class="hide-menu">Website/CMS </span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="#">About Us </a></li>
                                <li><a href="#"> Contact Us</a></li>
                          
                            </ul>
                        </li>
                           <li> <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="mdi mdi-settings"></i><span class="hide-menu">Settings </span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="<?php echo base_url(); ?>settings/Settings">Settings </a></li>
                                <li><a href="<?php echo base_url(); ?>login/logout">Logout</a></li>
                          
                            </ul>
                        </li>
                        
                     
                        <?php } ?>
                    </ul>
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>