<?php

namespace Database\Seeders;

use App\Models\Dealers;
use DOMDocument;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;
use SimpleXMLElement;

class DealersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $xmll = Storage::disk(('local'))->get('/xml/dealers.xml');
        $xml = simplexml_load_string($xmll);
        $json = json_encode($xml);
        $dealers = json_decode($json, true);
        foreach ($dealers as $dealer) {
            foreach ($dealer as  $d) {
                $image = isset($d['image']) ? $d['image'] : '';
                Dealers::updateOrCreate([
                    'id'           =>$d['id'],
                    'name'          => $d['name'],
                    'phone_number'  => $d['phone_number'],
                    'image'         => $image,
                ]);
            }
            
        }
    }
}
