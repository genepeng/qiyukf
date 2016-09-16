<?php
namespace genepeng\qiyukf\Message;

class PictureContent extends Property
{
    /**
     * Image url
     *
     * @var string
     */
    protected $url;

    /**
     * Image size in byte
     *
     * @var integer
     */
    protected $size;

    /**
     * Image md5 hash value
     *
     * @var string
     */
    protected $md5;

    /**
     * Image size width
     *
     * @var integer
     */
    protected $w;

    /**
     * Image size height
     *
     * @var integer
     */
    protected $h;

    /**
     * @return string
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * @param string $url
     * @return ImageContent
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
     * @return ImageContent
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
     * @return ImageContent
     */
    public function setMd5($md5)
    {
        $this->md5 = $md5;
        return $this;
    }

    /**
     * @return int
     */
    public function getW()
    {
        return $this->w;
    }

    /**
     * @param int $w
     * @return ImageContent
     */
    public function setW($w)
    {
        $this->w = $w;
        return $this;
    }

    /**
     * @return int
     */
    public function getH()
    {
        return $this->h;
    }

    /**
     * @param int $h
     * @return ImageContent
     */
    public function setH($h)
    {
        $this->h = $h;
        return $this;
    }
}
