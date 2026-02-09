<?php

namespace Pringgojs\LaravelItop\Services;

use Pringgojs\LaravelItop\Jobs\ForwardTicketJob;
use Illuminate\Contracts\Queue\Dispatcher as QueueDispatcher;

class ForwarderService
{
    protected $app;
    protected QueueDispatcher $queue;

    public function __construct($app)
    {
        $this->app = $app;
        $this->queue = $app['queue'];
    }

    /**
     * Dispatch a queued forward job
     */
    public function dispatchForward(string $fromInstance, string $toInstance, string $ticketId): void
    {
        $job = new ForwardTicketJob($fromInstance, $toInstance, $ticketId);
        $this->queue->push($job);
    }

    /**
     * Synchronous forward (runs immediately)
     */
    public function forwardNow(string $fromInstance, string $toInstance, string $ticketId): array
    {
        $job = new ForwardTicketJob($fromInstance, $toInstance, $ticketId);
        return $job->handle();
    }
}
