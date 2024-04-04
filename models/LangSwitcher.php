<?php
namespace app\models;

use yii\base\Model;
use Yii;

/**
 * 
 */
class LangSwitcher extends Model
{
    const LANGS = [
        1 => 'Русский',
        2 => 'English'
    ];
    
    public $lang;

    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            [['lang'], 'in', 'range' => array_keys(self::LANGS)]
        ];
    }
    
    public function setLang($lang) {
        $lang= intval($lang);
        $this->lang = $lang;
        if (in_array($lang, array_keys(self::LANGS)) ) {
            $session = Yii::$app->session;
            $session->set('lang', $lang);
        }
    }
    
    public function loadLang() {
        $session = Yii::$app->session;
        $lang = $session->get('lang');
        $l = ($lang == 1) ? 1 : 2;
        $this->lang = $l;
        Yii::$app->language = ($l == 2) ? 'en-US' : 'ru-RU';
    }    
}
