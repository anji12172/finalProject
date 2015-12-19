  <div id="page-wrapper">

	<div class="row">
	  <div class="col-lg-12">
		<h3 class="pull-left">Consultants</h3>
		<a href="<?php echo site_url('consultants/createconsultant'); ?>" class="btn btn-large btn-success pull-right"><i class="fa fa-plus"> Create Consultant </i></a>
	  </div>
	</div><!-- /.row -->

	<div class="row">
	  <div class="col-lg-12">
		<div class="panel panel-primary">
		  <div class="panel-heading">
			<h3 class="panel-title"><i class="fa fa-user"></i> List of Consultants</h3>
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
					<th>Consultant Name <i class="fa fa-sort"></i></th>
					<th>Consultant Skills <i class="fa fa-sort"></i></th>
					<th>Buy Price <i class="fa fa-sort"></i></th>
                                        <th>Sell Price <i class="fa fa-sort"></i></th>
                                        <th>Client<i class="fa fa-sort"></i></th>
                                        <th>Employer <i class="fa fa-sort"></i></th>
					<th>Actions</th>
				  </tr>
				</thead>
				<tbody>
				<?php
				if( isset($consultant) && $consultant->num_rows() > 0 )
				{
					foreach ($consultant->result_array() as $count => $consultant)
					{
					?>
					<tr>
					<td><?php echo ucfirst($consultant['conslt_name']); ?></td>
					<td><?php echo limit_text($consultant['conslt_skill'], 50); ?></td>
					<td><?php echo $consultant['conslt_buy_price']; ?></td>
                                        <td><?php echo $consultant['conslt_sell_price']; ?></td>
                                        <td></td>
                                        <td></td>
					<td>
					<a href="<?php echo site_url('consultants/editconsultant/'.$consultant['conslt_id']); ?>" class="btn btn-xs btn-success"><i class="fa fa-check"> Edit </i></a>
					<a href="<?php echo site_url('consultants/delete/'.$consultant['conslt_id']);?>" onclick="return confirm('Are you sure you want to permanently delete this consultant?');" class="btn btn-danger btn-xs"><i class="fa fa-times"> Delete </i></a>
					</td>
					</tr>
					<?php
					}
				}
				else
				{
				?>
				<tr class="no-cell-border"><td> There are no consultants available at the moment.</td>
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