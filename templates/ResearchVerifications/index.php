<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\ResearchVerification> $researchVerifications
 */
?>
<div class="researchVerifications index content">
    <?= $this->Html->link(__('New Research Verification'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Research Verifications') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('research_id') ?></th>
                    <th><?= $this->Paginator->sort('status') ?></th>
                    <th><?= $this->Paginator->sort('keterangan') ?></th>
                    <th><?= $this->Paginator->sort('user_id') ?></th>
                    <th><?= $this->Paginator->sort('created') ?></th>
                    <th><?= $this->Paginator->sort('modified') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($researchVerifications as $researchVerification): ?>
                <tr>
                    <td><?= $this->Number->format($researchVerification->id) ?></td>
                    <td><?= $researchVerification->hasValue('research') ? $this->Html->link($researchVerification->research->judul, ['controller' => 'Research', 'action' => 'view', $researchVerification->research->id]) : '' ?></td>
                    <td><?= h($researchVerification->status) ?></td>
                    <td><?= h($researchVerification->keterangan) ?></td>
                    <td><?= $researchVerification->hasValue('user') ? $this->Html->link($researchVerification->user->username, ['controller' => 'Users', 'action' => 'view', $researchVerification->user->id]) : '' ?></td>
                    <td><?= h($researchVerification->created) ?></td>
                    <td><?= h($researchVerification->modified) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $researchVerification->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $researchVerification->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $researchVerification->id], ['confirm' => __('Are you sure you want to delete # {0}?', $researchVerification->id)]) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
    </div>
</div>