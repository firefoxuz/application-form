<?php

namespace App\Actions;

use App\DataTransferObjects\FormData;
use App\Enums\FormStatusEnum;
use App\Models\Form;
use Illuminate\Http\UploadedFile;

class StoreFormAction
{
    /**
     * @param FormData $data
     * @return Form
     */
    public function execute(FormData $data): Form
    {
        return Form::create([
            'theme' => $data->theme,
            'message' => $data->message,
            'file_path' => $data->document ? $this->uploadFile($data->document) : '#',
            'user_id' => auth()->user()->id,
            'status' => FormStatusEnum::waiting()->value
        ]);
    }

    /**
     * @param UploadedFile $file
     * @return string
     */
    private function uploadFile(UploadedFile $file): string
    {
        $fileName = uniqid() . '.' . $file->extension();
        $file->move(public_path('files'), $fileName);
        return "/files/{$fileName}";
    }
}
