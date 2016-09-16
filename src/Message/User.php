<?php
namespace genepeng\qiyukf\Message;

class User extends Property
{
    /**
     * 开发者的应用里的用户 ID。
     *
     * @var string
     */
    protected $uid;

    /**
     * user info collection
     *
     * @var array UserInfo
     */
    protected $userinfo;

    /**
     * User constructor.
     */
    public function __construct()
    {
        $this->userinfo = array();
    }

    /**
     * @return string
     */
    public function getUid()
    {
        return $this->uid;
    }

    /**
     * @param string $uid
     * @return User
     */
    public function setUid($uid)
    {
        $this->uid = $uid;
        return $this;
    }

    /**
     * @return array
     */
    public function getUserinfo()
    {
        return $this->userinfo;
    }

    /**
     * @param array $userinfo
     * @return User
     */
    public function setUserinfo($userinfo)
    {
        $this->userinfo = $userinfo;
        return $this;
    }
}
