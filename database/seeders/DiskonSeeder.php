<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class DiskonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $diskon = [
            [
                'kode_voucher' => 'UDINUS',
                'tanggal_mulai_berlaku' => Carbon::createFromDate('2022', '11', '01'),
                'tanggal_akhir_berlaku' => Carbon::createFromDate('2023', '11', '01'),
                'besar_diskon' => 'UDINUS',
                'aktif' =>'1',
            ],];
    
            DB::table('diskons')->insert($diskon);
    }
}
