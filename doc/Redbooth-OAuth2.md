Redbooth\OAuth2
===============

Redbooth OAuth2 utilities




* Class name: OAuth2
* Namespace: Redbooth





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


### \Redbooth\OAuth2::__construct()

```
mixed Redbooth\OAuth2::\Redbooth\OAuth2::__construct()(string $clientId, string $clientSecret, string $accessToken, string $refreshToken, string $redirectUrl)
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
array Redbooth\OAuth2::\Redbooth\OAuth2::addAuthorizationHeader()(array $headers)
```

Add an OAuth2 authorization header.

Changes the headers array by adding an OAuth2
Bearer Authorization header.

* Visibility: **protected**

#### Arguments

* $headers **array** - &lt;p&gt;The original headers array. If empty a new array will be created.&lt;/p&gt;



### \Redbooth\OAuth2::throwIfTokenInvalid()

```
mixed Redbooth\OAuth2::\Redbooth\OAuth2::throwIfTokenInvalid()(object $res)
```

Throw an exception if a refresh token is invalid.



* Visibility: **protected**

#### Arguments

* $res **object** - &lt;p&gt;An object representation of a response.&lt;/p&gt;



### \Redbooth\OAuth2::refreshToken()

```
object Redbooth\OAuth2::\Redbooth\OAuth2::refreshToken()()
```

Refresh the OAuth2 access and refresh tokens.

Make a request to the API and refresh the OAuth2
access and refresh tokens. Throw an invalid token
exception if, during the call, any of the tokens
is not valid.

* Visibility: **public**


