<?php

namespace Tests\Unit\Controllers;

use PHPUnit\Framework\TestCase;
use App\Http\Controllers\UserController;

class UserControllerTest extends TestCase
{
    protected $userController;

    protected function setUp(): void
    {
        parent::setUp();
        $this->userController = new UserController();
    }

    public function testIndex()
    {
        $response = $this->userController->index();
        $this->assertIsArray($response);
    }

    public function testShow()
    {
        $userId = 1;
        $response = $this->userController->show($userId);
        $this->assertIsArray($response);
        $this->assertArrayHasKey('id', $response);
        $this->assertEquals($userId, $response['id']);
    }

    public function testStore()
    {
        $userData = [
            'username' => 'testuser',
            'email' => 'test@example.com',
            'password' => 'password123'
        ];
        $response = $this->userController->store($userData);
        $this->assertIsArray($response);
        $this->assertArrayHasKey('id', $response);
    }

    public function testUpdate()
    {
        $userId = 1;
        $userData = [
            'username' => 'updateduser',
            'email' => 'updated@example.com'
        ];
        $response = $this->userController->update($userId, $userData);
        $this->assertIsArray($response);
        $this->assertArrayHasKey('id', $response);
        $this->assertEquals($userId, $response['id']);
    }

    public function testDestroy()
    {
        $userId = 1;
        $response = $this->userController->destroy($userId);
        $this->assertTrue($response);
    }
}
