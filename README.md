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

Here's an example code that reads information about your user (also available on `examples/me.php`:

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
