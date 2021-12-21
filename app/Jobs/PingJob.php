<?php
/**
 * Astashenkov
 */

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Models\Message;

class PingJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private $input;

    /**
     * Create a new job instance.
     * 
     * @param array $input
     *
     * @return void
     */
    public function __construct(array $input)
    {            
        $this->input = $input;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        if (!empty($this->input['title']) 
            && !empty($this->input['message'])
            && !empty($this->input['email'])
        ) {
            // Создание нового сообщения в БД
            $message = new Message;
            $message->title = $this->input['title'];
            $message->message = $this->input['message'];
            $message->email = $this->input['email'];
            $message->save();
            // Распечатка в консоль для тестирования
            // echo "title - {$message->title} ; message - {$message->message}";
        }
        
    }
}
