<?php

use yii\db\Migration;

/**
 * Handles the creation of table `document`.
 */
class m161121_060624_create_document_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('document', [
            'id' => $this->primaryKey(),
            'name' => $this->string(255),
            'source' => $this->string(255),
            'base_station_id' => $this->integer(),
            'link' => $this->string(255),
        ]);

				$this->addForeignKey(
					'fk-document-base_station_id',
					'document',
					'base_station_id',
					'base_station',
					'id',
					'NO ACTION'
				);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {   
        $this->dropForeignKey('fk-document-base_station_id', 'document');
        $this->dropTable('document');
    }
}
