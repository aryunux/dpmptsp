<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Profile $profile
 * @var string[]|\Cake\Collection\CollectionInterface $users
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">

        </div>
    </aside>
    <div class="column column-80">
        <div class="profiles form content">
            <?= $this->Form->create($profile) ?>
            <fieldset>
                <legend><?= __('Edit Profile') ?></legend>
                <?php
                    echo $this->Form->control('nik');
                    echo $this->Form->control('nama_lengkap');
                    echo $this->Form->control('tempat_lahir');
                    echo $this->Form->control('tanggal_lahir');
                    echo $this->Form->control('alamat_lengkap');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->button(__('Kembali'),['onclick'=>'history.back()']) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
