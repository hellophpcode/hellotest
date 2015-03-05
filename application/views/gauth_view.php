<?php $this->load->view('header'); ?>
<div class="row">
    <div class="col-md-12">
	<div class="h1">Click The Button Below to Allow us Sync with Google Calendar</div>
	<a href="<?php echo site_url('calendar/gAuth');   ?>" data-scope="<?php echo @$scope; ?>" data-clientid="<?php echo @$client_id; ?>" data-apikey="<?php echo @$api_key; ?>" class="btn btn-primary" onclick="">Authorize</a>
    </div>
</div>
<?php $this->load->view('footer'); ?>