<?php

use yii\db\Migration;

/**
 * Handles the creation of table `orlov_bcf`.
 */
class m161108_052158_create_orlov_bcf_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('orlov_bcf', [
            'id' => $this->primaryKey(),
						'region' => $this->string(50),
						'number_cabinet' => $this->integer(),
						'config' => $this->string(50),
						'name' => $this->string(250),
						'operation_type' => $this->string(50),
						'launch_date' => $this->date()
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('orlov_bcf');
    }
}
