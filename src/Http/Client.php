<?php

namespace Thiagoprz\Braspag\Http;

use GuzzleHttp\Client as GuzzleClient;
use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Support\Facades\Cache;

/**
 * @package Thiagoprz\Braspag\Http
 * @author Thiago Przyczynski <przyczynski@gmail.com>
 */
class Client
{
    /**
     * @var array
     */
    private static $instances = [];

    /**
     * @var GuzzleClient
     */
    private $httpClient;

    /**
     *
     */
    protected function __construct()
    {
        $this->httpClient = new GuzzleClient([
            'base_uri' => config('braspag.environment') == 'production' ? config('braspag.baseUrl.production') : config('braspag.baseUrl.sandbox'),
            'timeout' => config('braspag.timeout'),
            'proxy' => config('braspag-cartao-protegido.proxy'),
        ]);
    }

    /**
     * @param string $url
     * @return mixed
     * @throws GuzzleException
     */
    public function get($url)
    {
        $data = $this->httpClient->get($url, [
            'headers' => $this->headers(),
        ]);
        return json_decode((string)$data->getBody());
    }

    /**
     * @param string $url
     * @param mixed $data
     * @return mixed
     * @throws GuzzleException
     */
    public function post($url, $data)
    {
        $data = $this->httpClient->post($url, [
            'body' => json_encode($data),
            'headers' => $this->headers(),
        ]);
        return json_decode((string)$data->getBody());
    }

    /**
     * @param string $url
     * @param mixed $data
     * @return mixed
     * @throws GuzzleException
     */
    public function put($url, $data)
    {
        $data = $this->httpClient->put($url, [
            'body' => json_encode($data),
            'headers' => $this->headers(),
        ]);
        return json_decode((string)$data->getBody());
    }

    /**
     * @param string $url
     * @param array $data
     * @return mixed
     * @throws GuzzleException
     */
    public function delete($url, $data)
    {
        $data = $this->httpClient->delete($url, [
            'headers' => $this->headers(),
            'body' => json_encode($data),
        ]);
        return json_decode((string)$data->getBody());
    }

    /**
     * Montagem de cabeçalhos de requisção
     *
     * @return array
     */
    private function headers()
    {
        return [
            'Content-Type' => 'application/json',
            'MerchantId' => config('braspag.merchantId'),
            'MerchantKey' => config('braspag.merchantKey'),
        ];
    }


    /**
     * Singletons should not be cloneable.
     */
    protected function __clone() { }

    /**
     * Singletons should not be restorable from strings.
     */
    public function __wakeup()
    {
        throw new \Exception("Cannot unserialize a singleton.");
    }

    /**
     * This is the static method that controls the access to the singleton
     * instance. On the first run, it creates a singleton object and places it
     * into the static field. On subsequent runs, it returns the client existing
     * object stored in the static field.
     *
     * This implementation lets you subclass the Singleton class while keeping
     * just one instance of each subclass around.
     */
    public static function getInstance(): Client
    {
        $cls = static::class;
        if (!isset(self::$instances[$cls])) {
            self::$instances[$cls] = new static();
        }

        return self::$instances[$cls];
    }
}
