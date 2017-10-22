<?php

namespace SanthoshKorukonda;

use GuzzleHttp\Psr7\Response;
use GuzzleHttp\Client as HttpClient;
use SanthoshKorukonda\Contracts\MessageContract;
use SanthoshKorukonda\Contracts\TransportContract;

class Msg91Transport implements TransportContract
{
    /**
     * Guzzle client instance.
     *
     * @var \GuzzleHttp\Client
     */
    protected $client;

    /**
     * The Msg91 API key.
     *
     * @var string
     */
    protected $key;

    /**
     * Create a new Msg91 Transport instance.
     *
     * @param  string  $key
     * @param  array  $options
     * @return void
     */
    public function __construct(string $key, array $options = [])
    {
        $this->key = $key;
        $this->client = new HttpClient($options);
    }

    /**
     * Send text using Msg91 api.
     *
     * @param  \SanthoshKorukonda\Ambassador\Contracts\Message  $message
     * @return StdClass
     */
    public function send(MessageContract $message)
    {
        $response = $this->client->post('https://api.msg91.com/api/v2/sendsms', [
            'headers' => [
                'authkey' => $this->getKey(),
            ],
            'json' => $message->getPayload(),
        ]);

        return $this->getTransmissionResponse($response);
    }

    /**
     * Get the response from the transmission.
     *
     * @param \GuzzleHttp\Psr7\Response $response
     * @return StdClass
     */
    protected function getTransmissionResponse(Response $response)
    {
        return json_decode($response->getBody()->getContents());
    }

    /**
     * Get the API key being used by the transport.
     *
     * @return string
     */
    public function getKey()
    {
        return $this->key;
    }

    /**
     * Set the API key being used by the transport.
     *
     * @param  string  $key
     * @return string
     */
    public function setKey(string $key)
    {
        return $this->key = $key;
    }
}
