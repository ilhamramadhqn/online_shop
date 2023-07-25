<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Repositories\CrudRepositories;
use Illuminate\Http\Request;
use App\Services\Rajaongkir\RajaongkirService;
use App\Models\User;

class AccountController extends Controller
{
    protected $rajaongkirService;

    public function __construct(RajaongkirService $rajaongkirService)
    {
        $this->rajaongkirService = $rajaongkirService;
    }

    public function create()
    {
      $data['provinces'] = $this->rajaongkirService->getProvince();
      return view('frontend.account.index', compact('data'));
    }

    public function update(Request $request,$id)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'phone_number' => ['required', 'string', 'max:255'],
            'province' => ['required', 'string', 'max:255'],
            'city' => ['required', 'string', 'max:255'],
            'postal_code' => ['required', 'string', 'max:255'],
            'address' => ['required', 'string', 'max:255']
        ]);

        $user = User::update([
            'name' => $request->name,
            'phone_number' => $request->phone_number,
            'province' => $request->province,
            'city' => $request->city,
            'postal_code' => $request->postal_code,
            'address' => $request->address
        ]);

        return redirect()->route('home');
    }
}
