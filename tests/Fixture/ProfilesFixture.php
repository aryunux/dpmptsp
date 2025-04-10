<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * ProfilesFixture
 */
class ProfilesFixture extends TestFixture
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
                'nik' => 'Lorem ipsum do',
                'nama_lengkap' => 'Lorem ipsum dolor sit amet',
                'tempat_lahir' => 'Lorem ipsum dolor sit amet',
                'tanggal_lahir' => '2025-02-20',
                'alamat_lengkap' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
                'pasfoto' => 'Lorem ipsum dolor sit amet',
                'ktp' => 'Lorem ipsum dolor sit amet',
                'user_id' => 1,
                'created' => '2025-02-20 17:13:30',
                'modified' => '2025-02-20 17:13:30',
            ],
        ];
        parent::init();
    }
}
