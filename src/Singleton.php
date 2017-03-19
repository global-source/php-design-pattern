<?php

/**
 * Singleton Implementation.
 */

/**
 * Class Company
 */
class Company
{
    /**
     * Employees Record.
     * @var bool
     */
    private $employees = False;

    /**
     * To Load list of Employees thous are in this
     * company.
     */
    protected function loadEmployees()
    {
        // Employee List.
        $employees = [
            'suresh',
            'babu',
            'kumar'
        ];

        // Update to Global Object.
        $this->employees = $employees;
    }

    /**
     * To Get all Employees of this Company. It will returns
     * the Employee list with following "Singe-Ton" Pattern,
     * It won't load employees until employee instance is empty.
     *
     * @return bool
     */
    public function getEmployees()
    {
        // If Employee Instance not setted,
        // then load it otherwise Not.
        if (False == $this->employees) {
            $this->loadEmployees();
        }
        // Return Employee Details.
        return $this->employees;
    }

}

$company = new Company();
$company->getEmployees();