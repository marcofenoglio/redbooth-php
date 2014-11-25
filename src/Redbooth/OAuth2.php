<?php
/**
 * The Redbooth API low-level OAuth2 Utilities.
 *
 * @author Bruno Pedro <bpedro@redbooth.com>
 * @package Redbooth
 */
namespace Redbooth;

/**
 * Redbooth OAuth2 utilities
 */
class OAuth2
{

    private $baseUrl = 'https://redbooth.com';
    private $apiPath = 'api/3';
    private $clientId = null;
    private $clientSecret = null;
    private $accessToken = null;
    private $refreshToken = null;
    private $redirectUrl = null;

    public function __construct($clientId, $clientSecret, $accessToken, $refreshToken, $redirectUrl)
    {
        $this->clientId = $clientId;
        $this->clientSecret = $clientSecret;
        $this->accessToken = $accessToken;
        $this->refreshToken = $refreshToken;
        $this->redirectUrl = $redirectUrl;
    }

    protected function addAuthorizationHeader($headers = array())
    {
        $headers['Authorization'] = 'Bearer ' . $this->accessToken;
        return $headers;
    }

    protected function throwIfTokenInvalid($res)
    {
        if ($res->code >= 400) {
            $headers = $res->headers->toArray();
            if (!empty($headers['www-authenticate'])) {
                if (
                    preg_match(
                        '/error=[\'"]?(\w+?)[\'"]?\W/u',
                        $headers['www-authenticate'],
                        $matches
                    ) &&
                    $matches[1] == 'invalid_token') {
                    throw new Exception\InvalidTokenException();
                }
            }
        }
    }

    public function refreshToken()
    {
        $data = array(
            'client_id' => $this->clientId,
            'client_secret' => $this->clientSecret,
            'refresh_token' => $this->refreshToken,
            'grant_type' => 'refresh_token',
            'redirect_uri' => urlencode($this->redirectUrl)
        );
        $res = \Httpful\Request::post('https://redbooth.com/oauth2/token')
            ->body($data)
            ->expectsJson()
            ->sendsType(\Httpful\Mime::FORM)
            ->send();
        $this->throwIfTokenInvalid($res);
        return $res->body;
    }
}
