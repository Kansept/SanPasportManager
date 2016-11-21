<?php

use yii\db\Migration;

/**
 * Handles the creation of table `project`.
 */
class m161121_063457_create_project_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('project', [
            'id' => $this->primaryKey(),
            'base_station_id' => $this->integer()->notNull(),
            'customer_id' => $this->integer()->notNull(),
            'status_id' => $this->integer()->notNull(),
            'cost' => $this->integer()->notNull(),
            'paid' => $this->integer()->defaultValue(0),
            'drawing' => $this->boolean()->defaultValue(1),
            'begin_date' => $this->date(),
            'end_date' => $this->date(),
            'description' => $this->string(255),
        ]);

				$this->addForeignKey(
            'fk-project-base_station_id',
            'project',
            'base_station_id',
            'base_station',
            'id',
            'NO ACTION'
				);

				$this->addForeignKey(
            'fk-project-customer_id',
            'project',
            'customer_id',
            'customer',
            'id',
            'NO ACTION'
				);

				$this->addForeignKey(
            'fk-project-status_id',
            'project',
            'status_id',
            'status',
            'id',
            'NO ACTION'
				);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropForeignKey('fk-project-base_station_id', 'project');
        $this->dropForeignKey('fk-project-customer_id', 'project');
        $this->dropForeignKey('fk-project-status_id', 'project');
        $this->dropTable('project');
    }
}
