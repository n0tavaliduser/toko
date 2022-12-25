<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class BarangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $barang = [
            [
                'nama' =>'Yellow Sweater',
                'harga' =>'75000',
                'stok' =>'15',
                'gambar' =>'product-1.jpg',
                'id_kategori' =>'2',
            ],
            [
                'nama' =>'Dusty Pink Crop Sweater',
                'harga' =>'100000',
                'stok' =>'15',
                'gambar' =>'product-2.jpg',
                'id_kategori' =>'2',
            ],
            [
                'nama' =>'Green Jacket',
                'harga' =>'250000',
                'stok' =>'5',
                'gambar' =>'product-3.jpg',
                'id_kategori' =>'1',
            ],
            [
                'nama' =>'Grey Syal',
                'harga' =>'50000',
                'stok' =>'20',
                'gambar' =>'product-4.jpg',
                'id_kategori' =>'3',
            ],
            [
                'nama' =>'Yellow Bag',
                'harga' =>'150000',
                'stok' =>'49',
                'gambar' =>'product-7.jpg',
                'id_kategori' =>'3',
            ],];
    
            DB::table('barangs')->insert($barang);
    }
}
