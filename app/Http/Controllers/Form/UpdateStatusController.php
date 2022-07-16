<?php

namespace App\Http\Controllers\Form;

use App\Actions\UpdateFormStatusAction;
use App\Http\Controllers\Controller;
use App\Models\Form;
use App\Services\ToasrtService;
use Illuminate\Http\RedirectResponse;

class UpdateStatusController extends Controller
{
    /**
     * @param Form $form
     * @param UpdateFormStatusAction $action
     * @return RedirectResponse
     */
    public function __invoke(Form $form, UpdateFormStatusAction $action): RedirectResponse
    {
        $is_updated = $action->execute($form->id);
        $is_updated ? ToasrtService::addMessage('success', 'Status updated successfully')
            : ToasrtService::addMessage('error', 'Status update failed');
        return redirect()->back();
    }
}
