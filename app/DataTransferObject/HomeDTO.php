<?php
/**
 * Created by PhpStorm.
 * User: PC
 * Date: 03.04.2018.
 * Time: 13.21
 */

namespace App\DataTransferObject;

use Illuminate\Http\Request;
use App\Owner;
use App\Skills;

class HomeDTO extends AbstractDTO
{
    public function __construct(Request $request)
    {
        parent::__construct($request);
        $this->dtoData();
    }

    public function dtoData(){
        $this->data=[
            'model'=>null,
            'modelDTO'=>null,
            'routeName'=>null,
            'viewPath'=>null,
            'naslov'=>'Ansli D.O.O',
            //'owner'=>Owner::first(),
            //'skills'=>Skills::all()
        ];
        return $this->data;
    }

    public function getRules()
    {
        // TODO: Implement getRules() method.
    }

    public function getModelClass()
    {
        // TODO: Implement getModelClass() method.
    }

    public function getErrorMessages()
    {
        // TODO: Implement getErrorMessages() method.
    }

    public function dtoImage()
    {
        // TODO: Implement dtoImage() method.
    }
    public function dtoFile(){
        return null;
    }
}