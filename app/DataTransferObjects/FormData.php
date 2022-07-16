<?php

namespace App\DataTransferObjects;

use App\Http\Requests\FormRequest;
use Illuminate\Http\UploadedFile;
use Spatie\DataTransferObject\DataTransferObject;

class FormData extends DataTransferObject
{
    public string $theme;

    public string $message;

    public ?UploadedFile $document;

    public static function fromRequest(FormRequest $request):self
    {
        return new self([
            'theme' => $request->theme,
            'message' => $request->message,
            'document' => $request->document,
        ]);
    }
}
