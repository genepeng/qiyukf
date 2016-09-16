<?php
namespace genepeng\qiyukf\Message;

class AbstractMessage extends Property
{
    const MESSAGE_TYPE_TEXT     = 'TEXT';
    const MESSAGE_TYPE_PICTURE  = 'PICTURE';
    const MESSAGE_TYPE_AUDIO    = 'AUDIO';

    /**
     * User Id.
     *
     * @var string
     */
    protected $uid;

    /**
     * Message type.
     *
     * @var string
     */
    protected $msgType;

    /**
     * @return string
     */
    public function getUid()
    {
        return $this->uid;
    }

    /**
     * @param string $uid
     * @return AbstractMessage
     */
    public function setUid($uid)
    {
        $this->uid = $uid;
        return $this;
    }

    /**
     * @return string
     */
    public function getMsgType()
    {
        return $this->msgType;
    }
}
