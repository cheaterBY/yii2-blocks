<?php
/**
 * Created by PhpStorm.
 * User: cheaterby
 * Date: 30.04.17
 * Time: 16:28
 */

namespace profitcode\blocks;

use yii\base\Module as BaseModule;

/**
 * This is the main module class for the Yii2-blocks.
 *
 * @property array $modelMap
 *
 * @author Arif Allahverdiev <cheaterby@gmail.com>
 */
class Module extends BaseModule
{

    const VERSION = '0.1';

    /** @var array Model map */
    public $modelMap = [];

    /**
     * @var string The prefix for user module URL.
     *
     * @See [[GroupUrlRule::prefix]]
     */
    public $urlPrefix = 'blocks';

    /**
     * @var bool Is the user module in DEBUG mode? Will be set to false automatically
     * if the application leaves DEBUG mode.
     */
    public $debug = false;

    /** @var array The rules to be used in URL management. */
    public $urlRules = [

    ];

}