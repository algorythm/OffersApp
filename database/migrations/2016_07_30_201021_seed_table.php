<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SeedTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::table('companies')->insert(array(
          array('name' => 'Companyname', 'address_id' => 1),
          array('name' => 'Connect Bar', 'address_id' => 2),
          array('name' => 'Montana - København', 'address_id' => 3),
          array('name' => 'Montana - Lyngby', 'address_id' => 4),
        ));

//-------------------------------------------------------------------------------

        DB::table('offers')->insert(array(
          array(
            'name' => 'Best Offer Ever',
            'company_id' => 1,
            'slug' => 'best-offer-ever',
            'description' => 'Here is a small text about the greatest offer in the world! You really need to get this offer, because definitely is the greatest in the world. Well... Not the greast in like highest price. More like best offer ever.',
            'price' => 20.0,
            'image' => 'https://placeholdit.imgix.net/~text?txtsize=75&txt=800%C3%97500&w=800&h=500',
            'stock' => 14,
          ),
          array(
            'name' => 'Hello World!',
            'company_id' => 2,
            'slug' => 'hello-world',
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse condimentum ex ut leo imperdiet, dignissim accumsan mauris dignissim. Duis ultricies eros nec tempus porta.',
            'price' => 14.0,
            'image' => 'https://placeholdit.imgix.net/~text?txtsize=75&txt=800%C3%97500&w=800&h=500',
            'stock' => 3,
          ),
          array(
            'name' => 'Free Entrance',
            'company_id' => 3,
            'slug' => 'free-entrance',
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse condimentum ex ut leo imperdiet, dignissim accumsan mauris dignissim. Duis ultricies eros nec tempus porta.',
            'price' => 0.0,
            'image' => 'https://placeholdit.imgix.net/~text?txtsize=75&txt=800%C3%97500&w=800&h=500',
            'stock' => 25,
          ),
          array(
            'name' => 'No Stock',
            'company_id' => 4,
            'slug' => 'no-stock',
            'description' => 'This offer has no stock, and shouldn\'t show up on the home page.',
            'price' => 0.0,
            'image' => 'https://placeholdit.imgix.net/~text?txtsize=75&txt=800%C3%97500&w=800&h=500',
            'stock' => 0,
          ),
        )
      );

//-------------------------------------------------------------------------------

        DB::table('addresses')->insert(array(
          array(
            'address1' => 'Kronprinsessegade 1',
            'city' => 'København',
            'postal_code' => '1306',
            'country' => 'Danmark',
          ),
          array(
            'address1' => 'Nørregade 31',
            'city' => 'København',
            'postal_code' => '1165',
            'country' => 'Danmark',
          ),
          array(
            'address1' => 'Strøget 67',
            'city' => 'København',
            'postal_code' => '1100',
            'country' => 'Danmark',
          ),
          array(
          'address1' => 'Hovedgaden 4',
          'city' => 'Kongens Lyngby',
          'postal_code' => '2800',
          'country' => 'Danmark',
        ),
        )
      );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::table('companies')->delete();
        DB::table('offers')->delete();
        DB::table('addresses')->delete();
    }
}
