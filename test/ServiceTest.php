<?php
namespace Redbooth\Test;

class ServiceTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var RedboothService
     */
    protected $object;

    public function setUpMocking()
    {
        $this->object = $this->getMockBuilder('\Redbooth\Service')
                              ->disableOriginalConstructor()
                              ->getMock();
        $methods = array(
            'getActivities',
//          'getComments',
            'getConversations',
            'getMemberships',
            'getNotes',
            'getNotifications',
            'getOrganizations',
            'getPeople',
            'getProjects',
            'getSubtasks',
            'getTaskLists',
            'getTasks',
            'getUsers',
            'getMe',
        );
        $map = array();
        foreach ($methods as $method) {
            $map[] = array($method, array(), json_decode(file_get_contents('test/mocks/' . $method . '.mock')));
        }
        $this->object->expects($this->any())
                      ->method('__call')
                      ->will($this->returnValueMap($map));
        $this->object->expects($this->any())
                      ->method('getMe')
                      ->will($this->returnValue(json_decode(file_get_contents('test/mocks/getMe.mock'))));
        $this->object->expects($this->any())
                      ->method('post')
                      ->will($this->returnValue(json_decode(file_get_contents('test/mocks/post.mock'))));
        $this->object->expects($this->any())
                      ->method('postFile')
                      ->will($this->returnValue(json_decode(file_get_contents('test/mocks/postFile.mock'))));
        $this->object->expects($this->any())
                      ->method('createConversation')
                      ->will($this->returnValue(json_decode(file_get_contents('test/mocks/createConversation.mock'))));
    }
    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     */
    protected function setUp()
    {
        if (!empty($_ENV['integrationTests'])) {
            $this->object = new \Redbooth\Service($_ENV['oauthClientId'],
                                                $_ENV['oauthClientSecret'],
                                                $_ENV['oauthAccessToken'],
                                                $_ENV['oauthRefreshToken'],
                                                $_ENV['oauthRedirectUrl']);
        } else {
            $this->setUpMocking();
        }
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
    }

    /**
     * @covers RedboothService::getActivities
     * @group listGetters
     */
    public function testGetActivities()
    {
        $res = $this->object->getActivities();
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
        $this->markTestSkipped();
        $res = $this->object->getComments();
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
        $res = $this->object->getConversations();
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
        $res = $this->object->getMemberships();
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
        $res = $this->object->getNotes();
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
        $res = $this->object->getNotifications();
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
        $res = $this->object->getOrganizations();
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
        $res = $this->object->getPeople();
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
        $res = $this->object->getProjects();
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
        $res = $this->object->getTasks();
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
        $res = $this->object->getTaskLists();
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

    /**
     * @covers \Redbooth\Service::createConversation
     * @group creators
     */
    public function testCreateConversation()
    {
        $faker = \Faker\Factory::create();
        $res = $this->object->createConversation($_ENV['projectId'],
                                                 $faker->sentence,
                                                 $faker->paragraph,
                                                 false);
        $this->assertInternalType('object', $res);
        $this->assertNotNull($res);
        $this->assertNotEmpty($res);
        $this->assertNotEmpty($res->id);
    }
}
