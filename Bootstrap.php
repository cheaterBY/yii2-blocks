<?php
/**
 * Created by PhpStorm.
 * User: cheaterby
 * Date: 30.04.17
 * Time: 18:11
 */

namespace profitcode\blocks;

use Yii;
use yii\base\BootstrapInterface;
use yii\i18n\PhpMessageSource;

/**
 * Bootstrap class registers module and user application component. It also creates some url rules which will be applied
 * when UrlManager.enablePrettyUrl is enabled.
 *
 * @author Arif Allahverdiev <cheaterby@gmail.com>
 */
class Bootstrap implements BootstrapInterface
{

    /** @var array Model's map */
    private $_modelMap = [
        'Block' => 'profitcode\blocks\models\Block',
    ];

    /** @inheritdoc */
    public function bootstrap($app)
    {
        /** @var Module $module */
        /** @var \yii\db\ActiveRecord $modelName */
        if ($app->hasModule('blocks') && ($module = $app->getModule('blocks')) instanceof Module) {
            $this->_modelMap = array_merge($this->_modelMap, $module->modelMap);
            foreach ($this->_modelMap as $name => $definition) {
                $class = "profitcode\\blocks\\models\\" . $name;
                Yii::$container->set($class, $definition);
                $modelName = is_array($definition) ? $definition['class'] : $definition;
                $module->modelMap[$name] = $modelName;
            }

            $configUrlRule = [
                'prefix' => $module->urlPrefix,
                'rules' => $module->urlRules,
            ];

            if ($module->urlPrefix != 'blocks') {
                $configUrlRule['routePrefix'] = 'blocks';
            }

            $configUrlRule['class'] = 'yii\web\GroupUrlRule';
            $rule = Yii::createObject($configUrlRule);

            $app->urlManager->addRules([$rule], false);

            if (!isset($app->get('i18n')->translations['blocks*'])) {
                $app->get('i18n')->translations['blocks*'] = [
                    'class' => PhpMessageSource::className(),
                    'basePath' => __DIR__ . '/messages',
                    'sourceLanguage' => 'en-US'
                ];
            }

            $module->debug = $this->ensureCorrectDebugSetting();
        }
    }

    /** Ensure the module is not in DEBUG mode on production environments */
    public function ensureCorrectDebugSetting()
    {
        if (!defined('YII_DEBUG')) {
            return false;
        }
        if (!defined('YII_ENV')) {
            return false;
        }
        if (defined('YII_ENV') && YII_ENV !== 'dev') {
            return false;
        }
        if (defined('YII_DEBUG') && YII_DEBUG !== true) {
            return false;
        }

        return Yii::$app->getModule('blocks')->debug;
    }

}