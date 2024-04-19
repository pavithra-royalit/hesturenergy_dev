<?php $this->load->view('backend/header'); ?>
<?php $this->load->view('backend/sidebar'); ?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.2/html2pdf.bundle.js"></script>
<?php
  
    foreach($jobcard as $value) { 
        $job_code = $value->job_code;
        $indate = $value->indate;
        $outdate = $value->outdate;
        $kmsrun = $value->kmsrun;
        $model = $value->model;
       $chasis = $value->chasis;
       $enginno = $value->enginno;
       $service_type = $value->service_type;
       $status = $value->status;
        $vehicle = $value->vehicle;
         $number_plate = $value->number_plate;
    // print_r($pos_code);
     $sql = "SELECT * FROM `tbl_vehicle`  WHERE id='$vehicle'";
        $query=$this->db->query($sql);
        $result = $query->result();       
        foreach($result as $value1){ 
            $name1=$value1->vehicle_name;
                                                  
        }  
} 
    ?>

                     <div class="page-wrapper">
                     <div class="message"></div>
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-themecolor"><i class="fa fa-users" style="color:#1976d2"></i> <?php echo $basic->name; ?></h3>
                </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item active">Profile</li>
                    </ol>
                </div>
            </div>
            <?php $vehiclevalue = $this->vehicle_model->GetAllVehInfo(); ?>
            <div class="container-fluid">
                <div class="row">
               
                    <div class="col-12 col-md-12 col-lg-12">
                        <div class="tab-content">
                         
                          
                                <div class="tab-pane active" id="pos" role="tabpanel">
                                <div class="row" id="addon">
                                
                                      <div class="col-md-12">
                                      <div class="card">
                                      <div class="card-body">
                                         <!--<h4 class="text-center p-b-3" style="color:#13637c">View Po's Items: </h4>-->
                                         <a href="<?php echo base_url(); ?>customer/jobcardview?I=<?php echo base64_encode($basic->id) ?>" title="Edit"  class="btn btn-sm btn-info waves-effect waves-light  float-right" "><i class="fa fa-pencil-square-o"></i>List of JobCard</a>                                                            
                                         <?php $settingsvalue = $this->settings_model->GetSettingsValue(); ?>

                  
<table class="table table-bordered">
  <tbody>
    <tr>
      <td scope="col">Vehicle Name</td>
        <td scope="row"><?php echo $name1 ?></td>
        </tr>
          <tr>
       <td scope="col">JobCard number</td>
        <td scope="row"><?php echo $job_code ?></td>
        </tr>  
          <tr>
         <td scope="col">Number Plate</td>
        <td scope="row"><?php echo $number_plate ?></td>
        </tr>  
             <tr>
          <td scope="col">In Date</td>
        <td scope="row"><?php echo $indate ?></td>
        </tr>  
          <tr>
           <td scope="col">Out Date</td>
        <td scope="row"><?php echo $outdate ?></td>
        </tr> 
         <tr>
              <td scope="col">km's Run</td>
        <td scope="row"><?php echo $kmsrun ?></td>
        </tr> 
  <tr>
       <td scope="col">Model</td>
        <td scope="row"><?php echo $model ?></td>
        </tr> 
  <tr>
        <td scope="col">Chasis</td>
        <td scope="row"><?php echo $chasis ?></td>
        </tr> 
      <tr>
     <td scope="col">Enginno</td>
        <td scope="row"><?php echo $enginno ?></td>
        </tr> 
  


  </tbody>
  
  
  
</table>

                                       </div>   
                                     </div>
                                </div>   
                                <div class="col-md-1"></div>
                              </div>
                                   
                            </div>                    
                    
                          
                    
                         
                           
                            
                        </div>
                    </div>

                    </div>
                    <!-- Column -->
                </div>
          
  

<script>
  window.onload = function () {
    document.getElementById("download")
        .addEventListener("click", () => {
            const invoice = this.document.getElementById("invoice1");
            console.log(invoice);
            console.log(window);
            var opt = {
                margin: 1,
                filename: 'myfile.pdf',
                image: { type: 'jpeg', quality: 0.98 },
                html2canvas: { scale: 2 },
                jsPDF: { unit: 'in', format: 'letter', orientation: 'portrait' }
            };
            html2pdf().from(invoice).set(opt).save();
        })
}

    
    </script>                          
<?php $this->load->view('backend/footer'); ?>



                        