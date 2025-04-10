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
            <div class="column column-50">
              <?= $this->Html->image('profiles/ktp'.DS.$profile->ktp) ?>
            </div>
            <?= $this->Form->create($profile,['type'=>'file','accept' => 'image/jpeg, image/jpg, image/png']) ?>
            <fieldset>

                <?php
                    echo $this->Form->control('ktp',['type'=>'file']);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Update')) ?>
            <?= $this->Form->button(__('Kembali'),['onclick'=>'history.back()']) ?>
            <?= $this->Form->end() ?>

        </div>
    </div>
</div>
