<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\FaixaModel;

class DatabaseSeeder extends Seeder
{
 
    public function run(): void
  { 
       $categorias = [
        'abaixo',
        'normal',
        'obesidade grau 1',
        'obesidade grau 2',
        'obesidade grau 3'
    ];
    
    foreach($categorias as $categoria) {
        FaixaModel::create([
            'categoria' => $categoria
        ]);
    }
        
    }

}