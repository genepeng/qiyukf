<?php
namespace genepeng\qiyukf\Message;

class Picture extends AbstractMessage
{
    /**
     * @var ImageContent
     */
    protected $content;
    
    public function __construct()
    {
        $this->content = new PictureContent();
        $this->msgType = AbstractMessage::MESSAGE_TYPE_PICTURE;
    }

    /**
     * @return ImageContent
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * @param ImageContent $content
     * @return Image
     */
    public function setContent($content)
    {
        $this->content = $content;
        return $this;
    }
}
