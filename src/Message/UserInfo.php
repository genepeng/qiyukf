<?php
namespace genepeng\qiyukf\Message;

class UserInfo extends Property
{
    /**
     * 数据项的名称，用于区别不同的数据。其中real_name、mobile_phone、email为保留字段，
     * 分别对应客服工作台用户信息中的
     * “姓名”、“手机”、“邮箱”这三项数据。保留关键字对应的数据项中，
     * index、label属性将无效，其显示顺序及名称由网易七鱼系统指定。
     *
     * @var string
     */
    protected $key;

    /**
     * 数据显示的值，类型不做限定，根据实际需要进行设定。
     *
     * @var string
     */
    protected $value;

    /**
     * 数据显示的名称。
     *
     * @var string
     */
    protected $label;

    /**
     * 用于排序，显示数据时数据项按index值升序排列
     * 不设定index的数据项将排在后面；
     * index相同或未设定的数据项将按照其在JSON 中出现的顺序排列。
     *
     * @var integer
     */
    protected $index;

    /**
     * 超链接地址。若指定该值，则该项数据将显示为超链接样式
     * 点击后跳转到其值所指定的 URL 地址。
     *
     * @var string
     */
    protected $href;

    /**
     * 仅对mobile_phone、email两个保留字段有效，表示是否隐藏对应的数据项
     * true为隐藏，false为不隐藏。若不指定，默认为false不隐藏。
     *
     * @var boolean
     */
    protected $hidden;

    /**
     * UserInfo constructor.
     * @param string $key
     * @param string $value
     * @param string $label
     * @param int $index
     * @param string $href
     * @param bool $hidden
     */
    public function __construct($key, $value, $label = null, $index = null, $href = null, $hidden = false)
    {
        $this->key = $key;
        $this->value = $value;
        $this->label = $label;
        $this->index = $index;
        $this->href = $href;
        $this->hidden = $hidden;
    }

    /**
     * @return string
     */
    public function getKey()
    {
        return $this->key;
    }

    /**
     * @param string $key
     * @return UserInfo
     */
    public function setKey($key)
    {
        $this->key = $key;
        return $this;
    }

    /**
     * @return string
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * @param string $value
     * @return UserInfo
     */
    public function setValue($value)
    {
        $this->value = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function getLabel()
    {
        return $this->label;
    }

    /**
     * @param string $label
     * @return UserInfo
     */
    public function setLabel($label)
    {
        $this->label = $label;
        return $this;
    }

    /**
     * @return int
     */
    public function getIndex()
    {
        return $this->index;
    }

    /**
     * @param int $index
     * @return UserInfo
     */
    public function setIndex($index)
    {
        $this->index = $index;
        return $this;
    }

    /**
     * @return string
     */
    public function getHref()
    {
        return $this->href;
    }

    /**
     * @param string $href
     * @return UserInfo
     */
    public function setHref($href)
    {
        $this->href = $href;
        return $this;
    }

    /**
     * @return boolean
     */
    public function isHidden()
    {
        return $this->hidden;
    }

    /**
     * @param boolean $hidden
     * @return UserInfo
     */
    public function setHidden($hidden)
    {
        $this->hidden = $hidden;
        return $this;
    }
}
