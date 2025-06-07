<?php

use yii\db\Migration;

class m250607_113000_requests_table_structure extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->alterColumn(
            '{{%requests}}',
            'status',
            $this->string(16)->notNull()
        );

        $this->alterColumn(
            '{{%requests}}',
            'user_id',
            $this->integer()->notNull()->unsigned()
        );

        $this->alterColumn(
            '{{%requests}}',
            'amount',
            $this->integer()->notNull()->unsigned()
        );

        $this->alterColumn(
            '{{%requests}}',
            'term',
            $this->integer()->notNull()->unsigned()
        );

        $this->createIndex(
            'idx-requests-user_id',
            '{{%requests}}',
            'user_id'
        );

        $this->createIndex(
            'idx-requests-status',
            '{{%requests}}',
            'status'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropIndex(
            'idx-requests-user_id',
            '{{%requests}}'
        );

        $this->dropIndex(
            'idx-requests-status',
            '{{%requests}}'
        );

        $this->alterColumn(
            '{{%requests}}',
            'status',
            $this->string()->null()
        );

        $this->alterColumn(
            '{{%requests}}',
            'user_id',
            $this->integer()->notNull()
        );

        $this->alterColumn(
            '{{%requests}}',
            'amount',
            $this->integer()->notNull()
        );

        $this->alterColumn(
            '{{%requests}}',
            'term',
            $this->integer()->notNull()
        );

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m250607_113000_requests_table_structure cannot be reverted.\n";

        return false;
    }
    */
}
