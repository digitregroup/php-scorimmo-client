<?php namespace src;

abstract class ScorimmoConfig
{
    const URL                  = 'https://scorimmo.carvivo.com/api/';
    const AUTHENTIFICATION_URL = self::URL . 'login_check';
    const STORES_URL           = self::URL . 'stores';
    const LEAD_URL             = self::URL . 'leads';
    const LEAD_POST_URL        = self::URL . 'stores/%d/leads';
    const LEAD_UPDATE_URL      = self::URL . 'stores/%d/leads/%d';
    const USER_URL             = self::URL . 'stores/%d/users';
}