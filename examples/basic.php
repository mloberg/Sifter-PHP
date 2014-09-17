<?php

require 'vendor/autoload.php';

$host = 'example.sifterapp.com';
$token = 'abc123';

$sifter = new Sifter\Sifter($host, $token);

$projects = $sifter->projects();

foreach ($projects->open() as $project) {
    echo $project->id() . ": " . $project->name() . "\n";

    echo " Milestones:\n";
    foreach ($project->milestones() as $milestone) {
        echo "  - " . $milestone->name() . "\n";
    }

    echo " Categories:\n";
    foreach ($project->categories() as $category) {
        echo "  - " . $category->name() . "\n";
    }

    echo " Poeple:\n";
    foreach ($project->people() as $person) {
        echo "  - " . $person->username() . "\n";
    }

    echo " Issues:\n";
    foreach ($project->issues()->open()->high()->get() as $issue) {
        echo "  - " . $issue->subject() . "\n";
    }
}
