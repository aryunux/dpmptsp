<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Profile> $profiles
 */

?>
<div class="profiles index content">
    <h3><?= __('Profiles') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>

                    <th><?= __('nik') ?></th>
                    <th><?= __('nama_lengkap') ?></th>
                    <th><?= __('tempat_lahir') ?></th>
                    <th><?= __('tanggal_lahir') ?></th>
                    <th><?= __('pasfoto') ?></th>
                    <th><?= __('ktp') ?></th>
                    <th><?= __('user_id') ?></th>
                    <th><?= __('created') ?></th>
                    <th><?= __('modified') ?></th>

                </tr>
            </thead>
            <tbody>
                <?php foreach ($profile as $profile): ?>
                <tr>

                    <td><?= h($profile->nik) ?></td>
                    <td><?= h($profile->nama_lengkap) ?></td>
                    <td><?= h($profile->tempat_lahir) ?></td>
                    <td><?= h($profile->tanggal_lahir) ?></td>
                    <td><?= h($profile->pasfoto) ?></td>
                    <td><?= h($profile->ktp) ?></td>
                    <td><?= $profile->hasValue('user') ? $this->Html->link($profile->user->username, ['controller' => 'Users', 'action' => 'view', $profile->user->id]) : '' ?></td>
                    <td><?= h($profile->created) ?></td>
                    <td><?= h($profile->modified) ?></td>

                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

</div>
