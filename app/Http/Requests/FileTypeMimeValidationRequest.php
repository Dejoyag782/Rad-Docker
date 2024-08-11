<?php

namespace App\Http\Requests;
use Illuminate\Contracts\Validation\Rule;

class FileTypeMimeValidationRequest implements Rule
{
    protected $fileType;

    public function __construct($fileType)
    {
        $this->fileType = $fileType;
    }

    public function passes($attribute, $value)
    {
        // Replace with your actual allowed MIME types mapping
        $allowedMimeTypes = [
            'Photo' => 'mimes:jpeg,png,jpg,gif',
            'Audio' => 'mimes:mp3,wav',
            'Video' => 'mimes:mp4,mov',
            'Link' => 'string',
        ];

        if (!$value) {
            return true; // Allow empty file
        }

        $mimeType = $value->getClientMimeType();
        \Log::info('MimeType '. $mimeType);
        return in_array($mimeType, $allowedMimeTypes[$this->fileType] ?? []);
    }

    public function message()
    {
        return 'The :attribute must be a valid :fileType file.';
    }
}