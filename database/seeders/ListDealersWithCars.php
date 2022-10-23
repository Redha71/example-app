<?php

namespace Database\Seeders;

use App\Models\Vehicles;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ListDealersWithCars extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $dealers = DB::table('dealers')->get();

        echo '....' . PHP_EOL;
        foreach ($dealers as $dealer) {
            $active = Vehicles::where('vehicle_dealer_id',$dealer->id)->where('status','Active')->count();
            $processing = Vehicles::where('vehicle_dealer_id',$dealer->id)->where('status','Processing')->count();
            $sold = Vehicles::where('vehicle_dealer_id',$dealer->id)->where('status','Sold')->count();
            echo $dealer->name . ':  '.$active.' Available, '.$processing.' Reserved, '.$sold.' Sold' . PHP_EOL;
        }
        echo '....' . PHP_EOL;
    }
}
