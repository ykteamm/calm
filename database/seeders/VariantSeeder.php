<?php

namespace Database\Seeders;
use App\Models\Language;
use App\Models\Variant;
use App\Models\VariantTranslation;
use Illuminate\Database\Seeder;

class VariantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $langs = Language::all();
        $variants = [
            'uz' => [
                [
                    'name' => "Ko'p o'layman",
                    'answer' => "Ko'p o'ylamang",
                    'object_id' => 1
                ], 
                [
                    'name' => "Ko'p ga'm qilaman kelajak haqida",
                    'answer' => "Ko'p ga'm qilmang kelajak haqida",
                    'object_id' => 1
                ],
                [
                    'name' => "Ko'p ishlayman",
                    'answer' => "O'zingizga ham yetarli vaqt ajtaring",
                    'object_id' => 1
                ],
                [
                    'name' => "4 soat uxlayman",
                    'answer' => "Bir kunda kamida 5 soat uxlash tavsiya qilinadi",
                    'object_id' => 2
                ],
                [
                    'name' => "8 soat uxlayman",
                    'answer' => "Bu normal boshqa sabablar",
                    'object_id' => 2
                ],
                [
                    'name' => "10 soat uxlayman",
                    'answer' => "Ko'pi zarar",
                    'object_id' => 2
                ],
                [
                    'name' => "Baland ovozda suhbatlashganda",
                    'answer' => "O'rganing va moslashing",
                    'object_id' => 3
                ],
                [
                    'name' => "Bolalar yig'laganda",
                    'answer' => "Mehribon bo'ling",
                    'object_id' => 3
                ],
                [
                    'name' => "Telefon jiringlaganda",
                    'answer' => "Kamroq telefondan foydalaning",
                    'object_id' => 3
                ],
                [
                    'name' => "Kayfiyatim obi havo",
                    'answer' => "Foydali mashg'ulot bilan shug'ullaning",
                    'object_id' => 4
                ],
                [
                    'name' => "Kayfiyatim yaxshi",
                    'answer' => "Bu juda yaxshi. Shunday davom eting",
                    'object_id' => 4
                ],
                [
                    'name' => "Kayfiyatim ko'pincha yomon",
                    'answer' => "Yatatgandan rozi bo'ling. Shukr qiling va sizdan pastdagilarga qarang",
                    'object_id' => 4
                ]
            ],
            'en' => [
                [

                    'name' => "I die a lot",
                    'answer' => "Don't think too much",
                    'object_id' => 1
                ],
                [
                    'name' => "I worry a lot about the future",
                    'answer' => "Don't worry too much about the future",
                    'object_id' => 1
                ],
                [
                    'name' => "I work a lot",
                    'answer' => "Make enough time for yourself too",
                    'object_id' => 1
                ],
                [
                    'name' => "I sleep for 4 hours",
                    'answer' => "It is recommended to sleep at least 5 hours a day",
                    'object_id' => 2
                ],
                [
                    'name' => "I sleep 8 hours",
                    'answer' => "This is normal other reasons",
                    'object_id' => 2
                ],
                [
                    'name' => "I sleep for 10 hours",
                    'answer' => "Lots of damage",
                    'object_id' => 2
                ],
                [
                    'name' => "When talking loudly",
                    'answer' => "Learn and adapt",
                    'object_id' => 3
                ],
                [
                    'name' => "When Children Cry",
                    'answer' => "Be Kind",
                    'object_id' => 3
                ],
                [
                    'name' => "When the phone rings",
                    'answer' => "Use less phone",
                    'object_id' => 3
                ],
                [
                    'name' => "I'm in a good mood",
                    'answer' => "Do a useful exercise",
                    'object_id' => 4
                ],
                [
                    'name' => "I'm in a good mood",
                    'answer' => "That's great. Keep it up",
                    'object_id' => 4
                ],
                [
                    'name' => "I'm in a bad mood most of the time",
                    'answer' => "Be content with what you lay down. Give thanks and look at those below you",
                    'object_id' => 4
                ]
            ],
            'ru' => [
                [

                    'name' => "Я часто умираю",
                    'answer' => "Не думай слишком много",
                    'object_id' => 1
                ],
                [
                    'name' => "Я очень беспокоюсь о будущем",
                    'answer' => "Не беспокойтесь слишком сильно о будущем",
                    'object_id' => 1
                ],
                [
                    'name' => "Я много работаю",
                    'answer' => "Уделите достаточно времени и себе",
                    'object_id' => 1
                ],
                [
                    'name' => "Я сплю 4 часа",
                    'answer' => "Рекомендуется спать не менее 5 часов в сутки",
                    'object_id' => 2
                ],
                [
                    'name' => "Я сплю 8 часов",
                    'answer' => "Это нормально, другие причины",
                    'object_id' => 2
                ],
                [
                    'name' => "Я сплю 10 часов",
                    'answer' => "Большой урон",
                    'object_id' => 2
                ],
                [
                    'name' => "При громком разговоре",
                    'answer' => "Учись и адаптируйся",
                    'object_id' => 3
                ],
                [
                    'name' => "Когда дети плачут",
                    'answer' => "Будьте добры",
                    'object_id' => 3
                ],
                [
                    'name' => "Когда звонит телефон",
                    'answer' => "Используйте меньше телефона",
                    'object_id' => 3
                ],
                [
                    'name' => "У меня хорошее настроение",
                    'answer' => "Сделай полезное упражнение",
                    'object_id' => 4
                ],
                [
                    'name' => "У меня хорошее настроение",
                    'answer' => "Отлично. Продолжайте в том же духе",
                    'object_id' => 4
                ],
                [
                    'name' => "Большую часть времени я в плохом настроении",
                    'answer' => "Будьте довольны тем, что вы положили. Благодарите и смотрите на тех, кто ниже вас",
                    'object_id' => 4
                ]
            ]
        ];

        
        for ($i = 0; $i < count($variants['uz']); $i++){
            $variant = Variant::create([
                'question_id' => $variants['uz'][$i]['object_id']
            ]);
            foreach ($langs as $lang) {
                VariantTranslation::create([
                    'name' => $variants[$lang->code][$i]['name'],
                    'object_id' => $variant->id,
                    'answer' => $variants[$lang->code][$i]['answer'],
                    'language_code' => $lang->code
                ]);
            }
        }
    }
}
