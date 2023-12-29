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
                    'name' => "Har doim",
                    'answer' => "Meditatsiya bilan davolaning",
                    'object_id' => 1,
                    'ball' => 3,
                ],
                [
                    'name' => "Tez tez",
                    'answer' => "Meditatsiya bilan davolaning",
                    'object_id' => 1,
                    'ball' => 2,

                ],
                [
                    'name' => "Ba'zida",
                    'answer' => "Sayr qiling va musiqa tinglang",
                    'object_id' => 1,
                    'ball' => 1,

                ],
                [
                    'name' => "Aslo unday emas",
                    'answer' => "Sayr qiling va musiqa tinglang",
                    'object_id' => 1,
                    'ball' => 0,

                ],
                [
                    'name' => "Xuddi shunday",
                    'answer' => "Bir kunda kamida 5 soat uxlash tavsiya qilinadi",
                    'object_id' => 2,
                    'ball' => 3,
                ],
                [
                    'name' => "Shunday bo'lsa kerak",
                    'answer' => "Bu normal boshqa sabablar",
                    'object_id' => 2,
                    'ball' => 2,
                ],
                [
                    'name' => "Juda kam holatlarda",
                    'answer' => "Ko'pi zarar",
                    'object_id' => 2,
                    'ball' => 1,
                ],
                [
                    'name' => "Aslo unday emas",
                    'answer' => "Ko'pi zarar",
                    'object_id' => 2,
                    'ball' => 0,
                ],
                [
                    'name' => "Xuddi shunday",
                    'answer' => "Bir kunda kamida 5 soat uxlash tavsiya qilinadi",
                    'object_id' => 3,
                    'ball' => 3,
                ],
                [
                    'name' => "Shunday bo'lsa kerak",
                    'answer' => "Bu normal boshqa sabablar",
                    'object_id' => 3,
                    'ball' => 2,
                ],
                [
                    'name' => "Juda kam holatlarda",
                    'answer' => "Ko'pi zarar",
                    'object_id' => 3,
                    'ball' => 1,
                ],
                [
                    'name' => "Aslo unday emas",
                    'answer' => "Ko'pi zarar",
                    'object_id' => 3,
                    'ball' => 0,
                ],
                [
                    'name' => "Deyarli har doim",
                    'answer' => "Foydali mashg'ulot bilan shug'ullaning",
                    'object_id' => 4,
                    'ball' => 3,

                ],
                [
                    'name' => "Ba'zi - ba'zida",
                    'answer' => "Bu juda yaxshi. Shunday davom eting",
                    'object_id' => 4,
                    'ball' => 2,

                ],
                [
                    'name' => "Kam holatlarda",
                    'answer' => "Yatatgandan rozi bo'ling. Shukr qiling va sizdan pastdagilarga qarang",
                    'object_id' => 4,
                    'ball' => 1,

                ],
                [
                    'name' => "Deyarli kuzatilmaydi",
                    'answer' => "Yatatgandan rozi bo'ling. Shukr qiling va sizdan pastdagilarga qarang",
                    'object_id' => 4,
                    'ball' => 0,

                ],
                [
                    'name' => "Deyarli har doim",
                    'answer' => "Foydali mashg'ulot bilan shug'ullaning",
                    'object_id' => 5,
                    'ball' => 3,

                ],
                [
                    'name' => "Ko'p holatlarda",
                    'answer' => "Bu juda yaxshi. Shunday davom eting",
                    'object_id' => 5,
                    'ball' => 2,

                ],
                [
                    'name' => "Juda kam holatlarda",
                    'answer' => "Yatatgandan rozi bo'ling. Shukr qiling va sizdan pastdagilarga qarang",
                    'object_id' => 5,
                    'ball' => 1,

                ],
                [
                    'name' => "Aslo unday emas",
                    'answer' => "Yatatgandan rozi bo'ling. Shukr qiling va sizdan pastdagilarga qarang",
                    'object_id' => 5,
                    'ball' => 0

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
                ],
                [
                    'name' => "I'm in a bad mood most of the time",
                    'answer' => "Be content with what you lay down. Give thanks and look at those below you",
                    'object_id' => 4
                ],
                [
                    'name' => "I'm in a good mood",
                    'answer' => "Do a useful exercise",
                    'object_id' => 5
                ],
                [
                    'name' => "I'm in a good mood",
                    'answer' => "That's great. Keep it up",
                    'object_id' => 5
                ],
                [
                    'name' => "I'm in a bad mood most of the time",
                    'answer' => "Be content with what you lay down. Give thanks and look at those below you",
                    'object_id' => 5
                ],
                [
                    'name' => "I'm in a bad mood most of the time",
                    'answer' => "Be content with what you lay down. Give thanks and look at those below you",
                    'object_id' => 5
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
                ],
                [
                    'name' => "Большую часть времени я в плохом настроении",
                    'answer' => "Будьте довольны тем, что вы положили. Благодарите и смотрите на тех, кто ниже вас",
                    'object_id' => 4
                ],
                [
                    'name' => "У меня хорошее настроение",
                    'answer' => "Сделай полезное упражнение",
                    'object_id' => 5
                ],
                [
                    'name' => "У меня хорошее настроение",
                    'answer' => "Отлично. Продолжайте в том же духе",
                    'object_id' => 5
                ],
                [
                    'name' => "Большую часть времени я в плохом настроении",
                    'answer' => "Будьте довольны тем, что вы положили. Благодарите и смотрите на тех, кто ниже вас",
                    'object_id' => 5
                ],
                [
                    'name' => "Большую часть времени я в плохом настроении",
                    'answer' => "Будьте довольны тем, что вы положили. Благодарите и смотрите на тех, кто ниже вас",
                    'object_id' => 5
                ]
            ]
        ];


        for ($i = 0; $i < count($variants['uz']); $i++){
            $variant = Variant::create([
                'question_id' => $variants['uz'][$i]['object_id'],
                'ball' => $variants['uz'][$i]['ball'],
            ]);
            foreach ($langs as $lang) {
                VariantTranslation::create([
                    'name' => $variants[$lang->code][$i]['name'],
                    'object_id' => $variant->id,
                    'answer' => $variants[$lang->code][$i]['answer'],
                    'language_code' => $lang->code,
                    'ball' => $variants['uz'][$i]['ball'],

                ]);
            }
        }
    }
}
