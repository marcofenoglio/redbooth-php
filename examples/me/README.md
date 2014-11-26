[Redbooth](https://redbooth.com/) is a total online collaboration solution with all of the features you need to manage projects effectively from anywhere.

This example shows you how to read information from the currently authorized user, i.e. the user your application is _impersonating_.

## Installation

Follow these steps to install and run this example:

1. `git clone git@github.com:teambox/redbooth-php.git`
2. `cd redboot-php/examples/me`
3. `make install`

## Configuration

In order to run this example you need to have a [registered Redbooth application](https://redbooth.com/oauth2/applications/new). After you register a new application, create a valid OAuth2 authorization and change the `me.php` by updating the following items:

* `CLIENT_ID` should be updated with your application client ID
* `CLIENT_SECRET` should be updated with your application client secret
* `ACCESS_TOKEN` should be updated with a valid OAuth2 access token
* `REFRESH_TOKEN` should be updated with a valid OAuth2 refresh token
* `REDIRECT_URL` should be updated with your application return URI

## Running

To run the example simply execute `php ./me.php` and the output should look similar to this:

> My name is Frank Kramer