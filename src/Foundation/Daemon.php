<?php
namespace genepeng\qiyukf\Foundation;

use genepeng\qiyukf\Support\Collection;
use genepeng\qiyukf\Support\Log;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class Daemon
{
    /**
     * @var string Qiyu app key
     */
    private $appKey;

    /**
     * @var string Qiyu app secret
     */
    private $appSecret;

    /**
     * @var Request
     */
    private $request;

    /**
     * @var string|callable
     */
    protected $messageHandler;

    /**
     * @var array
     */
    protected $eventHandlers;

    const EVENT_ON_RECEIVED = 'onReceived';

    /**
     * AbstractAPI constructor.
     * @param string $appKey
     * @param string $appSecret
     * @param Request $request
     */
    public function __construct($appKey, $appSecret, Request $request)
    {
        $this->appKey = $appKey;
        $this->appSecret = $appSecret;
        $this->request = $request;
    }

    /**
     * serve the request
     *
     * @return mixed
     */
    public function serve()
    {
        $this->triggerEvent(self::EVENT_ON_RECEIVED);

        $this->validate();
        return $this->handleRequest();
    }

    /**
     * Validate if request is valid.
     *
     * @throws FaultException
     */
    public function validate()
    {
        $time = $this->request->get('time');
        $checksum = $this->request->get('checksum');
        $content = $this->request->getContent();

        $sha1 = sha1($this->appSecret . strtolower(md5($content)) . $time);
        if ($checksum <> $sha1) {
            throw new \InvalidArgumentException('Invalid request signature.', 400);
        }
    }

    /**
     * Add a event listener.
     *
     * @param callable $callback
     *
     * @return Daemon
     *
     * @throws InvalidArgumentException
     */
    public function setMessageHandler($callback = null)
    {
        if (!is_callable($callback)) {
            throw new \InvalidArgumentException('Argument is not callable.');
        }

        $this->messageHandler = $callback;

        return $this;
    }
    
    public function handleRequest()
    {
        Log::debug('Qiyu message received:', [
            'Method' => $this->request->getMethod(),
            'URI' => $this->request->getRequestUri(),
            'Query' => $this->request->getQueryString(),
            'Protocal' => $this->request->server->get('SERVER_PROTOCOL'),
            'Content' => $this->request->getContent(),
        ]);

        $message = new Collection(json_decode($this->request->getContent(), true));
        $handler = $this->messageHandler;

        return call_user_func_array($handler, [$this->request, $message]);
    }

    /**
     * register event
     */
    public function registerEvent($eventType, $eventHandler)
    {
        $this->eventHandlers[$eventType][] = $eventHandler;
    }

    public function triggerEvent($eventType)
    {
        if (isset($this->eventHandlers[$eventType])) {
            foreach ($this->eventHandlers[$eventType] as $eventHandler) {
                $eventHandler->$eventType($this->request);
            }
        }
    }
}
