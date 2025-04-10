<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Profile> $profiles
 */
?>
<div class="profiles index content">
    <?= $this->Html->link(__('New Profile'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Profiles') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('nik') ?></th>
                    <th><?= $this->Paginator->sort('nama_lengkap') ?></th>
                    <th><?= $this->Paginator->sort('tempat_lahir') ?></th>
                    <th><?= $this->Paginator->sort('tanggal_lahir') ?></th>
                    <th><?= $this->Paginator->sort('pasfoto') ?></th>
                    <th><?= $this->Paginator->sort('ktp') ?></th>
                    <th><?= $this->Paginator->sort('user_id') ?></th>
                    <th><?= $this->Paginator->sort('created') ?></th>
                    <th><?= $this->Paginator->sort('modified') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($profiles as $profile): ?>
                <tr>
                    <td><?= $this->Number->format($profile->id) ?></td>
                    <td><?= h($profile->nik) ?></td>
                    <td><?= h($profile->nama_lengkap) ?></td>
                    <td><?= h($profile->tempat_lahir) ?></td>
                    <td><?= h($profile->tanggal_lahir) ?></td>
                    <td><?= h($profile->pasfoto) ?></td>
                    <td><?= h($profile->ktp) ?></td>
                    <td><?= $profile->hasValue('user') ? $this->Html->link($profile->user->username, ['controller' => 'Users', 'action' => 'view', $profile->user->id]) : '' ?></td>
                    <td><?= h($profile->created) ?></td>
                    <td><?= h($profile->modified) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $profile->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $profile->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $profile->id], ['confirm' => __('Are you sure you want to delete # {0}?', $profile->id)]) ?>
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