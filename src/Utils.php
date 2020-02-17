<?php


namespace App;

class Utils
{


    public function generateRandomString(int $length = 10) {
        return substr(str_shuffle(str_repeat($x='0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ',
            ceil($length/strlen($x)) )),1,$length);
    }

    public function generateToken() :string
    {
        return rtrim(strtr(base64_encode(random_bytes(32)), '+/', '-_'), '=');
    }

    public function randomPersonName(){
        $names = [
            'Dorthea Kaylor',
            'Julienne Harbour',
            'Concetta Melgar',
            'Micheal Bentz',
            'Deidre Nielson',
            'Jeanene Otts',
            'Susy Lonzo',
            'Agustin Caswell',
            'Georgette Breiner',
            'Andra Pellham',
            'Jamaal Kober',
            'Kecia Edmondson',
            'Robby Kyler',
            'Zula Torrence',
            'Thaddeus Ludwick',
            'Sharda Destefano',
            'Theola Mccollough',
            'Louanne Raney',
            'Jacquetta Sak',
            'Amalia Mick',
            'Ninfa Rylander',
            'Staci Ceja',
            'Silvana Bohland',
            'Kathryn Marroquin',
            'Caterina Trogdon',
            'Gaye Linger',
            'Augustus Charleston',
            'Tena Plamondon',
            'Silvia Sleeth'
        ];
        return $names[rand(0, count($names)-1)];
    }

    public function randomProductName(){
        $products = [
            'product',
            'pro',
            'The Best product',
            'product for the Times',
            'product for All',
            'product of the People',
            'product That Rock',
            'product-izer',
            'product-ak',
            'I Can’t Believe It’s Not product!',
            'product Smack',
            'Sneaky product',
            'The Sneaky product',
            'That product Time',
            'product-alyzer',
            'product Gun',
            'product Kaboom',
            'The product Project',
            'Pop product',
            'product Pop',
            'product Aid',
            'product Hoop',
            'product Wrap',
            'product-ophane',
            'product-oin',
            'product App',
            'product Tone',
            'product-yo',
            'Zip product',
            'product Chain',
            'product Helper',
            'The product Helper',
            'product Storage',
            'Max product',
            'product to the Max',
            'product-o-pot',
            'product-ex',
            'product-aphone',
            'product-mobile',
            'product-uzzi',
            'product Stick',
            'product Tape',
            'product Hero',
            'product Knife',
            'product-enol',
            'product Man',
            'product Woman',
            'product Dog',
            'product Dude',
            'product Ex',
            'product Bay',
            'product Apparel',
            'product Care',
            'product Luxury',
            'product Automotive',
            'The Personal product',
            'product Insurance',
            'product Food',
            'product Nutrition',
            'product Supplements',
            'product Medicine',
            'product Beer',
            'product Fast',
            'Fast product',
            'product Provider',
            'product Retail',
            'product Alliance',
            'The product Alliance',
            'product-pac',
            'product Mart',
            'Soft product',
            'Hard product',
            'Fast product',
            'product Bank',
            'product Video',
            'product Wrap',
            'Super product',
            'Post product',
            'product Buster',
            'product Pad',
            'product Pep',
            'Crazy product',
            'product Book',
            'product Company',
            'product Brand',
            'product Carta',
            'product Card',
            'The Worst product',
            'The Best product',
            'World’s Okayest product',
            'OK product',
            'Okay product',
            'Hello product'
        ];
        return $products[rand(0, count($products)-1)];
    }


}