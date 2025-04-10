<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Research> $research
 */
?>
<div class="research index content">
    <?= $this->Html->link(__('New Research'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Research') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('user_id') ?></th>
                    <th><?= $this->Paginator->sort('judul') ?></th>
                    <th><?= $this->Paginator->sort('tujuan') ?></th>
                    <th><?= $this->Paginator->sort('bidang') ?></th>
                    <th><?= $this->Paginator->sort('penanggung_jawab') ?></th>
                    <th><?= $this->Paginator->sort('nama_lembaga') ?></th>
                    <th><?= $this->Paginator->sort('surat_permohonan') ?></th>
                    <th><?= $this->Paginator->sort('surat_pernyataan') ?></th>
                    <th><?= $this->Paginator->sort('dokumen_tambahan') ?></th>
                    <th><?= $this->Paginator->sort('created') ?></th>
                    <th><?= $this->Paginator->sort('modified') ?></th>
                    <th><?= $this->Paginator->sort('submitted') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($research as $research): ?>
                <tr>
                    <td><?= $this->Number->format($research->id) ?></td>
                    <td><?= $research->hasValue('user') ? $this->Html->link($research->user->username, ['controller' => 'Users', 'action' => 'view', $research->user->id]) : '' ?></td>
                    <td><?= h($research->judul) ?></td>
                    <td><?= h($research->tujuan) ?></td>
                    <td><?= h($research->bidang) ?></td>
                    <td><?= h($research->penanggung_jawab) ?></td>
                    <td><?= h($research->nama_lembaga) ?></td>
                    <td><?= h($research->surat_permohonan) ?></td>
                    <td><?= h($research->surat_pernyataan) ?></td>
                    <td><?= h($research->dokumen_tambahan) ?></td>
                    <td><?= h($research->created) ?></td>
                    <td><?= h($research->modified) ?></td>
                    <td><?= h($research->submitted) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $research->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $research->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $research->id], ['confirm' => __('Are you sure you want to delete # {0}?', $research->id)]) ?>
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