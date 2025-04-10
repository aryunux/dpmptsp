<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ResearchSk $researchSk
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Research Sk'), ['action' => 'edit', $researchSk->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Research Sk'), ['action' => 'delete', $researchSk->id], ['confirm' => __('Are you sure you want to delete # {0}?', $researchSk->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Research Sks'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Research Sk'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="researchSks view content">
            <h3><?= h($researchSk->no_sk) ?></h3>
            <table>
                <tr>
                    <th><?= __('No Sk') ?></th>
                    <td><?= h($researchSk->no_sk) ?></td>
                </tr>
                <tr>
                    <th><?= __('Research') ?></th>
                    <td><?= $researchSk->hasValue('research') ? $this->Html->link($researchSk->research->judul, ['controller' => 'Research', 'action' => 'view', $researchSk->research->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($researchSk->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($researchSk->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Tanggal Ttd') ?></th>
                    <td><?= h($researchSk->tanggal_ttd) ?></td>
                </tr>
                <tr>
                    <th><?= __('Tandatangan') ?></th>
                    <td><?= $researchSk->tandatangan ? __('Yes') : __('No'); ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>