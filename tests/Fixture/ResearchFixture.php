<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * ResearchFixture
 */
class ResearchFixture extends TestFixture
{
    /**
     * Init method
     *
     * @return void
     */
    public function init(): void
    {
        $this->records = [
            [
                'id' => 1,
                'user_id' => 1,
                'judul' => 'Lorem ipsum dolor sit amet',
                'tujuan' => 'Lorem ipsum dolor sit amet',
                'lokasi' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
                'bidang' => 'Lorem ipsum dolor sit amet',
                'penanggung_jawab' => 'Lorem ipsum dolor sit amet',
                'nama_lembaga' => 'Lorem ipsum dolor sit amet',
                'anggota' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
                'surat_permohonan' => 'Lorem ipsum dolor sit amet',
                'surat_pernyataan' => 'Lorem ipsum dolor sit amet',
                'dokumen_tambahan' => 'Lorem ipsum dolor sit amet',
                'created' => '2025-02-22 11:53:15',
                'modified' => '2025-02-22 11:53:15',
                'submitted' => 1,
            ],
        ];
        parent::init();
    }
}
