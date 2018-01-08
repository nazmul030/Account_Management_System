<?php
include('admin_sidebar.php');

  ?>
   <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->

      <div class="row">
        <div class="col-12">
            <div class="row">
                <div></div>
                <div class="col-md-8 offset-md-2">
                    <div class="card mb-3">
                        <div class="card-header">ADD NEW ASSET</div>
                        <div class="card-body">
                           <form method="post" action="<?php echo base_url(); ?>Add_Project_Controller/Add_New_Asset" enctype="multipart/form-data">
                              <div class="form-group">
                                 <div class="form-row">
                                    <div class="col-md-6">
                                       <label for="exampleInputName">Name</label>
                                       <input class="form-control" id="Name" name="Name" type="text" aria-describedby="nameHelp" required>
                                    </div>
                                    <div class="col-md-6">
                                       <label for="exampleConfirmPassword">Date</label>
                                       <input id="datepicker" name="Date" class="form-control" type="date" required>
                                    </div>
                                 </div>
                              </div>
                              <div class="form-group">
                                 <div class="form-row">
                                    <div class="col-md-6">
                                       <label for="exampleInputName">Price(Individual)</label>
                                       <input class="form-control" id="Price" name="Price" type="text" aria-describedby="nameHelp" required>
                                    </div>
                                    <div class="col-md-6">
                                       <label for="exampleInputQnty">Quntity</label>
                                       <input class="form-control" id="Quantity" name="Quantity" type="text" aria-describedby="nameHelp" required>
                                    </div>
                                 </div>
                              </div>
                              <div class="form-group" id="projectdiv">
                                 <div class="form-row">
                                    <div class="col-md-12">
                                      <label for="exampleConfirmPassword">Project Name</label></br>
                                      <select class="form-control" id="ProjectId" name="ProjectId" required="required">
                                         <option value="Select Project">Select Project</option>
                                         <?php if(!empty($projects)){
                                                 foreach ($projects as $project) { ?>
                                                     <option value="<?php echo $project->Id ?>"><?php echo $project->ProjectName ?></option>
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
                                       <textarea rows="2" cols="20" class="form-control" id="Remark" name="Remark" placeholder="Remark"></textarea>
                                    </div>
                                 </div>
                              </div>                              
                              <button class="btn btn-success btn-block" name="SaveAsset">Add</button>
                              <button class="btn btn-danger btn-block" name="AssetSaveCancel">Cancel</button>
                        </form>

                     </div>
                   </div>
     </div>


      </div>
    </div>
   </div>

<?php
          include('logout_footer.php');

?>
