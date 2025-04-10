<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\ResearchSk> $researchSks
 */
?>
<div class="researchSks index content">
    <h3><?= __('SK Penelitian') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>

                    <th><?= $this->Paginator->sort('no_sk') ?></th>
                    <th><?= $this->Paginator->sort('research_id') ?></th>
                    <th><?= $this->Paginator->sort('created') ?></th>
                    <th><?= $this->Paginator->sort('tandatangan') ?></th>
                    
                </tr>
            </thead>
            <tbody>
                <?php foreach ($researchSks as $researchSk): ?>
                <tr>
                    <td><?= h($researchSk->no_sk) ?></td>
                    <td><?= $researchSk->hasValue('research') ? $this->Html->link($researchSk->research->judul, ['controller' => 'Research', 'action' => 'view', $researchSk->research->id]) : '' ?></td>
                    <td><?= h($researchSk->created) ?></td>
                    <td><?= $researchSk->tandatangan? "Sudah Ditandatangani" : $this->Html->link(__('Tandatangani'), ['action' => 'ttd', $researchSk->id],['class'=>'button']) ; ?></td>
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

<div class="researchSks index content">
    <h3><?= __('SK Penelitian TTD') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>

                    <th><?= $this->Paginator->sort('no_sk') ?></th>
                    <th><?= $this->Paginator->sort('research_id') ?></th>
                    <th><?= $this->Paginator->sort('created') ?></th>
                    <th><?= $this->Paginator->sort('tandatangan') ?></th>
                    <th><?= $this->Paginator->sort('tanggal_ttd') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($researchSksTtd as $researchSkTtd): ?>
                <tr>
                    <td><?= h($researchSkTtd->no_sk) ?></td>
                    <td><?= $researchSkTtd->hasValue('research') ? $this->Html->link($researchSkTtd->research->judul, ['controller' => 'Research', 'action' => 'view', $researchSkTtd->research->id]) : '' ?></td>
                    <td><?= h($researchSkTtd->created) ?></td>
                    <td><?= $researchSkTtd->tandatangan? "Sudah Ditandatangani" : $this->Html->link(__('Tandatangani'), ['action' => 'ttd', $researchSkTtd->id],['class'=>'button']) ; ?></td>
                    <td><?= h($researchSkTtd->tanggal_ttd) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $researchSkTtd->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $researchSkTtd->id]) ?>
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
