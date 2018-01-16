<?php

namespace Moduvel\Core\Tests\Feature\Backend\Auth;

use Moduvel\Core\Tests\TestCase;

class LogoutTest extends TestCase
{
    public function test_can_logout_of_backend()
    {
        $this->followingRedirects()
            ->get(route('en.backend.logout'))
            ->assertSee('Login');
    }
}