<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>
<div class="row">
    <div class="column column-80">
        <div class="content">
              <input type='radio' class='panada' name='tabs' id='akun' checked='checked'>
              <label class='panada-label' for='akun'>Akun</label>
              <input type='radio' class='panada' name='tabs' id='profil'>
              <label class='panada-label' for='profil'>Profil</label>
              <input type='radio' class='panada' name='tabs' id='penelitian'>
              <label class='panada-label' for='penelitian'>Penelitian</label>
    

            <div class="panada-content" id='akun-content'>
              <?= $this->Html->link(__('Update'), ['action' => 'edit', $user->id], ['class' => 'button float-right']) ?>
              <table>
                  <tr>
                      <th><?= __('Username') ?></th>
                      <td><?= h($user->username) ?>
                  </tr>
                  <tr>
                      <th><?= __('Email') ?></th>
                      <td><?= h($user->email) ?></td>
                  </tr>
              </table>
              <span> <?= __('Created:') ?> <?= h($user->created) ?><?= __(' Modified:') ?><?= h($user->modified) ?> </span>
            </div>
            <div class="panada-content" id='profil-content'>

                <?php if (empty($user->profile->id)): ?>
                    <?= $this->Html->link('Lengkapi Profil',['controller'=>'profiles','action'=>'add']) ?>
                <?php endif; ?>

                <?php if (!empty($user->profile)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('NIK') ?></th>
                            <td><?= h($user->profile->nik) ?></td>
                        </tr>
                        <tr>
                            <th><?= __('Nama Lengkap') ?></th>
                            <td><?= h($user->profile->nama_lengkap) ?></td>
                        </tr>
                        <tr>
                            <th><?= __('Tempat Lahir') ?></th>
                            <td><?= h($user->profile->tempat_lahir) ?></td>
                        </tr>
                        <tr>
                            <th><?= __('Tanggal Lahir') ?></th>
                            <td><?= h($user->profile->tanggal_lahir) ?></td>
                        </tr>

                    </table>
                    <div class="text">
                        <strong><?= __('Alamat Lengkap') ?></strong>
                        <blockquote>
                            <?= $this->Text->autoParagraph(h($user->profile->alamat_lengkap)); ?>
                        </blockquote>
                    </div>

                    <table>
                        <tr>
                            <th> <?= __('Pasfoto') ?> </th>
                            <td> <?= $this->Html->image('profiles/pasfoto'.DS.$user->profile->pasfoto,['height'=>100]) ?> </td>
                            <td>  <?= $this->Html->link(__('Update'), ['controller'=>'profiles','action' => 'updatePasfoto', $user->profile->id]) ?> </td>
                        </tr>
                        <tr>
                            <th><?= __('KTP') ?></th>
                            <td> <?= $this->Html->image('profiles/ktp'.DS.$user->profile->ktp,['height'=>100]) ?> </td>
                            <td>  <?= $this->Html->link(__('Update'), ['controller'=>'profiles','action' => 'updateKtp', $user->profile->id]) ?> </td>
                        </tr>
                    </table>
                </div>
                <?php endif; ?>
            </div>
            <div class="panada-content" id='penelitian-content'>
              <?php if (empty($user->research)): ?>
                  <?= $this->Html->link('Ajukan Permohonan Penelitian',['controller'=>'research','action'=>'add']) ?>
              <?php endif; ?>

              <?php if (!empty($user->research)) : ?>
                  <?= $this->Html->link('Ajukan Permohonan Penelitian Baru',['controller'=>'research','action'=>'add'],['class'=>'float-right']) ?>
                  <div class="table-responsive">

                      <table>
                        <?php foreach( $user->research as $research): ?>
                          <tr>
                              <th><?= __('Judul') ?></th>
                              <th><?= __('Status') ?></th>
                              <th><?= __('') ?></th>
                          </tr>
                          <tr>
                              <td><?= h($research->judul) ?></td>
                              <td><?= $research->submitted ? __('Terkirim') : __('Belum Dikirim'); ?></td>
                              <td>
                                <i class="bi bi-pencil"></i><?= $this->Html->link(__('Edit'), ['controller'=>'research','action' => 'edit', $research->id],['class'=>'aksi']) ?>
                                <i class="bi bi-arrow-right-circle"></i><?= $this->Html->link(__('Lihat'), ['controller'=>'research','action' => 'view', $research->id],['class'=>'aksi']) ?>
                              </td>
                          </tr>
                          <?php endforeach; ?>
                      </table>
                    </div>
                <?php endif; ?>
            </div>
        </div>

        <div class='card'>
            <h5>FORMULIR</h5>
            <table>
              <tr>
                <td>Surat pernyataan Kebenaran Data </td>
                <td> <?= $this->Html->link(__('Download'),['controller'=>'research','action'=>'download','SPKD.docx']) ?> </td>
              </tr>
            </table>
        </div>
    </div>

</div>
