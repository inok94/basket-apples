<?php
namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

/**
 * Class MainPageTest
 * @package Tests\Feature
 */
class MainPageTest extends TestCase
{
    /**
     * @var string
     */
    protected $baseUrl = 'http://localhost:8000';

    /**
     * HTTP status test
     * @return void
     */
    public function testHttpStatusTest()
    {
        $response = $this->get('/');
        $response->assertResponseStatus(200);
    }

}
