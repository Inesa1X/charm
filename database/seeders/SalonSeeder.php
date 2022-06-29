<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SalonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $s1 = "https://images.unsplash.com/photo-1465426721606-27b1239015fd?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxzZWFyY2h8Nnx8YmVhdXR5JTIwc2Fsb25zfGVufDB8fDB8fA%3D%3D&auto=format&fit=crop&w=800&q=60";
        $s2 = "https://images.unsplash.com/photo-1470259078422-826894b933aa?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxzZWFyY2h8M3x8YmVhdXR5JTIwc2Fsb25zfGVufDB8fDB8fA%3D%3D&auto=format&fit=crop&w=800&q=60";
        $s3 = "https://images.unsplash.com/photo-1457972729786-0411a3b2b626?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxzZWFyY2h8NHx8YmVhdXR5JTIwc2Fsb25zfGVufDB8fDB8fA%3D%3D&auto=format&fit=crop&w=800&q=60";
        $s4 = "https://images.unsplash.com/photo-1527799820374-dcf8d9d4a388?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxzZWFyY2h8NXx8YmVhdXR5JTIwc2Fsb25zfGVufDB8fDB8fA%3D%3D&auto=format&fit=crop&w=800&q=60";
        $s5 = "https://images.unsplash.com/photo-1521590832167-7bcbfaa6381f?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxzZWFyY2h8OHx8YmVhdXR5JTIwc2Fsb25zfGVufDB8fDB8fA%3D%3D&auto=format&fit=crop&w=800&q=60";
        $s6 = "https://images.unsplash.com/photo-1488282396544-0212eea56a21?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxzZWFyY2h8MTR8fGJlYXV0eSUyMHNhbG9uc3xlbnwwfHwwfHw%3D&auto=format&fit=crop&w=800&q=60";
        $s7 = "https://images.unsplash.com/photo-1633681117637-6ee57a2160d5?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxzZWFyY2h8MTZ8fGJlYXV0eSUyMHNhbG9uc3xlbnwwfHwwfHw%3D&auto=format&fit=crop&w=800&q=60";
        $s8 = "https://images.unsplash.com/photo-1633681118771-42a97c3e2f87?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxzZWFyY2h8MjB8fGJlYXV0eSUyMHNhbG9uc3xlbnwwfHwwfHw%3D&auto=format&fit=crop&w=800&q=60";
        $s9 = "https://images.unsplash.com/photo-1595871151608-bc7abd1caca3?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxzZWFyY2h8MTN8fGJlYXV0eSUyMHNhbG9uc3xlbnwwfHwwfHw%3D&auto=format&fit=crop&w=800&q=60";
        $s10 = "https://images.unsplash.com/photo-1633681140152-3b8726450518?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxzZWFyY2h8MTV8fGJlYXV0eSUyMHNhbG9uc3xlbnwwfHwwfHw%3D&auto=format&fit=crop&w=800&q=60";
        $s11 = "https://images.unsplash.com/photo-1633681926022-84c23e8cb2d6?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxzZWFyY2h8MTh8fGJlYXV0eSUyMHNhbG9uc3xlbnwwfHwwfHw%3D&auto=format&fit=crop&w=800&q=60";
        $s12 = "https://images.unsplash.com/photo-1633681138600-295fcd688876?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxzZWFyY2h8Mjd8fGJlYXV0eSUyMHNhbG9uc3xlbnwwfHwwfHw%3D&auto=format&fit=crop&w=800&q=60";
        $s13 = "https://images.unsplash.com/photo-1633681926053-9074b76e21a7?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxzZWFyY2h8MjF8fGJlYXV0eSUyMHNhbG9uc3xlbnwwfHwwfHw%3D&auto=format&fit=crop&w=800&q=60";
        $s14 = "https://images.unsplash.com/photo-1595475884562-073c30d45670?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxzZWFyY2h8MzB8fGJlYXV0eSUyMHNhbG9uc3xlbnwwfHwwfHw%3D&auto=format&fit=crop&w=800&q=60";
        $s15 = "https://images.unsplash.com/photo-1562322140-8baeececf3df?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxzZWFyY2h8MzJ8fGJlYXV0eSUyMHNhbG9uc3xlbnwwfHwwfHw%3D&auto=format&fit=crop&w=800&q=60";
        $s16 = "https://images.unsplash.com/photo-1453761816053-ed5ba727b5b7?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxzZWFyY2h8MzV8fGJlYXV0eSUyMHNhbG9uc3xlbnwwfHwwfHw%3D&auto=format&fit=crop&w=800&q=60";
        $s17 = "https://images.unsplash.com/photo-1487412840181-f63f62e6a0ee?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxzZWFyY2h8NDd8fGJlYXV0eSUyMHNhbG9uc3xlbnwwfHwwfHw%3D&auto=format&fit=crop&w=800&q=60";
        $s18 = "https://images.unsplash.com/photo-1534154152722-fae307fc65d1?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxzZWFyY2h8NTN8fGJlYXV0eSUyMHNhbG9uc3xlbnwwfHwwfHw%3D&auto=format&fit=crop&w=800&q=60";
        $s19 = "https://images.unsplash.com/photo-1578747763484-51b21a33e4fa?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxzZWFyY2h8NTV8fGJlYXV0eSUyMHNhbG9uc3xlbnwwfHwwfHw%3D&auto=format&fit=crop&w=800&q=60";
        $s20 = "https://images.unsplash.com/photo-1474377778173-e57f2cb6973b?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxzZWFyY2h8NDh8fGJlYXV0eSUyMHNhbG9uc3xlbnwwfHwwfHw%3D&auto=format&fit=crop&w=800&q=60";
        $s21 = "https://images.unsplash.com/photo-1523654881152-1f1f16389dc8?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxzZWFyY2h8NjJ8fGJlYXV0eSUyMHNhbG9uc3xlbnwwfHwwfHw%3D&auto=format&fit=crop&w=800&q=60";

        $salons = [
            ['eStilius', 'Dariaus ir Girėno g. 9', '09876', 1, $s1],
            ['LeSkin Clinica', 'Ukmergės g. 241', '12345', 1, $s2],
            ['Flawless lashes', 'Verkių g. 5', '897006', 1, $s3],
            ['Ti Amo', 'Naugarduko g. 8', '12345', 1, $s4],
            ['Inuno grožio studija', 'Sukilėlių pr. 78A,', '54765', 2, $s5],
            ['ZV Grožio studija', 'Kovo 11-osios gatvė 73-105,', '54321', 2, $s6],
            ['DIJO grožio studija', 'Baltų pr. 26', '87609', 2, $s7],
            ['BeautyTouch', 'Kęstučio g. 59', '33435', 2, $s8],
            ['JAm Beautique-Esthetique', 'Naujoji Uosto g. 14', '43213', 3, $s9],
            ['Sandra Opul Permanent Makeup', 'Turgaus g. 20', '99087', 3, $s10],
            ['Masažo terapija by Viktorija', 'H. Manto g. 22', '33213', 3, $s11],
            ['ISA Grožio SPA', 'Vilniaus g. 118a', '11123', 4, $s12],
            ['Mellow Willow', 'Vytauto g. 111', '22331', 4, $s13],
            ['Elemi salonas', 'Vairo g. 2', '33098', 4, $s14],
            ['Bju', 'M. K. Čiurlionio g. 50', '11112', 5, $s15],
            ['Palaima', 'Virbališkės takas 3 J-5', '44356', 6, $s16],
            ['LAIKAS SAU', 'S. Daukanto g. 33', '44321', 6, $s17],
            ['GRADIALI', 'Vanagupės g. 15', '33328', 6, $s18],
            ['MiLu', 'Molainių g. 50', '98709', 7, $s19],
            ['Vanilė', 'Parko g. 35-115', '45456', 7, $s20],
            ['Priaugink.lt', 'Laisvės aikštė 1', '90087', 7, $s21]
        ];

        foreach($salons as $key=>$salon) {
            DB::table('salons')->insert([
                'title' => $salon[0],
                'street' => $salon[1],
                'zip' => $salon[2],
                'city_id' => $salon[3],
                'image_slug' => $salon[4]
            ]);
        }
    }
}
