<?php

namespace genepeng\qiyukf\Message;

class Evaluation extends Property
{
    /**
     * 开发者的应用里的用户 ID。
     *
     * @var string
     */
    protected $uid;

    /**
     * 待评价的会话 ID。该会话 ID 可由分配客服的接口拿到。
     *
     * @var string
     */
    protected $sessionId;

    /**
     * 评价值来自请求分配客服接口响应参数中 evaluationModel 中的 value 值。
     *
     * @var string
     */
    protected $evaluation;

    /**
     * 评价备注信息，可以为空
     *
     * @var string
     */
    protected $remarks;

    /**
     * @return string
     */
    public function getUid()
    {
        return $this->uid;
    }

    /**
     * @param string $uid
     * @return Evaluation
     */
    public function setUid($uid)
    {
        $this->uid = $uid;
        return $this;
    }

    /**
     * @return string
     */
    public function getSessionId()
    {
        return $this->sessionId;
    }

    /**
     * @param string $sessionId
     * @return Evaluation
     */
    public function setSessionId($sessionId)
    {
        $this->sessionId = $sessionId;
        return $this;
    }

    /**
     * @return string
     */
    public function getEvaluation()
    {
        return $this->evaluation;
    }

    /**
     * @param string $evaluation
     * @return Evaluation
     */
    public function setEvaluation($evaluation)
    {
        $this->evaluation = $evaluation;
        return $this;
    }

    /**
     * @return string
     */
    public function getRemarks()
    {
        return $this->remarks;
    }

    /**
     * @param string $remarks
     * @return Evaluation
     */
    public function setRemarks($remarks)
    {
        $this->remarks = $remarks;
        return $this;
    }
}
