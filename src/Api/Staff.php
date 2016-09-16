<?php
namespace genepeng\qiyukf\Api;

use genepeng\qiyukf\Message\ApplyStaff;

class Staff extends AbstractApi
{
    const URI_STAFF_APPLY = 'https://qiyukf.com/openapi/event/applyStaff';

    /**
     * @param ApplyStaff $staff
     * @return \genepeng\qiyukf\Support\Collection
     */
    public function apply(ApplyStaff $staff)
    {
        $options = [
            'headers' => [
                'Content-Type'     => 'application/json;charset=utf-8',
            ],
            'body' => $staff->buildHttpBody()
        ];

        return $this->parseJson($this->post(self::URI_STAFF_APPLY, $options));
    }
}
