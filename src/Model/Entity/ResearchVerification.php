<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * ResearchVerification Entity
 *
 * @property int $id
 * @property int $research_id
 * @property bool|null $verifikasi
 * @property string|null $keterangan
 * @property int $user_id
 * @property \Cake\I18n\DateTime|null $created
 * @property \Cake\I18n\DateTime|null $modified
 *
 * @property \App\Model\Entity\Research $research
 * @property \App\Model\Entity\User $user
 */
class ResearchVerification extends Entity
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
        'research_id' => true,
        'verifikasi' => true,
        'keterangan' => true,
        'user_id' => true,
        'created' => true,
        'modified' => true,
        'research' => true,
        'user' => true,
    ];
}
