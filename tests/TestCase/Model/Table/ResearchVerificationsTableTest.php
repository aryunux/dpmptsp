<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ResearchVerificationsTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ResearchVerificationsTable Test Case
 */
class ResearchVerificationsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\ResearchVerificationsTable
     */
    protected $ResearchVerifications;

    /**
     * Fixtures
     *
     * @var list<string>
     */
    protected array $fixtures = [
        'app.ResearchVerifications',
        'app.Research',
        'app.Users',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('ResearchVerifications') ? [] : ['className' => ResearchVerificationsTable::class];
        $this->ResearchVerifications = $this->getTableLocator()->get('ResearchVerifications', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->ResearchVerifications);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\ResearchVerificationsTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\ResearchVerificationsTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
