<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit User'), ['action' => 'edit', $user->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete User'), ['action' => 'delete', $user->id], ['confirm' => __('Are you sure you want to delete # {0}?', $user->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Users'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New User'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="users view content">
            <h3><?= h($user->username) ?></h3>
            <table>
                <tr>
                    <th><?= __('Username') ?></th>
                    <td><?= h($user->username) ?></td>
                </tr>
                <tr>
                    <th><?= __('Email') ?></th>
                    <td><?= h($user->email) ?></td>
                </tr>
                <tr>
                    <th><?= __('Role') ?></th>
                    <td><?= h($user->role) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($user->id) ?>
                      <?php
                        if (empty($user->profile->id))
                        {
                          echo __('Belum Memiliki Profil');
                        }
                      ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($user->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified') ?></th>
                    <td><?= h($user->modified) ?></td>
                </tr>
            </table>
            <div class="related">

                <h4><?= __('Related Profiles') ?></h4>
                <?php if (!empty($user->profile)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Nik') ?></th>
                            <th><?= __('Nama Lengkap') ?></th>
                            <th><?= __('Tempat Lahir') ?></th>
                            <th><?= __('Tanggal Lahir') ?></th>
                            <th><?= __('Alamat Lengkap') ?></th>
                            <th><?= __('Pasfoto') ?></th>
                            <th><?= __('Ktp') ?></th>
                            <th><?= __('User Id') ?></th>
                            <th><?= __('Created') ?></th>
                            <th><?= __('Modified') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <tr>

                            <td><?= h($user->profile->id) ?></td>
                            <td><?= h($user->profile->nik) ?></td>
                            <td><?= h($user->profile->nama_lengkap) ?></td>
                            <td><?= h($user->profile->tempat_lahir) ?></td>
                            <td><?= h($user->profile->tanggal_lahir) ?></td>
                            <td><?= h($user->profile->alamat_lengkap) ?></td>
                            <td><?= h($user->profile->pasfoto) ?></td>
                            <td><?= h($user->profile->ktp) ?></td>
                            <td><?= h($user->profile->user_id) ?></td>
                            <td><?= h($user->profile->created) ?></td>
                            <td><?= h($user->profile->modified) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Profiles', 'action' => 'view', $user->profile->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Profiles', 'action' => 'edit', $user->profile->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Profiles', 'action' => 'delete', $user->profile->id], ['confirm' => __('Are you sure you want to delete # {0}?', $user->profile->id)]) ?>
                            </td>
                        </tr>
                    </table>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
