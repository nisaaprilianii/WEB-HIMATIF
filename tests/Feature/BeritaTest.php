<?php

namespace Tests\Feature;

use Tests\TestCase;

class BeritaTest extends TestCase
{
    /**
     * Pastikan halaman berita dapat diakses dan menampilkan komponen UI dengan state kosong.
     */
    public function test_berita_page_can_be_rendered_with_empty_state(): void
    {
        $response = $this->get(route('berita.index'));

        $response->assertStatus(200);
        $response->assertSee('Berita & Informasi', false);
        $response->assertSee('Ikuti informasi terbaru');
        $response->assertSee('Semua');
        $response->assertSee('Kegiatan');
        $response->assertSee('Pengumuman');
        $response->assertSee('Akademik');
        $response->assertSee('HIMATIF');
        $response->assertSee('Cari berita ...');
        $response->assertSee('Berita Terbaru');
        $response->assertSee('Belum Ada Berita Tersedia');
        $response->assertSee('Kembali ke Beranda');
    }

    /**
     * Pastikan pratinjau kartu berita pada mode demo dapat ditampilkan sesuai mockup.
     */
    public function test_berita_page_can_render_cards_in_demo_mode(): void
    {
        $response = $this->get(route('berita.index', ['demo' => 1]));

        $response->assertStatus(200);
        $response->assertSee('HIMTEC 2026: Hackathon Vol.2');
        $response->assertSee('IT HOLIC: Smart Innovation, Global Impact');
        $response->assertSee('Baca Selengkapnya');
    }

    /**
     * Pastikan halaman utama memiliki link menuju halaman berita.
     */
    public function test_welcome_page_has_link_to_berita(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
        $response->assertSee(route('berita.index'));
    }
}
