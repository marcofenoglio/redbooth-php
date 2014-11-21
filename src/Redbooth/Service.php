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
        'users',
        'files'
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
            if (!empty($arguments) && !empty($arguments[0])) {
                $query = '?' . http_build_query($arguments[0]);
            } else {
                $query = '';
            }
            return $this->get($name . $query);
        } else {
            throw new Exception\MethodNotFoundException();
        }
    }

    public function getFile($id)
    {
        return $this->get('files/' . urlencode($id));
    }

    public function downloadFile($id, $filename)
    {
        return $this->get('files/' . urlencode($id) . '/download/' . urlencode($filename));
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

    public function createTask($projectId, $tasklistId, $name, $description, $isPrivate = false, $status = 'open')
    {
        $data = array('project_id' => $projectId,
                      'task_list_id' => $tasklistId,
                      'name' => $name,
                      'description' => $description,
                      'is_private' => $isPrivate,
                      'status' => $status);
        $res = $this->post('tasks', $data);
        return $res;
    }

    public function createSubTask($taskId, $name, $resolved = false, $position = 0)
    {
        $data = array('task_id' => $taskId,
                      'name' => $name,
                      'resolved' => $resolved);

        if ($position) {
            $data['position'] = $position;
        }

        $res = $this->post('subtasks', $data);
        return $res;
    }

    public function createTaskList($projectId, $name, $archived = false)
    {
        $data = array('project_id' => $projectId,
                      'name' => $name,
                      'archived' => $archived);
        $res = $this->post('task_lists', $data);
        return $res;
    }

    public function createNote($projectId, $name, $content, $isPrivate = false, $shared = true)
    {
        $data = array('project_id' => $projectId,
                      'name' => $name,
                      'content' => $content,
                      'is_private' => $isPrivate,
                      'shared' => $shared);
        $res = $this->post('notes', $data);
        return $res;
    }

    public function createComment($targetType, $targetId, $body, $minutes = null, $timeTrackingOn = null)
    {
        $data = array('target_type' => $targetType,
                      'target_id' => $targetId,
                      'body' => $body);

        if (!empty($minutes)) {
            $data['minutes'] = $minutes;
        }

        if (!empty($timeTrackingOn)) {
            $data['time_tracking_on'] = $timeTrackingOn;
        }

        $res = $this->post('comments', $data);
        return $res;
    }
}
