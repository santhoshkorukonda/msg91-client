<?php

namespace SanthoshKorukonda;

use InvalidArgumentException;
use SanthoshKorukonda\Ambassador\Contracts\TexterContract;
use SanthoshKorukonda\Ambassador\Contracts\MessageContract;
use SanthoshKorukonda\Ambassador\Contracts\TransportContract;

class Msg91Client implements TexterContract
{
    /**
     * Transport driver to text the message.
     *
     * @var \SanthoshKorukonda\Ambassador\Contracts\TransportContract
     */
    protected $transport;

    /**
     * Create a new Texter instance.
     *
     * @param  \SanthoshKorukonda\Ambassador\Contracts\TransportContract  $transport
     * @return void
     */
    public function __construct(TransportContract $transport)
    {
        $this->transport = $transport;
    }

    /**
     * Set the "to" address on the message.
     *
     * @param  mixed  $users
     * @param  string  $property
     * @return $this
     */
    public function to($users, string $property = "mobile")
    {
        $this->message->to($users, $property);

        return $this;
    }

    /**
     * Begin the process of texting a textable class instance.
     *
     * @param  \SanthoshKorukonda\Ambassador\Contracts\TextableContract  $textable
     * @return mixed
     */
    public function send(TextableContract $textable)
    {
        $message = $textable->build($this->message);

        return $this->transport->send($message);
    }

    /**
     * Send a flash message of the textable class instance.
     *
     * @param  \SanthoshKorukonda\Ambassador\Contracts\TextableContract  $textable
     * @return mixed
     */
    public function sendFlashMessage(TextableContract $textable)
    {
        $this->message->flash(true);
        $message = $textable->build($this->message);

        return $this->transport->send($message);
    }

    /**
     * Send a unicode message of the textable class instance.
     *
     * @param  \SanthoshKorukonda\Ambassador\Contracts\TextableContract  $textable
     * @return mixed
     */
    public function sendUnicodeMessage(TextableContract $textable)
    {
        $this->message->unicode(true);
        $message = $textable->build($this->message);

        return $this->transport->send($message);
    }
}
