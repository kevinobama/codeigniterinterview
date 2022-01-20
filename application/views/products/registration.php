<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Welcome to CodeIgniter</title>

	<style type="text/css">

	::selection { background-color: #E13300; color: white; }
	::-moz-selection { background-color: #E13300; color: white; }

	body {
		background-color: #fff;
		margin: 40px;
		font: 13px/20px normal Helvetica, Arial, sans-serif;
		color: #4F5155;
	}

	a {
		color: #003399;
		background-color: transparent;
		font-weight: normal;
	}

	h1 {
		color: #444;
		background-color: transparent;
		border-bottom: 1px solid #D0D0D0;
		font-size: 19px;
		font-weight: normal;
		margin: 0 0 14px 0;
		padding: 14px 15px 10px 15px;
	}

	code {
		font-family: Consolas, Monaco, Courier New, Courier, monospace;
		font-size: 12px;
		background-color: #f9f9f9;
		border: 1px solid #D0D0D0;
		color: #002166;
		display: block;
		margin: 14px 0 14px 0;
		padding: 12px 10px 12px 10px;
	}

	#body {
		margin: 0 15px 0 15px;
	}

	p.footer {
		text-align: right;
		font-size: 11px;
		border-top: 1px solid #D0D0D0;
		line-height: 32px;
		padding: 0 10px 0 10px;
		margin: 20px 0 0 0;
	}

	#container {
		margin: 10px;
		border: 1px solid #D0D0D0;
		box-shadow: 0 0 8px #D0D0D0;
	}
	</style>
</head>
<body>

<div id="container">
	<h1>kevin codeigniter Interview/</h1>

	<div id="body">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Register</h3>
                    </div>
                    <?php if($this->session->flashdata('msg_success')) { ?>
                        <div class="alert alert-success">
                            <?php echo $this->session->flashdata('msg_success'); ?>
                        </div>
                    <?php } ?>
                    <?php if($this->session->flashdata('msg_error')) { ?>
                        <div class="alert alert-danger">
                            <?php echo $this->session->flashdata('msg_error'); ?>
                        </div>
                    <?php } ?>
                    <div class="panel-body">
                        <?php $attributes = array("name" => "registrationform", "role" => "form" );
                        echo form_open("users/registration", $attributes);?>
                        <fieldset>

                            <div class="form-group <?php echo form_error('firstname') ? 'has-error' : '' ?>">
                                <label class="control-label" for="inputError"><?php echo form_error('firstname'); ?></label>
                                <input class="form-control" placeholder="Enter First Name" name="firstname" type="text" value="kevin" autofocus>
                            </div>

                            <div class="form-group <?php echo form_error('lastname') ? 'has-error' : '' ?>">
                                <label class="control-label" for="inputError"><?php echo form_error('lastname'); ?></label>
                                <input class="form-control" placeholder="Enter Last Name" name="lastname" type="text" value="gates">
                            </div>

                            <div class="form-group <?php echo form_error('email') ? 'has-error' : '' ?>">
                                <label class="control-label" for="inputError"><?php echo form_error('email'); ?></label>
                                <input class="form-control" placeholder="E-mail" name="email" type="email" value="kevinobamatheus@gmail.com">
                            </div>

                            <div class="form-group <?php echo form_error('password') ? 'has-error' : '' ?>">
                                <label class="control-label" for="inputError"><?php echo form_error('password'); ?></label>
                                <input class="form-control" placeholder="Password" name="password" type="password" value="888888">
                            </div>

                            <div class="form-group <?php echo form_error('cpassword') ? 'has-error' : '' ?>">
                                <label class="control-label" for="inputError"><?php echo form_error('cpassword'); ?></label>
                                <input class="form-control" placeholder="Confirm Password" name="cpassword" type="password" value="888888">
                            </div>

                            <button class="btn btn-success btn-block">Register</button>

                        </fieldset>
                        <?php echo form_close(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>