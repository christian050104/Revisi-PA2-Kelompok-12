<?php

namespace Database\Seeders;

use App\Models\Meja;
use Illuminate\Database\Seeder;

class MejaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $data = array(
            [
                'cover' => 'Meja 1.JPG',
                'meja' => '1',
                'description' => 'Terletak dekat pintu masuk, kursi dan meja kayu dengan desain minimalis.',
            ],
            [
                'cover' => 'Meja 2.JPG',
                'meja' => '2',
                'description' => 'Terletak dekat pintu masuk, kursi dan meja kayu dengan desain minimalis, dengan muatan 2 orang.',
            ],
            [
                'cover' => 'Meja 3.JPG',
                'meja' => '3',
                'description' => 'Dekat dengan counter pesanan, cocok untuk tamu yang ingin berinteraksi dengan barista. Meja tinggi dengan bangku bar, memberikan nuansa kafe klasik, dengan  muatan 5 orang',
            ],
            [
                'cover' => 'Meja 4.JPG',
                'meja' => '4',
                'description' => 'Terletak dekat pintu masuk, kursi dan meja kayu dengan desain minimalis. Dikelilingi oleh tanaman hias yang memberikan nuansa segar, dengan muatan 4 orang',
            ],
            [
                'cover' => 'Meja 5.JPG',
                'meja' => '5',
                'description' => 'Di sudut yang diberi pencahayaan lembut, cocok untuk pasangan yang ingin berbicara secara pribadi, dengan muatan 4 orang',
            ],
            [
                'cover' => 'Meja 6.JPG',
                'meja' => '6',
                'description' => 'Meja untuk muatan 4 orang',
            ],
            [
                'cover' => 'Meja 7.JPG',
                'meja' => '7',
                'description' => 'Meja untuk muatan 4 orang',
            ],
            [
                'cover' => 'Meja 8.JPG',
                'meja' => '8',
                'description' => 'Di sudut yang lebih sepi dari kafe, cocok untuk tamu yang mencari ketenangan. Meja persegi dengan kursi berbahan kain yang nyaman, ideal untuk membaca atau menulis, dengan muatan 6 orang',
            ],
            [
                'cover' => 'Meja 9.JPG',
                'meja' => '9',
                'description' => 'Meja untuk muatan 3 orang',
            ],
            [
                'cover' => 'Meja 10.JPG',
                'meja' => '10',
                'description' => 'Meja untuk muatan 2 orang',
            ],
            [
                'cover' => 'Meja 11.JPG',
                'meja' => '11',
                'description' => 'Meja untuk muatan 6 orang',
            ],
            [
                'cover' => 'Meja 12.JPG',
                'meja' => '12',
                'description' => 'Meja untuk muatan 4 orang',
            ],
            [
                'cover' => 'Meja 13.JPG',
                'meja' => '13',
                'description' => 'Meja untuk muatan 4 orang',
            ],
            [
                'cover' => 'Meja 14.JPG',
                'meja' => '14',
                'description' => 'Meja untuk muatan 4 orang',
            ],
            [
                'cover' => 'Meja 15.JPG',
                'meja' => '15',
                'description' => 'Meja untuk muatan 4 orang',
            ],
        );
        foreach ($data as $d) {
            Meja::create([
                'cover' => $d['cover'],
                'meja' => $d['meja'],
                'description' => $d['description'],
            ]);
        }
    }
}
