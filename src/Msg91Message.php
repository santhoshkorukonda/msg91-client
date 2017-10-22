<?php

namespace SanthoshKorukonda;

use StdClass;
use SanthoshKorukonda\Contracts\MessageContract;

class Msg91Message implements MessageContract
{
    /**
     * The global from address [SenderId] of the message.
     *
     * @var string|null
     */
    public $from = null;

    /**
     * The global to address of the message.
     *
     * @var string|null
     */
    public $to = null;

    /**
     * The global route of the message.
     *
     * @var int|null
     */
    public $route = null;

    /**
     * Get the content of the message.
     *
     * @var string|null
     */
    public $content = null;

    /**
     * Get the country of the message.
     *
     * @var int|null
     */
    public $country = null;

    /**
     * Indicates if the message is flash.
     *
     * @var bool|null
     */
    public $flash = null;

    /**
     * Indicates if the message is unicode.
     *
     * @var bool|null
     */
    public $unicode = null;

    /**
     * Get the schedule date time of the message.
     *
     * @var string|null
     */
    public $scheduleDateTime = null;

    /**
     * Get the campaign name of the message.
     *
     * @var string|null
     */
    public $campaign = null;

    /**
     * Set the senderId on the message.
     *
     * @param  string  $from
     * @return $this
     */
    public function from(string $from)
    {
        $this->from = $from;

        return $this;
    }

    /**
     * Determine if the textable has a from address.
     *
     * @return bool
     */
    public function hasFrom()
    {
        return is_null($this->getFrom());
    }

    /**
     * Get the senderId of the message.
     *
     * @return array
     */
    public function getFrom()
    {
        return $this->from ?: null;
    }

    /**
     * Set the "to" address on the message.
     *
     * @param  mixed  $users
     * @param  string  $property
     * @return $this
     */
    public function to($users, string $property)
    {
        // Check if the given user is a string.
        if (is_string($users)) {
            $this->to = [$users];

            return $this;
        }

        // Check if the given user is an array.
        if (is_array($users)) {
            $this->to = $users;

            return $this;
        }

        // Check if the given user is an instance of User model.
        $userModelClass = config('auth.providers.users.model');
        $userModel = new $userModelClass;
        if ($users instanceof $userModel) {
            $this->to = [$users->{$property}];

            return $this;
        }

        // Check if the given user is a standard class.
        if ($users instanceof StdClass) {
            $this->to = [$users->{$property}];

            return $this;
        }

        // Check if the given users is an instance of "Collection".
        if ($users instanceof Collection) {
            $users->transform(function ($user) use ($property) {

                return $user->{$property};
            });
            $this->to = $users->all();

            return $this;
        }
    }

    /**
     * Determine if the given recipient is set on the textable.
     *
     * @param  string  $mobile
     * @return bool
     */
    public function hasTo(string $mobile)
    {
        return in_array($mobile, $this->to);
    }

    /**
     * Get the "to" address of the message.
     *
     * @return array
     */
    public function getTo()
    {
        return $this->to;
    }

    /**
     * Set the content for the message.
     *
     * @param  string  $content
     * @return $this
     */
    public function content(string $content)
    {
        $this->content = $content;

        return $this;
    }

    /**
     * Get the content of the message.
     *
     * @return string
     */
    protected function getContent()
    {
        return $this->content;
    }

    /**
     * Set the route for the message.
     *
     * @param  int  $route
     * @return $this
     */
    public function route(int $route)
    {
        $this->route = $route;

        return $this;
    }

    /**
     * Get the route of the message.
     *
     * @return int
     */
    protected function getRoute()
    {
        return (int) $this->route;
    }

    /**
     * Set the country for the message.
     *
     * @param  int  $country
     * @return $this
     */
    public function country(int $country)
    {
        $this->country = $country;

        return $this;
    }

    /**
     * Determine if the country is set on the textable.
     *
     * @return bool
     */
    protected function hasCountry()
    {
        return ! is_null($this->getCountry());
    }

    /**
     * Get the country of the message.
     *
     * @return int
     */
    protected function getCountry()
    {
        return (int) $this->country ?: null;
    }

    /**
     * Set the flash option for the message.
     *
     * @param  bool  $flash
     * @return $this
     */
    public function flash(bool $flash)
    {
        $this->flash = $flash;

        return $this;
    }

    /**
     * Determine if the message is flash.
     *
     * @return bool
     */
    public function isFlash()
    {
        return ! is_null($this->flash);
    }

    /**
     * Set the unicode option for the message.
     *
     * @param  bool  $unicode
     * @return $this
     */
    public function unicode(bool $unicode)
    {
        $this->unicode = $unicode;

        return $this;
    }

    /**
     * Determine if the message is unicode.
     *
     * @return bool
     */
    public function isUnicode()
    {
        return ! is_null($this->unicode);
    }

    /**
     * Set schedule datetime of the message at Msg91.
     *
     * @param  \Carbon\Carbon  $carbon
     * @return $this
     */
    public function scheduleAtMsg91(Carbon $carbon)
    {
        $this->scheduleDateTime = $carbon->toDateTimeString();

        return $this;
    }

    /**
     * Determine if the message is scheduled at Msg91.
     *
     * @return bool
     */
    public function hasScheduleDateTime()
    {
        return ! is_null($this->scheduleDateTime);
    }

    /**
     * Get schedule datetime of the message.
     *
     * @return string
     */
    public function getScheduleDateTime()
    {
        return $this->scheduleDateTime;
    }

    /**
     * Set the campaign name for the message.
     *
     * @param  string  $campaign
     * @return $this
     */
    public function campaign(string $campaign)
    {
        $this->campaign = $campaign;

        return $this;
    }

    /**
     * Determine if the message has any campaign name.
     *
     * @return bool
     */
    public function hasCampaign()
    {
        return ! is_null($this->campaign);
    }

    /**
     * Get the campaign name of the message.
     *
     * @return string
     */
    public function getCampaign()
    {
        return $this->campaign;
    }

    /**
     * Dump the message payload.
     *
     * @return $this
     */
    public function dump()
    {
        dump($this->getPayload());

        return $this;
    }

    /**
     * Dump the message payload and die.
     *
     * @return void
     */
    public function dd()
    {
        dd($this->getPayload());
    }

    /**
     * Get messsage payload that needs to be transported.
     *
     * @return array
     */
    public function getPayload()
    {
        $parameters = [];

        $parameters['sms'] = [
            [
                'message' => $this->getContent(),
                'to' => $this->getTo(),
            ]
        ];

        $parameters['sender'] = $this->getFrom();

        $parameters['route'] = $this->getRoute();

        if ($this->hasCountry()) {
            $parameters['country'] = $this->getCountry();
        }

        if ($this->isFlash()) {
            $parameters['flash'] = 1;
        }

        if ($this->isUnicode()) {
            $parameters['unicode'] = 1;
        }

        if ($this->hasScheduleDateTime()) {
            $parameters['scheduledatetime'] = $this->getScheduleDateTime();
        }

        if ($this->hasCampaign()) {
            $parameters['campaign'] = $this->getCampaign();
        }

        $parameters['response'] = 'json';

        return $parameters;
    }
}
