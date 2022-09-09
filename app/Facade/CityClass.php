<?php
namespace App\Facade; //created 'facade' folder in app directory
use Illuminate\Support\Facades\Facade;

class CityClass extends Facade{
    protected static function getFacadeAccessor() { 
        return 'CityClass'; //'TestFacades' alias name for the façade class declare in the class 'NewFacadeServiceProvider'
    } 
}
?>