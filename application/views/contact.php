<?php $this->load->view('include/header'); ?>

	<div class="contact">
		<section id="contact-detail">
			<h1><!-- &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; -->Contact Us</h1>
		     <br> 
			<p style="width:80%">For more information about Program for Accountability in Nepal (PRAN) or to apply to participate in program activities.</p>
			<h3>Email:</h3>
			<address><a href="mailto:pran@worldbank.org">pran@worldbank.org</a></address><br>
			<h3>Telephone:</h3>
			<p><a href="tel:977-1-4226792">977-1-4226792</a>
			Ext. 6184.</p>
			<h3>Website:</h3>
			<p><a href="http://www.pran.org.np" target="_blank">www.pran.org.np</a></p>
		</section>

		<div id="contact-form">
			<br>
			<form action="<?= site_url('contact#contact-form') ?>" method="post">
				<?php 
					if (isset($error)) {
						$name = set_value('name');
						$email = set_value('email');
						$message = set_value('message');
					} else {
						$name = '';
						$email = '';
						$message = '';
					}
					$data = array(
	                        'name' => 'name',
	                        'class' => 'form-input',
	                        'maxlength' => 50,
	                        'placeholder' => 'Name*',
	                        'required' => 'required',
	                        'value' => $name
	                    );
                	echo form_input($data);
                	echo "<br><br>";
                	$data = array(
                			'name' => 'email',
                			'class' => 'form-input',
                			'type' => 'email',
                			'maxlength' => 254,
                			'placeholder' => 'Email*',
                			'required' => 'required',
                			'value' => $email
                		);
                	echo form_input($data);
                	echo "<br><br>";
                	$data = array(
                			'name' => 'message',
                			'maxlength' => 1500,
                			'placeholder' => 'Message*',
                			'required' => 'required',
                			'col' => 10,
                			'row' => 10,
                			'value' => $message
                		);
                	echo form_textarea($data);
                	echo "<br>";
                ?> 
                <?php 
		            if (isset($error)) { 
		                echo "<div class='error'>";
		                echo $error;
		                echo "</div><br>"; 
		            } 
		            elseif (isset($success)) { 
		                echo "<div class='success'>";
		                echo "<p>" . $success . "</p>"; 
		                echo "</div><br>";
		            } 
	        	?>
	            <input id="form-submit" type="submit" name="Send" value="Send Message" />
	        </form>
		</div>
	</div>

<?php $this->load->view('include/footer'); ?>