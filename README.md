# WhatsApp PHP Webhook Handler

Este é um script PHP para processar webhooks do WhatsApp, armazenar mensagens em um banco de dados e enviar respostas automáticas.

## Como Funciona

1. **Recebimento de Dados**: O script recebe dados do WhatsApp por meio de webhooks.

2. **Armazenamento em Banco de Dados**: As mensagens são armazenadas em um banco de dados MySQL para referência futura.

3. **Respostas Automáticas**: Dependendo do conteúdo da mensagem, o script envia respostas automáticas.

## Configuração

1. Clone o repositório: `git clone https://github.com/GuilhermeQuites/whatsapp-php-webhook-handler.git`
2. Configure a conexão com o banco de dados no arquivo `conexao.php`.
3. Execute o script em um servidor PHP.

## Exemplo de Uso

```php
// Exemplo de configuração e uso
include 'conexao.php';
// ... (restante do código)
