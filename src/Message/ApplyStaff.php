<?php
namespace genepeng\qiyukf\Message;

class ApplyStaff extends Property
{
    const STAFF_TYPE_ROBOT = 0;
    const STAFF_TYPE_HUMAN = 1;

    /**
     * 开发者的应用里的用户 ID。
     *
     * @var string
     */
    protected $uid;

    /**
     * 用户发起咨询客服操作的页面 url，比如商品链接，订单页面等。
     *
     * @var string
     */
    protected $fromPage;

    /**
     * fromPage 页面的标题。
     *
     * @var string
     */
    protected $fromTitle;

    /**
     * from ip
     *
     * @var string
     */
    protected $fromIp;

    /**
     * 用户设备类型信息。
     *
     * @var string
     */
    protected $deviceType;

    /**
     * 产品标识，可以是 Android 应用的包名，iOS 应用的 bundleid 等。
     *
     * @var string
     */
    protected $productId;

    /**
     * 请求分配的客服类型，如果传0，表示机器人，传1表示人工。默认为机器人
     * @var integer
     */
    protected $staffType;

    /**
     * 只请求该 ID 的客服，客服 ID 可在管理后台查看。
     *
     * @var string
     */
    protected $staffId;

    /**
     * 只请求该客服分组 ID 内的客服，分组 ID 可在管理后台查看
     *
     * @var string
     */
    protected $groupId;

    /**
     * @return string
     */
    public function getUid()
    {
        return $this->uid;
    }

    /**
     * @param string $uid
     * @return ApplyStaff
     */
    public function setUid($uid)
    {
        $this->uid = $uid;
        return $this;
    }

    /**
     * @return string
     */
    public function getFromPage()
    {
        return $this->fromPage;
    }

    /**
     * @param string $fromPage
     * @return ApplyStaff
     */
    public function setFromPage($fromPage)
    {
        $this->fromPage = $fromPage;
        return $this;
    }

    /**
     * @return string
     */
    public function getFromTitle()
    {
        return $this->fromTitle;
    }

    /**
     * @param string $fromTitle
     * @return ApplyStaff
     */
    public function setFromTitle($fromTitle)
    {
        $this->fromTitle = $fromTitle;
        return $this;
    }

    /**
     * @return string
     */
    public function getFromIp()
    {
        return $this->fromIp;
    }

    /**
     * @param string $fromIp
     * @return ApplyStaff
     */
    public function setFromIp($fromIp)
    {
        $this->fromIp = $fromIp;
        return $this;
    }

    /**
     * @return string
     */
    public function getDeviceType()
    {
        return $this->deviceType;
    }

    /**
     * @param string $deviceType
     * @return ApplyStaff
     */
    public function setDeviceType($deviceType)
    {
        $this->deviceType = $deviceType;
        return $this;
    }

    /**
     * @return string
     */
    public function getProductId()
    {
        return $this->productId;
    }

    /**
     * @param string $productId
     * @return ApplyStaff
     */
    public function setProductId($productId)
    {
        $this->productId = $productId;
        return $this;
    }

    /**
     * @return int
     */
    public function getStaffType()
    {
        return $this->staffType;
    }

    /**
     * @param int $staffType
     * @return ApplyStaff
     */
    public function setStaffType($staffType)
    {
        $this->staffType = $staffType;
        return $this;
    }

    /**
     * @return string
     */
    public function getStaffId()
    {
        return $this->staffId;
    }

    /**
     * @param string $staffId
     * @return ApplyStaff
     */
    public function setStaffId($staffId)
    {
        $this->staffId = $staffId;
        return $this;
    }

    /**
     * @return string
     */
    public function getGroupId()
    {
        return $this->groupId;
    }

    /**
     * @param string $groupId
     * @return ApplyStaff
     */
    public function setGroupId($groupId)
    {
        $this->groupId = $groupId;
        return $this;
    }
}
