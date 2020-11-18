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
    
    public function listCategory()
    {
        return $this->category;
    }

    public function getCategory($id)
    {
        return $this->category[$id];
    }
}