<?php
namespace genepeng\qiyukf\Message;

class Property implements \JsonSerializable
{
    protected function propertiesToArray()
    {
        $arr = [];
        $vars = get_object_vars($this);
        foreach ($vars as $property => $value) {
            if (is_object($value)) {
                $arr[$property] = $value->propertiesToArray();
            } elseif (is_array($value)) {
                foreach ($value as $item) {
                    $arr[$property][] = $item->propertiesToArray();
                }
            } else {
                $arr[$property] = $value;
            }
        }

        return $arr;
    }

    public function buildHttpBody()
    {
        return \GuzzleHttp\json_encode($this);
    }

    public function jsonSerialize()
    {
        return $this->propertiesToArray();
    }
}
