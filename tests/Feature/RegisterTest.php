<?php

namespace Tests\Feature;

use Tests\TestCase;

class RegisterTest extends TestCase
{
    /**
     * Pastikan halaman registrasi dapat diakses dan menampilkan komponen UI yang sesuai.
     */
    public function test_registration_page_can_be_rendered(): void
    {
        $response = $this->get(route('register'));

        $response->assertStatus(200);
        $response->assertSee('Daftar Akun');
        $response->assertSee('Data Mahasiswa');
        $response->assertSee('Nama Lengkap');
        $response->assertSee('NIM');
        $response->assertSee('Angkatan');
        $response->assertSee('Kelas');
        $response->assertSee('Nomor WhatsApp');
        $response->assertSee('Data Akun');
        $response->assertSee('Email');
        $response->assertSee('Password');
        $response->assertSee('Konfirmasi Password');
        $response->assertSee('Verifikasi Keanggotaan');
        $response->assertSee('Upload Sertifikat PEKMAT');
        $response->assertSee('Sertifikat PEKMAT');
        $response->assertSee('bg_register.png');
        $response->assertSee(route('login'));
    }

    /**
     * Pastikan halaman login memiliki link menuju halaman registrasi.
     */
    public function test_login_page_has_link_to_register(): void
    {
        $response = $this->get(route('login'));

        $response->assertStatus(200);
        $response->assertSee(route('register'));
    }
}
