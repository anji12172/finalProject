      <div id="page-wrapper">

        <div class="row">
          <div class="col-lg-12">
            <h3 class="pull-left">Edit Employer</h3>
			<a href="<?php echo site_url('employer'); ?>" class="btn btn-large btn-success pull-right"><i class="fa fa-chevron-left"> Back to Employer List </i></a>
          </div>
        </div><!-- /.row -->

        <div class="row">
          <div class="col-lg-12">
            <div class="panel panel-primary">
              <div class="panel-heading">
                <h3 class="panel-title"><i class="fa fa-user"></i> Edit Employer </h3>
              </div>
              <div class="panel-body">
                <div class="table-responsive">
           <div class="col-lg-6"> 
				<?php
				if($this->session->flashdata('success')){
				?>
				<div class="alert alert-dismissable alert-success">
				<button type="button" class="close" data-dismiss="alert">&times;</button>
				<strong>Success !</strong> <?php echo $this->session->flashdata('success');?>
				</div>
				<?php
				}
				?>
			<form role="form" method="POST" action="<?php echo site_url('employer/editemployer'); ?>/<?php echo (isset($employer->emp_id)) ? $employer->emp_id : '' ;?>">
			<input type="hidden" name="product_id" value="<?php echo (isset($employer->emp_id)) ? $employer->emp_id : '' ;?>"/>
              <div class="form-group">
                <label>Company Name</label>
                <input class="form-control" name="company_name" value="<?php echo (isset($employer->emp_cmpname)) ? $employer->emp_cmpname : '' ;?>"/>
				<?php echo form_error('company_name'); ?>
              </div>

              <div class="form-group">
                <label>Contact Person</label>
				<input class="form-control" name="contact_person" value="<?php echo (isset($employer->emp_cpname)) ? $employer->emp_cpname : '' ;?>"/>
				<?php echo form_error('contact_person'); ?>
              </div>
               <div class="form-group">
                <label>Email</label>
				<input class="form-control" name="email" value="<?php echo (isset($employer->emp_email)) ? $employer->emp_email : '' ;?>"/>
				<?php echo form_error('email'); ?>
              </div>
              
              <div class="form-group">
                <label>Phone Number</label>
				<input class="form-control" name="phone_no" value="<?php echo (isset($employer->emp_phoneno)) ? $employer->emp_phoneno : '' ;?>"/>
				<?php echo form_error('phone_no'); ?>
              </div>  
                <div class="form-group">
                <label>Consultant Name</label>
                <select name="product_id" id="product_id" class="form-control">
                    <optgroup label="Selected Consultant">
                    <option value="<?php echo (isset($employer->conslt_id)) ? $employer->conslt_id : '' ;?>"><?php echo (isset($employer->conslt_name)) ? $employer->conslt_name: '' ;?></option>
                    </optgroup> 
                    <optgroup label="All Consultant">
                    <?php
                    if(isset($products)&& $products->num_rows>0)
                    {
                    foreach($products->result_array() as $count=>$products)
                    {
                        if($employer->conslt_id==$products['conslt_id'])
                        {}
                        else 
                        {
                    ?>
                    <option value="<?php echo $products['conslt_id']; ?>"><?php echo $products['conslt_name'];?></option>
                                       
                    <?php
                        }
                    }
                    }
                    ?>
                    </optgroup>
                </select>
				
              </div>             
               <div class="form-group">
                <label>City</label>
				<input class="form-control" name="city" value="<?php echo (isset($employer->emp_city)) ? $employer->emp_city : '' ;?>"/>
				<?php echo form_error('city'); ?>
              </div>
               <div class="form-group">
                <label>Address</label>
				<textarea class="form-control"  name="address" ><?php echo (isset($employer->emp_address)) ? $employer->emp_address : '' ;?></textarea>
				<?php echo form_error('address'); ?>
              </div>             

              <button type="submit" class="btn btn-large btn-success" name="editemployerbtn" value="Edit Employer">Update Employer Details</button>
             </form>
				  
				 </div>  
                </div>
              </div>
            </div>
          </div>
        </div><!-- /.row -->


      </div><!-- /#page-wrapper -->