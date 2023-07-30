<?php

namespace App\Models;

class Listing
{
    public static function all()
    {
        return [
            [
                'id' => 1,
                'title' => 'Item One',
                'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusamus quis vel iste magni reiciendis ab fugiat vitae ipsam inventore, nulla maiores. Ea ut libero perspiciatis molestiae impedit nobis delectus assumenda.'
            ],
            [
                'id' => 2,
                'title' => 'Item Two',
                'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusamus quis vel iste magni reiciendis ab fugiat vitae ipsam inventore, nulla maiores. Ea ut libero perspiciatis molestiae impedit nobis delectus assumenda.'
            ],
        ];
    }

    public static function find(int $id)
    {
        $listings = self::all();

        foreach ($listings as $listing) {
            if ($listing['id'] == $id) {
                return $listing;
            }
        }
    }
}
