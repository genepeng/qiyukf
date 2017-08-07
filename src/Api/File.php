<?php

namespace genepeng\qiyukf\Api;

class File extends AbstractApi
{
    const URI_FILE_UPLOAD = 'https://qiyukf.com/openapi/message/uploadFile';

    /**
     * upload file to qiyu
     *
     * @param $filePath local file path
     * @return mixed
     */
    public function upload($filePath)
    {
        $options = [
            'multipart' => [
                [
                    'name'     => 'file',
                    'contents' => fopen($filePath, 'r')
                ]
            ]
        ];

        return $this->parseJson($this->post(self::URI_FILE_UPLOAD, $options));
    }
}
