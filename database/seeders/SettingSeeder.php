<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Setting::create([
            'groups' => 'footer',
            'options' => 'footer_nota_sale',
            'label' => 'footer_nota',
            'value' => "Lorem Ipsum is simply dummy text of the printing and typesetting industry.",
        ]);
        Setting::create([
            'groups' => 'footer',
            'options' => 'footer_nota_servis',
            'label' => 'footer_nota',
            'value' => "Lorem Ipsum is simply dummy text of the printing and typesetting industry.",
        ]);
        Setting::create([
            'groups' => 'footer',
            'options' => 'footer_nota_servis_take',
            'label' => 'footer_nota',
            'value' => "Lorem Ipsum is simply dummy text of the printing and typesetting industry.",
        ]);
        Setting::create([
            'groups' => 'format',
            'options' => 'format_sms',
            'label' => 'format_text',
            'value' => "Lorem Ipsum is simply dummy text of the printing and typesetting industry.",
        ]);
        Setting::create([
            'groups' => 'format',
            'options' => 'format_wa',
            'label' => 'footer_text',
            'value' => "Lorem Ipsum is simply dummy text of the printing and typesetting industry.",
        ]);
        Setting::create([
            'groups' => 'batas',
            'options' => 'batas_servis',
            'label' => 'servis',
            'value' => "10",
        ]);
        Setting::create([
            'groups' => 'batas',
            'options' => 'batas_servis_type',
            'label' => 'servis',
            'value' => "Hari",
        ]);
    }
}
