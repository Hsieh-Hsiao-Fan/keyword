<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Employee;
use Illuminate\Support\Str;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Employee::insert([
            ['uuid' => (string) Str::uuid(), 'name' => '怡珊'],
            ['uuid' => (string) Str::uuid(), 'name' => '雅惠'],
            ['uuid' => (string) Str::uuid(), 'name' => '望茹'],
            ['uuid' => (string) Str::uuid(), 'name' => '坤宜'],
            ['uuid' => (string) Str::uuid(), 'name' => '淑蓉'],
            ['uuid' => (string) Str::uuid(), 'name' => '沛綺'],
            ['uuid' => (string) Str::uuid(), 'name' => '勝智'],
            ['uuid' => (string) Str::uuid(), 'name' => '一祥'],
            ['uuid' => (string) Str::uuid(), 'name' => '尚衛'],
            ['uuid' => (string) Str::uuid(), 'name' => '偉碩'],
            ['uuid' => (string) Str::uuid(), 'name' => '曉帆'],
            ['uuid' => (string) Str::uuid(), 'name' => '鎮鴻'],
            ['uuid' => (string) Str::uuid(), 'name' => '弘彥'],
            ['uuid' => (string) Str::uuid(), 'name' => '家愷'],
            ['uuid' => (string) Str::uuid(), 'name' => '俊宏'],
            ['uuid' => (string) Str::uuid(), 'name' => '家年'],
            ['uuid' => (string) Str::uuid(), 'name' => '仁豪'],
        ]);
    }
}
