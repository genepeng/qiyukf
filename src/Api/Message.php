<?php
namespace genepeng\qiyukf\Api;

use genepeng\qiyukf\Message\AbstractMessage;

class Message extends AbstractApi
{
    const URI_MESSAGE_SEND = 'https://qiyukf.com/openapi/message/send';

    /**
     * Send message to qiyu
     *
     * @param AbstractMessage $message
     * @return string
     */
    public function send(AbstractMessage $message)
    {
        $options = [
            'headers' => [
                'Content-Type'     => 'application/json;charset=utf-8',
            ],
            'body' => $message->buildHttpBody()
        ];

        return $this->parseJson($this->post(self::URI_MESSAGE_SEND, $options));
    }
}
