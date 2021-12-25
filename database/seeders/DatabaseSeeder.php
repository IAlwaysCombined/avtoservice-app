<?php

namespace Database\Seeders;

use App\Http\Requests\MaterialRequest;
use App\Models\Auto;
use App\Models\Education;
use App\Models\Employee;
use App\Models\Invoice;
use App\Models\Material;
use App\Models\Position;
use App\Models\Request;
use App\Models\RequestJob;
use App\Models\Service;
use App\Models\ServiceRequest;
use App\Models\Solution;
use App\Models\User;
use Database\Factories\PositionFactory;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory(10)->create();
        Material::factory(1)->create();
        Service::factory(10)->create();
        Position::factory(10)->create();
        Auto::factory(10)->create();
        Education::factory(10)->create();
        Material::factory(10)->create();
        RequestJob::factory(10)->create();
        Solution::factory(10)->create();
        Employee::factory(10)->create();
        Request::factory(10)->create();
        \App\Models\MaterialRequest::factory(10)->create();
        ServiceRequest::factory(10)->create();
        Invoice::factory(10)->create();
    }
}
