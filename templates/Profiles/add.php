<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Profile $profile
 * @var \Cake\Collection\CollectionInterface|string[] $users
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">

        </div>
    </aside>
    <div class="column column-80">
        <div class="profiles form content">
            <?= $this->Form->create($profile,['type'=>'file']) ?>
            <fieldset>
                <legend><?= __('Lengkapi Profil') ?></legend>
                <?php
                    echo $this->Form->control('nik');
                    echo $this->Form->control('nama_lengkap');
                    echo $this->Form->control('tempat_lahir');
                    echo $this->Form->control('tanggal_lahir');
                    echo $this->Form->control('alamat_lengkap');
                    echo $this->Form->control('pasfoto',['type'=>'file']);
                    echo $this->Form->control('ktp',['type'=>'file']);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->button(__('Kembali'),['onclick'=>'history.back()']) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
