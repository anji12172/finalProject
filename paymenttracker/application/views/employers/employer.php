  <div id="page-wrapper">

	<div class="row">
	  <div class="col-lg-12">
		<h3 class="pull-left">Employers</h3>
		<a href="<?php echo site_url('employer/createemployer'); ?>" class="btn btn-large btn-success pull-right"><i class="fa fa-plus"> Create Employee </i></a>
	  </div>
	</div><!-- /.row -->

	<div class="row">
	  <div class="col-lg-12">
		<div class="panel panel-primary">
		  <div class="panel-heading">
			<h3 class="panel-title"><i class="fa fa-user"></i> List of Employers</h3>
		  </div>
		  <div class="panel-body">
			<div class="table-responsive">
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
			  <table class="table table-bordered table-hover table-striped tablesorter">
				<thead>
				  <tr class="table_header">
					<th>Company Name <i class="fa fa-sort"></i></th>
					<th>Contact Person <i class="fa fa-sort"></i></th>
                                        <th>Phone No<i class="fa fa-sort"></i></th>
                                        <th>Consultant<i class="fa fa-sort"></i></th>
					<th>Email <i class="fa fa-sort"></i></th>
                                        <th>City<i class="fa fa-sort"></i></th>
					<th>Actions</th>
				  </tr>
				</thead>
				<tbody>
				<?php
				if( isset($employer) && $employer->num_rows() > 0 )
				{
					foreach ($employer->result_array() as $count => $employer)
					{
					?>
					<tr>
					<td><?php echo ucfirst($employer['emp_cmpname']); ?></td>
                                        <td><?php echo ucfirst($employer['emp_cpname']); ?></td>
					<td><?php echo $employer['emp_phoneno']; ?></td>
                                        <td><?php echo ucfirst($employer['conslt_name']); ?></td>
                                        <td><?php echo $employer['emp_email']; ?></td>
                                        <td><?php echo ucfirst($employer['emp_city']); ?></td>
					<td>
					<a href="<?php echo site_url('employer/editemployer/'.$employer['emp_id']); ?>" class="btn btn-xs btn-success"><i class="fa fa-check"> Edit </i></a>
					<a href="<?php echo site_url('employer/delete/'.$employer['emp_id']);?>" onclick="return confirm('Are you sure you want to permanently delete this product?');" class="btn btn-danger btn-xs"><i class="fa fa-times"> Delete </i></a>
					</td>
					</tr>
					<?php
					}
				}
				else
				{
				?>
				<tr class="no-cell-border"><td> There are no employers available at the moment.</td>
				<td></td>
				<td></td>
				<td></td>
                                <td></td>
				<td></td>
				<td></td>
				</tr>
				<?php
				}
				?>
				</tbody>
			  </table>
			</div>
		  </div>
		</div>
	  </div>
	</div><!-- /.row -->


  </div><!-- /#page-wrapper -->