Yii2 blocks
===========
Yii2 blocks to insert in templates or pages

Installation
------------

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```
php composer.phar require --prefer-dist profitcode/yii2-blocks "*"
```

or add

```
"profitcode/yii2-blocks": "*"
```

to the require section of your `composer.json` file.


Usage
-----

Once the extension is installed, simply use it in your code by  :

with block id

```php
<?= \profitcode\blocks\models\Block::render(1); ?>

```
or block system name


```php
<?= \profitcode\blocks\models\Block::render('block_1'); ?>