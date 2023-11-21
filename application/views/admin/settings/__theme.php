<?php
	$user_type = $this->session->userdata('user_type');
	if(($user_type==3) || ($user_type==4)){
		$this->load->view('admin/includes/__left_sideber'); 
	}else{  
		$this->load->view('admin/includes/__writer_left_menu.php');
	}
?>


	<!--/.Content Header (Page header)--> 
	<div class="body-content">
		<div class="row">
			
			<div class="col-md-12">

				<?php if($this->session->flashdata('message')){ ?>
					<div class="alert alert-success" role="alert">
						<span class="close" data-dismiss="alert">×</span>
						<h4 class="alert-heading"><?php echo $this->session->flashdata('message'); ?></h4>
					</div> 
				<?php } ?>
				<?php if($this->session->flashdata('error')){ ?>
					<div class="alert alert-danger" role="alert">
						<span class="close" data-dismiss="alert">×</span>
						<h4 class="alert-heading"><?php echo $this->session->flashdata('error'); ?></h4>
					</div>
				<?php } ?>

				 <div class="card mb-4">
					<div class="card-header">
						<div class="d-flex justify-content-between align-items-center">
							<div>
								<h6 class="fs-17 font-weight-600 mb-0"><?php echo makeString(['theme','settings'])?></h6>
							</div>
						</div>
					</div>

					<div class="card-body">


						<div class="row">
							<?php
								$result = $this->db->select('*')->from("settings")->where('id', 16)->get()->row();
								$theme = json_decode($result->details);

								if (isset($themes) && is_array($themes)) {
									foreach ($themes as $key => $value) {
								?>
									
										<div class="col-md-4 ">
										   
											<img class="img-fluid img-thumbnail" src="<?php echo base_url() . 'application/views/themes/' . html_escape($value) . '/preview.png'; ?>"
													 alt="<?php echo html_escape($value); ?>" >
											
											<div class="caption" >
												<h3><?php echo str_replace('-', ' ', $value); ?></h3>
												<p>
													<?php if (@$theme->default_theme !== $value) { ?>

														<a href="<?php echo base_url('admin/view_setup/active_theme/')?><?php echo html_escape($value)?>" class="btn btn-md btn-success"  role="button"><?php echo display('active')?></a>
													
													<?php } ?>
												</p>
											</div>

										</div>
									   
								<?php
									}
								}
								?>

							</div>


					</div>
				</div>
			</div>
		</div>
	</div><!--/.body content-->



