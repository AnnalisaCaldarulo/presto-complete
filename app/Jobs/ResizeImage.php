<?php

namespace App\Jobs;

use Spatie\Image\Image;
use Illuminate\Bus\Queueable;
use Spatie\Image\Manipulations;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Contracts\Queue\ShouldBeUnique;

class ResizeImage implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private $h, $w, $fileName, $path;
    /**
     * Create a new job instance.
     */
    public function __construct($filePath, $w, $h)
    {
        $this->path = dirname($filePath); //Given a string containing the path of a file or directory, this function will return the parent directory's path that is levels up from the current directory.
        $this->fileName = basename($filePath); //Given a string containing the path to a file or directory, this function will return the trailing name component.
        $this->w = $w;
        $this->h = $h;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $w = $this->w;
        $h = $this->h;

        $srcPath = storage_path() . '/app/public/' . $this->path . '/' . $this->fileName;
        $destPath = storage_path() . '/app/public/' . $this->path . "/crop_{$w}x{$h}_" . $this->fileName;

        $croppedImage = Image::load($srcPath)->crop(Manipulations::CROP_CENTER, $w, $h)
            ->watermark(base_path('resources/img/logo.png'))
            ->watermarkHeight(10, Manipulations::UNIT_PERCENT)
            ->watermarkWidth(10, Manipulations::UNIT_PERCENT)
            ->save($destPath);
    }
}
