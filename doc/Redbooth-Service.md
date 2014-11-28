Redbooth\Service
===============

Redbooth service connector.

Some methods, specifically getters are implemented
using the __call() magic method.


* Class name: Service
* Namespace: Redbooth
* Parent class: [Redbooth\Base](Redbooth-Base.md)





Properties
----------


### $listGetters

```
private array $listGetters = array('activities', 'comments', 'conversations', 'memberships', 'notes', 'notifications', 'organizations', 'people', 'projects', 'subtasks', 'task_lists', 'tasks', 'users', 'files')
```





* Visibility: **private**


### $baseUrl

```
protected \Redbooth\The $baseUrl = 'https://redbooth.com'
```





* Visibility: **protected**


### $apiPath

```
protected \Redbooth\The $apiPath = 'api/3'
```





* Visibility: **protected**


### $clientId

```
private \Redbooth\The $clientId = null
```





* Visibility: **private**


### $clientSecret

```
private \Redbooth\The $clientSecret = null
```





* Visibility: **private**


### $accessToken

```
private \Redbooth\The $accessToken = null
```





* Visibility: **private**


### $refreshToken

```
private \Redbooth\The $refreshToken = null
```





* Visibility: **private**


### $redirectUrl

```
private \Redbooth\The $redirectUrl = null
```





* Visibility: **private**


Methods
-------


### \Redbooth\Service::__call()

```
object Redbooth\Service::\Redbooth\Service::__call()(string $name, array $arguments)
```

Automatically responde to some getters.

Magic method used to overload methods specified on
the $listGetters attribute.

* Visibility: **public**

#### Arguments

* $name **string** - &lt;p&gt;The name of the method being called.&lt;/p&gt;
* $arguments **array** - &lt;p&gt;A list of arguments passed to the method.&lt;/p&gt;



### \Redbooth\Service::getFile()

```
object Redbooth\Service::\Redbooth\Service::getFile()(integer $id)
```

Get information about a file.

Get information from a single file available
to the user through the API.

* Visibility: **public**

#### Arguments

* $id **integer** - &lt;p&gt;The ID of the file to get.&lt;/p&gt;



### \Redbooth\Service::downloadFile()

```
string Redbooth\Service::\Redbooth\Service::downloadFile()(integer $id, string $filename)
```

Download a single file.

Download a file given its ID and obtain it
as specified by the filename parameter.

* Visibility: **public**

#### Arguments

* $id **integer** - &lt;p&gt;The ID of the file to download.&lt;/p&gt;
* $filename **string** - &lt;p&gt;A filename to obtain the file.&lt;/p&gt;



### \Redbooth\Service::getUser()

```
object Redbooth\Service::\Redbooth\Service::getUser()(integer $id)
```

Get information about a particular user.

Get all the available information about the
user identified by a given ID.

* Visibility: **public**

#### Arguments

* $id **integer** - &lt;p&gt;The ID of the user to read.&lt;/p&gt;



### \Redbooth\Service::getMe()

```
object Redbooth\Service::\Redbooth\Service::getMe()()
```

Get information about the authorized user.

Get all the available information about the
user currently authorized, i.e. me.

* Visibility: **public**



### \Redbooth\Service::createConversation()

```
object Redbooth\Service::\Redbooth\Service::createConversation()(integer $projectId, string $name, string $body, boolean $isPrivate)
```

Create a new conversation.

Create a new conversation inside a specific project
with all the information passed by the parameters.

* Visibility: **public**

#### Arguments

* $projectId **integer** - &lt;p&gt;The ID of the project where you want to create the conversation.&lt;/p&gt;
* $name **string** - &lt;p&gt;The name (title) of the conversation.&lt;/p&gt;
* $body **string** - &lt;p&gt;You can optionally set the conversation body.&lt;/p&gt;
* $isPrivate **boolean** - &lt;p&gt;Whether or not the conversation is private. Defaults to false.&lt;/p&gt;



### \Redbooth\Service::createTask()

