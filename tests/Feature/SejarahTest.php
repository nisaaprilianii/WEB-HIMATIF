<?php

namespace Tests\Feature;

use Tests\TestCase;

class SejarahTest extends TestCase
{
    /**
     * Pastikan halaman sejarah dapat diakses dan menampilkan template yang sesuai.
     */
    public function test_sejarah_page_can_be_rendered_with_template(): void
    {
        $response = $this->get(route('sejarah.index'));

        $response->assertStatus(200);
        $response->assertSee('Sejarah HIMATIF');
        $response->assertSee('Perjalanan HIMATIF');
        $response->assertSee('2025 - 2026');
        $response->assertSee('Visi & Misi');
        $response->assertSee('Top Man');
        $response->assertSee('Struktur Departemen');
        $response->assertSee('Program Kerja & Agenda');
        $response->assertSee('POSDM');
        $response->assertSee('KOMINFO');
        $response->assertSee('PI');
        $response->assertSee('KWU');
        $response->assertSee('backgrounds/periode-banner.webp');
    }

    /**
     * Pastikan pratinjau data lengkap pada mode demo dapat ditampilkan sesuai mockup.
     */
    public function test_sejarah_page_can_render_demo_data(): void
    {
        $response = $this->get(route('sejarah.index', ['demo' => 1]));

        $response->assertStatus(200);
        $response->assertSee('M. Syahdanu Al-Ghifary');
        $response->assertSee('Haris Nurpazri');
        $response->assertSee('Ardelia Luthfiani');
        $response->assertSee('PEKMAT 2026');
    }

    /**
     * Pastikan halaman utama memiliki link menuju halaman sejarah.
     */
    public function test_welcome_page_has_link_to_sejarah(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
        $response->assertSee(route('sejarah.index'));
    }
}
