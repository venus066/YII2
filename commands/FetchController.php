<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\commands;

use app\models\Fruit;
use app\models\Nutrition;
use yii\console\Controller;
use yii\console\ExitCode;
use linslin\yii2\curl;

/**
 * This command echoes the first argument that you have entered.
 *
 * This command is provided as an example for you to learn how to create console commands.
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class FetchController extends Controller
{

    public function actionIndex()
    {
        $curl = new curl\Curl();

        $response = $curl->get('https://fruityvice.com/api/fruit/all');

        if ($curl->errorCode === null) {
            $responseArray = json_decode($response);

            for ($i = 0; $i < count($responseArray); $i++) {

                $nutrition = new Nutrition();
                $nutrition->calories = $responseArray[$i]->nutritions->calories;
                $nutrition->carbohydrates = $responseArray[$i]->nutritions->carbohydrates;
                $nutrition->fat = $responseArray[$i]->nutritions->fat;
                $nutrition->protein= $responseArray[$i]->nutritions->protein;
                $nutrition->sugar = $responseArray[$i]->nutritions->sugar;
                $nutrition->save(false);


                $fruit= new Fruit();
                $fruit->genus = $responseArray[$i]->genus;
                $fruit->name = $responseArray[$i]->name;
                $fruit->family = $responseArray[$i]->family;
                $fruit->order = $responseArray[$i]->order;
                $fruit->nutrition_id = $nutrition->id;
                $fruit->save(false);
            }
        } else {
            // List of curl error codes here https://curl.haxx.se/libcurl/c/libcurl-errors.html
            switch ($curl->errorCode) {

                case 6:
                    //host unknown example
                    break;
            }
        }

        return ExitCode::OK;
    }
}
