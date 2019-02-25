<?php namespace src;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Exception\GuzzleException;
use Psr\Http\Message\ResponseInterface;

class Scorimmo extends ScorimmoConfig
{
    /**
     * @var Client
     */
    private $client;

    private $token;

    private $headers;

    /**
     * Scorimmo constructor.
     * @param $username
     * @param $password
     * @throws \Exception
     */
    public function __construct($username, $password)
    {
        if (empty($username) || empty($password)) {
            throw new \Exception('username or password must be provided');
        }
        try {
            $this->token   = $this->getToken($username, $password);
            $this->headers = [
                'Authorization' => 'Bearer ' . $this->token,
                'Content-type'  => 'application/json'
            ];
        } catch (GuzzleException $e) {
            throw new \Exception('Error authentification : ' . $e->getMessage());
        }
    }

    /**
     * Add a lead in scorimmo
     * @param $lead ScorimmoLead
     * @param $store_id int
     * @return array
     * @throws \Exception
     */
    public function addLead($lead, $store_id)
    {
        try {
            if (!$lead->isValid()) {
                throw new \Exception('Lead not add, error lead validation');
            }
            $url      = sprintf(self::LEAD_POST_URL, $store_id);
            $response = $this->client()->request('POST', $url,
                [
                    'headers' => $this->headers,
                    'json'    => [
                        'first_name'              => $lead->getFirstName(),
                        'last_name'               => $lead->getLastName(),
                        'phone'                   => $lead->getPhone(),
                        'email'                   => $lead->getEmail(),
                        'address_first_line'      => $lead->getAddressFirstLine(),
                        'city'                    => $lead->getCity(),
                        'zip_code'                => $lead->getZipCode(),
                        'comment'                 => $lead->getComment(),
                        'property_type'           => $lead->getPropertyType(),
                        'property_address_line_1' => $lead->getPropertyAddressLine1(),
                        'property_city'           => $lead->getPropertyCity(),
                        'property_zipcode'        => $lead->getPropertyZipcode(),
                        'property_price'          => $lead->getPropertyPrice(),
                        'property_area'           => $lead->getPropertyArea(),
                        'property_reference'      => $lead->getPropertyReference(),
                        'seller_id'               => $lead->getSellerId(),
                        'interest'                => $lead->getInterest(),
                        'origin'                  => $lead->getOrigin(),
                    ]
                ]);
        } catch (GuzzleException $e) {
            throw new \Exception('Error add lead : ' . $e->getMessage());
        }

        return $this->getResponse($response);
    }

    /**
     * Change user of the lead
     * @param $store_id
     * @param $lead_id
     * @param $user_id int
     * @return array
     * @throws \Exception
     */
    public function changeUserOfLead($store_id, $lead_id, $user_id)
    {
        $url = sprintf(self::LEAD_UPDATE_URL, $store_id, $lead_id);

        try {
            $response = $this->client()->request('PATCH', $url, [
                'headers' => $this->headers,
                'json'    => ['seller_id' => $user_id],
            ]);
        } catch (GuzzleException $e) {
            throw new \Exception('Error get users : ' . $e->getMessage());
        }

        return $this->getResponse($response);
    }

    /**
     * get appointments for a lead
     * @param $store_id int
     * @param $lead_id int
     * @return array of appointments
     * @throws \Exception
     */
    public function searchLeadAppointments($store_id, $lead_id)
    {
        $url = sprintf(self::APPOINTMENT_URL, $store_id, $lead_id);
        try {
            $response = $this->client()->request('GET', $url, [
                'headers' => $this->headers,
            ]);
        } catch (GuzzleException $e) {
            throw new \Exception('Error get users : ' . $e->getMessage());
        }

        return $this->getResponse($response);
    }

    /**
     * Filter leads by status and user
     * @param $status string ex : 'RDV à confirmer|RDV confirmé|Affecté'
     * @param $user_id int
     * @return array
     * @throws \Exception
     */
    public function searchLeadsByStatus($status, $user_id)
    {
        $query = http_build_query([
            'search[status]'    => urlencode($status),
            'search[seller_id]' => $user_id
        ]);

        try {
            $response = $this->client()->request('GET', self::LEAD_URL, [
                'headers' => $this->headers,
                'query'   => $query,
            ]);
        } catch (GuzzleException $e) {
            throw new \Exception('Error get users : ' . $e->getMessage());
        }

        return $this->getResponse($response);
    }

    /**
     * search lead by email and user
     * @param $email string
     * @param $user_id int
     * @return array
     * @throws \Exception
     */
    public function searchLeadsByEmail($email, $user_id)
    {
        $query = http_build_query([
            'search[email]'     => urlencode($email),
            'search[seller_id]' => $user_id
        ]);

        try {
            $response = $this->client()->request('GET', self::LEAD_URL, [
                'headers' => $this->headers,
                'query'   => $query,
            ]);
        } catch (GuzzleException $e) {
            throw new \Exception('Error get users : ' . $e->getMessage());
        }
        $lead = $this->getResponse($response);

        if (isset($lead[0]->email) && $lead[0]->email === $email) {
            return $lead[0];
        }

        return null;
    }

    /**
     * Get all users
     * @param $store_id int
     * @return array [Object]
     * @throws \Exception
     */
    public function getUsers($store_id)
    {
        $url = sprintf(self::USER_URL, $store_id);
        try {
            $response = $this->client()->request('GET', $url, [
                'headers' => $this->headers
            ]);
        } catch (GuzzleException $e) {
            throw new \Exception('Error get users : ' . $e->getMessage());
        }

        return $this->getResponse($response);
    }

    /**
     * get all stores
     * @return array [Object] store
     * @throws \Exception
     */
    public function getStores()
    {
        try {
            $response = $this->client()->request('GET', self::STORES_URL, [
                'headers' => $this->headers
            ]);
        } catch (GuzzleException $e) {
            throw new \Exception('Error get store : ' . $e->getMessage());
        }

        return $this->getResponse($response);
    }

    /**
     * Return Guzzle client
     * @return Client
     */
    private function client()
    {
        if (empty($this->client)) {
            $this->client = new Client();
        }

        return $this->client;
    }

    /**
     * get token from Scorimmo
     * @param $username
     * @param $password
     * @return string empty or token
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \Exception
     */
    private function getToken($username, $password)
    {
        try {
            $response = $this->client()->request('POST', self::AUTHENTIFICATION_URL,
                [
                    'json' => [
                        'username' => $username,
                        'password' => $password
                    ]
                ]);
        } catch (ClientException $e) {
            throw new \Exception('Error login : ' . $e->getMessage());
        }

        if ($response->getStatusCode() === 200) {
            $body = json_decode($response->getBody());

            if (isset($body->token)) {
                $token = $body->token;
            } else {
                throw new \Exception('Error get token : ' . $body);
            }
        } else {
            throw new \Exception('Error response : ' . $response->getStatusCode());
        }

        return $token;
    }

    /**
     * Format response
     * @param $response ResponseInterface
     * @return array
     * @throws \Exception
     */
    private function getResponse($response)
    {
        if ($response->getStatusCode() === 200 || $response->getStatusCode() === 201) {
            $body = json_decode($response->getBody());

            if (isset($body->results)) {
                $results = $body->results;
            } else {
                throw new \Exception('Error get body : ' . $body);
            }
        } else {
            throw new \Exception('Error response : ' . $response->getStatusCode());
        }

        return $results;
    }

}