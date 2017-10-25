<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\ParsingShoppingWebInterface;

class ParsingShoopingWebController extends Controller
{
    protected $shopping_web_service;

    /**
     * UserController constructor.
     * @param ParsingShoppingWebInterface $emailService
     */
    public function __construct(ParsingShoppingWebInterface $shopping_web_service)
    {
        $this->shopping_web_service = $shopping_web_service;
    }

    /**
     * SetQueryName
     *
     * @return \Illuminate\Http\Response
     */
    public function setQueryName($name)
    {
        return $this->shopping_web_service->setQueryName($name);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getData()
    {
        return $this->shopping_web_service->getItemList();
    }
}
