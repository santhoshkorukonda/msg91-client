<?php

namespace SanthoshKorukonda\Ambassador\Contracts;

interface TransportContract
{
    /**
     * Send a new message using ambassador transport.
     *
     * @param  MessageContract  $message
     * @return StdClass
     */
    public function send(MessageContract $message);
}
