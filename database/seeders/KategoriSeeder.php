<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class KategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $kategori = [
            [
                'nama' =>'Men',
            ],
            [
                'nama' =>'Women',
            ],
            [
                'nama' =>'Kid',
            ],];
    
            DB::table('kategoris')->insert($kategori);
    }
}
