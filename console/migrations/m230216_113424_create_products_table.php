<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%products}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%user}}`
 */
class m230216_113424_create_products_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%products}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(255)->notNull(),
            'description' => 'LONGTEXT',
            'image' => $this->string(2000),
            'price' => $this->decimal(10,2)->notNull(),
            'status' => $this->tinyInteger(2)->notNull(),
            'created_at' => $this->integer(11),
            'updated_at' => $this->integer(11),
            'created_by' => $this->integer(11),
        ]);

        // creates index for column `created_by`
        $this->createIndex(
            '{{%idx-products-created_by}}',
            '{{%products}}',
            'created_by'
        );

        // add foreign key for table `{{%user}}`
        $this->addForeignKey(
            '{{%fk-products-created_by}}',
            '{{%products}}',
            'created_by',
            '{{%user}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `{{%user}}`
        $this->dropForeignKey(
            '{{%fk-products-created_by}}',
            '{{%products}}'
        );

        // drops index for column `created_by`
        $this->dropIndex(
            '{{%idx-products-created_by}}',
            '{{%products}}'
        );

        $this->dropTable('{{%products}}');
    }
}
