<?php $this->load->view('header'); ?>
<div class="row">
    <?php if($this->session->userdata('auth_token')):?>
    <div class="col-md-12">
	
	<a class="btn btn-primary pull-right" href="<?php echo site_url('calendar/gAuth/?logout=1');  ?>">Logout</a>
    </div>
    <?php endif;?>
</div>
<div class="row">
    <div class="col-md-12">
	<p>&nbsp;</p>
	<?php if(@$_GET['error']=='access_denied'):?>
		    	<div class="alert alert-danger">You Cancelled Authorization Request.</div>
	<?php endif;?>
	
	<?php if ($this->session->flashdata('error_msg')): ?>
    	<div class="alert alert-danger"><?php echo $this->session->flashdata('error_msg'); ?></div>
	<?php endif; ?>
	<?php if ($this->session->flashdata('success_msg')): ?>
	   	<div class="alert alert-success"><?php echo $this->session->flashdata('success_msg'); ?></div>
	<?php endif; ?>
	<?php echo form_open($action, array('id' => 'eventForm')); ?>
	<input type="hidden" name="save" value="1" />
	<table class="table table-event">
	    <tr>
		<th>Appointment Title</th><td><?php echo form_input(array('name' => 'title', 'placeholder' => 'Title', 'class' => 'form-control required_field intt','value'=>set_value('title'))); ?></td>
	    </tr>
	    <tr>
		<th>Appointment Description</th><td><?php echo form_textarea(array('name' => 'description', 'placeholder' => 'Description', 'class' => 'form-control','value'=>set_value('description'))); ?></td>
	    </tr>
	  
	    <tr>
		<th>Start Time</th>
		<td>
		    <?php echo form_input(array('name' => 'start_datetime', 'id' => '', 'placeholder' => 'YYYY', 'class' => 'form-control required_field mask_year','readonly'=>'readonly','value'=>set_value('start_datetime'))); ?>
		</td>
	    </tr>
	    <tr>
		<th>End Time</th>
		<td>
		    <?php echo form_input(array('name' => 'end_datetime', 'id' => '', 'placeholder' => 'YYYY', 'class' => 'form-control required_field mask_year','readonly'=>'readonly','value'=>set_value('end_datetime'))); ?>
		</td>
	    </tr>
	    <tr class="">
		<th>Patient Email</th>
		<td class="">
		    <p class="attendies_row"><?php echo form_input(array('name' => 'participant', 'placeholder' => 'Patient Email', 'class' => 'form-control participants valid_email','value'=>set_value('participant'))); ?></p>
		</td>
		<td><span onclick="duplicateRow(this);" data-repeat=".attendies_row" title="Add More" class="btn btn-primary hidden">+</span></td>
	    </tr>
	    <tr>
		<th></th><td><?php echo form_submit('save','Save','class="btn btn-primary"') ;  ?></td>
	    </tr>
	</table>
	<?php echo form_close(); ?>
    </div>
    <div class="col-md-6 hidden">
	<iframe style="width:100%;border: none;height: 450px;" src="<?php echo $calviewurl; ?>"></iframe>
    </div>
</div>
<script>
$('input[name="start_datetime"]').datetimepicker({format:'Y-m-d H:i',});
$('input[name="end_datetime"]').datetimepicker({format:'Y-m-d H:i',});
</script>
<?php $this->load->view('footer'); ?>