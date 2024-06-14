<?php

namespace App\Repositories;

use App\Models\Employee;
use App\Models\Keyword;
use Illuminate\Database\Eloquent\Collection;

class EmployeeRepository
{
    /**
     * @param string $uuid
     * 
     * @return Employee
     */
    public function findByUuid($uuid): Employee|null
    {
        return Employee::where("uuid", $uuid)->first();
    }

    /**
     * @return Collection<Employee>
     */
    public function findAll(): Collection
    {
        return Employee::all();
    }

    /**
     * @param Employee $employee
     * 
     * @return Collection<Keyword>
     */
    public function findKeywords($employee): Collection
    {
        return $employee->keywords()->get();
    }

    /**
     * @param Employee $employee
     * @param array $keywordAttributes
     * 
     * @return Keyword
     */
    public function createKeywords($employee, $keywordAttributes): Keyword
    {
        return $employee->keywords()->create($keywordAttributes);
    }
}
