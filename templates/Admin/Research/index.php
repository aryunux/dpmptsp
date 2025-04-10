<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Research> $research
 */
?>
<div class="research index content">
    <h3><?= __('Penelitian') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('user_id') ?></th>
                    <th><?= $this->Paginator->sort('judul') ?></th>
                    <th><?= $this->Paginator->sort('created') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($research as $research): ?>
                <tr>
                    <td><?= $this->Number->format($research->id) ?></td>
                    <td><?= $research->hasValue('user') ? $this->Html->link($research->user->username, ['controller' => 'Users', 'action' => 'view', $research->user->id]) : '' ?></td>
                    <td><?= h($research->judul) ?></td>
                    <td><?= $research->created ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('Detail'), ['prefix'=>'Admin','controller'=>'research','action' => 'view', $research->id]) ?>
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
