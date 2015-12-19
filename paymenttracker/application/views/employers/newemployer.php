      <div id="page-wrapper">

        <div class="row">
          <div class="col-lg-12">
            <h3 class="pull-left">Create Employer</h3>
			<a href="<?php echo site_url('employer'); ?>" class="btn btn-large btn-success pull-right"><i class="fa fa-chevron-left"> Back to Employer List </i></a>
          </div>
        </div><!-- /.row -->

        <div class="row">
          <div class="col-lg-12">
            <div class="panel panel-primary">
              <div class="panel-heading">
                <h3 class="panel-title"><i class="fa fa-user"></i> Create a new employer </h3>
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
			<form role="form" method="POST" action="<?php echo site_url('employer/createemployer'); ?>">
              <div class="form-group">
                <label>Company Name</label>
                <input class="form-control" name="company_name" value="<?php echo set_value('company_name');?>"/>
				<?php echo form_error('company_name'); ?>
              </div>

              <div class="form-group">
                <label>Contact Person</label>
				<input class="form-control" name="contact_person" value="<?php echo set_value('contact_person');?>"/>
				<?php echo form_error('contact_person'); ?>
              </div>
               <div class="form-group">
                <label>Email</label>
				<input class="form-control" name="email" value="<?php echo set_value('email');?>"/>
				<?php echo form_error('email'); ?>
              </div>
              
              <div class="form-group">
                <label>Phone Number</label>
				<input class="form-control" name="phone_no" value="<?php echo set_value('phone_no');?>"/>
				<?php echo form_error('phone_no'); ?>
              </div>  
                <div class="form-group">
                <label>Consultant Name</label>
                <select name="product_id" id="product_id" class="form-control">
                    <?php
                    if(isset($products)&& $products->num_rows >0)
                    {
                    foreach($products->result_array() as $count=>$products)
                    {
                    ?>
                    <option value="<?php echo $products['conslt_id']; ?>"><?php echo $products['conslt_name'];?></option>
                                       
                    <?php
                    }
                    }
                    ?>
                </select>
                <?php echo form_error('product_id'); ?>
				
              </div>             
               <div class="form-group">
                <label>City</label>
				<input class="form-control" name="city" value="<?php echo set_value('city');?>"/>
				<?php echo form_error('city'); ?>
              </div>
               <div class="form-group">
                <label>Address</label>
				<textarea class="form-control"  name="address" ><?php echo set_value('address');?></textarea>
				<?php echo form_error('address'); ?>
              </div>              
			  
            <!--div class="form-group">
                <label>Unit Price</label>
                <input class="form-control" name="product_unit_price" value="<?php echo set_value('product_unit_price');?>"/>
				<?php echo form_error('product_unit_price'); ?>
              </div-->

              <button type="submit" class="btn btn-large btn-success" name="createemployerbtn" value="New Employer">Create Employer</button>
              <button type="reset" class="btn btn-large btn-danger">Reset Form</button>  

            </form>
				  
				 </div>  
                </div>
              </div>
            </div>
          </div>
        </div><!-- /.row -->


      </div><!-- /#page-wrapper -->