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
			<form action="" method="post">  
	                <!-- <label for="name">Name:</label><br/> -->
	                <input class="form-input" type="text" name="name" required placeholder="Name*"/>
	                <br><br>
	                <!-- <label for="email">Email:</label><br/> -->
	                <input class="form-input" type="email" name="email" required placeholder="Email*"/>
	                <br><br>
	                <!-- <label for="message">Message:</label><br/> -->
	                <textarea name="message" required placeholder="Message*"></textarea>
	                <br><br>
	                <?php 
			            if (isset($error)) { 
			                echo "<div class='error'>";
			                echo $error;
			                echo "</div><br><br>"; 
			            } 
			            elseif (isset($success)) { 
			                echo "<div class='success'>";
			                echo "<p>" . $success . "</p>"; 
			                echo "</div><br><br>";
			            } 
		        	?>
	                <input id="form-submit" type="submit" name="Send" value="Send Message" />
	        </form>
		</div>
	</div>

<?php $this->load->view('include/footer'); ?>