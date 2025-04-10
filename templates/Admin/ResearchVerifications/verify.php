<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ResearchVerification $researchVerification
 * @var \Cake\Collection\CollectionInterface|string[] $research
 * @var \Cake\Collection\CollectionInterface|string[] $users
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Research Verifications'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="researchVerifications form content">
          <blockquote> <?= __('Judul Penelitian :').$research->judul ?></blockquote>
            <?= $this->Form->create($researchVerification) ?>
            <fieldset>
                
                <?php
                    echo $this->Form->control('verifikasi');
                    echo $this->Form->control('keterangan');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
