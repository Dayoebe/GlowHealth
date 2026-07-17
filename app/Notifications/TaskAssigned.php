<?php

namespace App\Notifications;

use App\Models\DelegatedTask;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class TaskAssigned extends Notification
{
    use Queueable;

    public function __construct(public DelegatedTask $task) {}

    /**
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    public function toMail(object $notifiable): MailMessage
    {
        $assigner = $this->task->assigner;

        $message = (new MailMessage)
            ->subject("New task assigned: {$this->task->title}")
            ->greeting("Hello {$notifiable->name},")
            ->line('A new task has been scheduled for you on Glow Health.')
            ->line("Task: {$this->task->title}");

        if ($this->task->description) {
            $message->line("Instructions: {$this->task->description}");
        }

        if ($this->task->due_at) {
            $message->line('Due date: '.$this->task->due_at->format('l, F j, Y'));
        }

        return $message
            ->line('Assigned by: '.($assigner?->name ?? 'Glow Health Administration'))
            ->action('View my task', route('dashboard'))
            ->line('Please sign in to your dashboard to review the assignment and prepare for completion.')
            ->salutation('Glow Health Outreach Initiative');
    }
}
