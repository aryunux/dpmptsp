<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Profile $profile
 */

?>
<div class="row">
    <aside class="column">
        <div class="side-nav">

        </div>
    </aside>
    <div class="column column-80">
        <div class="profiles view content">

            <h3><?= $profile->hasValue('user') ? $this->Html->link($profile->user->username, ['controller' => 'Users', 'action' => 'index']) : '' ?></h3>
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
                    <th><?= __('Tanggal Lahir') ?></th>
                    <td><?= h($profile->tanggal_lahir) ?></td>
                </tr>

            </table>
            <div class="text">
                <strong><?= __('Alamat Lengkap') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($profile->alamat_lengkap)); ?>
                </blockquote>
            </div>

            <table>
                <tr>
                    <th> <?= __('Pasfoto') ?> </th>
                    <td> <?= $this->Html->image('profiles/pasfoto'.DS.$profile->pasfoto,['height'=>100]) ?> </td>
                    <td>  <?= $this->Html->link(__('Update'), ['action' => 'updatePasfoto', $profile->id]) ?> </td>
                </tr>
                <tr>
                    <th><?= __('Ktp') ?></th>
                    <td> <?= $this->Html->image('profiles/ktp'.DS.$profile->ktp,['height'=>100]) ?> </td>
                    <td>  <?= $this->Html->link(__('Update'), ['action' => 'updateKtp', $profile->id]) ?> </td>
                </tr>
            </table>
            <span> <?= __('Created :') ?> <?= h($profile->created) ?> <?= __('Modified:') ?> <?= h($profile->modified) ?></span>
        </div>
    </div>
</div>
