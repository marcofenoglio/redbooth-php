Redbooth\Base
===============

Redbooth base service




* Class name: Base
* Namespace: Redbooth
* Parent class: [Redbooth\OAuth2](Redbooth-OAuth2.md)





Properties
----------


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


### \Redbooth\Base::buildEndpointUrl()

```
string Redbooth\Base::\Redbooth\Base::buildEndpointUrl()(string $method)
```

Build a complete endpoint URL.

Build an endpoint URL by concatenating the base
URL, the API path and the given method.

* Visibility: **private**

#### Arguments

* $method **string** - &lt;p&gt;The method that you want to call.&lt;/p&gt;



### \Redbooth\Base::get()

```
object Redbooth\Base::\Redbooth\Base::get()(string $method)
```

Perform a GET request.

Perform a GET request to a given API method.

* Visibility: **public**

#### Arguments

* $method **string** - &lt;p&gt;The method that you want to call.&lt;/p&gt;



### \Redbooth\Base::post()

```
object Redbooth\Base::\Redbooth\Base::post()(string $method, array $data)
```

Perform a POST request.

Perform a POST request to a given API method.

* Visibility: **public**

#### Arguments

* $method **string** - &lt;p&gt;The method that you want to call.&lt;/p&gt;
* $data **array** - &lt;p&gt;Data to be POSTed.&lt;/p&gt;



### \Redbooth\Base::postFile()

```
object Redbooth\Base::\Redbooth\Base::postFile()(string $method, array $data, string $filePath, string $fileName)
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
mixed Redbooth\Base::\Redbooth\OAuth2::__construct()(string $clientId, string $clientSecret, string $accessToken, string $refreshToken, string $redirectUrl)
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
array Redbooth\Base::\Redbooth\OAuth2::addAuthorizationHeader()(array $headers)
```

Add an OAuth2 authorization header.

Changes the headers array by adding an OAuth2
Bearer Authorization header.

* Visibility: **protected**

#### Arguments

* $headers **array** - &lt;p&gt;The original headers array. If empty a new array will be created.&lt;/p&gt;



### \Redbooth\OAuth2::throwIfTokenInvalid()

```
mixed Redbooth\Base::\Redbooth\OAuth2::throwIfTokenInvalid()(object $res)
```

Throw an exception if a refresh token is invalid.



* Visibility: **protected**

#### Arguments

* $res **object** - &lt;p&gt;An object representation of a response.&lt;/p&gt;



### \Redbooth\OAuth2::refreshToken()

```
object Redbooth\Base::\Redbooth\OAuth2::refreshToken()()
```

Refresh the OAuth2 access and refresh tokens.

Make a request to the API and refresh the OAuth2
access and refresh tokens. Throw an invalid token
exception if, during the call, any of the tokens
is not valid.

* Visibility: **public**


