<?php

use yii\db\Migration;

/**
 * Handles adding sort to table `status`.
 */
class m161124_123352_add_sort_column_to_status_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->addColumn('status', 'sort', $this->integer()->defaultValue(0)->notNull());
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropColumn('status', 'sort');
    }
}
