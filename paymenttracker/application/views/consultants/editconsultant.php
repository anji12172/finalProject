      <div id="page-wrapper">

        <div class="row">
          <div class="col-lg-12">
            <h3 class="pull-left">Edit Consultant</h3>
			<a href="<?php echo site_url('consultants'); ?>" class="btn btn-large btn-success pull-right"><i class="fa fa-chevron-left"> Back to Consultants List </i></a>
          </div>
        </div><!-- /.row -->

        <div class="row">
          <div class="col-lg-12">
            <div class="panel panel-primary">
              <div class="panel-heading">
                <h3 class="panel-title"><i class="fa fa-user"></i> Edit consultant </h3>
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
			<form role="form" method="POST" action="<?php echo site_url('consultants/editconsultant'); ?>/<?php echo (isset($consultant->conslt_id)) ? $consultant->conslt_id : '' ;?>">
			<input type="hidden" name="conslt_id" value="<?php echo (isset($consultant->conslt_id)) ? $consultant->conslt_id : '' ;?>"/>
              <div class="form-group">
                <label>Consultant Name</label>
                <input class="form-control" name="conslt_name" value="<?php echo (isset($consultant->conslt_name)) ? $consultant->conslt_name : '' ;?>"/>
				<?php echo form_error('conslt_name'); ?>
              </div>

              <div class="form-group">
                <label>Skills</label>
				<textarea class="form-control"  name="conslt_skill" ><?php echo (isset($consultant->conslt_skill)) ? $consultant->conslt_skill : '' ;?></textarea>
				<?php echo form_error('conslt_skill'); ?>
              </div>
			  
			  <div class="form-group">
                <label>Buy Price</label>
                <input class="form-control" name="conslt_buy_price" value="<?php echo (isset($consultant->conslt_buy_price)) ? $consultant->conslt_buy_price : '' ;?>"/>
				<?php echo form_error('conslt_buy_price'); ?>
              </div>
                         <div class="form-group">
                <label>Sell Price</label>
                <input class="form-control" name="conslt_sell_price" value="<?php echo (isset($consultant->conslt_sell_price)) ? $consultant->conslt_sell_price : '' ;?>"/>
				<?php echo form_error('conslt_sell_price'); ?>
              </div>

              <button type="submit" class="btn btn-large btn-success" name="editconsultantbtn" value="Edit consultant">Update Consultant Details</button>
             </form>
				  
				 </div>  
                </div>
              </div>
            </div>
          </div>
        </div><!-- /.row -->


      </div><!-- /#page-wrapper -->