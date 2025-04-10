<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * ResearchSksFixture
 */
class ResearchSksFixture extends TestFixture
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
                'no_sk' => 'Lorem ipsum dolor sit amet',
                'research_id' => 1,
                'created' => '2025-02-25 13:43:21',
                'tandatangan' => 1,
                'tanggal_ttd' => '2025-02-25',
            ],
        ];
        parent::init();
    }
}
