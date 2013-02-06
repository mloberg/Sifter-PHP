<?php

namespace Sifter\Resource;

class Issue extends Resource
{

    public function id()
    {
        return basename($this->data['url']);
    }

    public function details()
    {
        $endpoint = parse_url($this->data['api_url'], PHP_URL_PATH);
        $details = Request::make($endpoint);
        return Resource::make($details['issue']);
    }

}
