<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CardapioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        DB::table('cardapio')->insert([
            [
                'nome' => 'Hamburguer',
                'imagem' => 'hamburguer.jpg',
                'descricao' => 'Um delicioso hambúrguer',
                'preco' => 10.99,
                'categoria' => 'Lanches',
                'disponivel' => true,
            ],
            [
                'nome' => 'Pizza',
                'imagem' => 'pizza.jpg',
                'descricao' => 'Uma pizza saborosa',
                'preco' => 15.99,
                'categoria' => 'Pizzas',
                'disponivel' => true,
            ],
            [
                'nome' => 'Salada de Frango',
                'imagem' => 'salada.jpg',
                'descricao' => 'Uma salada leve com frango grelhado',
                'preco' => 8.99,
                'categoria' => 'Saladas',
                'disponivel' => true,
            ],
            [
                'nome' => 'Sushi Variado',
                'imagem' => 'sushi.jpg',
                'descricao' => 'Uma seleção de sushi fresco',
                'preco' => 20.99,
                'categoria' => 'Sushi',
                'disponivel' => true,
            ],
            [
                'nome' => 'Macarrão Carbonara',
                'imagem' => 'carbonara.jpg',
                'descricao' => 'Massa com molho de carbonara e bacon',
                'preco' => 12.99,
                'categoria' => 'Massas',
                'disponivel' => true,
            ],
            [
                'nome' => 'Sorvete de Chocolate',
                'imagem' => 'sorvete.jpg',
                'descricao' => 'Sorvete cremoso de chocolate',
                'preco' => 6.99,
                'categoria' => 'Sobremesas',
                'disponivel' => true,
            ],
            [
                'nome' => 'Café Espresso',
                'imagem' => 'cafe.jpg',
                'descricao' => 'Café expresso encorpado',
                'preco' => 2.49,
                'categoria' => 'Bebidas',
                'disponivel' => true,
            ],
        ]);
    }
}
