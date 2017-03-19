<?php

/**
 * Interface Server
 */
interface Server
{
    /**
     * To Start Server.
     * @return mixed
     */
    public function start();

    /**
     * To Stop Server.
     * @return mixed
     */
    public function stop();
}

/**
 * Class SMS_Server
 */
class SMS_Server implements Server
{

    /**
     * Server Start Time.
     * @var
     */
    private $start_at;

    /**
     * Server Stop Time.
     * @var
     */
    private $stop_at;

    /**
     * To Start Server.
     */
    public function start()
    {
        echo '</br> SMS Server Start.';

        // Update to Global Instance.
        $this->start_at = microtime(true);
        echo '</br> Start @ ' . $this->start_at;
    }

    /**
     * To Stop Server.
     */
    public function stop()
    {
        echo '</br> SMS Server Stop.';

        // Update to Global Instance.
        $this->stop_at = microtime(true);
        echo '</br> Stop @ ' . $this->stop_at . '</br> ';
    }
}

/**
 * Class Mail_Server
 */
class Mail_Server implements Server
{
    /**
     * Start Time.
     * @var
     */
    private $start_at;

    /**
     * Stop Time.
     * @var
     */
    private $stop_at;

    /**
     * To Start Server
     */
    public function start()
    {
        echo 'Mail Server Start.';

        // Update to Global Instance.
        $this->start_at = microtime(true);
        echo '</br> Start @ ' . $this->start_at;
    }

    /**
     * To Stop Server.
     */
    public function stop()
    {
        echo '</br> Mail Server Stop.';

        // Update to Global Instance.
        $this->stop_at = microtime(true);
        echo '</br> Stop @ ' . $this->stop_at;
    }
}

/**
 * Class ServerManager
 */
class ServerManager
{
    /**
     * Start Time.
     * @var
     */
    private $start;

    /**
     * Stop Time.
     * @var
     */
    private $stop;

    /**
     * Active Server.
     * @var
     */
    protected $server;

    /**
     * To Initialize Server.
     * @param Server $server Type of Server.
     */
    public function init(Server $server)
    {
        // To Start Server and Update Start Time.
        $this->start = $server->start();
        $this->server = $server;
    }

    /**
     * To Stop Server.
     */
    public function stop()
    {
        // Stop the Server and Update Stop Time.
        $this->stop = $this->server->stop();
    }
}

// Initiate Server.
$server = new ServerManager();

// Initiate Mail Server.
$server->init(new Mail_Server());
// Stop Server.
$server->stop();

// Initiate SMS Server.
$server->init(new SMS_Server());
// Stop Server.
$server->stop();