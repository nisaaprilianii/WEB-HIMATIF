<?php

namespace Tests\Feature;

use Tests\TestCase;

class MateriTest extends TestCase
{
    public function test_materi_page_renders_empty_state_by_default(): void
    {
        $this->get(route('materi.index'))
            ->assertOk()
            ->assertSee('Pilih Semester')
            ->assertSee('Belum Ada Materi Tersedia');
    }

    public function test_materi_page_can_be_filtered_by_semester(): void
    {
        $this->get(route('materi.index', ['demo' => 1, 'semester' => 3]))
            ->assertOk()
            ->assertSee('Struktur Data')
            ->assertSee('Jaringan Komputer')
            ->assertDontSee('Pemrograman Web');
    }

    public function test_materi_page_can_be_searched(): void
    {
        $this->get(route('materi.index', ['demo' => 1, 'q' => 'diskrit']))
            ->assertOk()
            ->assertSee('Matematika Diskrit')
            ->assertDontSee('Struktur Data');
    }
}
