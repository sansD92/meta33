<section class="top-bar">
		<div class="container">
			<div class="row">
				<div class="col-lg-6 align-self-center md-center-item">
					
					<ul class="ts-top-nav">
						<li>
							<a href="https://risalahmisteri.com/" target="_blank">Risalah Misteri</a>
						</li>
						<li>
							<a href="https://suarakonsumen.co/" target="_blank">Suara Konsumen</a>
						</li>
						<li>
							<a href="#">Litera Cafe</a>
						</li>
						<li>
							<a href="#">Advertorial</a>
						</li>
					</ul>

				</div>
				<!-- end col-->

				<div class="col-lg-6 text-right align-self-center">
					<ul class="top-social">
						
						<li class="ts-date">
							<i class="fa fa-clock-o"></i>
							<?php
                                 
$hari = array ( 1 =>    'Senin',
			'Selasa',
			'Rabu',
			'Kamis',
			'Jumat',
			'Sabtu',
			'Minggu'
		);
                                    
$tgl=$hari[date('N')];
echo $tgl;
?> , <?php
$tgl=date('d');
echo $tgl;
?> <?php
                                    
                                    $bulan = array (1 =>   'Januari',
			'Februari',
			'Maret',
			'April',
			'Mei',
			'Juni',
			'Juli',
			'Agustus',
			'September',
			'Oktober',
			'November',
			'Desember'
		);

                                    
$tgl=$bulan[date('m')] . " " . date('Y');
echo $tgl;
?>
						</li>
					</ul>
				</div>
				<!--end col -->


			</div>
			<!-- end row -->
		</div>
	</section>