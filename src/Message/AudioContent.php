<?php
namespace genepeng\qiyukf\Message;

class AudioContent extends Property
{
    /**
     * Audio url
     *
     * @var string
     */
    protected $url;

    /**
     * Audio size in byte
     *
     * @var integer
     */
    protected $size;

    /**
     * Audio md5 hash value
     *
     * @var string
     */
    protected $md5;

    /**
     * Audio play duration in millisecond
     *
     * @var integer
     */
    protected $dur;

    /**
     * @return string
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * @param string $url
     * @return AudioContent
     */
    public function setUrl($url)
    {
        $this->url = $url;
        return $this;
    }

    /**
     * @return int
     */
    public function getSize()
    {
        return $this->size;
    }

    /**
     * @param int $size
     * @return AudioContent
     */
    public function setSize($size)
    {
        $this->size = $size;
        return $this;
    }

    /**
     * @return string
     */
    public function getMd5()
    {
        return $this->md5;
    }

    /**
     * @param string $md5
     * @return AudioContent
     */
    public function setMd5($md5)
    {
        $this->md5 = $md5;
        return $this;
    }

    /**
     * @return int
     */
    public function getDur()
    {
        return $this->dur;
    }

    /**
     * @param int $dur
     * @return AudioContent
     */
    public function setDur($dur)
    {
        $this->dur = $dur;
        return $this;
    }
}
