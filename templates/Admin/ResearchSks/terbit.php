<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ResearchSk $researchSk
 * @var \Cake\Collection\CollectionInterface|string[] $research
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Research Sks'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="researchSks form content">
            <?= $this->Form->create($researchSk) ?>
            <fieldset>
                <legend><?= __('Terbitkan SKP') ?></legend>
                <?php
                    echo "Nomor SKP : $new";
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
