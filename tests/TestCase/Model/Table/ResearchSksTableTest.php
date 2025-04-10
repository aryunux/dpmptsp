<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ResearchSksTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ResearchSksTable Test Case
 */
class ResearchSksTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\ResearchSksTable
     */
    protected $ResearchSks;

    /**
     * Fixtures
     *
     * @var list<string>
     */
    protected array $fixtures = [
        'app.ResearchSks',
        'app.Research',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('ResearchSks') ? [] : ['className' => ResearchSksTable::class];
        $this->ResearchSks = $this->getTableLocator()->get('ResearchSks', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->ResearchSks);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\ResearchSksTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\ResearchSksTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
