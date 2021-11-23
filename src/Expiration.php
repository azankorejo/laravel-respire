<?php

namespace azankorejo\Respire;
use azankorejo\Respire\Exceptions\WrongDateFormatException;
use Carbon\Carbon;

class Expiration
{
    protected array $time = [];
    protected string $dbTime = '';
    protected string $type = '';

    public function __construct()
    {
        $this->setConfig();
    }

    public function setConfig()
    {
        $config = (array)config("respire".$this->type);
        if (!is_null($config)) {
            return $this->time = (array)config("respire.'.$this->type.'.time");
        }
        throw new \Exception('Config Variable does not exist. Check the Respire config for '.$this->type,500)
    }

    /**
     * @throws WrongDateFormatException
     */
    public function time(): string
    {
        try {
            $daysToDate = Carbon::now()->addDays($this->time['days']);
            return Carbon::create($daysToDate->year, $daysToDate->month, $daysToDate->day, $this->time['hours'], $this->time['minutes'], $this->time['seconds']);
        }
        catch (WrongDateFormatException $e) {
            echo $e->getMessage();
        }
    }

    public function compareTimestamps(): bool
    {
        return (boolean)$this->time().equalTo(Carbon::parse($this->dbTime));
    }

    public function redirect()
    {
        return redirect(config('respire.'.$this->type.'.redirectionPath'));
    }
}