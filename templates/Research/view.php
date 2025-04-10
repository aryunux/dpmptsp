<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Research $research
 */

 $this->loadHelper('QrCode.QrCode');
?>
<div class="row">
    <div class="column column-80">
        <div class="research view content">

            <table>
                <tr>
                    <th><?= __('Judul') ?></th>
                    <td><?= h($research->judul) ?></td>
                </tr>
                <tr>
                    <th><?= __('Tujuan') ?></th>
                    <td><?= h($research->tujuan) ?></td>
                </tr>
                <tr>
                    <th><?= __('Bidang') ?></th>
                    <td><?= h($research->bidang) ?></td>
                </tr>
                <tr>
                    <th><?= __('Penanggung Jawab') ?></th>
                    <td><?= h($research->penanggung_jawab) ?></td>
                </tr>
                <tr>
                    <th><?= __('Nama Lembaga') ?></th>
                    <td><?= h($research->nama_lembaga) ?></td>
                </tr>
                <tr>
                    <th><?= __('Surat Permohonan') ?></th>
                    <td> <?= $this->Html->link(__('Lihat'),['action'=>'show',$research->surat_permohonan],['target'=>'_blank']) ?> </td>
                </tr>
                <tr>
                    <th><?= __('Surat Pernyataan') ?></th>
                    <td> <?= $this->Html->link(__('Lihat'),['action'=>'show',$research->surat_pernyataan],['target'=>'_blank'])?> </td>
                </tr>
                <tr>
                    <th><?= __('Dokumen Tambahan') ?></th>
                    <td> <?= $this->Html->link(__('Lihat'),['action'=>'show',$research->dokumen_tambahan],['target'=>'_blank']) ?> </td>
                </tr>

                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($research->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified') ?></th>
                    <td><?= h($research->modified) ?></td>
                </tr>
                <tr>
                    <th><?= __('Submitted') ?></th>
                    <td><?= $research->submitted ? __('Sudah Dikirim') : __('Belum Dikirim'); ?></td>
                </tr>
            </table>

            <div class="text">
                <strong><?= __('Lokasi') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($research->lokasi)); ?>
                </blockquote>
            </div>
            <div class="text">
                <strong><?= __('Anggota') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($research->anggota)); ?>
                </blockquote>
            </div>
        </div>
    </div>
    <aside class="column">
        <div class="statusverifikasi">
            <h4><?= __('Status Verifikasi') ?></h4>
            <?php if (!empty($research->research_verification)) : ?>
            <div class="table-responsive">
                <table>
                    <tr>
                        <td>
                          <?= $research->research_verification->verifikasi ? "<div class='verified'> VERIFIED </div>" : "<div class='unverified'> UNVERIFIED </div>"; ?> </h5>
                          <p> <?= h($research->research_verification->keterangan) ?></p>
                          <cite> <?= h($research->research_verification->created) ?></cite>
                      </td>
                    </tr>

                </table>
            </div>
            <?php endif; ?>
        </div>
        <div class ='suratkeputusan'>
          <?php if(!empty($research->research_sk)): ?>
            <div class="tabl-responsive">
              <table>
                  <tr>
                    <td> <?= $research->research_sk->tandatangan ? $this->Html->link(__('Download Surat Keterangan Penelitian'),['controller'=>'ResearchSks','action'=>'download',$research->research_sk->id]) : "" ?></td>
                  </tr>
              </table>
            </div>
          <?php endif; ?>
        </div>
        <div class="side-nav">
            <h4 class="heading"><?= __('Menu') ?></h4>
            <?= $this->Html->link(__('Edit Pengajuan'), ['action' => 'edit', $research->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Pengajuan'), ['controller'=>'users','action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>

</div>
