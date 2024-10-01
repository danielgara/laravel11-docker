<?php

namespace App\Http\Controllers;

use App\Util\ImageLocalStorage;
use App\Util\ImageGCPStorage;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ProfileController extends Controller
{
    public function index(): View
    {
        return view('profile.index');
    }

    public function save(Request $request): RedirectResponse
    {
        $storage = $request->get('storage');
        if ($storage == 'local') {
            $storeImageLocal = new ImageLocalStorage;
            $storeImageLocal->store($request);
        } else {
            $storeImageGCP = new ImageGCPStorage;
            $storeImageGCP->store($request);
        }

        return back();
    }
}
