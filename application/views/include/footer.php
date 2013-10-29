		<footer>
			<br />
			<div id="footer-left">
				<p>Email: pran@worldbank.org</p>
				<p>Telephone: 977-1-4226792, Ext. 6184.</p>
				<p>Website: www.pran.org.np</p>
			</div>
			<div id="footer-right"><br /><p>Copyright &copy; PRAN. All rights reserved.</p></div>
		</footer>

		<?php if($this->uri->segment(1) != 'about' && $this->uri->segment(1) != 'contact') { ?>
			<script src="<?= site_url('assets/js/alertify.min.js'); ?>" defer="defer"></script>
			<script src="<?= site_url('assets/js/scrollTo-1.4.3.1-min.js'); ?>" defer="defer"></script>
			<script src="<?= site_url('assets/js/nepal-district.min.js'); ?>"></script>
		    <script src="<?= site_url('assets/js/district-info.js'); ?>" defer="defer"></script>
			<script src="<?= site_url('assets/js/map.js'); ?>" defer="defer"></script>
			<script src="<?= site_url('assets/js/DataTables-1.9.4/media/js/jquery.dataTables.min.js'); ?>" defer="defer"></script>
			<script src="<?= site_url('assets/js/mapbox/mapbox.js'); ?>" defer="defer" ></script>
		    <script type="text/javascript" src="<?= site_url('assets/js/highcharts.js'); ?>" defer="defer"></script>
		    <script type="text/javascript" src="<?= site_url('assets/js/exporting.js'); ?>" defer="defer"></script>
		<?php } ?>
		
		<?php if($this->uri->segment(1) == 'about') { ?>
			<script src="<?= site_url('assets/js/nivo-slider/jquery.nivo.slider.pack.js') ?>" defer="defer"></script>
		<?php } ?>
	</body>

</html>