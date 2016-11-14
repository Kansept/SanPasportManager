<?php

use yii\db\Migration;

/**
 * Handles the creation of table `mobile_operator`.
 */
class m161114_192850_create_mobile_operator_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('mobile_operator', [
            'id' => $this->primaryKey(),
						'name' => $this->string(100)->notNull()->unique()
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('mobile_operator');
    }
}
