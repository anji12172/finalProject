      <div id="page-wrapper">

        <div class="row">
          <div class="col-lg-12">
            <h3 class="pull-left">Create Consultant</h3>
			<a href="<?php echo site_url('consultants'); ?>" class="btn btn-large btn-success pull-right"><i class="fa fa-chevron-left"> Back to Consultants List </i></a>
          </div>
        </div><!-- /.row -->

        <div class="row">
          <div class="col-lg-12">
            <div class="panel panel-primary">
              <div class="panel-heading">
                <h3 class="panel-title"><i class="fa fa-user"></i> Create a new consultant </h3>
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
			<form role="form" method="POST" action="<?php echo site_url('consultants/createconsultant'); ?>">
              <div class="form-group">
                <label>Consultant Name</label>
                <input class="form-control" name="conslt_name" value="<?php echo set_value('conslt_name');?>"/>
				<?php echo form_error('conslt_name'); ?>
              </div>

              <div class="form-group">
                <label>Consultant Skill</label>
				<textarea class="form-control"  name="conslt_skill" ><?php echo set_value('conslt_skill');?></textarea>
				<?php echo form_error('conslt_skill'); ?>
              </div>
             <div class="form-group">
                <label>Employer</label>
                <select name="emp_id" class="form-control" id="emp_id">
                    <optgroup label="ALL EMPLOYERS">
                        <?php
                        foreach($emp_list->result_array() as $count=>$emp_list)
                        {
                        
                        ?>
                        <option value="<?php echo $emp_list['emp_id']; ?>"><?php echo $emp_list['emp_cmpname']; ?></option>
                        <?php
                        }
                        
                        ?>
                    </optgroup>
                </select>
				<?php echo form_error('emp_id'); ?>
              </div>
              <div class="form-group">
                <label>Buy Price</label>
                <input class="form-control" name="conslt_buy_price" value="<?php echo set_value('conslt_buy_price');?>"/>
				<?php echo form_error('conslt_buy_price'); ?>
              </div>
              
              <div class="form-group">
                                <label>Client Name</label>
                                <select name="client_id" class="form-control" id="client_id" >
                                    <optgroup label="ALL CLIENTS">
                                        <?php
                                        foreach ($client_list->result_array() as $count => $client_list) 
                                        {
                                        ?>
                                        <option><?php echo $client_list['client_name'];?></option>
                                        <?php    
                                        }
                                        ?>
                                    </optgroup>
                                    
                               
                                </select>
                                
             </div>
              <div class="form-group">
                <label>Sell Price</label>
                <input class="form-control" name="conslt_sell_price" value="<?php echo set_value('conslt_sell_price');?>"/>
				<?php echo form_error('conslt_sell_price'); ?>
              </div>                  
            <!--div class="form-group">
                <label>Unit Price</label>
                <input class="form-control" name="product_unit_price" value="<?php //echo set_value('product_unit_price');?>"/>
				<?php //echo form_error('product_unit_price'); ?>
              </div-->

              <button type="submit" class="btn btn-large btn-success" name="createconsultantbtn" value="New consultant">Create Consultant</button>
              <button type="reset" class="btn btn-large btn-danger">Reset Form</button>  

            </form>
				  
				 </div>  
                </div>
              </div>
            </div>
          </div>
        </div><!-- /.row -->


      </div><!-- /#page-wrapper -->