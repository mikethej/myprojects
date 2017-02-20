<?php

/*
	It is recommended for you to change 'auth_login_incorrect_password' and 'auth_login_username_not_exist' into something vague.
	For example: Username and password do not match.
*/

$lang['auth_login_incorrect_password'] = "Senha Incorreta.";
$lang['auth_login_username_not_exist'] = "Utilizador inexistente.";

$lang['auth_username_or_email_not_exist'] = "Utilizador ou email inexistente.";
$lang['auth_not_activated'] = "A sua conta ainda não foi ativada. Verifique o seu email.";
$lang['auth_request_sent'] = "O seu pedido de mudança de senha foi efetuado. Verifique o seu email.";
$lang['auth_incorrect_old_password'] = "A sua senha antiga está errada.";
$lang['auth_incorrect_password'] = "Senha incorreta.";

// Email subject
$lang['auth_account_subject'] = "%s detalhes da conta";
$lang['auth_activate_subject'] = "%s ativação";
$lang['auth_forgot_password_subject'] = "Pedido de nova senha";

// Email content
$lang['auth_account_content'] = "Bem-Vindo %s,

Obrigado por se registar. A sua conta foi criada com sucesso.

Pode efetuar o login com o seu numero de utente ou email:

Autenticação: %s
Email: %s
Senha: %s

Pode autenticar-se agora acedendo a %s

Cumprimentos,
A Equipa %s ";

$lang['auth_activate_content'] = "Bem-vindo ao %s,

Para ativar a sua conta, siga o endereço de ativação em baixo:
%s

Ative a sua conta dentro de %s horas, caso contrário o seu registo vai tornar-se inválido e terá de se registar outravez.

Pode efetuar o login com o seu numero de utente ou email.
Detalhes de autenticação:

Autenticação: %s
Email: %s
Senha: %s

Cumprimentos,
A Equipa %s ";

$lang['auth_forgot_password_content'] = "%s,

Efetuou um pedido de mudança de senha, porque se esqueceu da senha.
Siga o endereço em baixo para processer à alteração de senha.
%s

A sua nova senha: %s
Chave para autenticação: %s

Após concluir o processo, pode mudar esta senha para a senha desejada.

Caso continuem os problemas de acesso à sua conta entre em contato %s.

Cumprimentos,
A Equipa %s";

/* End of file dx_auth_lang.php */
/* Location: ./application/language/english/dx_auth_lang.php */