```
object Redbooth\Service::\Redbooth\Service::createTask()(integer $projectId, integer $tasklistId, $name, string $description, boolean $isPrivate, string $status)
```

Create a new task.

Create a new task inside a specific project and a
specific task list with all the information passed
by the parameters.

* Visibility: **public**

#### Arguments

* $projectId **integer** - &lt;p&gt;The ID of the project where you want to create the task.&lt;/p&gt;
* $tasklistId **integer** - &lt;p&gt;The ID of the task list where you want to create the task.&lt;/p&gt;
* $name **mixed**
* $description **string** - &lt;p&gt;The description of the task.&lt;/p&gt;
* $isPrivate **boolean** - &lt;p&gt;Whether or not the task is private. Defaults to false.&lt;/p&gt;
* $status **string** - &lt;p&gt;The status of the task. Can be new, open, hold, resolved or rejected. Defaults to open.&lt;/p&gt;



### \Redbooth\Service::createSubTask()

```
object Redbooth\Service::\Redbooth\Service::createSubTask()(integer $taskId, string $name, boolean $resolved, integer $position)
```

Create a new subtask.

Create a new subtask inside a specific task
with all the information passed by the parameters.

* Visibility: **public**

#### Arguments

* $taskId **integer** - &lt;p&gt;The ID of the task where you want to create the subtask.&lt;/p&gt;
* $name **string** - &lt;p&gt;The name (title) of the subtask.&lt;/p&gt;
* $resolved **boolean** - &lt;p&gt;Whether or not the subtask is resolved. Defaults to false.&lt;/p&gt;
* $position **integer** - &lt;p&gt;The ordinal position of the subtask on the list.&lt;/p&gt;



### \Redbooth\Service::createTaskList()

```
object Redbooth\Service::\Redbooth\Service::createTaskList()(integer $projectId, string $name, boolean $archived)
```

Create a new task list.

Create a new task list inside a specific project
with all the information passed by the parameters.

* Visibility: **public**

#### Arguments

* $projectId **integer** - &lt;p&gt;The ID of the project where you want to create the task list.&lt;/p&gt;
* $name **string** - &lt;p&gt;The name (title) of the task list.&lt;/p&gt;
* $archived **boolean** - &lt;p&gt;Whether or not the task list is archived. Defaults to false.&lt;/p&gt;



### \Redbooth\Service::createNote()

```
object Redbooth\Service::\Redbooth\Service::createNote()(integer $projectId, string $name, string $content, boolean $isPrivate, boolean $shared)
```

Create a new note.

Create a new note inside a specific project
with all the information passed by the parameters.

* Visibility: **public**

#### Arguments

* $projectId **integer** - &lt;p&gt;The ID of the project where you want to create the note.&lt;/p&gt;
* $name **string** - &lt;p&gt;The name (title) of the note.&lt;/p&gt;
* $content **string** - &lt;p&gt;The content (body) of the note.&lt;/p&gt;
* $isPrivate **boolean** - &lt;p&gt;Whether or not the note is private. Defaults to false.&lt;/p&gt;
* $shared **boolean** - &lt;p&gt;Whether or not the note is shared. Defaults to false.&lt;/p&gt;



### \Redbooth\Service::createComment()

```
object Redbooth\Service::\Redbooth\Service::createComment()(string $targetType, integer $targetId, string $body, integer $minutes, \Redbooth\date $timeTrackingOn)
```

Create a new comment.

Create a new comment on a specific target
with all the information passed by the parameters.

* Visibility: **public**

#### Arguments

* $targetType **string** - &lt;p&gt;The type of target where the comment will be created. Can be conversation or task.&lt;/p&gt;
* $targetId **integer** - &lt;p&gt;The ID of the target where the comment will be created.&lt;/p&gt;
* $body **string** - &lt;p&gt;The body of the comment.&lt;/p&gt;
* $minutes **integer** - &lt;p&gt;Optionally set the spent time on a task.&lt;/p&gt;
* $timeTrackingOn **Redbooth\date** - &lt;p&gt;Optionally add the date when time tracking was turned on.&lt;/p&gt;



