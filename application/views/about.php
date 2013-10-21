<?php $this->load->view('include/header'); ?>

	<div class="about">
		<section id="about">

			<h1>About PRAN</h1><br>
		    <h3>Programme for Accountability in Nepal is designed to provide practical training and action learning aimed at developing the capacity of civil society and government actors to promote social accountability in Nepal.</h3>
			<br>
		    <p>It is hoped that the impact of these initiatives, over time, will be to promote more accountable, honest, transparent and responsive government agencies delivering quality public services. PRAN has over 70 CSOs working through two programs Public Financial Management under Multi Donor Trust Fund and Public Service Delivery under State Peace Building Fund.</p>
		</section>

		<div id="carousel">
			<div class="slider-wrapper theme-default"> 
    			<div class="ribbon"></div> 
				<div id="slider" class="nivoSlider">
	    			<img src="assets/img/carousel-images/1.jpg" alt="" title="Overview of Activities of PRAN. Social Participation" />
	    			<img src="assets/img/carousel-images/4.jpg" alt="" title="Activities of PRAN" />
	    			<img src="assets/img/carousel-images/5.jpg" alt="" title="Overview of Activities of PRAN on Bajhang District. Social Participation" />
	    			<img src="assets/img/carousel-images/2.jpg" alt="" title="Overview of Activities of PRAN. Social Participation" />
	    			<img src="assets/img/carousel-images/3.jpg" alt="" title="Overview of Activities of PRAN. Social Participation" />
	    			<img src="assets/img/carousel-images/7.jpg" alt="" title="Overview of Activities of PRAN. Social Participation" />
	    			<img src="assets/img/carousel-images/6.jpg" alt="" title="Overview of Activities of PRAN. Bootcamp" />
				</div>
			</div>
		</div>

	</div>

	<section id="description">
		<p>PRAN helps address social accountability by enhancing the ability of citizens, 
		civil society organizations, and other non-state actors to hold the state accountable and that also enhance the capacity of the state to become more transparent, accountable, and responsive to the needs and demands of citizens.</p><br><p> Over the past decade an impressive array of social accountability approaches and tools has evolved globally. These practices have been well honed in countries where they are widely implemented and have become powerful instruments to underpin <span class="highlight">“demand for good governance”</span>.</p>
	</section>

	<div id="goto">
		<div id="broucher">
			<img src="assets/img/icon-broucher.png" title="Download Brochure" alt="Download Brochure" style="height:150px; width:150px;"><br><br><p>Know more about PRAN.</p><a href="<?php echo site_url('about/download/PranBrochure.pdf'); ?>"><input class="button" name="download broucher" type="button" value="Download Brochure"></a>
		</div>
		<div id="viewmap">
			<img src="assets/img/icon-map.png" title="View Map" alt="View Map" style="height:150px; width:150px;"><br><br><p>For better insights on PRAN activities.</p><a href="<?php echo site_url('map'); ?>"><input class="button" name="viewmap" type="button" value="View Map"></a>
		</div>
		<div id="contact">
			<img src="assets/img/icon-contact.png" title="Contact Us" alt="Contact Us" style="height:150px; width:150px;"><br><br><p>Want to be associated with PRAN ?</p><a href="<?php echo site_url('contact'); ?>"><input class="button" name="gotocontact" type="button" value="Contact Us"></a>
		</div>		
	</div>
	
<?php $this->load->view('include/footer'); ?>