<?php

// Factory Design Pattern
class School
{
    private $name;
    private $location;

    public function __construct($name, $location)
    {
        $this->name = $name;
        $this->location = $location;
    }

    public function getDetails()
    {
        return $this->name . ' : ' . $this->location;
    }

}

class College
{
    private $name;
    private $location;

    public function __construct($name, $location)
    {
        $this->name = $name;
        $this->location = $location;
    }

    public function getDetails()
    {
        return $this->name . ' : ' . $this->location;
    }
}

class Education
{
    public static function createSchool($name, $location)
    {
        return new School($name, $location);
    }

    public static function createCollege($name, $location)
    {
        return new College($name, $location);
    }
}

$clg = Education::createCollege('SECS', 'Coimbatore');
var_dump($clg->getDetails());