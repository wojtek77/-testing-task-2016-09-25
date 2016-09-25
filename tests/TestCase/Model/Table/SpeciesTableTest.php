<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\SpeciesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\SpeciesTable Test Case
 */
class SpeciesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\SpeciesTable
     */
    public $Species;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.species',
        'app.games',
        'app.subscriptions'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Species') ? [] : ['className' => 'App\Model\Table\SpeciesTable'];
        $this->Species = TableRegistry::get('Species', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Species);

        parent::tearDown();
    }

    /**
     * Test initialize method
     *
     * @return void
     */
    public function testInitialize()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
