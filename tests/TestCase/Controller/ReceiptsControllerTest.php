<?php
namespace App\Test\TestCase\Controller;

use App\Controller\ReceiptsController;
use Cake\TestSuite\IntegrationTestCase;

/**
 * App\Controller\ReceiptsController Test Case
 */
class ReceiptsControllerTest extends IntegrationTestCase
{

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.receipts',
        'app.creator',
        'app.user_groups',
        'app.editor',
        'app.comments',
        'app.users',
        'app.login_tokens',
        'app.orders',
        'app.pharmacies',
        'app.areas',
        'app.cities',
        'app.offers',
        'app.reservations',
        'app.drugs',
        'app.rates',
        'app.viewers',
        'app.scheduled_email_recipients',
        'app.scheduled_emails',
        'app.user_emails',
        'app.user_email_recipients',
        'app.user_activities',
        'app.user_contacts',
        'app.user_details',
        'app.user_email_signatures',
        'app.user_email_templates',
        'app.user_socials',
        'app.user_group_permissions'
    ];

    /**
     * Test index method
     *
     * @return void
     */
    public function testIndex()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test view method
     *
     * @return void
     */
    public function testView()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test add method
     *
     * @return void
     */
    public function testAdd()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test edit method
     *
     * @return void
     */
    public function testEdit()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test delete method
     *
     * @return void
     */
    public function testDelete()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test delete_all method
     *
     * @return void
     */
    public function testDeleteAll()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test copy method
     *
     * @return void
     */
    public function testCopy()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
