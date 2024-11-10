<?php

namespace Database\Seeders;

use App\Models\Language;
use App\Models\Medicine;
use App\Models\MedicineTranslation;
use Illuminate\Database\Seeder;

class MedicineSeeder extends Seeder
{
    public function run()
    {
        $langs = Language::all();

        $medicines = [
            [
                'uz' => "Tolalar qo'shimchasi",
                'en' => "Fiber Supplement",
                'ru' => "Клетчатка",
                'composition' => ["Inulin", "Psyllium Husk", "Cellulose"],
            ],
            [
                'uz' => "Probiotiklar",
                'en' => "Probiotics",
                'ru' => "Пробиотики",
                'composition' => ["Lactobacillus", "Bifidobacterium", "Streptococcus Thermophilus"],
            ],
            [
                'uz' => "To'liq donli mahsulotlar",
                'en' => "Whole Grains",
                'ru' => "Цельнозерновые продукты",
                'composition' => ["Oats", "Quinoa", "Brown Rice"],
            ],
            [
                'uz' => "Elektrolitlar",
                'en' => "Electrolytes",
                'ru' => "Электролиты",
                'composition' => ["Sodium", "Potassium", "Magnesium"],
            ],
            [
                'uz' => "Kokos suvi",
                'en' => "Coconut Water",
                'ru' => "Кокосовая вода",
                'composition' => ["Natural Coconut Water"],
            ],
            [
                'uz' => "Gidratatsiya kapsulalari",
                'en' => "Hydration Capsules",
                'ru' => "Гидратационные капсулы",
                'composition' => ["Sodium Chloride", "Vitamin C", "Calcium"],
            ],
            [
                'uz' => "Energiya ko'taruvchilar",
                'en' => "Energy Boosters",
                'ru' => "Энергетики",
                'composition' => ["Caffeine", "Ginseng", "Guarana"],
            ],
            [
                'uz' => "Yashil choy ekstrakti",
                'en' => "Green Tea Extract",
                'ru' => "Экстракт зеленого чая",
                'composition' => ["Catechins", "EGCG", "Antioxidants"],
            ],
            [
                'uz' => "Protein batonchiklari",
                'en' => "Protein Bars",
                'ru' => "Протеиновые батончики",
                'composition' => ["Whey Protein", "Almond Butter", "Oats"],
            ],
            [
                'uz' => "Multivitaminlar",
                'en' => "Multivitamins",
                'ru' => "Мультивитамины",
                'composition' => ["Vitamin A", "Vitamin B12", "Zinc"],
            ],
            [
                'uz' => "Vitamin D",
                'en' => "Vitamin D",
                'ru' => "Витамин D",
                'composition' => ["Cholecalciferol"],
            ],
            [
                'uz' => "Omega-3",
                'en' => "Omega-3",
                'ru' => "Омега-3",
                'composition' => ["DHA", "EPA", "ALA"],
            ],
            [
                'uz' => "Ishtahani pasaytiruvchi",
                'en' => "Appetite Suppressant",
                'ru' => "Средство подавления аппетита",
                'composition' => ["Garcinia Cambogia", "Hoodia", "Glucomannan"],
            ],
            [
                'uz' => "Kam kaloriyali gazaklar",
                'en' => "Low-Calorie Snacks",
                'ru' => "Низкокалорийные закуски",
                'composition' => ["Kale Chips", "Baked Chickpeas", "Rice Cakes"],
            ],
            [
                'uz' => "Ovqat o'rnini bosuvchi ichimliklar",
                'en' => "Meal Replacement Shakes",
                'ru' => "Коктейли для замены пищи",
                'composition' => ["Soy Protein", "Oats", "Vitamins and Minerals"],
            ],
        ];

        foreach ($medicines as $medicineData) {
            $medicine = Medicine::create([]); // Medicine yaratiladi
            foreach ($langs as $lang) {
                MedicineTranslation::create([
                    'name' => $medicineData[$lang->code], // Har bir til uchun nom
                    'object_id' => $medicine->id,
                    'language_code' => $lang->code,
                ]);
            }
        }
    }
}
