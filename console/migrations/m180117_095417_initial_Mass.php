<?php

use yii\db\Schema;
use yii\db\Migration;

class m180117_095417_initial_Mass extends Migration
{
    public function init()
    {
        $this->db = 'db';
        parent::init();
    }

    public function safeUp()
    {
        $tableOptions = 'ENGINE=InnoDB';

        $this->createTable('{{%animal}}', [
            'id'=> $this->primaryKey(),
            'name'=> $this->string(255),
            'vaccinate'=> $this->boolean(),
            'created_at'=> $this->text()->notNull(),
            'updated_at'=> $this->text(),
            'birthday'=> $this->timestamp(),
            'image'=> $this->text(),
            'nickname'=> $this->text(),
            'description'=> $this->text(),
            'sex_male'=> $this->boolean(),
            'approved'=> $this->boolean(),
            'featured'=> $this->boolean(),
            'foster_care'=> $this->boolean(),
            'parasite'=> $this->boolean(),
            'castrated'=> $this->boolean(),
            'rabies'=> $this->boolean(),
            'infectious_diseases'=> $this->boolean(),
            'gallery'=> "varchar[]",
            'type'=> $this->text(),
            'breed'=> $this->text(),
            'specie'=> $this->decimal(),
        ], $tableOptions);


        $this->createTable('{{%breed}}', [
            'id'=> $this->bigPrimaryKey(),
            'name'=> $this->text(),
            'fk_species'=> $this->bigInteger(64),
        ], $tableOptions);


        $this->createTable('{{%migration}}', [
            'version'=> $this->string(180)->notNull(),
            'apply_time'=> $this->integer(32),
        ], $tableOptions);

        $this->addPrimaryKey('pk_on_migration', '{{%migration}}', ['version']);

        $this->createTable('{{%species}}', [
            'id'=> $this->bigPrimaryKey(),
            'name'=> $this->text(),
        ], $tableOptions);


        $this->createTable('{{%user}}', [
            'id'=> $this->primaryKey(),
            'username'=> $this->string(255)->notNull(),
            'auth_key'=> $this->string(32)->notNull(),
            'password_hash'=> $this->string(255)->notNull(),
            'password_reset_token'=> $this->string(255),
            'email'=> $this->string(255)->notNull(),
            'status'=> $this->smallInteger(16)->notNull()->defaultValue(10),
            'created_at'=> $this->integer(32)->notNull(),
            'updated_at'=> $this->integer(32)->notNull(),
        ], $tableOptions);

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
        $this->dropPrimaryKey('pk_on_migration', '{{%migration}}');
        $this->dropTable('{{%migration}}');
        $this->dropTable('{{%species}}');
        $this->dropTable('{{%user}}');
    }
}
