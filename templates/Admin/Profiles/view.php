<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Profile $profile
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Profile'), ['action' => 'edit', $profile->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Profile'), ['action' => 'delete', $profile->id], ['confirm' => __('Are you sure you want to delete # {0}?', $profile->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Profiles'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Profile'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="profiles view content">
            <h3><?= h($profile->nik) ?></h3>
            <table>
                <tr>
                    <th><?= __('Nik') ?></th>
                    <td><?= h($profile->nik) ?></td>
                </tr>
                <tr>
                    <th><?= __('Nama Lengkap') ?></th>
                    <td><?= h($profile->nama_lengkap) ?></td>
                </tr>
                <tr>
                    <th><?= __('Tempat Lahir') ?></th>
                    <td><?= h($profile->tempat_lahir) ?></td>
                </tr>
                <tr>
                    <th><?= __('Pasfoto') ?></th>
                    <td><?= $this->Html->image('profiles/pasfoto'.DS.$profile->pasfoto,['width'=>150]) ?></td>
                </tr>
                <tr>
                    <th><?= __('Ktp') ?></th>
                    <td><?= $this->Html->image('profiles/ktp'.DS.$profile->ktp,['width'=>150]) ?></td>
                </tr>
                <tr>
                    <th><?= __('User') ?></th>
                    <td><?= $profile->hasValue('user') ? $this->Html->link($profile->user->username, ['controller' => 'Users', 'action' => 'view', $profile->user->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($profile->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Tanggal Lahir') ?></th>
                    <td><?= h($profile->tanggal_lahir) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($profile->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified') ?></th>
                    <td><?= h($profile->modified) ?></td>
                </tr>
            </table>
            <div class="text">
                <strong><?= __('Alamat Lengkap') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($profile->alamat_lengkap)); ?>
                </blockquote>
            </div>
        </div>
    </div>
</div>
