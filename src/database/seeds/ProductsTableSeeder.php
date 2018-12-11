<?php

use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
            'category_id' => 1,
            'item_code' => 'WOMHANBAG',
            'title' => "Women's Handbag",
            'stock' => 100,
            'price' => 199.99,
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now()
        ]);

        DB::table('products')->insert([
            'category_id' => 1,
            'item_code' => 'BACKPACK',
            'title' => "Back Pack",
            'stock' => 247,
            'price' => 39.95,
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now()
        ]);

        DB::table('products')->insert([
            'category_id' => 1,
            'item_code' => 'B07DS52Z28',
            'title' => "Women Fashion Handbags Tote Bag Shoulder Bag Top Handle Satchel Purse Set 4pcs",
            'description' => '1.Fashionable and convenient. You can use them together or individually . Suitable for use in everyday.
2.Rich and beautiful colors are especially suitable for most of young ladies and girls. Also is a best gift for your family or friends.
3.The large handbag is also very suitable for dating, vacation and other occasions. The messenger bag can carry small items when you go shopping and dating. The wallet clutch can be used as a wallet . Very convenient to use it in daily life.
4.If the handbag broken,damaged or wrong handbag you received, customer only need to contact and send a picture to us by E-mail, and then we will give you refund or resend a new one to you and you don’t need to return it to us. If the handbag have a little bit leather smell. Please open it and put it outside for several day. If you have any questions,please feel free to contact us,we will reply you within 24 hours.  Thanks for your support on our store.
5.Due to differences between monitor displays, actual color may vary slightly from image.Please allow a 1-3cm measurement error due to the manual measurement.
6.NOTE:Wash it with clean water in ordinary temperature. DO NOT wash it with hot water and alkaline detergent. Hang to dry and store in ventilated place.',
            'stock' => 0,
            'price' => 39.99,
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now()
        ]);

        DB::table('products')->insert([
            'category_id' => 2,
            'item_code' => 'BLACKDRESS',
            'title' => "Black Evening Dress",
            'stock' => 60,
            'price' => 390.95,
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now()
        ]);

        DB::table('products')->insert([
            'category_id' => 2,
            'item_code' => 'TROUSERS',
            'title' => "Men's Trousers",
            'stock' => 98,
            'price' => 79.99,
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now()
        ]);

        DB::table('products')->insert([
            'category_id' => 2,
            'item_code' => 'AUSELILY',
            'title' => "Women's Long Sleeve Pleated Loose Swing Casual Dress with Pockets Knee Length",
            'stock' => 87,
            'price' => 20.99,
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now()
        ]);

        DB::table('products')->insert([
            'category_id' => 3,
            'item_code' => 'ADIDAS',
            'title' => "Adidas Running Shoes",
            'stock' => 65,
            'price' => 59.99,
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now()
        ]);

        DB::table('products')->insert([
            'category_id' => 3,
            'item_code' => 'SENSPUMPS',
            'title' => "Sensible Pumps",
            'stock' => 345,
            'price' => 19.99,
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now()
        ]);

        DB::table('products')->insert([
            'category_id' => 4,
            'item_code' => 'TENNISRACKET',
            'title' => "Adult Tennis Racket",
            'stock' => 48,
            'price' => 65.48,
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now()
        ]);

        DB::table('products')->insert([
            'category_id' => 4,
            'item_code' => 'SOCCBALL',
            'title' => "Russia 2018 FIFA World Cup Ball",
            'stock' => 21,
            'price' => 139.85,
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now()
        ]);

        DB::table('products')->insert([
            'category_id' => 4,
            'item_code' => 'B009CP5XK6',
            'title' => "Franklin Shoot Again Basketball",
            'stock' => 465,
            'price' => 36.35,
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now()
        ]);

        DB::table('products')->insert([
            'category_id' => 4,
            'item_code' => 'ODUFHJRJDJ',
            'title' => "No matter because it shouldn't show at all",
            'stock' => 1,
            'active' => 0,
            'price' => 36.35,
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now()
        ]);
    }
}
