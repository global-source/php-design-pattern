<?php

/**
 * Factory Implementation.
 */

/**
 * Class School
 */
class School
{
    /**
     * School Name
     * @var
     */
    private $name;
    /**
     * School Location
     * @var
     */
    private $location;

    /**
     * Initiate School details.
     *
     * @param string $name Name of the School.
     * @param string $location School's Location.
     */
    public function __construct($name, $location)
    {
        // Update to Global Object.
        $this->name = $name;
        $this->location = $location;
    }

    /**
     * To Return School Details.
     * @return string
     */
    public function getDetails()
    {
        return $this->name . ' : ' . $this->location;
    }

}

/**
 * Class College
 */
class College
{
    /**
     * Name of the College.
     * @var
     */
    private $name;

    /**
     * Location of the College.
     * @var
     */
    private $location;

    /**
     * Initiate College Details.
     * @param string $name College Name.
     * @param string $location College Location.
     */
    public function __construct($name, $location)
    {
        // Update to Global Object.
        $this->name = $name;
        $this->location = $location;
    }

    /**
     * To Return College Details.
     * @return string
     */
    public function getDetails()
    {
        return $this->name . ' : ' . $this->location;
    }
}

/**
 * Class Education
 */
class Education
{
    /**
     * Instance for School.
     *
     * @param string $name Name of the School.
     * @param string $location Location of the School.
     * @return object School
     */
    public static function createSchool($name, $location)
    {
        // Return School Object.
        return new School($name, $location);
    }

    /**
     * Instance for College.
     *
     * @param string $name Name of the School.
     * @param string $location Location of the School.
     * @return object College
     */
    public static function createCollege($name, $location)
    {
        // Return College Object.
        return new College($name, $location);
    }
}

// Use Education Class to Make access of College
$college = Education::createCollege('SECS', 'Coimbatore');
var_dump($college->getDetails());

// Use Education Class to Make access of School
$school = Education::createCollege('GHS', 'Udumalpet');
var_dump($school->getDetails());
