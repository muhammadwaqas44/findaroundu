<?php

use Illuminate\Database\Seeder;

class InventoryPackingUnitTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $inventories = [
            ['name' => '20\' Container'],
            ['name' => '40\' Container'],
            ['name' => '40\' HQ Container'],
            ['name' => 'Acre/Acres'],
            ['name' => 'Ampere/Amperes'],
            ['name' => 'Bags'],
            ['name' => 'Barrel/Barrels'],
            ['name' => 'Boxes'],
            ['name' => 'Bushel/Bushels'],
            ['name' => 'Carat/Carats'],
            ['name' => 'Carton/Cartons'],
            ['name' => 'Case/Cases'],
            ['name' => 'Centimeter/Centimeter'],
            ['name' => 'Chain/Chains'],
            ['name' => 'Cubic Centimeter/Cubic Centimeters'],
            ['name' => 'Cubic Foot/Cubic Feet'],
            ['name' => 'Cubic Inch/Cubic Inches'],
            ['name' => 'Cubic Meter/Cubic Meters'],
            ['name' => 'Cubic Yard/Cubic Yards'],
            ['name' => 'Degrees Celsius'],
            ['name' => 'Degrees Fahrenheit'],
            ['name' => 'Dozen/Dozens'],
            ['name' => 'Dram/Drams'],
            ['name' => 'Fluid Ounce/Fluid Ounces'],
            ['name' => 'Foot'],
            ['name' => 'Furlong/Furlongs'],
            ['name' => 'Gallon/Gallons'],
            ['name' => 'Gill/Gills'],
            ['name' => 'Grain/Grains'],
            ['name' => 'Grain/Grains'],
            ['name' => 'Gross'],
            ['name' => 'Hectare/Hectares'],
            ['name' => 'Hertz'],
            ['name' => 'Inch/Inches'],
            ['name' => 'Kiloampere/Kiloamperes'],
            ['name' => 'Kilogram/Kilograms'],
            ['name' => 'Kilohertz'],
            ['name' => 'Kilometer/Kilometers'],
            ['name' => 'Kiloohm/Kiloohms'],
            ['name' => 'Kilowatt/Kilowatts'],
            ['name' => 'Liter/Liters'],
            ['name' => 'Long Ton/Long Tons'],
            ['name' => 'Megahertz'],
            ['name' => 'Meter'],
            ['name' => 'Metric Ton/Metric Tons'],
            ['name' => 'Mile/Miles'],
            ['name' => 'Milliampere/Milliamperes'],
            ['name' => 'Milligram/Milligrams'],
            ['name' => 'Millihertz'],
            ['name' => 'Milliliter/Milliliters'],
            ['name' => 'Millimeter/Millimeters'],
            ['name' => 'Milliohm/Milliohms'],
            ['name' => 'Millivolt/Millivolts'],
            ['name' => 'Milliwatt/Milliwatts'],
            ['name' => 'Nautical Mile/Nautical Miles'],
            ['name' => 'Ohm/Ohms'],
            ['name' => 'Ounce/Ounces'],
            ['name' => 'Pack/Packs'],
            ['name' => 'Pairs'],
            ['name' => 'Pallet/Pallets'],
            ['name' => 'Parcel/Parcels'],
            ['name' => 'Perch/Perches'],
            ['name' => 'Pieces'],
            ['name' => 'Pint/Pints'],
            ['name' => 'Plant/Plants"'],
            ['name' => 'Pole/Poles'],
            ['name' => 'Pound/Pounds'],
            ['name' => 'Quart/Quarts'],
            ['name' => 'Quarter/Quarters'],
            ['name' => 'Reams'],
            ['name' => 'Rod/Rods'],
            ['name' => 'Rolls'],
            ['name' => 'Sets'],
            ['name' => 'Sheet/Sheets'],
            ['name' => 'Short Ton/Short Tons'],
            ['name' => 'Square Centimeter/Square Centimeters'],
            ['name' => 'Square Feet'],
            ['name' => 'Square Inch/Square Inches'],
            ['name' => 'Square Meters'],
            ['name' => 'Square Mile/Square Miles'],
            ['name' => 'Square Yard/Square Yards'],
            ['name' => 'Stone/Stones'],
            ['name' => 'Strand/Strands'],
            ['name' => 'Tonne/Tonnes'],
            ['name' => 'Tons'],
            ['name' => 'Tray/Trays'],
            ['name' => 'Unit/Units'],
            ['name' => 'Volt/Volts'],
            ['name' => 'Watt/Watts'],
            ['name' => 'Wp'],
            ['name' => 'Yard/Yards']

        ];
        foreach ($inventories as $inventory) {
            \App\InventoryPackingUnit::create($inventory);
        }
    }
}
