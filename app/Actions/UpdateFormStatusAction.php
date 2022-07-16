<?php

namespace App\Actions;

use App\Enums\FormStatusEnum;
use App\Models\Form;

class UpdateFormStatusAction
{
    /**
     * @param $id
     * @return bool
     */
    public function execute($id): bool
    {
        return Form::find($id)->update([
            'status' => FormStatusEnum::answered()
        ]);
    }
}
