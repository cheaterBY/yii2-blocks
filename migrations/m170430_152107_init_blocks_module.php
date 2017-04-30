<?php

use profitcode\blocks\migrations\Migration;

class m170430_152107_init_blocks_module extends Migration
{

    public function up()
    {
        $this->createTable('{{%block}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull(),
            'title' => $this->string(),
            'content' => $this->text(),
            'format' => $this->smallInteger()->notNull(),
            'active' => $this->smallInteger()->notNull()->defaultValue(1),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
        ], $this->tableOptions);

        $this->createIndex('{{%block_unique_name}}', '{{%block}}', 'name', true);
    }

    public function down()
    {
        $this->dropTable('{{%block}}');
    }

}
