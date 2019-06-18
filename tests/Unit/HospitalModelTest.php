<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Hospital;
use App\Exceptions\ValidationException;

class HospitalModelTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testCreateModel()
    {
        //Arrange
        $name = 'My Hospital';
        $address = 'another Lane';
        $numberOfBeds = 5000;
        $numberOfDoctors = 333;
        
        //Act
        $hospital = Hospital::create($name,$address,$numberOfBeds,$numberOfDoctors);

        //Assert
        $this->assertEquals($name, $hospital->name, 'Set hospital name');
        $this->assertEquals($address, $hospital->address, 'Set address');
        $this->assertEquals($numberOfBeds, $hospital->numberOfBeds, 'Set numberOfBeds');
        $this->assertEquals($numberOfDoctors, $hospital->numberOfDoctors, 'Set numberOfDoctors');
    }

    public function testEmptyNameThrows(){
        //Arrange
        $this->expectException(ValidationException::class);
        $this->expectExceptionMessage('Invalid name');

        //Act
        $hospital = Hospital::create('', 'Phitsanulok', 100, 10);
    }


}
