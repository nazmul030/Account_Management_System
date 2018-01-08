<?php
include('admin_sidebar.php');
?>
<div class="container">
         <div class="card card-register mx-auto mt-5">
            <div class="card-header">EDIT ASSET INFORMATION</div>
            <div class="card-body">
              <form method="post" action="<?php echo base_url(); ?>Add_Project_Controller/Update_Asset" enctype="multipart/form-data">
                 <div class="form-group">
                    <div class="form-row">
                      <input class="form-control" id="Id" name="Id" value="<?php echo $result->Id;?>" type="hidden" aria-describedby="nameHelp" required>
                       <div class="col-md-6">
                          <label for="exampleInputName">Name</label>
                          <input class="form-control" id="Name" name="Name" value="<?php echo $result->Name;?>" type="text" aria-describedby="nameHelp" required>
                       </div>
                       <div class="col-md-6">
                          <label for="exampleConfirmPassword">Date</label>
                          <input id="datepicker" name="Date" class="form-control" value="<?php echo $result->Date;?>" type="date" required>
                       </div>
                    </div>
                 </div>
                 <div class="form-group">
                    <div class="form-row">
                       <div class="col-md-6">
                          <label for="exampleInputName">Price(Individual)</label>
                          <input class="form-control" id="Price" name="Price" value="<?php echo $result->Price;?>" type="text" aria-describedby="nameHelp" required>
                       </div>
                       <div class="col-md-6">
                          <label for="exampleInputQnty">Quntity</label>
                          <input class="form-control" id="Quantity" name="Quantity" value="<?php echo $result->Quantity;?>" type="text" aria-describedby="nameHelp" required>
                       </div>
                    </div>
                 </div>
                 <div class="form-group" id="projectdiv">
                    <div class="form-row">
                       <div class="col-md-12">
                         <label for="exampleConfirmPassword">Project Name</label></br>
                         <select class="form-control" id="ProjectId" name="ProjectId" required="required">
                            <option value="">Select Project:</option>
                            <?php if(!empty($projects)){
                                    foreach ($projects as $project) { ?>
                                        <option value="<?php echo $project->Id ?>" <?php if($result->ProjectName==$project->ProjectName) echo "selected=\"selected\""; ?>><?php echo $project->ProjectName ?></option>
                            <?php
                                    }
                                  }
                            ?>
                         </select>
                       </div>
                    </div>
                </div>
                 <div class="form-group">
                    <div class="form-row">
                       <div class="col-md-12">
                          <label for="exampleInputLastName">Remark</label>
                          <textarea rows="2" cols="20" class="form-control" id="Remark" name="Remark" placeholder="Remark"><?php echo $result->Remark ?></textarea>
                       </div>
                    </div>
                 </div>
                 <button class="btn btn-success btn-block" name="UpdateAsset">Update</button>
                 <button class="btn btn-danger btn-block" name="AssetUpdateCancel">Cancel</button>
           </form>
        </div>
      </div>
   </div>
<?php
include ('logout_footer.php');
?>
