<?php
class URI
{
    var $uri;
    var $segments;

    public function __construct()
    {
        $this->uri = $_SERVER['REQUEST_URI'];
        $this->segments = explode('/', $this->uri);
    }

    public function getSegment($id, $default = false)
    {
        $id = (int) ($id - 1);
        return isset($this->segments[$id]) ? $this->segments[$id] : $default;
    }
}