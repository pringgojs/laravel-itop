<?php

namespace Pringgojs\LaravelItop\Contracts;

interface ItopClientInterface
{
    public function findTicket(string $ticketId): ?array;

    public function createTicket(array $data): array;

    public function search(array $filters, int $limit = 50, int $offset = 0): array;
}
