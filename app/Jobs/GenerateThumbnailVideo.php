<?php

namespace App\Jobs;

use App\Models\Wallpaper;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use ProtoneMedia\LaravelFFMpeg\Support\FFMpeg;

class GenerateThumbnailVideo implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    private $wallpaper;

    /**
     * Create a new job instance.
     */
    public function __construct(Wallpaper $wallpaper)
    {
        $this->wallpaper = $wallpaper;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
  
        $thumbPath = 'thumbs/';
        $fileName = 'thumb';
        $thumbs = $thumbPath . hash('sha256', $fileName) . '.jpg';
        
       
        FFMpeg::fromDisk('public')
        ->open($this->wallpaper->type)
        ->getFrameFromSeconds(2)
        ->export()
        ->toDisk('public')
        ->save($thumbs);

        $this->wallpaper->update([
            'thumbnail' => $thumbs
        ]);
    }
}
