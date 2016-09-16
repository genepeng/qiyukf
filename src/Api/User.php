<?php
namespace genepeng\qiyukf\Api;

class User extends AbstractApi
{
    const URI_USER_UPDATE = 'https://qiyukf.com/openapi/event/updateUInfo';

    /**
     * @param \genepeng\qiyukf\Message\User $user
     * @return \genepeng\qiyukf\Support\Collection
     */
    public function update(\genepeng\qiyukf\Message\User $user)
    {
        $options = [
            'headers' => [
                'Content-Type'     => 'application/json;charset=utf-8',
            ],
            'body' => $user->buildHttpBody()
        ];

        return $this->parseJson($this->post(self::URI_USER_UPDATE, $options));
    }
}
