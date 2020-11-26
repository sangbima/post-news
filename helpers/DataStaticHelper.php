<?php
namespace app\helpers;

use Yii;
use yii\base\Component;

class DataStaticHelper extends Component
{
    private $category = [
        '1' => 'Products',
        '2' => 'Partners',
        '3' => 'Features',
        '4' => 'White Papers',
        '5' => 'Learn',
        '6' => 'Company',
        '7' => 'FAQ',
    ]; 

    private $stage = [
        '1' => 'Stage 1',
        '2' => 'Stage 2',
        '3' => 'Stage 3',
        '4' => 'Stage 4',
        '5' => 'Stage 5',
    ];

    private $country = [
        '1' => 'Indonesia',
        '2' => 'Singapore',
        '3' => 'USA',
        '4' => 'DUBAI/UNI EMIRAT ARAB',
        '5' => 'Hongkong',
    ];
    
    public function listCategory()
    {
        return $this->category;
    }

    public function getCategory($id)
    {
        return $this->category[$id];
    }

    public function listStage()
    {
        return $this->stage;
    }

    public function getState($id)
    {
        return $this->stage[$id];
    }

    public function listCountry()
    {
        return $this->country;
    }

    public function getCountry($id)
    {
        return $this->country[$id];
    }
}