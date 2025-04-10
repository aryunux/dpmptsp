<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * ResearchVerificationsFixture
 */
class ResearchVerificationsFixture extends TestFixture
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
                'research_id' => 1,
                'verifikasi' => 1,
                'keterangan' => 'Lorem ipsum dolor sit amet',
                'user_id' => 1,
                'created' => '2025-02-25 13:43:08',
                'modified' => '2025-02-25 13:43:08',
            ],
        ];
        parent::init();
    }
}
