<?php
namespace genepeng\qiyukf\Api;

use GuzzleHttp\Client as HttpClient;
use genepeng\qiyukf\Support\Collection;
use genepeng\qiyukf\Support\Log;

/**
 * Class AbstractApi
 * @link http://qiyukf.com/newdoc/html/message_interface.html
 */
class AbstractApi
{
    /**
     * @var string
     */
    private $appKey;

    /**
     * @var string
     */
    private $appSecret;

    /**
     * @var HttpClient
     */
    private $httpClient;

    /**
     * AbstractAPI constructor.
     * @param $appKey string
     * @param $appSecret string
     * @param $httpClient HttpClient
     */
    public function __construct($appKey, $appSecret, $httpClient)
    {
        $this->appKey = $appKey;
        $this->appSecret = $appSecret;
        $this->httpClient = $httpClient;
    }

    /**
     * Send post request
     *
     * @param $uri
     * @param $options
     * @return string
     */
    protected function post($uri, $options)
    {
        $time = time();
        if (isset($options['multipart'][0]['contents'])) {
            $content = stream_get_contents($options['multipart'][0]['contents']);
        } else {
            $content =  isset($options['body']) ? $options['body'] : '';
        }
        $checksum = $this->checksum($content, $time);
        $params = [
            'appKey'   => $this->appKey,
            'time'     => $time,
            'checksum' => $checksum
        ];
        $query = http_build_query($params);
        $uri .= (false === strpos($uri, '?')) ?  "?{$query}" : "&{$query}";

        Log::debug($uri, $options);
        $response = $this->httpClient->post($uri, $options);

        $bodyContent = $response->getBody()->getContents();
        Log::debug('qiyu response', ['http statusCode' => $response->getStatusCode(), 'body' => $bodyContent]);
        return $bodyContent;
    }

    /**
     * generate signature base on request body
     * @param $content
     * @param $time
     * @return string
     */
    protected function checksum($content, $time)
    {
        return sha1($this->appSecret . strtolower(md5($content)) . $time);
    }

    /**
     * parse json str to Collection
     *
     * @param $content json str
     * @return Collection
     */
    protected function parseJson($content)
    {
        $arr = json_decode($content, true);
        return new Collection($arr);
    }
}
