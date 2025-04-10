<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ResearchVerification $researchVerification
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Research Verification'), ['action' => 'edit', $researchVerification->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Research Verifications'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="researchVerifications view content">
            <h3><?= h($researchVerification->status) ?></h3>
            <table>
                <tr>
                    <th><?= __('Research') ?></th>
                    <td><?= $researchVerification->hasValue('research') ? $this->Html->link($researchVerification->research->judul, ['controller' => 'Research', 'action' => 'view', $researchVerification->research->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Keterangan') ?></th>
                    <td><?= h($researchVerification->keterangan) ?></td>
                </tr>
                <tr>
                    <th><?= __('User') ?></th>
                    <td><?= $researchVerification->hasValue('user') ? $this->Html->link($researchVerification->user->username, ['controller' => 'Users', 'action' => 'view', $researchVerification->user->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($researchVerification->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified') ?></th>
                    <td><?= h($researchVerification->modified) ?></td>
                </tr>
                <tr>
                    <th><?= __('Verifikasi') ?></th>
                    <td><?= $researchVerification->verifikasi ? __('Sudah Diverifikasi') : __('Belum Diverifikasi'); ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
