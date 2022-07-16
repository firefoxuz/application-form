<?php

namespace App\Http\Controllers\User;

use App\Actions\StoreFormAction;
use App\DataTransferObjects\FormData;
use App\Http\Controllers\Controller;
use App\Http\Requests\FormRequest;
use App\Models\Form;
use App\Services\ToasrtService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Gate;

class FormController extends Controller
{
    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $forms = Form::userForms()->latest()->get();

        return view('user.index', [
            'forms' => $forms
        ]);
    }

    /**
     * @param FormRequest $request
     * @param StoreFormAction $action
     * @return RedirectResponse
     */
    public function store(FormRequest $request, StoreFormAction $action): RedirectResponse
    {
        if (Gate::forUser(auth()->user())->denies('store-form')) {
            ToasrtService::addMessage('error', 'You can post form once in 24 hours. Please wait');
            return redirect()->back();
        }


        $data = FormData::fromRequest($request);
        $is_stored = $action->execute($data);

        $is_stored ? ToasrtService::addMessage('success', 'Form has been sent successfully')
            : ToasrtService::addMessage('error', 'Form has not been sent successfully');

        return redirect()->back();
    }
}
