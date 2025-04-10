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
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $research->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $research->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Research'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="research form content">
            <?= $this->Form->create($research) ?>
            <fieldset>
                <legend><?= __('Edit Research') ?></legend>
                <?php
                    echo $this->Form->control('user_id', ['options' => $users]);
                    echo $this->Form->control('judul');
                    echo $this->Form->control('tujuan');
                    echo $this->Form->control('lokasi');
                    echo $this->Form->control('bidang');
                    echo $this->Form->control('penanggung_jawab');
                    echo $this->Form->control('nama_lembaga');
                    echo $this->Form->control('anggota');
                    echo $this->Form->control('surat_permohonan');
                    echo $this->Form->control('surat_pernyataan');
                    echo $this->Form->control('dokumen_tambahan');
                    echo $this->Form->control('submitted');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
