<?php

namespace SanthoshKorukonda\Ambassador\Contracts;

interface MessageContract
{
    /**
     * Set the senderId on the message.
     *
     * @param  string  $from
     * @return $this
     */
    public function from(string $from);

    /**
     * Set the "to" address on the message.
     *
     * @param  mixed  $users
     * @param  string  $property
     * @return $this
     */
    public function to($users, string $property);

    /**
     * Set the content on the message.
     *
     * @param  string  $content
     * @return $this
     */
    public function content(string $content);
}
