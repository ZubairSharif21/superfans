<?php

namespace App\Jobs;

use App\Models\Post;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class ProcessVideoJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $videoPath;
    protected $outputPath;

    protected $userId;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($videoPath, $outputPath, int $userId)
    {
        $this->userId = $userId;
        $this->videoPath = $videoPath;
        $this->outputPath = $outputPath;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
//        $ffmpeg = \FFMpeg\FFMpeg::create([
//            'ffmpeg.binaries' => '/usr/bin/ffmpeg',
//            'ffprobe.binaries' => '/usr/bin/ffprobe',
//            'timeout' => 3600,
//            'ffmpeg.threads' => 1,
//            'logger' => new \Monolog\Logger('FFmpeg_Logger'), // Ensure this logger is properly set up to capture output
//
//        ]);
//
//        $logger = new \Monolog\Logger('FFmpeg_Logger');
//        $streamHandler = new \Monolog\Handler\StreamHandler(storage_path('logs/ffmpeg.log'), \Monolog\Logger::DEBUG);
//        $logger->pushHandler($streamHandler);
//
//
//        $videoFile = $ffmpeg->open($this->videoPath);
//        $format = new \FFMpeg\Format\Video\X264('aac', 'libx264');
//        $format->setKiloBitrate(800)
//            ->setAudioChannels(2)
//            ->setAudioKiloBitrate(128)
//            ->setAdditionalParameters(['-preset', 'veryfast', '-profile:v', 'main', '-movflags', '+faststart']);
//        $videoFile->save($format, $this->outputPath);

        $command = "ffmpeg -y -i {$this->videoPath} -c:v libx264 -c:a aac -b:v 800k -ac 2 -b:a 128k -preset veryfast -profile:v main -movflags +faststart {$this->outputPath}";
        exec($command . " 2>&1", $output, $return_var);
        if ($return_var !== 0) {
            Log::error("FFmpeg Command failed: " . implode("\n", $output));
        }

        $post = new Post();
        $post->influencer_id = $this->userId;
        $post->image_video = $this->outputPath;
        $post->save();
    }
}
