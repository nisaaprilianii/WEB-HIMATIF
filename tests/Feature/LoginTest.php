<?php

namespace Tests\Feature;

use Tests\TestCase;

class LoginTest extends TestCase
{
    /**
     * Pastikan halaman login dapat diakses dan menampilkan komponen UI yang sesuai.
     */
    public function test_login_page_can_be_rendered(): void
    {
        $response = $this->get(route('login'));

        $response->assertStatus(200);
        $response->assertSee('Selamat Datang');
        $response->assertSee('Masuk ke akun HIMATIF untuk mengakses');
        $response->assertSee('Email');
        $response->assertSee('Password');
        $response->assertSee('MASUK');
        $response->assertSee('DAFTAR AKUN');
        $response->assertSee('Lupa Password?');
        $response->assertSee('backgrounds/login.webp');
    }

    /**
     * Pastikan halaman utama memiliki link menuju halaman login.
     */
    public function test_welcome_page_has_link_to_login(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
        $response->assertSee(route('login'));
    }

    public function test_login_form_validates_input(): void
    {
        $this->post(route('login.store'), [])
            ->assertSessionHasErrors(['email', 'password']);
    }
}
