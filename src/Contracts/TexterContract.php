<?php

namespace SanthoshKorukonda\Ambassador\Contracts;

interface TexterContract
{
    /**
     * Set the "to" address on the message.
     *
     * @param  mixed  $users
     * @param  string  $property
     * @return $this
     */
    public function to($users, string $property = "mobile");

    /**
     * Send a new message using a text.
     *
     * @param  TextableContract  $textable
     * @return mixed
     */
    public function send(TextableContract $textable);
}
