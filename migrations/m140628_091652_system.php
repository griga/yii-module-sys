<?php

class m140628_091652_system extends DbMigration
{
	public function up()
	{
        $this->createTable('{{system_config}}',[
            'id'=>'pk',
            'key'=>'VARCHAR(255) NOT NULL',
            'value'=>'VARCHAR(255) NOT NULL',
        ]);

        db()->createCommand()->insert('{{system_config}}',[
            'key'=>'site_email_address',
            'value'=>'noreply@allprojectors.com',
        ]);

        db()->createCommand()->insert('{{system_config}}',[
            'key'=>'site_email_from',
            'value'=>'Allprojectors',
        ]);

        db()->createCommand()->insert('{{system_config}}',[
            'key'=>'order_notify_emails',
            'value'=>'grigach@gmail.com',
        ]);


        $this->createTable('{{system_template}}',[
            'id'=>'pk',
            'key'=>'VARCHAR(128) NOT NULL',
            'name'=>'VARCHAR(255) NULL DEFAULT NULL',
            'content'=>'TEXT',
            'comment'=>'TEXT',
        ]);

        db()->createCommand()->insert('{{system_template}}',[
            'id'=>'1',
            'key'=>'registration_email',
            'name'=>'Регистрация на {{sitename}}: подтверждение e-mail ',
            'content'=>'<p> 	                        &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;Здравствуйте, {{username}}! </p> <p> 	<br> 	Данный адрес  	<a href="mailto:{{email}}">{{email}}</a> был указан пользователем {{username}} <br> 	(возможно, это Вы) в качестве своего e-mail адреса  	<br> 	для получения информации от {{sitename}} (  	<a href="{{siteurl}}">{{siteurl}}</a>). </p> <p> 	<br> 	Если Вы этого не делали или не желаете получать информацию  	<br> 	от {{sitename}}, просто УДАЛИТЕ это письмо. </p> <p> 	<br> 	Для подтверждения адреса нажмите ссылку:  	<a href="{{avtivation_url}}">{{avtivation_url}}</a> или скопируйте ее в окно браузера.<br> 	Это письмо написано роботом. Отвечать на него не нужно.  	<br> 	<br> 	Связаться со службой поддержки компании {{sitename}} Вы можете по адресу  	<a href="mailto:{{sitemail}}">{{sitemail}}</a> </p>',
            'comment'=>'{{sitename}} - название сайта {{email}} - email пользователя {{username}} - ФИО {{siteurl}} - адрес сайта {{activationurl}} - ссылка на код активации {{sitemail}} - email поддержки ',
        ]);
        db()->createCommand()->insert('{{system_template}}',[
            'id'=>'2',
            'key'=>'forgot_password_email',
            'name'=>'Восстановление пароля на {{sitename}}',
            'content'=>'<p> 	                        &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;Здравствуйте, {{username}}! </p> <p> 	Запрос на сброс пароля&nbsp;для Вашего аккаунта был произведен на&nbsp;<a href="{{siteurl}}">{{siteurl}}</a>. </p> <p> 	<br> 	Если Вы этого не делали просто УДАЛИТЕ это письмо. </p> <p> 	<br> 	Для того, чтобы указать новый пароль,&nbsp;нажмите ссылку:  	<a href="{{avtivation_url}}">{{avtivation_url}}</a> или скопируйте ее в окно браузера.<br> 	Это письмо написано роботом. Отвечать на него не нужно.  	<br> 	<br> 	Связаться со службой поддержки компании {{sitename}} Вы можете по адресу  	<a href="mailto:{{sitemail}}">{{sitemail}}</a> </p>',
            'comment'=>'{{sitename}} - название сайта {{email}} - email пользователя {{username}} - ФИО {{siteurl}} - адрес сайта {{activationurl}} - ссылка на код активации {{sitemail}} - email поддержки ',
        ]);



        $this->createTable('{{system_template_lang}}',[
            'l_id' => 'pk',
            'entity_id' => 'INT NOT NULL',
            'lang_id' => 'VARCHAR(6) NOT NULL',
            'l_name' => 'VARCHAR(255) ',
            'l_content' => 'TEXT',
        ]);
        $this->createIndex('stl_ei', '{{system_template_lang}}', 'entity_id');
        $this->createIndex('stl_li', '{{system_template_lang}}', 'lang_id');

        db()->createCommand()->insert('{{system_template_lang}}',[
            'l_id'=>'1',
            'entity_id'=>'1',
            'lang_id'=>'uk',
            'l_name'=>'Регiстрацiя на {{sitename}}: пiдтвердження e-mail',
            'l_content'=>'<p> 	                        &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;Здравствуйте, {{username}}!</p><p> 	<br> 	Данный адрес <a href="mailto:{{email}}">{{email}}</a> был указан пользователем {{username}} <br> 	(возможно, это Вы) в качестве своего e-mail адреса <br> 	для получения информации от {{sitename}} ( <a href="{{siteurl}}">{{siteurl}}</a>).<br> 	<br> 	Если Вы этого не делали или не желаете получать информацию <br> 	от {{sitename}}, просто УДАЛИТЕ это письмо.</p><p> 	<br> 	Для подтверждения адреса нажмите ссылку: <a href="{{avtivation_url}}">{{avtivation_url}}</a> или скопируйте ее в окно браузера.<br> 	Это письмо написано роботом. Отвечать на него не нужно. <br> 	<br> 	Связаться со службой поддержки компании {{sitename}} Вы можете по адресу <a href="mailto:{{sitemail}}">{{sitemail}}</a></p>',
        ]);

        db()->createCommand()->insert('{{system_template_lang}}',[
            'l_id'=>'2',
            'entity_id'=>'1',
            'lang_id'=>'ru',
            'l_name'=>'Регистрация на {{sitename}}: подтверждение e-mail ',
            'l_content'=>'<p> 	                        &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;Здравствуйте, {{username}}! </p> <p> 	<br> 	Данный адрес  	<a href="mailto:{{email}}">{{email}}</a> был указан пользователем {{username}} <br> 	(возможно, это Вы) в качестве своего e-mail адреса  	<br> 	для получения информации от {{sitename}} (  	<a href="{{siteurl}}">{{siteurl}}</a>). </p> <p> 	<br> 	Если Вы этого не делали или не желаете получать информацию  	<br> 	от {{sitename}}, просто УДАЛИТЕ это письмо. </p> <p> 	<br> 	Для подтверждения адреса нажмите ссылку:  	<a href="{{avtivation_url}}">{{avtivation_url}}</a> или скопируйте ее в окно браузера.<br> 	Это письмо написано роботом. Отвечать на него не нужно.  	<br> 	<br> 	Связаться со службой поддержки компании {{sitename}} Вы можете по адресу  	<a href="mailto:{{sitemail}}">{{sitemail}}</a> </p>',
        ]);

        db()->createCommand()->insert('{{system_template_lang}}',[
            'l_id'=>'3',
            'entity_id'=>'1',
            'lang_id'=>'en',
            'l_name'=> 'Registration on {{sitename}}: e-mail confirm',
            'l_content'=>'<p> 	                        &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;Здравствуйте, {{username}}!</p><p> 	<br> 	Данный адрес <a href="mailto:{{email}}">{{email}}</a> был указан пользователем {{username}} <br> 	(возможно, это Вы) в качестве своего e-mail адреса <br> 	для получения информации от {{sitename}} ( <a href="{{siteurl}}">{{siteurl}}</a>).<br> 	<br> 	Если Вы этого не делали или не желаете получать информацию <br> 	от {{sitename}}, просто УДАЛИТЕ это письмо.</p><p> 	<br> 	Для подтверждения адреса нажмите ссылку: <a href="{{avtivation_url}}">{{avtivation_url}}</a> или скопируйте ее в окно браузера.<br> 	Это письмо написано роботом. Отвечать на него не нужно. <br> 	<br> 	Связаться со службой поддержки компании {{sitename}} Вы можете по адресу <a href="mailto:{{sitemail}}">{{sitemail}}</a></p>',
        ]);

        db()->createCommand()->insert('{{system_template_lang}}',[
            'l_id'=>'4',
            'entity_id'=>'2',
            'lang_id'=>'uk',
            'l_name'=>'Восстановление пароля на {{sitename}}',
            'l_content'=>'<p> 	                        &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;Здравствуйте, {{username}}! </p> <p> 	Запрос на сброс пароля&nbsp;для Вашего аккаунта был произведен на&nbsp;<a href="{{siteurl}}">{{siteurl}}</a>. </p> <p> 	<br> 	Если Вы этого не делали просто УДАЛИТЕ это письмо. </p> <p> 	<br> 	Для того, чтобы указать новый пароль,&nbsp;нажмите ссылку:  	<a href="{{avtivation_url}}">{{avtivation_url}}</a> или скопируйте ее в окно браузера.<br> 	Это письмо написано роботом. Отвечать на него не нужно.  	<br> 	<br> 	Связаться со службой поддержки компании {{sitename}} Вы можете по адресу  	<a href="mailto:{{sitemail}}">{{sitemail}}</a> </p>',
        ]);

        db()->createCommand()->insert('{{system_template_lang}}',[
            'l_id'=>'5',
            'entity_id'=>'2',
            'lang_id'=>'ru',
            'l_name'=>'Восстановление пароля на {{sitename}}',
            'l_content'=>'<p> 	                        &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;Здравствуйте, {{username}}! </p> <p> 	Запрос на сброс пароля&nbsp;для Вашего аккаунта был произведен на&nbsp;<a href="{{siteurl}}">{{siteurl}}</a>. </p> <p> 	<br> 	Если Вы этого не делали просто УДАЛИТЕ это письмо. </p> <p> 	<br> 	Для того, чтобы указать новый пароль,&nbsp;нажмите ссылку:  	<a href="{{avtivation_url}}">{{avtivation_url}}</a> или скопируйте ее в окно браузера.<br> 	Это письмо написано роботом. Отвечать на него не нужно.  	<br> 	<br> 	Связаться со службой поддержки компании {{sitename}} Вы можете по адресу  	<a href="mailto:{{sitemail}}">{{sitemail}}</a> </p>',
        ]);

        db()->createCommand()->insert('{{system_template_lang}}',[
            'l_id'=>'6',
            'entity_id'=>'2',
            'lang_id'=>'en',
            'l_name'=>'Восстановление пароля на {{sitename}}',
            'l_content'=>'<p> 	                        &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;Здравствуйте, {{username}}! </p> <p> 	Запрос на сброс пароля&nbsp;для Вашего аккаунта был произведен на&nbsp;<a href="{{siteurl}}">{{siteurl}}</a>. </p> <p> 	<br> 	Если Вы этого не делали просто УДАЛИТЕ это письмо. </p> <p> 	<br> 	Для того, чтобы указать новый пароль,&nbsp;нажмите ссылку:  	<a href="{{avtivation_url}}">{{avtivation_url}}</a> или скопируйте ее в окно браузера.<br> 	Это письмо написано роботом. Отвечать на него не нужно.  	<br> 	<br> 	Связаться со службой поддержки компании {{sitename}} Вы можете по адресу  	<a href="mailto:{{sitemail}}">{{sitemail}}</a> </p>',
        ]);


        $this->addForeignKey('stl_ibfk_1', '{{system_template_lang}}', 'entity_id', '{{system_template}}', 'id', 'CASCADE', 'CASCADE');


    }

	public function down()
	{
        $this->dropTable('{{system_template_lang}}');
        $this->dropTable('{{system_template}}');
        $this->dropTable('{{system_config}}');
	}

}