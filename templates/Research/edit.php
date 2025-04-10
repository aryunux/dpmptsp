<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Research $research
 * @var string[]|\Cake\Collection\CollectionInterface $users
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
        </div>
    </aside>
    <div class="column column-80">
        <div class="research form content">
            <?= $this->Form->create($research,['type'=>'file']) ?>
            <fieldset>
                <legend><?= __('Update Data Pengajuan') ?></legend>
                <?php
                    echo $this->Form->control('judul');
                    echo $this->Form->control('tujuan');
                    echo $this->Form->control('lokasi');
                    echo $this->Form->control('bidang');
                    echo $this->Form->control('penanggung_jawab');
                    echo $this->Form->control('nama_lembaga');
                    echo $this->Form->control('anggota');
                    echo $this->Form->control('surat_permohonan',['type'=>'file']);
                    echo $this->Form->control('surat_pernyataan',['type'=>'file']);
                    echo $this->Form->control('dokumen_tambahan',['type'=>'file']);
                    echo $this->Form->control('submitted',['label'=>'Submit ! (Centang jika Anda yakin sudah mengisi formulir dengan benar)']);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->button(__('Kembali'),['onclick'=>'history.back()']) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
