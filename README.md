Este é meu projeto de WORDPRESS mostando algumas funções que tenho noção junto com a linguagem em PHP, que futuramente irei melhorar!

RECOMENDO FAZER A IMPORTAÇÃO:
Caminho para ter o arquivo do backup do banco: wp-content>themes>Localnoticie>assets>sql
So exportar para o PHPADMIN

USUARIO: admin
SENHA: admin

O arquivo report.txt foi usado para inserir e gerar os clientes por meio do arquivo .JSON, ele faz a contagem da quantidade que foi adicionado.


Para utilizar o arquivo .json, instala a lib do json-server e colcar esse comando no wp-admin do wordpress: admin-ajax.php?action=get_clientes_api
