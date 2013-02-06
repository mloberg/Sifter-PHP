<?php

namespace Sifter;

use Sifter\Resource\Project;

class Projects
{

    public function open()
    {
        $endpoint = '/api/projects';
        $projects = Request::make($endpoint);
        return Project::make($projects['projects']);
    }

    public function all()
    {
        $endpoint = '/api/projects';
        $projects = Request::make($endpoint, array('all' => true));
        return Project::make($projects['projects']);
    }

    public function get($id)
    {
        $endpoint = '/api/projects/' . $id;
        return new Project(Request::make($endpoint));
    }

}
