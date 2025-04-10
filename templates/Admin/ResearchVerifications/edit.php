<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ResearchVerification $researchVerification
 * @var string[]|\Cake\Collection\CollectionInterface $research
 * @var string[]|\Cake\Collection\CollectionInterface $users
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $researchVerification->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $researchVerification->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Research Verifications'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="researchVerifications form content">
            <?= $this->Form->create($researchVerification) ?>
            <fieldset>
                <legend><?= __('Edit Research Verification') ?></legend>
                <?php
                    echo $this->Form->control('research_id', ['options' => $research]);
                    echo $this->Form->control('verifikasi');
                    echo $this->Form->control('keterangan');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
