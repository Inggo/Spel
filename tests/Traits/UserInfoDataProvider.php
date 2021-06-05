<?php

namespace Tests\Traits;

trait UserInfoDataProvider
{
    public function userInfoProvider()
    {
        return [
            'administrator' => [
                'name'     => 'Administrator',
                'email'    => 'admin@spel.dev',
                'password' => 'password123',
                'roles'    => ['administrator']
            ],
            'maria_clara' => [
                'name'     => 'Maria Clara de los Santos',
                'email'    => 'mariaclara@delossantos.ph',
                'password' => 'nolime1887',
                'roles'    => ['manager', 'editor']
            ],
            'alice_margatroid' => [
                'name'     => 'Alice Margatroid',
                'email'    => 'alice@gensokyo.org',
                'password' => 'sh@ngha1h0ra1',
                'roles'    => []
            ],
            'hana_song' => [
                'name'     => 'Hana Song',
                'email'    => 'dva@meka.gov.kr',
                'password' => 'dva1badguys0',
                'roles'    => ['editor']
            ]
        ];
    }
}
