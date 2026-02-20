<?php

namespace Pringgojs\LaravelItop\Services;

use Pringgojs\LaravelItop\Services\Builders\TicketPayloadBuilder;
use Pringgojs\LaravelItop\Services\Builders\AttachmentPayloadBuilder;

class ItopServiceBuilder
{
    public static function payloadTicketCreate(array $fields = [], bool $asJson = false)
    {
        return TicketPayloadBuilder::payload($fields, $asJson);
    }

    /**
     * Generate payload for attachment creation in iTop API.
     * Supports multiple contents with flexible input formats and auto-detection of file data.
     * If $asJson is true, returns the payload as a JSON string; otherwise, returns as an array.
     * The 'contents' field can be provided in various formats:
     * - Single content as an associative array with 'filename', 'mimetype', and '
     * data' or 'binary' (base64 string or raw data).
     * - Multiple contents as an array of such associative arrays.
     * - Alternatively, files can be specified with 'path' to read from filesystem, or directly as base64 strings.
     * The method will normalize the input into the required format for the iTop API, including base64 encoding of file data if necessary.
     * Example usage:
     * $payload = ItopServiceBuilder::payloadAttachmentCreate([
     *   'item_class' => 'UserRequest',
     *   'item_id' => 123,
     *   'item_org_id' => 1,
     *   'contents' => [
     *    [
     *       'filename' => 'example.txt',
     *       'mimetype' => 'text/plain',
     *       'data' => 'VGhpcyBpcyBhbiBleGFtcGxlIGZpbGUu', // base64 encoded content
     *   ]
     *  ]);
     */
    public static function payloadAttachmentCreate(array $fields = [], bool $asJson = false)
    {
        return AttachmentPayloadBuilder::create($fields, $asJson);
    }

    public static function payloadAttachmentDelete(array $fields = [], bool $asJson = false)
    {
        return AttachmentPayloadBuilder::delete($fields, $asJson);
    }
}
