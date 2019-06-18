<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Hospital;
class HospitalApiTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testExample()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    // protected function setUp(): void
    // {
    //     parent::setUp();
    //     factory(Hospital::class, 10)->create();
    // }

    public function testGetAllHospitals() {
        // Arrange - create 10 hospitals
        $hospital = factory(Hospital::class, 10)->create();
        // Act - make a json call to /api/hospitals
        $response = $this->json('GET', '/api/hospitals');
        // Assert - check that status 200
        //        - check that there are 10 objects in the array
        $response -> assertStatus(200);
        $response -> assertJsonCount(10);

    }
    
}
