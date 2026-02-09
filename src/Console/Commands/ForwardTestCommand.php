<?php

namespace Pringgojs\LaravelItop\Console\Commands;

use Illuminate\Console\Command;

class ForwardTestCommand extends Command
{
    protected $signature = 'itop:forward-test {from} {to} {ticketId} {--sync : Run synchronously (no queue)}';

    protected $description = 'Test forwarding a ticket from one iTop instance to another (for DB-first flows).';

    public function handle()
    {
        $from = $this->argument('from');
        $to = $this->argument('to');
        $ticketId = $this->argument('ticketId');
        $sync = $this->option('sync');

        $this->info("Forwarding ticket {$ticketId} from {$from} to {$to} (sync={$sync})");

        $forwarder = app('itop.forwarder');

        if ($sync) {
            $result = $forwarder->forwardNow($from, $to, $ticketId);
            $this->info('Result: ' . json_encode($result));
            return 0;
        }

        $forwarder->dispatchForward($from, $to, $ticketId);
        $this->info('Dispatched queued forward job.');
        return 0;
    }
}
