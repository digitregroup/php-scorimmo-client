<?php namespace src;

class ScorimmoLead
{
    /**
     * @var string
     */
    private $first_name;
    /**
     * @var string
     */
    private $last_name;

    /**
     * @var string
     */
    private $city;

    /**
     * string
     * @var
     */
    private $zip_code;

    /**
     * @var string
     */
    private $address_first_line;

    /**
     * @var string
     */
    private $comment;

    /**
     * @var string
     */
    private $property_type;

    /**
     * @var integer
     */
    private $property_area;

    /**
     * @var integer
     */
    private $property_price;

    /**
     * @var string
     */
    private $property_reference;

    /**
     * @var string
     */
    private $property_address_line_1;

    /**
     * @var string
     */
    private $property_zipcode;

    /**
     * @var string
     */
    private $property_city;

    /**
     * @var string
     */
    private $email;

    /**
     * @var string
     */
    private $phone;

    /**
     * @var string
     */
    private $origin = 'Autre';

    /**
     * @var string
     */
    private $interest = 'TRANSACTION';

    /**
     * @var integer
     */
    private $seller_id;

    /**
     * @var string
     */
    private $status;

    /**
     * @return string
     */
    public function getFirstName()
    {
        return $this->first_name;
    }

    /**
     * @param string $first_name
     */
    public function setFirstName($first_name)
    {
        $this->first_name = $first_name;
    }

    /**
     * @return string
     */
    public function getLastName()
    {
        return $this->last_name;
    }

    /**
     * @param string $last_name
     */
    public function setLastName($last_name)
    {
        $this->last_name = $last_name;
    }

    /**
     * @return string
     */
    public function getPropertyType()
    {
        return $this->property_type;
    }

    /**
     * Possible values :
     * Maison - Appartement - Garage - Terrain - Parking - Cave - Murs commerciaux - Bureaux
     * Locaux d'activité / entrepôt / hangar - Investissement - Locaux commerciaux - Fonds de commerces
     * Droit au bail - Immeuble - Coworking
     * @param string $property_type
     */
    public function setPropertyType($property_type)
    {
        $this->property_type = $property_type;
    }

    /**
     * @return int
     */
    public function getPropertyArea()
    {
        return $this->property_area;
    }

    /**
     * @param int $property_area
     */
    public function setPropertyArea($property_area)
    {
        $this->property_area = $property_area;
    }

    /**
     * @return int
     */
    public function getPropertyPrice()
    {
        return $this->property_price;
    }

    /**
     * @param int $property_price
     */
    public function setPropertyPrice($property_price)
    {
        $this->property_price = $property_price;
    }

    /**
     * @return string
     */
    public function getPropertyReference()
    {
        return $this->property_reference;
    }

    /**
     * @param string $property_reference
     */
    public function setPropertyReference($property_reference)
    {
        $this->property_reference = $property_reference;
    }

    /**
     * @return string
     */
    public function getPropertyAddressLine1()
    {
        return $this->property_address_line_1;
    }

    /**
     * @param string $property_address_line_1
     */
    public function setPropertyAddressLine1($property_address_line_1)
    {
        $this->property_address_line_1 = $property_address_line_1;
    }

    /**
     * @return string
     */
    public function getPropertyZipcode()
    {
        return $this->property_zipcode;
    }

    /**
     * @param string $property_zipcode
     */
    public function setPropertyZipcode($property_zipcode)
    {
        $this->property_zipcode = $property_zipcode;
    }

    /**
     * @return string
     */
    public function getPropertyCity()
    {
        return $this->property_city;
    }

    /**
     * @param string $property_city
     */
    public function setPropertyCity($property_city)
    {
        $this->property_city = $property_city;
    }

    /**
     * @return string
     */
    public function getAddressFirstLine()
    {
        return $this->address_first_line;
    }

    /**
     * @param string $address_first_line
     */
    public function setAddressFirstLine($address_first_line)
    {
        $this->address_first_line = $address_first_line;
    }



    /**
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param string $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @return string
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * @param string $phone
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;
    }

    /**
     * @return string
     */
    public function getOrigin()
    {
        return $this->origin;
    }

    /**
     * @param string $origin
     */
    public function setOrigin($origin)
    {
        $this->origin = $origin;
    }

    /**
     * @return string
     */
    public function getInterest()
    {
        return $this->interest;
    }

    /**
     * @param string $interest
     */
    public function setInterest($interest)
    {
        $this->interest = $interest;
    }

    /**
     * @return int
     */
    public function getSellerId()
    {
        return $this->seller_id;
    }

    /**
     * @param int $seller_id
     */
    public function setSellerId($seller_id)
    {
        $this->seller_id = $seller_id;
    }

    /**
     * @return string
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param string $status
     */
    public function setStatus($status)
    {
        $this->status = $status;
    }

    /**
     * @return string
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * @param string $city
     */
    public function setCity($city)
    {
        $this->city = $city;
    }

    /**
     * @return mixed
     */
    public function getZipCode()
    {
        return $this->zip_code;
    }

    /**
     * @param mixed $zip_code
     */
    public function setZipCode($zip_code)
    {
        $this->zip_code = $zip_code;
    }

    /**
     * @return string
     */
    public function getComment()
    {
        return $this->comment;
    }

    /**
     * @param string $comment
     */
    public function setComment($comment)
    {
        $this->comment = $comment;
    }
    
    /**
     * Mandatory field for Scorimmo
     * @return bool
     */
    public function isValid()
    {
        if(
            empty($this->getPropertyType()) ||
            empty($this->getLastName()) ||
            empty($this->getPhone()) ||
            empty($this->getOrigin()) ||
            empty($this->getInterest())
        ) {
            return false;
        }
        return true;
    }
}
