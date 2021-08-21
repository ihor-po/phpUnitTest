<?php

/**
 * Weather Monitor
 * 
 * An example class for monitoring the weather
 */
class WeatherMonitor
{
    /**
     * Temperature service
     *
     * @var TemperatureService
     */
    protected $service;

    /**
     * Constructor
     *
     * @param TemperatureService $service Temperature service dependency
     */
    public function __construct(TemperatureService $service)
    {
        $this->service = $service;
    }

    /**
     * Get the average temperature between two times
     *
     * @param string $start
     * @param string $end
     *
     * @return int
     */
    public function getAverageTemperature(string $start, string $end): int
    {
        $startTemp = $this->service->getTemperature($start);
        $endTemp = $this->service->getTemperature($end);

        return ($startTemp + $endTemp) / 2;
    }
}