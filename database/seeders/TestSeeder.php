<?php

namespace Database\Seeders;

use App\Models\Answer;
use App\Models\AnswerTranslation;
use App\Models\Language;
use App\Models\Test;
use App\Models\TestTranslation;
use Illuminate\Database\Seeder;

class TestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $langs = Language::all();
        $tests = [
            'uz' => [
                "Bosh og'rig'i sizni bezovta qiladimi?",
                "Semirishga moyilmisiz?",
                "Kayfiyat tez tushishi, sababsiz tushkunlik kuzatiladimi?",
                "Tez sovuq qotish yoki oyoq qo'llar muzlashi bezovta qiladimi?",
                "Tez charchash, jismoniy harakatdan keyin oyoq qo'llarda toliqish, holsizlik kabilar bezovta qiladimi?",
                "Biron bir muammoni uzoq o'ylash yoki hayoldan ketmaydigan fikrlar bezovta qiladimi?",
                "Jinsiy tomonlama muammolar bormi, o'zingizga seziladimi?",
                "Boshlagan ishingizni oxiriga yetkazmaslik kuzatiladimi?",
                "Yangi rejalar tuzishga qiyinchilik, tuzilganda ham unga hoxish topa olmaslik kuzatiladimi?",
                "Atrofdagilar oldida fikringizni to'liq yetkazib berishga uyalaizmi?",
                "Tashqi ko'rinishingiz sizni qoniqtirmaslik holati kuzatiladimi?",
                "Qilgan ishlaringiz yoki aytgan gaplaringizni eslab afsuslanasizmi?",
                "Charchagan bo'lsangiz ham yotishiz bilan uxlab qololmaslik muammosi bormi sizda?",
                "Uyquda ko'p uyg'onish, ko'p tushlar ko'rish yoki uyquda cho'chib uyg'onib ketish kuzatiladimi?",
                "Diqqatingizni jamlashga qiynalasizmi, masalan biror narsa o’qiganda yoki ko’rsatuv tomosha qilganda yoki ishlayotgan vaqtda?"
            ],
            'en' => [
                "Does the headache disturb you?",
                "Even if you don't eat too much, are you inclined to fat?",
                "Does the mood to fall quickly, is depressing depressions without a reason?",
                "Designated systems are observed in you such as the hardening, laugh boiling, the difficulty of digestion",
                "Quick fatigue, does the feet bother in arms after a physical activity?",
                "Dizziness, do they bother you like feeling bad?",
                "Changes in the sex system
                (for Women) Menstruation cycle disorder, decrease in libido, pain during menstruation, corruption of mood
                (Men's) libido decrease, is there such as the reduction in sexual intercourition? ",
                "Does your ability to physically or mental labor and work seem to be reduced?",
                "Is it not to find any direction to make new plans?",
                "Heart is observed in the heart in the heart, and the heart is observed, and the heart is uncomfortable in the heart?",
                "Is blood pressure rising or infarcitation, stroke?",
                "Do you accept your health, such as vitamins, iron, calcium?",
                "Do you have a problem inability to fall asleep even if you are tired?",
                "Does sleep a lot of sleep, are there a lot of dreams or awakening fear in sleep,",
                "You have difficulty accumulating your attention, for example, when you read something or watching a show or time?"
            ],
            'ru' => [
                "Головная боль вас беспокоит?",
                "Даже если вы не едите слишком много, вы склонны к жиру?",
                "Является ли настроение быстро упасть, удручает депрессии без причины?",
                "У вас наблюдаются назначенные системы, такие как затвердевание, смех, кипячение, сложность пищеварения",
                "Быстрая усталость, ноги беспокоятся ли в руках после физической активности?",
                "Глухание, они беспокоят вас, как чувствовать себя плохо?",
                "Изменения в сексуальной системе
                (для женщин) Расстройство менструального цикла, уменьшение либидо, боль во время менструации, коррупция настроения
                (Мужские) Снижение либидо, есть ли, например, сокращение сексуального межкурирования? ",
                "Кажется, ваша способность физически или умственного труда и работы снижается?",
                "Нельзя ли найти какого -либо направления, чтобы составить новые планы?",
                "Сердце наблюдается в сердце в сердце, и сердце наблюдается, и сердце в сердце неудобно?",
                "Поднимается ли артериальное давление или инфарцирация, инсульт?",
                "Принимаете ли вы свое здоровье, например, витамины, железо, кальций?",
                "У вас есть проблема с проблемой заснуть, даже если вы устали?",
                "Спи много сна, есть много мечтаний или пробуждать страх во сне",
                "У вас есть трудности, накапливающие ваше внимание, например, когда вы что -то читаете или смотрите шоу или время?"
            ]
        ];

        $answers = [
            'uz' => [
                "Huddi shunday",
                "Shunga yaqin",
                "Bazan",
                "Kamdan kam holatlarda",
                "Umuman unday emas"
            ],
            'en' => [
                "Similarly",
                "It's close to that",
                "Sometimes",
                "I can't say exactly",
                "It's not like that at all"
            ],
            'ru' => [
                "Сходным образом",
                "Это близко к этому",
                "Иногда",
                "Я не могу точно сказать",
                "Это совсем не так"
            ]
        ];

        for ($i = 0; $i < count($tests['uz']); $i++){
            $test = Test::create([]);
            for ($k = 0; $k < count($answers['uz']); $k++) {
                $answer = Answer::create([
                    'test_id' => $test->id,
                    'order' => $k + 1
                ]);
                foreach ($langs as $lang) {
                    AnswerTranslation::create([
                        'name' => $answers[$lang->code][$k],
                        'object_id' => $answer->id,
                        'language_code' => $lang->code
                    ]);
                }
            }
            foreach ($langs as $lang) {
                TestTranslation::create([
                    'name' => $tests[$lang->code][$i],
                    'object_id' => $test->id,
                    'language_code' => $lang->code
                ]);
            }
        }
    }
}