### \Redbooth\Base::buildEndpointUrl()

```
string Redbooth\Service::\Redbooth\Base::buildEndpointUrl()(string $method)
```

Build a complete endpoint URL.

Build an endpoint URL by concatenating the base
URL, the API path and the given method.

* Visibility: **private**

#### Arguments

* $method **string** - &lt;p&gt;The method that you want to call.&lt;/p&gt;



### \Redbooth\Base::get()

```
object Redbooth\Service::\Redbooth\Base::get()(string $method)
```

Perform a GET request.

Perform a GET request to a given API method.

* Visibility: **public**

#### Arguments

* $method **string** - &lt;p&gt;The method that you want to call.&lt;/p&gt;



### \Redbooth\Base::post()

```
object Redbooth\Service::\Redbooth\Base::post()(string $method, array $data)
```

Perform a POST request.

Perform a POST request to a given API method.

* Visibility: **public**

#### Arguments

* $method **string** - &lt;p&gt;The method that you want to call.&lt;/p&gt;
* $data **array** - &lt;p&gt;Data to be POSTed.&lt;/p&gt;



### \Redbooth\Base::postFile()

```
object Redbooth\Service::\Redbooth\Base::postFile()(string $method, array $data, string $filePath, string $fileName)
```

Upload a file.

A variation of the post() method that handles a file
upload by setting the appropriate MIME type.

* Visibility: **public**

#### Arguments

* $method **string** - &lt;p&gt;The method that you want to call.&lt;/p&gt;
* $data **array** - &lt;p&gt;Data to be POSTed.&lt;/p&gt;
* $filePath **string** - &lt;p&gt;The complete path of the file you want to upload.&lt;/p&gt;
* $fileName **string** - &lt;p&gt;The name of the file you&#039;re uploading. Defaults to &#039;asset&#039;.&lt;/p&gt;



### \Redbooth\OAuth2::__construct()

```
mixed Redbooth\Service::\Redbooth\OAuth2::__construct()(string $clientId, string $clientSecret, string $accessToken, string $refreshToken, string $redirectUrl)
```

The class constructor.

The constructor receives information needed to
interact with the OAuth2 API and sets local class
attributes.

* Visibility: **public**

#### Arguments

* $clientId **string** - &lt;p&gt;The OAuth2 API client ID.&lt;/p&gt;
* $clientSecret **string** - &lt;p&gt;The OAuth2 API Client secret.&lt;/p&gt;
* $accessToken **string** - &lt;p&gt;The OAuth2 API access token.&lt;/p&gt;
* $refreshToken **string** - &lt;p&gt;The OAuth2 API refresh token.&lt;/p&gt;
* $redirectUrl **string** - &lt;p&gt;The OAuth2 API redirect URL.&lt;/p&gt;



### \Redbooth\OAuth2::addAuthorizationHeader()

```
array Redbooth\Service::\Redbooth\OAuth2::addAuthorizationHeader()(array $headers)
```

Add an OAuth2 authorization header.

Changes the headers array by adding an OAuth2
Bearer Authorization header.

* Visibility: **protected**

#### Arguments

* $headers **array** - &lt;p&gt;The original headers array. If empty a new array will be created.&lt;/p&gt;



### \Redbooth\OAuth2::throwIfTokenInvalid()

```
mixed Redbooth\Service::\Redbooth\OAuth2::throwIfTokenInvalid()(object $res)
```

Throw an exception if a refresh token is invalid.



* Visibility: **protected**

#### Arguments

* $res **object** - &lt;p&gt;An object representation of a response.&lt;/p&gt;



### \Redbooth\OAuth2::refreshToken()

```
object Redbooth\Service::\Redbooth\OAuth2::refreshToken()()
```

Refresh the OAuth2 access and refresh tokens.

Make a request to the API and refresh the OAuth2
access and refresh tokens. Throw an invalid token
exception if, during the call, any of the tokens
is not valid.

* Visibility: **public**



### 

```
 Redbooth\Service::()
```

Get a list of files.



* Visibility: **public**


