<?php

use yii\db\Migration;

class m130524_201442_init extends Migration {

    public function up() {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        // user
        $this->createTable('{{%user}}', [
            'id' => $this->primaryKey(),
            'username' => $this->string()->notNull()->unique(),
            'email' => $this->string()->notNull()->unique(),
            'auth_key' => $this->string(32)->notNull(),
            'password_hash' => $this->string()->notNull(),
            'password_reset_token' => $this->string()->unique(),
            'role' => $this->string(20)->notNull(),
            'status' => $this->smallInteger()->notNull()->defaultValue(10),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
                ], $tableOptions);
        $this->createIndex('index-user-status', 'user', 'status');
        $this->createIndex('index-user-username', 'user', 'username');
        $this->createIndex('index-user-email', 'user', 'email');

        // user metadata
        $this->createTable('{{%user_meta}}', [
            'user_id' => $this->integer()->notNull(),
            'meta_key' => $this->string()->notNull(),
            'meta_value' => $this->text(),
                ], $tableOptions);
        $this->addForeignKey('fk-user_meta-user_id', 'user_meta', 'user_id', 'user', 'id', 'CASCADE');
        $this->createIndex('index-user_meta-user_id', 'user_meta', 'user_id');
        $this->createIndex('index-user_meta-meta_key', 'user_meta', 'meta_key');

        // info
        $this->createTable('{{%info}}', [
            'id' => $this->primaryKey(),
            'email' => $this->string()->notNull()->unique(),
            'phone' => $this->integer()->notNull()->unique(),
            'note' => $this->text(),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
                ], $tableOptions);
        $this->createIndex('index-info-email', 'info', 'email');
        $this->createIndex('index-info-phone', 'info', 'phone');

        // user send
        $this->createTable('{{%user_info}}', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer()->notNull(),
            'info_id' => $this->integer()->notNull(),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
                ], $tableOptions);
        $this->addForeignKey('fk-user_info-user_id', 'user_info', 'user_id', 'user', 'id', 'CASCADE');



        // term
        $this->createTable('{{%term}}', [
            'id' => $this->primaryKey(),
            'parent_id' => $this->integer()->null(),
            'title' => $this->string()->notNull(),
            'slug' => $this->string()->notNull(),
            'type' => $this->string()->notNull(),
            'status' => $this->smallInteger()->notNull()->defaultValue(10),
            'indent' => $this->integer()->notNull()->defaultValue(0),
            'order' => $this->integer()->notNull()->defaultValue(0),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
                ], $tableOptions);

        // term meta
        $this->createTable('{{%term_meta}}', [
            'term_id' => $this->integer()->notNull(),
            'meta_key' => $this->string()->notNull(),
            'meta_value' => $this->text(),
                ], $tableOptions);
        $this->addForeignKey('fk-term_meta-term_id', 'term_meta', 'term_id', 'term', 'id', 'CASCADE');
        $this->createIndex('index-term_meta-term_id', 'term_meta', 'term_id');
        $this->createIndex('index-term_meta-meta_key', 'term_meta', 'meta_key');

        // user term
        $this->createTable('{{%info_term}}', [
            'term_id' => $this->integer()->notNull(),
            'info_id' => $this->integer()->notNull(),
                ], $tableOptions);
        $this->addForeignKey('fk-info_term-info_id', 'info_term', 'info_id', 'info', 'id', 'CASCADE');
    }

    public function down() {
        
    }

}
