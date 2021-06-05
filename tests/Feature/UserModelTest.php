<?php

namespace Tests\Feature;

use Tests\TestCase;
use Tests\Traits\UserInfoDataProvider;
use App\Models\User;

class UserModelTest extends TestCase
{
    use UserInfoDataProvider;

    /**
     * @dataProvider userInfoProvider
     */
    public function test_user_attributes($name, $email, $password)
    {
        $user = User::factory()->make([
            'name'     => $name,
            'email'    => $email,
            'password' => $password
        ]);

        $this->assertEquals($name, $user->name);
        $this->assertEquals($email, $user->email);
        $this->assertEquals($password, $user->password);
    }
}
