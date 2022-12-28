<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

//        Seeders da tabela de categorias


        DB::table('categorias')->insert(
            array(
                'id' => 1,
                'cat_name' => 'Entradas',
                'cat_order' => 1,
                'cat_del' => 0
            )
        );
        DB::table('categorias')->insert(
            array(
                'id' => 2,
                'cat_name' => 'Bolinhos',
                'cat_order' => 2,
                'cat_del' => 0
            )
        );
        DB::table('categorias')->insert(
            array(
                'id' => 3,
                'cat_name' => 'Porções Fritas',
                'cat_order' => 3,
                'cat_del' => 0
            )
        );
        DB::table('categorias')->insert(
            array(
                'id' => 4,
                'cat_name' => 'Comidinhas',
                'cat_order' => 4,
                'cat_del' => 0
            )
        );
        DB::table('categorias')->insert(
            array(
                'id' => 5,
                'cat_name' => 'Sanduíches',
                'cat_order' => 5,
                'cat_del' => 0
            )
        );
        DB::table('categorias')->insert(
            array(
                'id' => 6,
                'cat_name' => 'Exóticos',
                'cat_order' => 1,
                'cat_del' => 0
            )
        );
        DB::table('categorias')->insert(
            array(
                'id' => 7,
                'cat_name' => 'Sandubas',
                'cat_order' => 7,
                'cat_del' => 0
            )
        );
        DB::table('categorias')->insert(
            array(
                'id' => 8,
                'cat_name' => 'Sobremesas',
                'cat_order' => 8,
                'cat_del' => 0
            )
        );



//        Seeders da tabela de produtos
        DB::table('produtos')->insert(
            array(
                'id' => 1,
                'pro_name' => 'Tábua de frios',
                'pro_description' => 'Descrição de tábua de frios, adicionar informações adicionais',
                'pro_price' => 15.00,
                'pro_order' => 1,
                'pro_del' => 0,
                'pro_image' => null,
                'cat_id' => 1
            )
        );
        DB::table('produtos')->insert(
            array(
                'id' => 2,
                'pro_name' => 'Brazilian Nuts',
                'pro_description' => 'Descrição de Brazilian nuts, adicionar informações adicionais',
                'pro_price' => 15.00,
                'pro_order' => 1,
                'pro_del' => 0,
                'pro_image' => null,
                'cat_id' => 1
            )
        );
        DB::table('produtos')->insert(
            array(
                'id' => 3,
                'pro_name' => 'Arroz com Linguiça',
                'pro_description' => 'Porção com 6 unidades, descrição de arroz com linguiça',
                'pro_price' => 15.00,
                'pro_order' => 1,
                'pro_del' => 0,
                'pro_image' => null,
                'cat_id' => 2
            )
        );
        DB::table('produtos')->insert(
            array(
                'id' => 4,
                'pro_name' => 'Arroz com espinafre',
                'pro_description' => 'Descrição de arroz com espinafre, adicionar informações adicionais',
                'pro_price' => 12.00,
                'pro_order' => 1,
                'pro_del' => 0,
                'pro_image' => null,
                'cat_id' => 2
            )
        );
        DB::table('produtos')->insert(
            array(
                'id' => 5,
                'pro_name' => 'Charque',
                'pro_description' => 'Descrição de charque, adicionar informações adicionais',
                'pro_price' => 20.00,
                'pro_order' => 1,
                'pro_del' => 0,
                'pro_image' => null,
                'cat_id' => 2
            )
        );
        DB::table('produtos')->insert(
            array(
                'id' => 6,
                'pro_name' => 'Bolovo',
                'pro_description' => 'Descrição de bolovo, adicionar informações adicionais',
                'pro_price' => 15.00,
                'pro_order' => 1,
                'pro_del' => 0,
                'pro_image' => null,
                'cat_id' => 2
            )
        );
        DB::table('produtos')->insert(
            array(
                'id' => 7,
                'pro_name' => 'Feijoada',
                'pro_description' => 'Descrição de feijoada, adicionar informações adicionais',
                'pro_price' => 18.00,
                'pro_order' => 1,
                'pro_del' => 0,
                'pro_image' => null,
                'cat_id' => 2
            )
        );
        DB::table('produtos')->insert(
            array(
                'id' => 8,
                'pro_name' => 'Batata com Shimeji',
                'pro_description' => 'Descrição de batata com shimeji, adicionar informações adicionais',
                'pro_price' => 18.00,
                'pro_order' => 1,
                'pro_del' => 0,
                'pro_image' => null,
                'cat_id' => 2
            )
        );


//        Seeders da tabela de users

        DB::table('users')->insert(
            array(
                'id' => 1,
                'name' => 'Administrador',
                'email' => 'bodebrown@kubainteligencia.com.br',
                'password' => Hash::make('admin')
            )
        );

    }
}
