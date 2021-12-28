<?php

namespace App\Helpers;

class CoverLetters
{
    public static function coverLettersCategory(){
        return [
            "original", "executive", "modern", "trendy"
        ];
    }

    public static function coverLetters(){
        return [
            "0" => [
                "id" => 1,
                "name" => "Athena",
                "category" => "trendy",
                "description" => "An impressive layout that has soft tones and communicates a style making it easy to impress the reader.",
                "image" => "/frontend/images/cover_letters/Athena_CN.png",
                "is_available" => 1,
                "color_codes" => [
                   '#6884C1', '#082A4D', '#581010', '#1D473A', '#32084D'
                ]
            ], 
            "1" => [
                "id" => 2,
                "name" => "Nutmeg",
                "category" => "executive",
                "description" => "A subtle format which is easy to read and understand, it communicates a presence that is felt definitely by the leader.",
                "image" => "/frontend/images/cover_letters/Nutmeg_CN.png",
                "is_available" => 1,
                "color_codes" => [
                    '#87300D', '#084C41', '#10365C', '#3E1D53', '#242935'
                ]
            ],
            "2" => [
                "id" => 3,
                "name" => "Lemon",
                "category" => "modern",
                "description" => "Bright, fresh & true, a sure shot layout that will make an impression to the hiring manager.",
                "image" => "/frontend/images/cover_letters/Lemon_CN.png",
                "is_available" => 1,
                "color_codes" => [
                    '#084C41', '#87300D', '#10365C', '#3E1D53', '#242935'
                ]
            ],
            "3" => [
                "id" => 4,
                "name" => "Violet",
                "category" => "trendy",
                "description" => "Rich and intoxicating , the layout never fails to impress the reader. It makes its presence felt.",
                "image" => "/frontend/images/cover_letters/Violet_CN.png",
                "is_available" => 1,
                "color_codes" => [
                    '#363C48', '#581010', '#1D473A', '#32084D', '#1B212F'
                ]
            ],
            "4" => [
                "id" => 5,
                "name" => "Vanilla",
                "category" => "trendy",
                "description" => "A light warm format, this template delivers an impact to the reader that is cool yet balanced.",
                "image" => "/frontend/images/cover_letters/Vanilla_CN.png",
                "is_available" => 1,
                "color_codes" => [
                    
                ]
            ],
            "5" => [
                "id" => 6,
                "name" => "Cotton",
                "category" => "original",
                "description" => "A straight jacketed layout that helps communicate your personality clearly and never fails to impress.",
                "image" => "/frontend/images/cover_letters/Cotton_CN.png",
                "is_available" => 1,
                "color_codes" => [
                    
                ]  
            ],
            "6" => [
                "id" => 7,
                "name" => "Melon",
                "category" => "executive",
                "description" => "Simple but Impressive format , uses subtle colours and communicates a quiet but strong presence.",
                "image" => "/frontend/images/cover_letters/Melon_CN.png",
                "is_available" => 1,
                "color_codes" => [
                    '#B58E58', '#00C571', '#2196F3', '#FC0F0F', '#000000'
                ]
            ],
            "7" => [
                "id" => 8,
                "name" => "Honey & Leather",
                "category" => "original",
                "description" => "A warm and comforting template that reflects a warm personality and leaves the reader intrigued.",
                "image" => "/frontend/images/cover_letters/Honey_leather_CN.png",
                "is_available" => 1,
                "color_codes" => [
                    
                ]
            ],
            "8" => [
                "id" => 9,
                "name" => "Lemongrass",
                "category" => "executive",
                "description" => "A wonderful template with a hint of someone who is versatile, sure to leave a unforgettable impression.",
                "image" => "/frontend/images/cover_letters/Lemon Grass_CN.png",
                "is_available" => 1,
                "color_codes" => [
                    
                ]
            ],
            "9" => [
                "id" => 10,
                "name" => "Ginger",
                "category" => "original",
                "description" => "Formal yet impactful this template packs a punch and ensures you deliver your candidature with finesse.",
                "image" => "/frontend/images/cover_letters/Ginger_CN.png",
                "is_available" => 1,
                "color_codes" => [
                                        
                ]
            ],
            "10" => [
                "id" => 11,
                "name" => "Black Pepper",
                "category" => "modern",
                "description" => "Impactful & impressive this template packs a punch for you and is sure to make your profile not easy to forget.",
                "image" => "/frontend/images/cover_letters/Black Pepper_CN.png",
                "is_available" => 1,
                "color_codes" => [
                    '#FFE14C', '#FF9737', '#91D8E2', '#F6AFAD', '#6295EC'
                ]
            ],
            "11" => [
                "id" => 12,
                "name" => "Moroccan Mint",
                "category" => "original",
                "description" => "A unique template that helps you to get your candidature across with style.",
                "image" => "/frontend/images/cover_letters/Morocon Mint_CN.png",
                "is_available" => 1,
                "color_codes" => [
                    '#082A4D', '#581010', '#1D473A', '#32084D', '#1B212F'
                ]
            ],
            "12" => [
                "id" => 13,
                "name" => "Cinnamon",
                "category" => "executive",
                "description" => "Intriguing & impressive this template can deliver the message & create a lasting impact.",
                "image" => "/frontend/images/cover_letters/Cinnamon_CN.png",
                "is_available" => 1,
                "color_codes" => [
                    '#252833', '#581010', '#1D473A', '#32084D', '#1B212F'
                ] 
            ],
            "13" => [
                "id" => 14,
                "name" => "Hibiscus",
                "category" => "trendy",
                "description" => "A unique template filled with style, sure to create a super experience for anyone who reads when used for the right job roles.",
                "image" => "/frontend/images/cover_letters/Hibiscus_CN.png",
                "is_available" => 1,
                "color_codes" => [
                    
                ]
            ],
            "14" => [
                "id" => 15,
                "name" => "Mochaccino",
                "category" => "modern",
                "description" => "A rich and deep styled template that is sure to stimulate the senses of the person reading it.",
                "image" => "/frontend/images/cover_letters/Mochaccino_CN.png",
                "is_available" => 1,
                "color_codes" => [
                    '#B58E58', '#00C571', '#2196F3', '#FC0F0F', '#000000'
                ] 
            ],
            "15" => [
                "id" => 16,
                "name" => "Bellini",
                "category" => "original",
                "description" => "A template that is sparkling & is sure to deliver an unmatched experience to the reader making it an unforgettable experience.",
                "image" => "/frontend/images/cover_letters/Bellini_CN.png",
                "is_available" => 1,
                "color_codes" => [
                    '#00C571', '#2196F3', '#FC0F0F', '#673AB7', '#000000'
                ]  
            ],
            "16" => [
                "id" => 17,
                "name" => "Gardenia",
                "category" => "modern",
                "description" => "A soft yet strong template to ensure that you create an impact in the mind of the reader.",
                "image" => "/frontend/images/cover_letters/Gardenia_CN.png",
                "is_available" => 1,
                "color_codes" => [
                    '#F8DE78', '#FF9737', '#91D8E2', '#F6AFAD', '#6295EC'
                ] 
            ],
            "17" => [
                "id" => 18,
                "name" => "Lavender",
                "category" => "modern",
                "description" => "Consistent and impactful this template ensures you are not forgotten easily !",
                "image" => "/frontend/images/cover_letters/Lavender_CN.png",
                "is_available" => 1,
                "color_codes" => [
                    
                ]
            ],
            "18" => [
                "id" => 19,
                "name" => "Orchid",
                "category" => "executive",
                "description" => "Classy, delicate and gorgeous this is a template that cannot fail to deliver everything you want.",
                "image" => "/frontend/images/cover_letters/Orchid_CN.png",
                "is_available" => 1,
                "color_codes" => [
                    '#363C49', '#581010', '#1D473A', '#32084D', '#1B212F'
                ]
            ],
            "19" => [
                "id" => 20,
                "name" => "Chocolate",
                "category" => "trendy",
                "description" => "This one needs no introduction, everyone loves it. It pleases and allows you to make your impression the way you want it to!",
                "image" => "/frontend/images/cover_letters/Chocolate_CN.png",
                "is_available" => 1,
                "color_codes" => [
                    
                ] 
            ]
        ];
    }
}
