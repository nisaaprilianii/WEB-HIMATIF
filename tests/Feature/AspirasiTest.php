<?php

namespace Tests\Feature;

use Tests\TestCase;

class AspirasiTest extends TestCase
{
    public function test_aspirasi_page_can_be_rendered(): void
    {
        $this->get(route('aspirasi.index'))
            ->assertOk()
            ->assertSee('Sampaikan Aspirasi')
            ->assertSee('Akademik &amp; Perkuliahan', false);
    }

    public function test_aspirasi_requires_valid_input(): void
    {
        $this->post(route('aspirasi.store'), ['jenis_aspirasi' => 'Ngawur'])
            ->assertSessionHasErrors(['nama', 'nim', 'kelas', 'jenis_aspirasi', 'judul_aspirasi', 'isi_aspirasi']);
    }

    public function test_aspirasi_can_be_submitted(): void
    {
        $this->post(route('aspirasi.store'), [
            'nama' => 'Fikri',
            'nim' => '123',
            'kelas' => 'TIF RP 24A',
            'jenis_aspirasi' => 'Akademik',
            'judul_aspirasi' => 'Jadwal praktikum',
            'isi_aspirasi' => 'Mohon jadwal praktikum dirilis lebih awal.',
        ])->assertRedirect(route('aspirasi.index'))->assertSessionHas('status');
    }
}
