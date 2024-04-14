<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Lab404\Impersonate\Services\ImpersonateManager;


class ImpersonateController extends Controller
{
    protected $impersonateManager;

    public function __construct(ImpersonateManager $impersonateManager)
    {
        $this->impersonateManager = $impersonateManager;



    }
    public function impersonate($id){
        $user = User::find($id);

        Auth::user()->impersonate( $user);
        return redirect()->route('home');


    }
    public function leaveImpersonate(){

        auth()->user()->leaveImpersonation();

        return redirect()->route('home');

    }
}
