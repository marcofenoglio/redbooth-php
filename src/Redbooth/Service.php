<?php
namespace Redbooth;

require 'Base.php';

/**
 * Redbooth service connector
 */
class Service extends Base
{
    private $listGetters = array(
        'activities',
        'comments',
        'conversations',
        'memberships',
        'notes',
        'notifications',
        'organizations',
        'people',
        'projects',
        'subtasks',
        'task_lists',
        'tasks',
        'users'
    );

    public function __call($name, $arguments)
    {
        // text conversion
        // from getExampleMethod to example_method
        $name = strtolower(preg_replace('/([A-Z])/', '_$1', $name));
        $name = preg_replace('/^get_/', '', $name);

        // check if the method can be called
        if (in_array($name, $this->listGetters)) {
            // if there are any arguments, build the HTTP query
            if (!empty($arguments)) {
                $query = '?' . http_build_query($arguments);
            } else {
                $query = '';
            }

            return $this->get($name . $query);
        } else {
            throw new Exception\MethodNotFoundException();
        }
    }

    public function getMe()
    {
        return $this->get('me');
    }

    public function createConversation($projectId, $name, $body = '', $isPrivate = false)
    {
        $data = array('project_id' => $projectId,
                      'name' => $name,
                      'body' => $body,
                      'is_private' => $isPrivate);
        $res = $this->post('conversations', $data);
        return $res;
    }
}
