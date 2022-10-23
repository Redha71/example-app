<?php

namespace Database\Seeders;

use App\Models\Vehicles;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class VehiclesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $json = Storage::disk(('local'))->get('/json/vehicles.json');
        $vehicles = json_decode($json, true);

            foreach ($vehicles as $vehicle) {
                $status = isset($vehicle['status']) ? $vehicle['status'] : '';
                $mark = isset($vehicle['mark']) ? $vehicle['mark'] : '';
                $colour = isset($vehicle['colour']) ? $vehicle['colour'] : '';
                $fuel = isset($vehicle['fuel']) ? $vehicle['fuel'] : '';
                $vehicle_dealer_id = isset($vehicle['vehicle_dealer_id']) ? $vehicle['vehicle_dealer_id'] : '';
                $images = isset($vehicle['images']) ? $vehicle['images'] : '';
                Vehicles::updateOrCreate([
                    'status'            => $status,
                    'mark'              => $mark,
                    'colour'            => $colour,
                    'fuel'              => $fuel,
                    'vehicle_dealer_id' => $vehicle_dealer_id,
                    'images'            => $images
                ]);
            }
       
    }
}
