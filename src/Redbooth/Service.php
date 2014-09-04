<?php
namespace Redbooth;

require 'Base.php';

/**
 * Redbooth service connector
 */
class Service extends Base
{
    public function getActivities()
    {
        return $this->get('activities');
    }

    public function getComments()
    {
        return $this->get('comments');
    }

    public function getConversations()
    {
        return $this->get('conversations');
    }

    public function getMemberships()
    {
        return $this->get('memberships');
    }

    public function getNotes()
    {
        return $this->get('notes');
    }

    public function getNotifications()
    {
        return $this->get('notifications');
    }

    public function getOrganizations()
    {
        return $this->get('organizations');
    }

    public function getPeople()
    {
        return $this->get('people');
    }

    public function getProjects()
    {
        return $this->get('projects');
    }

    public function getSubtasks()
    {
        return $this->get('subtasks');
    }

    public function getTaskLists()
    {
        return $this->get('task_lists');
    }

    public function getTasks()
    {
        return $this->get('tasks');
    }

    public function getUsers()
    {
        return $this->get('users');
    }

    public function getMe()
    {
        return $this->get('me');
    }
}
