<?php
namespace Redbooth;

/**
 * Redbooth base service
 */
class Base extends OAuth2
{

    private $baseUrl = 'https://redbooth.com';
    private $apiPath = 'api/3';

    private function buildEndpointUrl($method)
    {
        return implode('/', array($this->baseUrl,
                                  $this->apiPath,
                                  urlencode($method)));
    }

    public function get($method)
    {
        $res = \Httpful\Request::get($this->buildEndpointUrl($method))
            ->addHeaders($this->addAuthorizationHeader())
            ->send();
        $this->throwIfTokenInvalid($res);
        return $res->body;
    }

    public function post($method, $data)
    {
        $res = \Httpful\Request::post($this->buildEndpointUrl($method))
            ->body(json_encode($data))
            ->addHeaders($this->addAuthorizationHeader())
            ->sendsJson()
            ->expectsJson()
            ->send();
        $this->throwIfTokenInvalid($res);
        return $res->body;
    }

    public function postFile($method, $data, $filePath, $fileName = 'asset')
    {
        $finfo = finfo_open(FILEINFO_MIME_TYPE);
        $mimeType = finfo_file($finfo, $filePath);
        $data[$fileName] = '@' . $filePath . ';type=' . $mimeType;
        $res = \Httpful\Request::post($this->buildEndpointUrl($method))
            ->body($data)
            ->addHeaders($this->addAuthorizationHeader())
            ->expectsJson()
            ->sendTypes(\Httpful\Mime::FORM)
            ->addHeader('Accept', 'application/json')
            ->sendsType(\Httpful\Mime::UPLOAD)
            ->send();
        $this->throwIfTokenInvalid($res);
        return $res->body;
    }
}
