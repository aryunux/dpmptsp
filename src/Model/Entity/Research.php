<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Research Entity
 *
 * @property int $id
 * @property int $user_id
 * @property string $judul
 * @property string $tujuan
 * @property string $lokasi
 * @property string $bidang
 * @property string $penanggung_jawab
 * @property string $nama_lembaga
 * @property string|null $anggota
 * @property string $surat_permohonan
 * @property string $surat_pernyataan
 * @property string|null $dokumen_tambahan
 * @property \Cake\I18n\DateTime|null $created
 * @property \Cake\I18n\DateTime|null $modified
 * @property bool|null $submitted
 *
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\ResearchSk[] $research_sks
 * @property \App\Model\Entity\ResearchVerification[] $research_verifications
 */
class Research extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array<string, bool>
     */
    protected array $_accessible = [
        'user_id' => true,
        'judul' => true,
        'tujuan' => true,
        'lokasi' => true,
        'bidang' => true,
        'penanggung_jawab' => true,
        'nama_lembaga' => true,
        'anggota' => true,
        'surat_permohonan' => true,
        'surat_pernyataan' => true,
        'dokumen_tambahan' => true,
        'created' => true,
        'modified' => true,
        'submitted' => true,
        'user' => true,
        'research_sks' => true,
        'research_verifications' => true,
    ];
}
