<?php

namespace Database\Seeders;

use App\Models\Property;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File; 

class PropertySeeder extends Seeder
{
    public function run() {
        $jsonPath = database_path('seeders/properties.json');
        if (!File::exists($jsonPath)) {
            throw new \Exception("File properties.json not found!");
        }

        $json = File::get($jsonPath);
        $properties = json_decode($json, true);

        foreach ($properties as $property) {
            Property::create([
                'title' => $property['title'],
                'description' => $property['description'],
                'for_sale' => $property['for_sale'],
                'for_rent' => $property['for_rent'],
                'sold' => $property['sold'],
                'price' => $property['price'],
                'currency' => $property['currency'],
                'currency_symbol' => $property['currency_symbol'],
                'property_type' => $property['property_type'],
                'bedrooms' => $property['bedrooms'],
                'bathrooms' => $property['bathrooms'],
                'area' => $property['area'],
                'area_type' => $property['area_type'],
                'country' => $property['geo']['country'],
                'province' => $property['geo']['province'],
                'street' => $property['geo']['street'],
                'photos' => json_encode($property['photos']),
            ]);
        }
    }
}
