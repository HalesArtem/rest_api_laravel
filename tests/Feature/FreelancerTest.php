<?php

namespace Tests\Feature;

use App\Http\Middleware\ApiAuthentication;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class FreelancerTest extends TestCase
{
    use RefreshDatabase;

    public function setUp():void {

        parent::setUp();

        $this->refreshDatabase();
    }

    /**
     * A basic test example.
     *
     * @return void
     */
    public function testAuthentication()
    {
        $response = $this->get('/');

        $response->assertStatus(401);
    }

    public function testAuthenticationFreelancers()
    {
        $response = $this->get('/api/v1/freelancers');

        $response->assertStatus(401);
    }

    public function testGetFreelancers()
    {
        $response = $this->get('/api/v1/freelancers', self::getToken());

        $response->assertStatus(200);
    }

    public function testCreateFreelancer() {

        $data = [];

        $response = $this->post('/api/v1/freelancers', $data, self::getToken());

        $response->assertStatus(422);

        $data = [
            'name' => 'Artem',
            'price' => 3000,
            'email' => 'test1@gmail.com',
            'phone' => '+3809911111111'
        ];

        $response = $this->post('/api/v1/freelancers', $data, self::getToken());

        $response->assertStatus(201);
    }

    private static function getToken() {

        return [ApiAuthentication::API_KEY_HEADER => config('services.api.token')];
    }
}
