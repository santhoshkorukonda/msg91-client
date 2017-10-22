<?php

namespace SanthoshKorukonda;

use SanthoshKorukonda\Contracts\ClientContract;
use SanthoshKorukonda\Contracts\MessageContract;
use SanthoshKorukonda\Contracts\TransportContract;

class Msg91Client implements ClientContract
{
    /**
     * Transport driver to text the message.
     *
     * @var \SanthoshKorukonda\Contracts\TransportContract
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
     * Begin the process of texting a textable class instance.
     *
     * @param  \SanthoshKorukonda\Contracts\MessageContract  $message
     * @return mixed
     */
    public function send(MessageContract $message)
    {
        return $this->transport->send($message);
    }

    /**
     * Send a flash message of the textable class instance.
     *
     * @param  \SanthoshKorukonda\Contracts\MessageContract $message
     * @return mixed
     */
    public function sendFlashMessage(MessageContract $message)
    {
        $message->flash(true);

        return $this->transport->send($message);
    }

    /**
     * Send a unicode message of the textable class instance.
     *
     * @param  \SanthoshKorukonda\Contracts\MessageContract $message
     * @return mixed
     */
    public function sendUnicodeMessage(MessageContract $message)
    {
        $message->unicode(true);

        return $this->transport->send($message);
    }
}
