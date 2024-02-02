<?php

namespace App\Http\Controllers;
use App\Models\Setting;
use Illuminate\Http\Request;

class SettingsController extends Controller
{
    public function update(Request $request)
    {
        $showWinners = $request->has('show_winners') ? '1' : '0'; // '1' si está marcado, '0' si no
        Setting::updateOrCreate(
            ['key' => 'show_winners'],
            ['value' => $showWinners]
        );
        
        return back()->with('success', 'Configuración actualizada correctamente.');
    }
    public function show()
    {
        $setting = Setting::where('key', 'show_winners')->first();
        // Asegura que $showWinners sea true solo si el valor de la configuración es '1'
        $showWinners = $setting && $setting->value == '1';
   
        return view('admin\setttings\update', compact('showWinners'));
    }

}

