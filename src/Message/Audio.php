<?php
namespace genepeng\qiyukf\Message;

class Audio extends AbstractMessage
{
    /**
     * @var AudioContent
     */
    protected $content;

    public function __construct()
    {
        $this->content = new AudioContent();
        $this->msgType = AbstractMessage::MESSAGE_TYPE_AUDIO;
    }

    /**
     * @return AudioContent
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * @param AudioContent $content
     * @return Audio
     */
    public function setContent($content)
    {
        $this->content = $content;
        return $this;
    }
}
