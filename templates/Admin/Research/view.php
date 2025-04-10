<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Research $research
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Research'), ['action' => 'edit', $research->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Research'), ['action' => 'delete', $research->id], ['confirm' => __('Are you sure you want to delete # {0}?', $research->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Research'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Research'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="research view content">

            <table>
                <tr>
                    <th><?= __('User') ?></th>
                    <td><?= $research->hasValue('user') ? $this->Html->link($research->user->username, ['controller' => 'Users', 'action' => 'view', $research->user->id]) : '' ?></td>
                </tr>
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
                    <td><?= $this->Html->link(__('Cek Dokumen'),['action'=>'show',$research->surat_permohonan],['target'=>'_blank']) ?></td>
                </tr>
                <tr>
                    <th><?= __('Surat Pernyataan') ?></th>
                    <td><?= $this->Html->link(__('Cek Dokumen'),['action'=>'show',$research->surat_pernyataan],['target'=>'_blank']) ?></td>
                </tr>
                <tr>
                    <th><?= __('Dokumen Tambahan') ?></th>
                    <td><?= $this->Html->link(__('Cek Dokumen'),['action'=>'show',$research->dokumen_tambahan],['target'=>'_blank']) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($research->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified') ?></th>
                    <td><?= h($research->modified) ?></td>
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

            <div class="related">

                <h4><?= __(' Verifikasi') ?></h4>
                <?php if (!empty($research->research_verification)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Status') ?></th>
                            <th><?= __('Keterangan') ?></th>
                            <th><?= __('Created') ?></th>
                            <th><?= __('Modified') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <tr>
                            <td><?= $research->research_verification->verifikasi ? 'Sudah Diverifikasi': 'Belum DiVerifikasi'; ?></td>
                            <td><?= h($research->research_verification->keterangan) ?></td>
                            <td><?= h($research->research_verification->created) ?></td>
                            <td><?= h($research->research_verification->modified) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'ResearchVerifications', 'action' => 'view', $research->research_verification->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'ResearchVerifications', 'action' => 'edit', $research->research_verification->id]) ?>
                            </td>
                        </tr>
                    </table>
                </div>
                <?php endif; ?>

                <?php
                    if(empty($research->research_verification))
                    {
                      echo $this->Html->link(__('Verifikasi'),['controller'=>'researchVerifications','action'=>'verify',$research->id],['class'=>'button']);
                    }
                ?>
            </div>

            <div class="related">
                <h4><?= __('Surat Keterangan Penelitian') ?></h4>
                <?php if (!empty($research->research_sk)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('No Sk') ?></th>
                            <th><?= __('Created') ?></th>
                            <th><?= __('Tandatangan') ?></th>
                            <th><?= __('Tanggal Ttd') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>

                        <tr>
                            <td><?= h($research->research_sk->id) ?></td>
                            <td><?= h($research->research_sk->no_sk) ?></td>
                            <td><?= h($research->research_sk->created) ?></td>
                            <td><?= h($research->research_sk->tandatangan) ?></td>
                            <td><?= h($research->research_sk->tanggal_ttd) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'ResearchSks', 'action' => 'view', $research->research_sk->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'ResearchSks', 'action' => 'edit', $research->research_sk->id]) ?>
                            </td>
                        </tr>

                    </table>
                </div>
                <?php endif; ?>

                <?php if (empty($research->research_sk)){
                   echo $this->Html->link('Terbitkan SK',['controller'=>'ResearchSks','action'=>'terbit',$research->id],['class'=>'button']);
                }
                 ?>
            </div>
        </div>
    </div>
</div>
