<?php
/**
 * The Redbooth API low-level OAuth2 Utilities.
 *
 * @author Bruno Pedro <bpedro@redbooth.com>
 */
namespace Redbooth;

/**
 * Redbooth OAuth2 utilities
 *
 * @package Redbooth
 */
class OAuth2
{
    /**
     * @access protected
     * @var The API base URL.
     */
    protected $baseUrl = 'https://redbooth.com';

    /**
     * @access protected
     * @var The path part of the API URL.
     */
    protected $apiPath = 'api/3';

    /**
     * @access private
     * @var The ID of the API client.
     */
    private $clientId = null;

    /**
     * @access private
     * @var The secret of the API client.
     */
    private $clientSecret = null;

    /**
     * @access private
     * @var The OAuth2 access token.
     */
    private $accessToken = null;

    /**
     * @access private
     * @var The OAuth2 refresh token.
     */
    private $refreshToken = null;

    /**
     * @access private
     * @var The OAuth2 redirect URL.
     */
    private $redirectUrl = null;

    /**
     * The class constructor.
     *
     * The constructor receives information needed to
     * interact with the OAuth2 API and sets local class
     * attributes.
     *
     * @param string $clientId The OAuth2 API client ID.
     * @param string $clientSecret The OAuth2 API Client secret.
     * @param string $accessToken The OAuth2 API access token.
     * @param string $refreshToken The OAuth2 API refresh token.
     * @param string $redirectUrl The OAuth2 API redirect URL.
     */
    public function __construct($clientId, $clientSecret, $accessToken, $refreshToken, $redirectUrl)
    {
        $this->clientId = $clientId;
        $this->clientSecret = $clientSecret;
        $this->accessToken = $accessToken;
        $this->refreshToken = $refreshToken;
        $this->redirectUrl = $redirectUrl;
    }

    /**
     * Add an OAuth2 authorization header.
     *
     * Changes the headers array by adding an OAuth2
     * Bearer Authorization header.
     *
     * @param array $headers The original headers array. If empty a new array will be created.
     * @return array A headers array including the authorization header.
     */
    protected function addAuthorizationHeader($headers = array())
    {
        $headers['Authorization'] = 'Bearer ' . $this->accessToken;
        return $headers;
    }

    /**
     * Throw an exception if a refresh token is invalid.
     *
     * @param object $res An object representation of a response.
     * @throws \Redbooth\Exception\InvalidTokenException
     */
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

    /**
     * Refresh the OAuth2 access and refresh tokens.
     *
     * Make a request to the API and refresh the OAuth2
     * access and refresh tokens. Throw an invalid token
     * exception if, during the call, any of the tokens
     * is not valid.
     *
     * @throws \Redbooth\Exception\InvalidTokenException
     * @return object An object with information about the new tokens.
     */
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
