<?php
namespace genepeng\qiyukf\Message;

class Text extends AbstractMessage
{
    /**
     * @var string
     */
    protected $content;

    public function __construct()
    {
        $this->msgType = AbstractMessage::MESSAGE_TYPE_TEXT;
    }

    /**
     * @return string
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * @param string $content
     * @return Text
     */
    public function setContent($content)
    {
        $this->content = $content;
        return $this;
    }
}
