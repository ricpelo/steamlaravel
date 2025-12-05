<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class PruebasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if (app()->environment('local')) {
            $editora_id = DB::table('editoras')->insertGetId([
                'nombre' => 'Steam',
            ]);

            $desarrolladora_id = DB::table('desarrolladoras')->insertGetId([
                'denominacion' => 'Valve',
                'editora_id' => $editora_id,
            ]);

            DB::table('videojuegos')->insert([
                'nombre' => 'Half life',
                'precio' => 29.99,
                'lanzamiento' => Carbon::yesterday(),
                'desarrolladora_id' => $desarrolladora_id,
            ]);

            DB::table('generos')->insert([
                ['genero' => 'Ciencia-ficción'],
                ['genero' => 'Terror'],
                ['genero' => 'Arcade'],
                ['genero' => 'Conversacional'],
                ['genero' => 'Plataformas'],
                ['genero' => 'Mundo abierto'],
                ['genero' => 'Lucha 2D'],
                ['genero' => 'Lucha 3D'],
                ['genero' => 'Lógica'],
                ['genero' => 'Puzles'],
                ['genero' => 'Novela Visual'],
                ['genero' => 'Ajedrez'],
            ]);

            DB::table('hardware')->insert([
                ['nombre' => 'Steam Controller', 'descripcion' => '...', 'precio' => 80.00],
                ['nombre' => 'Steam Machine', 'descripcion' => '...', 'precio' => 900.00],
            ]);

            // DB::table('genero_videojuego')->insert([
            //     'genero_id' => 1,
            //     'videojuego_id' => 2,
            // ]);
        }
    }
}
