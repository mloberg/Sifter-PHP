<?php

namespace Sifter\Resource;

use Sifter\Request;
use Sifter\Issues;

class Project extends Resource
{

    public function id()
    {
        return basename($this->data['url']);
    }

    public function milestones()
    {
        $endpoint = "/api/projects/" . $this->id() . "/milestones";
        $milestones = Request::make($endpoint);
        return Resource::make($milestones['milestones']);
    }

    public function categories()
    {
        $endpoint = "/api/projects/" . $this->id() . "/categories";
        $categories = Request::make($endpoint);
        return Resource::make($categories['categories']);
    }

    public function people()
    {
        $endpoint = "/api/projects/" . $this->id() . "/people";
        $people = Request::make($endpoint);
        return Resource::make($people['people']);
    }

    public function issues($params = array())
    {
        return new Issues($this->id());
    }

}
