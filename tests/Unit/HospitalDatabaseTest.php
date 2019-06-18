<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Hospital;
use App\Exceptions\ValidationException;

class HospitalDatabaseTest extends TestCase
{
    use RefreshDatabase;
    /**use
     * A basic unit test example.
     *
     * @return void
     */
    public function testSavemode()
    {
        $name = 'Naresuan University Hospital';
        $address = '99 Moo 9 Thapho Muang Phitsanulog';
        $numberOfBeds = 5000;
        $numberOfDoctors = 333;
        // $hospital = new Hospital($name,$address,$numberOfBeds,$numberOfDoctors);
        $hospital = Hospital::create($name,$address,$numberOfBeds,$numberOfDoctors);

        $hospital->save();

        $this->assertDatabaseHas('hospitals', ['name' => $name]);
    }



}
