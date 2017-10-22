<?php

namespace SanthoshKorukonda\Contracts;

interface ClientContract
{
    /**
     * Send a new message using transport.
     *
     * @param  MessageContract  $message
     * @return mixed
     */
    public function send(MessageContract $message);
}
