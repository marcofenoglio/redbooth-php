<?php
/**
 * The Redbooth API Service Layer.
 *
 * @author Bruno Pedro <bpedro@redbooth.com>
 * @package Redbooth
 */
namespace Redbooth;

require 'Base.php';

/**
 * Redbooth service connector.
 *
 * Some methods, specifically getters are implemented
 * using the __call() magic method.
 *
 * @method object getActivities() Get a list of activities.
 * @method object getComments() Get a list of comments.
 * @method object getConversations() Get a list of conversations.
 * @method object getMemberships() Get a list of memberships.
 * @method object getNotes() Get a list of notes.
 * @method object getNotifications() Get a list of notifications.
 * @method object getOrganizations() Get a list of organizations.
 * @method object getPeople() Get a list of people.
 * @method object getProjects() Get a list of projects.
 * @method object getSubtasks() Get a list of subtasks.
 * @method object getTaskLists() Get a list of task lists.
 * @method object getTasks() Get a list of tasks.
 * @method object getUsers() Get a list of users.
 * @method object getFiles() Get a list of files.
 */
class Service extends Base
{
    /**
     * @access private
     * @var array A list of possible getters.
     */
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

    /**
     * Automatically responde to some getters.
     *
     * Magic method used to overload methods specified on
     * the $listGetters attribute.
     *
     * @param string $name The name of the method being called.
     * @param array $arguments A list of arguments passed to the method.
     * @return object An object representing the response.
     */
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

    /**
     * Get information about a file.
     *
     * Get information from a single file available
     * to the user through the API.
     *
     * @param integer $id The ID of the file to get.
     * @return object An object representation of the file information.
     */
    public function getFile($id)
    {
        return $this->get('files/' . urlencode($id));
    }

    /**
     * Download a single file.
     *
     * Download a file given its ID and obtain it
     * as specified by the filename parameter.
     *
     * @param integer $id The ID of the file to download.
     * @param string $filename A filename to obtain the file.
     * @return string The contents of the downloaded file.
     */
    public function downloadFile($id, $filename)
    {
        return $this->get('files/' . urlencode($id) . '/download/' . urlencode($filename));
    }

    /**
     * Get information about the authorized user.
     *
     * Get all the available information about the
     * user currently authorized, i.e. me.
     *
     * @return object An object representation of the user.
     */
    public function getMe()
    {
        return $this->get('me');
    }

    /**
     * Create a new conversation.
     *
     * Create a new conversation inside a specific project
     * with all the information passed by the parameters.
     *
     * @param integer $projectId The ID of the project where you want to create the conversation.
     * @param string $name The name (title) of the conversation.
     * @param string $body You can optionally set the conversation body.
     * @param boolean $isPrivate Whether or not the conversation is private. Defaults to false.
     * @return object An object representation of the created conversation.
     */
    public function createConversation($projectId, $name, $body = '', $isPrivate = false)
    {
        $data = array('project_id' => $projectId,
                      'name' => $name,
                      'body' => $body,
                      'is_private' => $isPrivate);
        $res = $this->post('conversations', $data);
        return $res;
    }

    /**
     * Create a new task.
     *
     * Create a new task inside a specific project and a
     * specific task list with all the information passed
     * by the parameters.
     *
     * @param integer $projectId The ID of the project where you want to create the task.
     * @param integer $tasklistId The ID of the task list where you want to create the task.
     * @param string $description The description of the task.
     * @param boolean $isPrivate Whether or not the task is private. Defaults to false.
     * @param string $status The status of the task. Can be new, open, hold, resolved or rejected. Defaults to open.
     * @return object An object representing the created task.
     */
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

    /**
     * Create a new subtask.
     *
     * Create a new subtask inside a specific task
     * with all the information passed by the parameters.
     *
     * @param integer $taskId The ID of the task where you want to create the subtask.
     * @param string $name The name (title) of the subtask.
     * @param boolean $resolved Whether or not the subtask is resolved. Defaults to false.
     * @param integer $position The ordinal position of the subtask on the list.
     * @return object An object representing the created subtask.
     */
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

    /**
     * Create a new task list.
     *
     * Create a new task list inside a specific project
     * with all the information passed by the parameters.
     *
     * @param integer $projectId The ID of the project where you want to create the task list.
     * @param string $name The name (title) of the task list.
     * @param boolean $archived Whether or not the task list is archived. Defaults to false.
     * @return object An object representation of the created task list.
     */
    public function createTaskList($projectId, $name, $archived = false)
    {
        $data = array('project_id' => $projectId,
                      'name' => $name,
                      'archived' => $archived);
        $res = $this->post('task_lists', $data);
        return $res;
    }

    /**
     * Create a new note.
     *
     * Create a new note inside a specific project
     * with all the information passed by the parameters.
     *
     * @param integer $projectId The ID of the project where you want to create the note.
     * @param string $name The name (title) of the note.
     * @param string $content The content (body) of the note.
     * @param boolean $isPrivate Whether or not the note is private. Defaults to false.
     * @param boolean $shared Whether or not the note is shared. Defaults to false.
     * @return object An object representation of the created note.
     */
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

    /**
     * Create a new comment.
     *
     * Create a new comment on a specific target
     * with all the information passed by the parameters.
     *
     * @param string $targetType The type of target where the comment will be created. Can be conversation or task.
     * @param integer $targetId The ID of the target where the comment will be created.
     * @param string $body The body of the comment.
     * @param integer $minutes Optionally set the spent time on a task.
     * @param date $timeTrackingOn Optionally add the date when time tracking was turned on.
     * @return object An object representation of the created comment.
     */
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
