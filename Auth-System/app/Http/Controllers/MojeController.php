<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class MojeController extends Controller
{
    public function index()
    {
        return view('moje-stranka');
    }

    public function registrace(Request $request)
    {
       // 1. Validace dat
       $request->validate([
        'name' => 'required|string|min:2|max:50',
        'email'=>"required|email|max:100|unique:users,email",
        'password'=>'required|min:8|max:255',
       ]);

        // 2.krok ukladani dat do databaze, pokud validace probehne uspesne
        $uzivatel   = new \App\Models\User();
        $uzivatel->name = $request->input('name');
        $uzivatel->email = $request->input('email');
        $uzivatel->password = bcrypt($request->input('password'));
        $uzivatel->save();
       
        // 3. krok: Automaticky uživatele přihlásíme, aby nemusel znova do login formuláře
        auth()->login($uzivatel);

        // 4. krok: Místo "back()" ho pošli na adresu "/profil"
        return redirect('/profil')->with('success', 'Vítej! Registrace byla úspěšná.');

        

    }

    public function login(Request $request)
    {
        // validace udaju pro prihlaseni 
        $udaje = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        // pokus o prihlaseni
        if (Auth::attempt($udaje)) {
            //pokud to vyjde tak presmerujeme na stranku s uzivatelskym uctem
            $request->session()->regenerate();

            //presmerovat uzivatele na profil
            return redirect('/profil')->with('success', 'Prihlaseni probehlo uspesne!');
        }

        //pokud to nevyjde vratit zpet uzivatele s chybovou hlaskou
        return back()->withErrors([
            'email' => 'Spatny email nebo heslo.'
        ]);
    }

    public function logout(request $request)
    {
        // 1. Laravel uživatele odhlásí (vezme mu klíče)
        auth()->logout();

        // 2. Zneplatníme aktuální session (smažeme starou paměť)
        $request->session()->invalidate();

        // 3. Vygenerujeme nový token pro bezpečnost
        $request->session()->regenerateToken();

        // 4. Pošleme ho zpátky na úvodní stránku (nebo na login)
        return redirect('/');
    }
}

