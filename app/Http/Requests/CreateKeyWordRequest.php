<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Route;
use App\Models\Employee;
use App\Repositories\EmployeeRepository;

class CreateKeyWordRequest extends FormRequest
{
    protected $employee;
    public function __construct(private EmployeeRepository $employeeRepository)
    {
        $uuid = Route::current()->parameter('uuid');
        $this->employee = $this->employeeRepository->findByUuid($uuid);

        if (!$this->employee) {
            abort(403, "ID錯誤，請洽客服");
        }
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'keyword' => [
                'required',
                'unique:keywords',
                'min:2',
                'max:255',
                'regex:/^[\x{4e00}-\x{9fff}]+$/u',
            ]
        ];
    }

    public function getEmployee(): Employee|null
    {
        return $this->employee;
    }
}
