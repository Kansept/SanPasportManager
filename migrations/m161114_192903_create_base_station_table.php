<?php

use yii\db\Migration;

/**
 * Handles the creation of table `base_station`.
 */
class m161114_192903_create_base_station_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('base_station', [
            'id' => $this->primaryKey(),
						'name' => $this->string(250)->notNull(),
						'address' => $this->string(250)->notNull()->unique(),
						'region_id' => $this->integer()->notNull(),
            'latitude' => $this->string(50),
            'longitude' => $this->string(50),
						'mobile_operator_id' => $this->integer()->notNull(),
						'date_begin' => $this->date()
        ]);

				$this->addForeignKey(
					'fk-base_station-region_id',
					'base_station',
					'region_id',
					'region',
					'id',
					'NO ACTION'
				);

				$this->addForeignKey(
					'fk-base_station-mobile_operator_id',
					'base_station',
					'mobile_operator_id',
					'mobile_operator',
					'id',
					'NO ACTION'
				);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('base_station');

				$this->dropForeignKey(
					'fk-base_station-region_id',
					'base_station'
				);

				$this->dropForeignKey(
					'fk-base_station-mobile_operator_id',
					'base_station'
				);
    }
}
