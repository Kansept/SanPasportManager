<?php

use yii\db\Migration;

/**
 * Handles the creation of table `customer`.
 */
class m161121_055729_create_customer_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('customer', [
            'id' => $this->primaryKey(),
            'name' => $this->string(100),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('customer');
    }
}
