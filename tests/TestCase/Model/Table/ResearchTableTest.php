<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ResearchTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ResearchTable Test Case
 */
class ResearchTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\ResearchTable
     */
    protected $Research;

    /**
     * Fixtures
     *
     * @var list<string>
     */
    protected array $fixtures = [
        'app.Research',
        'app.Users',
        'app.ResearchSks',
        'app.ResearchVerifications',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Research') ? [] : ['className' => ResearchTable::class];
        $this->Research = $this->getTableLocator()->get('Research', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Research);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\ResearchTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\ResearchTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
