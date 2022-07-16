<?php

namespace App\Http\Controllers\Register;

use App\Actions\StoreRegisterAction;
use App\DataTransferObjects\RegisterData;
use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use App\Services\ToasrtService;
use Illuminate\Http\RedirectResponse;

class RegisterController extends Controller
{
    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        return view('register.create');
    }

    /**
     * @param RegisterRequest $request
     * @param StoreRegisterAction $action
     * @return RedirectResponse
     */
    public function store(RegisterRequest $request, StoreRegisterAction $action): RedirectResponse
    {
        $data = RegisterData::fromRequest($request);
        $is_created = $action->execute($data);
        $is_created ? ToasrtService::addMessage('success', 'User successfully registered.')
            : ToasrtService::addMessage('error', 'User registration failed');
        return redirect()->back();
    }
}
