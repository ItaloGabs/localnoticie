<?php
/**
 * As configurações básicas do WordPress
 *
 * O script de criação wp-config.php usa esse arquivo durante a instalação.
 * Você não precisa usar o site, você pode copiar este arquivo
 * para "wp-config.php" e preencher os valores.
 *
 * Este arquivo contém as seguintes configurações:
 *
 * * Configurações do banco de dados
 * * Chaves secretas
 * * Prefixo do banco de dados
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Configurações do banco de dados - Você pode pegar estas informações com o serviço de hospedagem ** //
/** O nome do banco de dados do WordPress */
define( 'DB_NAME', 'word' );

/** Usuário do banco de dados MySQL */
define( 'DB_USER', 'root' );

/** Senha do banco de dados MySQL */
define( 'DB_PASSWORD', '' );

/** Nome do host do MySQL */
define( 'DB_HOST', 'localhost' );

/** Charset do banco de dados a ser usado na criação das tabelas. */
define( 'DB_CHARSET', 'utf8mb4' );

/** O tipo de Collate do banco de dados. Não altere isso se tiver dúvidas. */
define( 'DB_COLLATE', '' );

/**#@+
 * Chaves únicas de autenticação e salts.
 *
 * Altere cada chave para um frase única!
 * Você pode gerá-las
 * usando o {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org
 * secret-key service}
 * Você pode alterá-las a qualquer momento para invalidar quaisquer
 * cookies existentes. Isto irá forçar todos os
 * usuários a fazerem login novamente.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         '# S+nFS}Dm]~^&e^%aMFV&*<,C9QStU|a?o~B:<^6N{l/n>-w+Oa6fw+k$! XP}]' );
define( 'SECURE_AUTH_KEY',  '/bzK=:vQm1>0,ipuktte,RdjF3kA8gzwRBZ]EO&?_[-$V~</%FH|K nU?*mPnTxP' );
define( 'LOGGED_IN_KEY',    ')dx4-zEbGawx0-*aqU@k@.}-Uo-#pPOS1P~Rb^u>cu.@56)FX#t5neq~=li1M9d9' );
define( 'NONCE_KEY',        'QtE,aAojKm<TL:fkKbQq,4o++%kWTRIBdnVs2<|?Jtw@+i,koPnKEe=psFzF{j%W' );
define( 'AUTH_SALT',        'x=!mCZ46u<[=Rq3:w;}Fz(cY,@BD_T.6DKA@XjjVXias:z1^-8RF6f2zfy97/e+K' );
define( 'SECURE_AUTH_SALT', 'i4+nsZsD1k*pKNPdc6j%eKstEE,iO;g!M#+0yCeQ%_A[2vN[d:,=qD]`H{iBf1Zq' );
define( 'LOGGED_IN_SALT',   'W7g@9I,1/:gMh0A[AZ_|)qWmg>1gA_{l;d8EiUl?AqiVK`a@<J>=sm}=-;pSbMrn' );
define( 'NONCE_SALT',       'xQ8FqDN]h X&JpB8bVMR7mA|?#1kTt@OB*0MSV[yhjS&v]$Fdz3K])  :CLZEVRl' );

/**#@-*/

/**
 * Prefixo da tabela do banco de dados do WordPress.
 *
 * Você pode ter várias instalações em um único banco de dados se você der
 * um prefixo único para cada um. Somente números, letras e sublinhados!
 */
$table_prefix = 'wp_';

/**
 * Para desenvolvedores: Modo de debug do WordPress.
 *
 * Altere isto para true para ativar a exibição de avisos
 * durante o desenvolvimento. É altamente recomendável que os
 * desenvolvedores de plugins e temas usem o WP_DEBUG
 * em seus ambientes de desenvolvimento.
 *
 * Para informações sobre outras constantes que podem ser utilizadas
 * para depuração, visite o Codex.
 *
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* Adicione valores personalizados entre esta linha até "Isto é tudo". */



/* Isto é tudo, pode parar de editar! :) */

/** Caminho absoluto para o diretório WordPress. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Configura as variáveis e arquivos do WordPress. */
require_once ABSPATH . 'wp-settings.php';
