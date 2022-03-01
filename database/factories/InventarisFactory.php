<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class InventarisFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
         return [
                'nama_barang'  => $this->faker->randomElement(['Baju', 'Kaos', 'Selimut']),
                'merk_barang'  => $this->faker->randomElement(['Gucci', 'LV', 'Dior', 'Channel']),
                'qty' => $this->faker->randomElement(['1', '2', '3', '4', '5    ']),
                'kondisi'  => $this->faker->randomElement(['layak_pakai', 'rusak_ringan', 'rusak_baru']),
                'tanggal_pengadaan' => $this->faker->date($format = 'Y-m-d', $max = 'now')
            ];
    }
}
