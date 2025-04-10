
<header class="bg-indigo bg-gradient text-white">
    <div class="container px-4 text-center">
        <?= $this->Html->image('bb.png',['width'=> 150]) ?>
        <h3 class="fw-bolder">Dinas Penanaman Modal dan PTSP</h3>
        <p class="lead">Kabupaten Bone Bolango</p>
        <a class="btn btn-lg btn-light" href="#penelitian">Permohonan Izin Penelitian!</a>
    </div>
</header>
<!-- About section-->
<section id="penelitian">
    <div class="container px-4">
        <div class="row gx-4 justify-content-center">
            <div class="col-lg-8">
                <h2>Izin Penelitian</h2>
                <p class="lead">Syarat Izin Penelitian:</p>
                <ul>
                    <li>Melakukan pendaftaran pada media yang disediakan</li>
                    <li>Surat Permohonan dan atau Pengantar dari Lembaga/Universitas/Perguruan Tinggi</li>
                    <li>Surat Pernyataan Kesesuaian/Kebenaran Informasi</li>
                    <li>Pasfoto 3x4 (2 lembar)</li>
                    <li>Dokumen pendukung (misalnya: KTM)</li>
                </ul>
                <?= $this->Html->link(__('DAFTAR Sekarang'),['controller'=>'users','action'=>'register'],['class'=>'btn btn-primary']) ?>
            </div>
            <div class="col-md-4">
                <?= $this->Html->image('research.jpg',['width'=> 400, 'class'=>'float-left']) ?>
            </div>
        </div>
    </div>
</section>
