[Redbooth](https://redbooth.com/) is a total online collaboration solution with all of the features you need to manage projects effectively from anywhere.

This package is the official Redbooth PHP client and provides connectivity with the [Redbooth API](https://redbooth.com/api/).

## Installation

Simply add `redbooth/redbooth` to the `require` section of your `composer.json` file. After that run `composer update` to install the package among your list of requirements.

Example `composer.json`:

```
{
    "require": {
        "redbooth/redbooth": "*"
    }
}
```

## Basic usage

After the package is properly installed you can connect to Redbooth API through the `\Redbooth\Service` class.

Here's an example code that reads information about your user (also available on `examples/me.php`):

```php
<?php
require 'vendor/autoload.php';

$redbooth = new \Redbooth\Service(
    'CLIENT_ID',      // update with your client id
    'CLIENT_SECRET',  // update with your client secret
    'ACCESS_TOKEN',   // update with your user's access token
    'REFRESH_TOKEN',  // update with your user's refresh token
    'REDIRECT_URL'    // update with your redirect URL
);

try {
    $res = $redbooth->getMe();
    echo 'My name is ' . $res->first_name . ' ' . $res->last_name . "\n";
} catch (\Redbooth\Exception\InvalidTokenException $e) {
    $res = $redbooth->refreshToken();
    echo 'New access token  : ' . $res->access_token . "\n";
    echo 'New refresh token : ' . $res->refresh_token . "\n";
}
```

## Supported API methods

The following Redbooth API methods are supported by this package, after instantiating the service, as seen above:

Redbooth API method | Service method | Description
--------------------|----------------|------------
[`GET /activities`](https://redbooth.com/api/api-docs/#page:activities,header:activities-activity-list) | [`getActivities()`](https://github.com/teambox/redbooth-php/blob/master/doc/Redbooth-Service.md#redboothservice__call) | Get a list of activities
[`GET /comments`](https://redbooth.com/api/api-docs/#page:comments,header:comments-comment-list-get) | [`getComments()`](https://github.com/teambox/redbooth-php/blob/master/doc/Redbooth-Service.md#redboothservice__call) | Get a list of comments
[`POST /comments`](https://redbooth.com/api/api-docs/#page:comments,header:comments-comment-list-post) | [`createComment()`](https://github.com/teambox/redbooth-php/blob/master/doc/Redbooth-Service.md#redboothservicecreatecomment) | Create a comment
[`GET /conversations`](https://redbooth.com/api/api-docs/#page:conversations,header:conversations-conversation-list-get) | [`getConversations()`](https://github.com/teambox/redbooth-php/blob/master/doc/Redbooth-Service.md#redboothservice__call) | Get a list of conversations
[`POST /conversations`](https://redbooth.com/api/api-docs/#page:conversations,header:conversations-conversation-list-post) | [`createConversation()`](https://github.com/teambox/redbooth-php/blob/master/doc/Redbooth-Service.md#redboothservicecreateconversation) | Create a conversation
[`GET /files`](https://redbooth.com/api/api-docs/#page:files,header:files-file-list) | `getFiles()` | Get a list of files
[`GET /files/{id}`](https://redbooth.com/api/api-docs/#page:files,header:files-file-get) | [`getFile()`](https://github.com/teambox/redbooth-php/blob/master/doc/ApiIndex.md) | Get a single file
`GET /files/{id}/download`| [`downloadFile()`](https://github.com/teambox/redbooth-php/blob/master/doc/Redbooth-Service.md#redboothservicedownloadfile) | Download a file
[`GET /me`](https://redbooth.com/api/api-docs/#page:user-information,header:user-information-user-information-get) | [`getMe()`](https://github.com/teambox/redbooth-php/blob/master/doc/Redbooth-Service.md#redboothservicegetme) | Get information about the authorized user
[`GET /memberships`](https://redbooth.com/api/api-docs/#page:memberships,header:memberships-membership-list-get) | [`getMemberships()`](https://github.com/teambox/redbooth-php/blob/master/doc/Redbooth-Service.md#redboothservice__call) | Get a list of memberships
[`GET /notes`](https://redbooth.com/api/api-docs/#page:notes,header:notes-note-list-get) | `getNotes()` | Get a list of notes
[`POST /notes`](https://redbooth.com/api/api-docs/#page:notes,header:notes-note-list-post) | [`createNote()`](https://github.com/teambox/redbooth-php/blob/master/doc/Redbooth-Service.md#redboothservicecreatenote) | Create a note
[`GET /notifications`](https://redbooth.com/api/api-docs/#page:notifications,header:notifications-notification-list-get) | [`getNotifications()`](https://github.com/teambox/redbooth-php/blob/master/doc/Redbooth-Service.md#redboothservice__call) | Get a list of notifications
[`POST /notifications`](https://redbooth.com/api/api-docs/#page:notifications,header:notifications-notification-list-post) | `createNotification()` | Create a notification
[`GET /organizations`](https://redbooth.com/api/api-docs/#page:organizations,header:organizations-organization-list-get) | [`getOrganizations()`](https://github.com/teambox/redbooth-php/blob/master/doc/Redbooth-Service.md#redboothservice__call) | Get a list of organizations
[`GET /people`](https://redbooth.com/api/api-docs/#page:people,header:people-people-list-get) | `getPeople()` | Get a list of people
[`GET /projects`](https://redbooth.com/api/api-docs/#page:projects,header:projects-project-list-get) | [`getProjects()`](https://github.com/teambox/redbooth-php/blob/master/doc/Redbooth-Service.md#redboothservice__call) | Get a list of projects
[`GET /subtasks`](https://redbooth.com/api/api-docs/#page:subtasks,header:subtasks-subtasks-list-get) | [`getSubtasks()`](https://github.com/teambox/redbooth-php/blob/master/doc/Redbooth-Service.md#redboothservice__call) | Get a list of subtasks
[`POST /subtasks`](https://redbooth.com/api/api-docs/#page:subtasks,header:subtasks-subtasks-list-post) | [`createSubtask()`](https://github.com/teambox/redbooth-php/blob/master/doc/Redbooth-Service.md#redboothservicecreatesubtask) | Create a subtask
[`GET /task_lists`](https://redbooth.com/api/api-docs/#page:tasklists,header:tasklists-tasklist-list-get) | [`getTaskLists()`](https://github.com/teambox/redbooth-php/blob/master/doc/Redbooth-Service.md#redboothservice__call) | Get a list of task lists
[`POST /tasks_lists`](https://redbooth.com/api/api-docs/#page:tasklists,header:tasklists-tasklist-list-post) | [`createTaskList()`](https://github.com/teambox/redbooth-php/blob/master/doc/Redbooth-Service.md#redboothservicecreatetasklist) | Create a task list
[`GET /tasks`](https://redbooth.com/api/api-docs/#page:tasks,header:tasks-task-list-get) | [`getTasks()`](https://github.com/teambox/redbooth-php/blob/master/doc/Redbooth-Service.md#redboothservice__call) | Get a list of tasks
[`POST /tasks`](https://redbooth.com/api/api-docs/#page:tasks,header:tasks-task-list-post) | [`createTask()`](https://github.com/teambox/redbooth-php/blob/master/doc/Redbooth-Service.md#redboothservicecreatetask) | Create a task
[`GET /users`](https://redbooth.com/api/api-docs/#page:users,header:users-user-list) | [`getUsers()`](https://github.com/teambox/redbooth-php/blob/master/doc/Redbooth-Service.md#redboothservice__call) | Get a list of users
[`GET /users/{id}`](https://redbooth.com/api/api-docs/#page:users,header:users-user) | [`getUser()`](https://github.com/teambox/redbooth-php/blob/master/doc/Redbooth-Service.md#redboothservicegetuser) | Get a single user

## License

Copyright 2014 Redbooth, Inc. All rights reserved.

Permission is hereby granted, free of charge, to any person obtaining a copy
of this software and associated documentation files (the "Software"), to
deal in the Software without restriction, including without limitation the
rights to use, copy, modify, merge, publish, distribute, sublicense, and/or
sell copies of the Software, and to permit persons to whom the Software is
furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in
all copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING
FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS
IN THE SOFTWARE.
