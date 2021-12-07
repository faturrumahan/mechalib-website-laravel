<?php

namespace App\Models;

class Category
{
    private static $cat = [
        [
            "name" => "Keyboard",
            "slug" => "keyboard",
            "img_link" => "https://hips.hearstapps.com/amv-prod-gp.s3.amazonaws.com/gearpatrol/wp-content/uploads/2019/11/Mechanical-Keyboard-Buying-Guide-Gear-Patrol-Feature.jpg?crop=1xw:0.65xh;center,top&resize=1200:*"
        ],
        [
            "name" => "Switch",
            "slug" => "switch",
            "img_link" => "https://www.mechkeybs.com/wp-content/uploads/2021/09/KK-Light-Wave-Switch-V2-Linear-Keyboard-Switch-1024x512.jpg"
        ],
        [
            "name" => "Keycaps",
            "slug" => "keycaps",
            "img_link" => "https://i.pinimg.com/originals/c8/4b/dd/c84bdd99861b223fdb38b5e4c4b90e6e.png"
        ],
        [
            "name" => "PCB",
            "slug" => "pcb",
            "img_link" => "https://external-preview.redd.it/lLguLhf3H6-dlozyid1rwe2EMXbvJ_uhDvoupGkPlBg.jpg?auto=webp&s=fcb46ced6fd88df1b81c9e73660ee182b6ae715d"
        ],
        [
            "name" => "Case",
            "slug" => "case",
            "img_link" => "https://www.techspot.com/articles-info/1625/images/2018-05-14-image.png"
        ],
        [
            "name" => "Plate",
            "slug" => "plate",
            "img_link" => "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSXy3Mmt-m4wuOfBWFFrRAZ7ziqNktfc2WUNg&usqp=CAU"
        ],
        [
            "name" => "Stabilizer",
            "slug" => "stabilizer",
            "img_link" => "https://cdn.shopify.com/s/files/1/0490/7329/products/zeal2.jpg?v=1471914401"
        ],
        [
            "name" => "Other",
            "slug" => "other",
            "img_link" => "https://external-preview.redd.it/RpqKRILfxtPua2JqgcK1ebYrA34_986nwqleAq188uU.jpg?auto=webp&s=3ea636a109a95f7f3c897a1e634596bf14825477"
        ]
    ];

    public static function all()
    {
        return collect(self::$cat);
    }

    public static function find($slug)
    {
        $item = static::all();
        return $item->firstWhere('slug', $slug);
    }
}

Category::create([
    'name' => 'Other',
    'slug' => 'other',
    'img_link' => 'https://external-preview.redd.it/RpqKRILfxtPua2JqgcK1ebYrA34_986nwqleAq188uU.jpg?auto=webp&s=3ea636a109a95f7f3c897a1e634596bf14825477'
])
