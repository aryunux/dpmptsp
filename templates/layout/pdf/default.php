<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8"/>
	<title></title>
	<?= $this->Html->css('panada') ?>
	<?= $this->fetch('css') ?>
</head>
<body>
		<div class="container" style="height:100%; font-size:13px;">
		    <div class='pdf-header' align='center'>
		        <?= $this->Html->image('bb.png',['fullBase'=>true,'width'=>80, 'align'=>'center']) ?>
		        <h4 align="center" style="line-height: 100%; margin-bottom: 0; margin-top:0;">PEMERINTAH
		        KABUPATEN BONE BOLANGO</h4>
		        <h4 align="center" style="line-height: 100%; margin-bottom: 0cm; margin-top:0;">DINAS
		        PENANAMAN MODAL DAN PELAYANAN TERPADU SATU PINTU</h4>
		        <h4 align="center" style="line-height: 100%; margin-bottom: 0cm; ">SURAT
		        KETERANGAN PENELITIAN</h4>
		    </div>
		    <div class='pdf-content'>
		        <?= $this->fetch('content') ?>
		    </div>
		    <div class='pdf-footer' style="bottom:0; width:100%; margin-top:150px;">
					<hr />
					<p style="font-size:9px; font-style:italic;">Dokumen ini telah diverifikasi dan ditetapkan secara elektronik oleh Dinas Penanaman Modal Dan Pelayanan Terpadu Satu Pintu Kabupaten Bone Bolango </p>
		    </div>
		</div>
</body>
</html>
