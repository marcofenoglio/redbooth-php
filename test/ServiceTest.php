<?php
namespace Redbooth\Test;

class ServiceTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var RedboothService
     */
    protected $object;

    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     */
    protected function setUp()
    {
        $this->object = new \Redbooth\Service($_ENV['oauthClientId'],
                                            $_ENV['oauthClientSecret'],
                                            $_ENV['oauthAccessToken'],
                                            $_ENV['oauthRefreshToken'],
                                            $_ENV['oauthRedirectUrl']);
    }

    /**
     * Tears down the fixture, for example, closes a network connection.
     * This method is called after a test is executed.
     */
    protected function tearDown()
    {
    }

    /**
     * @covers RedboothService::post
     * @group posters
     */
    public function testPost()
    {
        $faker = \Faker\Factory::create();
        $data = array('name' => $faker->sentence,
                      'project_id' => $_ENV['projectId'],
                      'task_list_id' => $_ENV['tasklistId'],
                      'comments_attributes' => array(array('body' => $faker->paragraph)),
                      'type' => 'Task',
                      'is_private' => false,
                      'urgent' => false);
        $res = $this->object->post('tasks', $data);
        $this->assertNotNull($res);
        $this->assertInternalType('object', $res);
        $this->assertNotEmpty($res->type);
        $this->assertEquals('Task', $res->type);
    }

    /**
     * @covers RedboothService::postFile
     * @group filePosters
     */
    public function testPostFile()
    {
        $faker = \Faker\Factory::create();
        $imagePath = $faker->image;
        $data = array('project_id' => $_ENV['projectId'],
                      'backend' => 'redbooth',
                      'is_dir' => 'false');
        $res = $this->object->postFile('files',
                                       $data,
                                       $imagePath);
        $this->assertNotNull($res);
        $this->assertInternalType('object', $res);
        $this->assertNotEmpty($res->id);
        $this->assertNotEmpty($res->name);
        $this->assertEquals(basename($imagePath), $res->name);
    }

    /**
     * @covers RedboothService::getActivities
     * @group listGetters
     */
    public function testGetActivities()
    {
        return $this->object->getActivities();
        foreach ($res as $item) {
            $this->assertNotNull($item);
            $this->assertInternalType('object', $item);
            $this->assertNotEmpty($item->id);
        }
    }

    /**
     * @covers RedboothService::getComments
     * @group listGetters
     */
    public function testGetComments()
    {
        return $this->object->getComments();
        foreach ($res as $item) {
            $this->assertNotNull($item);
            $this->assertInternalType('object', $item);
            $this->assertNotEmpty($item->id);
        }
    }

    /**
     * @covers RedboothService::getConversations
     * @group listGetters
     */
    public function testGetConversations()
    {
        return $this->object->getConversations();
        foreach ($res as $item) {
            $this->assertNotNull($item);
            $this->assertInternalType('object', $item);
            $this->assertNotEmpty($item->id);
        }
    }

    /**
     * @covers RedboothService::getMemberships
     * @group listGetters
     */
    public function testGetMemberships()
    {
        return $this->object->getMemberships();
        foreach ($res as $item) {
            $this->assertNotNull($item);
            $this->assertInternalType('object', $item);
            $this->assertNotEmpty($item->id);
        }
    }

    /**
     * @covers RedboothService::getNotes
     * @group listGetters
     */
    public function testGetNotes()
    {
        return $this->object->getNotes();
        foreach ($res as $item) {
            $this->assertNotNull($item);
            $this->assertInternalType('object', $item);
            $this->assertNotEmpty($item->id);
        }
    }

    /**
     * @covers RedboothService::getNotifications
     * @group listGetters
     */
    public function testGetNotifications()
    {
        return $this->object->getNotifications();
        foreach ($res as $item) {
            $this->assertNotNull($item);
            $this->assertInternalType('object', $item);
            $this->assertNotEmpty($item->id);
        }
    }

    /**
     * @covers RedboothService::getOrganizations
     * @group listGetters
     */
    public function testGetOrganizations()
    {
        return $this->object->getOrganizations();
        foreach ($res as $item) {
            $this->assertNotNull($item);
            $this->assertInternalType('object', $item);
            $this->assertNotEmpty($item->id);
        }
    }

    /**
     * @covers RedboothService::getPeople
     * @group listGetters
     */
    public function testGetPeople()
    {
        return $this->object->getPeople();
        foreach ($res as $item) {
            $this->assertNotNull($item);
            $this->assertInternalType('object', $item);
            $this->assertNotEmpty($item->id);
        }
    }

    /**
     * @covers RedboothService::getProjects
     * @group listGetters
     */
    public function testGetProjects()
    {
        return $this->object->getProjects();
        foreach ($res as $item) {
            $this->assertNotNull($item);
            $this->assertInternalType('object', $item);
            $this->assertNotEmpty($item->id);
        }
    }

    /**
     * @covers RedboothService::getTasks
     * @group listGetters
     */
    public function testGetSubtasks()
    {
        return $this->object->getTasks();
        foreach ($res as $item) {
            $this->assertNotNull($item);
            $this->assertInternalType('object', $item);
            $this->assertNotEmpty($item->id);
        }
    }

    /**
     * @covers RedboothService::getTaskLists
     * @group listGetters
     */
    public function testGetTaskLists()
    {
        return $this->object->getTaskLists();
        foreach ($res as $item) {
            $this->assertNotNull($item);
            $this->assertInternalType('object', $item);
            $this->assertNotEmpty($item->id);
        }
    }

    /**
     * @covers RedboothService::getUsers
     * @group listGetters
     */
    public function testGetUsers()
    {
        $res = $this->object->getUsers();
        foreach ($res as $item) {
            $this->assertNotNull($item);
            $this->assertInternalType('object', $item);
            $this->assertNotEmpty($item->id);
        }
    }

    /**
     * @covers RedboothService::getTasks
     * @group listGetters
     */
    public function testGetTasks()
    {
        $res = $this->object->getTasks();
        $this->assertInternalType('array', $res);
        foreach ($res as $item) {
            $this->assertNotNull($item);
            $this->assertInternalType('object', $item);
            $this->assertNotEmpty($item->id);
        }
    }

    /**
     * @covers \Redbooth\Service::getMe
     * @group getters
     */
    public function testGetMe()
    {
        $res = $this->object->getMe();
        $this->assertInternalType('object', $res);
        $this->assertNotNull($res);
        $this->assertNotEmpty($res);
        $this->assertNotEmpty($res->id);
    }
}
