<?php

namespace App\Http\Controllers\Auth;

use App\Actions\LogoutUserAction;
use App\Http\Controllers\Controller;
use App\Services\ToasrtService;
use Illuminate\Http\RedirectResponse;

class LogoutController extends Controller
{
    /**
     * @param LogoutUserAction $action
     * @return RedirectResponse
     */
    public function __invoke(LogoutUserAction $action): RedirectResponse
    {
        $action->logout();
        ToasrtService::addMessage('success', 'User logged out successfully');
        return redirect()->route('login');
    }
}
