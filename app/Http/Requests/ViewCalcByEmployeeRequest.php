<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Route;
use App\Models\Employee;

class ViewCalcByEmployeeRequest extends FormRequest
{
    protected $employee;
    public function __construct()
    {
        $uuid = Route::current()->parameter('uuid');
        $this->employee = Employee::where("uuid", $uuid)->first();

        if (!$this->employee) {
            abort(403, "ID錯誤，請洽客服");
        }
    }

    public function getEmployee(): Employee|null
    {
        return $this->employee;
    }
}
