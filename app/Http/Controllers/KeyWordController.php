<?php

namespace App\Http\Controllers;

use App\Http\Requests\GetKeyWordViewRequest;
use App\Http\Requests\CreateKeyWordRequest;
use App\Repositories\EmployeeRepository;
use App\Http\Resources\EmployeeCalcResource;

class KeyWordController extends Controller
{
    public function __construct(private EmployeeRepository $employeeRepository)
    {
    }
    
    public function index(GetKeyWordViewRequest $request)
    {
        $employee = $request->getEmployee();
        $keywords = $this->employeeRepository->findKeywords($employee);

        return view('keyWord', [
            'name' => $employee->name,
            'uuid' => $employee->uuid,
            'keywords' => $keywords,
            'count' => 30 - $keywords->count(),
        ]);
    }

    public function store(CreateKeyWordRequest $request)
    {
        if ($request->validated()) {
            $employee = $request->getEmployee();
            $this->employeeRepository->createKeywords($employee, $request->all());

            return redirect("/keyword/{$employee->uuid}");
        }
    }

    public function calc()
    {
        $employees = $this->employeeRepository->findAll();

        return EmployeeCalcResource::collection($employees);
    }

    public function calcChart()
    {
        $employees = $this->employeeRepository->findAll();
        return view('calcView', [
            'employees' => $employees,
        ]);
    }
}
