		<footer>
			<br />
			<p>Email: pran@worldbank.org</p>
			<p>Telephone: 977-1-4226792, Ext. 6184.</p>
			<p>Website: www.pran.org.np<span id="right">Copyright &copy; PRAN. All rights reserved.</span></p>
		</footer>

		<?php if($this->uri->segment(1) != 'about' && $this->uri->segment(1) != 'contact') { ?>
			<script src="<?= site_url('assets/js/nepal-district.js'); ?>" defer="defer"></script>
		    <script src="<?= site_url('assets/js/district-info.js'); ?>" defer="defer"></script>
			<script src="<?= site_url('assets/js/map.js'); ?>" defer="defer"></script>
			<script src="<?= site_url('assets/js/DataTables-1.9.4/media/js/jquery.dataTables.min.js'); ?>" defer="defer"></script>
			<script src="<?= site_url('assets/js/mapbox/mapbox.js'); ?>" defer="defer" ></script>
		    <script type="text/javascript" src="<?= site_url('assets/js/highcharts.js'); ?>" defer="defer"></script>
		    <script type="text/javascript" src="<?= site_url('assets/js/exporting.js'); ?>" defer="defer"></script>
		<?php } ?>
		
		<?php if($this->uri->segment(1) == 'about') { ?>
			<script src="assets/js/nivo-slider/jquery.nivo.slider.pack.js"></script>
		<?php } ?>
	</body>

</html>