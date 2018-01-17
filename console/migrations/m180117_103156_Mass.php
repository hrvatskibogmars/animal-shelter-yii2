<?php

use yii\db\Schema;
use yii\db\Migration;

class m180117_132237_Mass extends Migration
{
    public function init()
    {
        $this->db = 'db';
        parent::init();
    }

    public function safeUp()
    {
        $this->createTable('{{%animal}}', [
            'id'=> Schema::TYPE_PK,
            'name'=> Schema::TYPE_STRING."(255) ",
            'vaccinate'=> Schema::TYPE_BOOLEAN,
            'created_at'=> Schema::TYPE_TEXT." NOT NULL",
            'updated_at'=> Schema::TYPE_TEXT,
            'birthday'=> Schema::TYPE_TIMESTAMP."(-4) ",
            'image'=> Schema::TYPE_TEXT,
            'nickname'=> Schema::TYPE_TEXT,
            'description'=> Schema::TYPE_TEXT,
            'sex_male'=> Schema::TYPE_BOOLEAN,
            'approved'=> Schema::TYPE_BOOLEAN,
            'featured'=> Schema::TYPE_BOOLEAN,
            'foster_care'=> Schema::TYPE_BOOLEAN,
            'parasite'=> Schema::TYPE_BOOLEAN,
            'castrated'=> Schema::TYPE_BOOLEAN,
            'rabies'=> Schema::TYPE_BOOLEAN,
            'infectious_diseases'=> Schema::TYPE_BOOLEAN,
            'gallery'=> "varchar[]",
            'type'=> Schema::TYPE_TEXT,
            'breed'=> Schema::TYPE_TEXT,
            'specie'=> Schema::TYPE_DECIMAL."(655360) ",
            'status'=> Schema::TYPE_BIGINT."(64) ",
            'sterilized'=> Schema::TYPE_BOOLEAN,
            'vaccinated'=> Schema::TYPE_BOOLEAN,
            'chipid'=> Schema::TYPE_TEXT,
        ]);


        $this->createTable('{{%breed}}', [
            'id'=> Schema::TYPE_BIGPK,
            'name'=> Schema::TYPE_TEXT,
            'fk_species'=> Schema::TYPE_BIGINT."(64) ",
        ]);

        $this->createTable('{{%species}}', [
            'id'=> Schema::TYPE_BIGPK,
            'name'=> Schema::TYPE_TEXT,
        ]);


        $this->createTable('{{%user}}', [
            'id'=> Schema::TYPE_PK,
            'username'=> Schema::TYPE_STRING."(255) NOT NULL",
            'auth_key'=> Schema::TYPE_STRING."(32) NOT NULL",
            'password_hash'=> Schema::TYPE_STRING."(255) NOT NULL",
            'password_reset_token'=> Schema::TYPE_STRING."(255) ",
            'email'=> Schema::TYPE_STRING."(255) NOT NULL",
            'status'=> Schema::TYPE_SMALLINT."(16) NOT NULL DEFAULT 10",
            'created_at'=> Schema::TYPE_INTEGER."(32) NOT NULL",
            'updated_at'=> Schema::TYPE_INTEGER."(32) NOT NULL",
        ]);

        $this->createIndex('user_email_key', '{{%user}}', ['email'], true);
        $this->createIndex('user_password_reset_token_key', '{{%user}}', ['password_reset_token'], true);
        $this->createIndex('user_username_key', '{{%user}}', ['username'], true);
        $this->addForeignKey(
            'fk_breed_fk_species',
            '{{%breed}}',
            'fk_species',
            '{{%species}}',
            'id',
            'CASCADE',
            'CASCADE'
        );
    }

    public function safeDown()
    {
        $this->dropForeignKey('fk_breed_fk_species', '{{%breed}}');
        $this->dropTable('{{%animal}}');
        $this->dropTable('{{%breed}}');
        $this->dropTable('{{%species}}');
        $this->dropTable('{{%user}}');
    }
}
