# Guia de Instalação e Documentação de Uso

## Requisitos
- PHP 7.4 ou superior
- Servidor web como Apache ou Nginx
- MySQL (para armazenamento de logs)
- Navegador moderno (para acessar a interface)

## Estrutura do Projeto
O projeto segue o padrão MVC (Model-View-Controller) e está organizado da seguinte forma:

```
/API/
  /app/
    /controllers/
      MovieController.php
    /core/
      Database.php
      Router.php
    /models/
      LogModel.php
      Movie.php
    /views/
      films_detail.php
      films.php
  /config/
    config.php
    database.php
  /public/
    .htaccess
    index.php
  dump.sql
  README.md

```

## Instruções de Instalação

1. **Configuração do Banco de Dados**
   
   - Configure as credenciais no arquivo `/app/config/database.php`.
     ```php
     'host' => 'localhost',
     'dbname' => 'swapi_logs',
     'user' => 'root',
     'password' => '',
     ```
   - Crie um banco de dados MySQL.
   - Execute o script SQL abaixo para criar o Banco de Dados e a tabela de logs:
     ```sql
     CREATE DATABASE swapi_logs;
     USE swapi_logs;
     CREATE TABLE logs (
     id INT AUTO_INCREMENT PRIMARY KEY,
     request_url TEXT NOT NULL,
     request_method VARCHAR(10) NOT NULL,
     response_status INT NOT NULL,
     created_at DATETIME NOT NULL
     );
     ```

2. **Configure o Servidor Web**
   - Certifique-se de que o diretório raiz do servidor aponte para a pasta `/public/`.
   - No Apache, use o seguinte arquivo `.htaccess` (já incluído no projeto):
     ```
     RewriteEngine On
     RewriteBase /API/
     RewriteCond %{REQUEST_FILENAME} !-f
     RewriteCond %{REQUEST_FILENAME} !-d
     RewriteRule ^(.*)$ index.php?url=$1 [QSA,L]

     ```

3. **Inicie o Servidor**
   Se estiver utilizando PHP embutido, execute:
   ```bash
   php -S localhost:8000 -t public
   ```

4. **Acesse a Aplicação**
   Abra o navegador em: [http://localhost:8000](http://localhost:8000)

---

## Documentação de Uso

### Tela Principal
A tela inicial exibe um catálogo com todos os filmes do universo Star Wars, ordenados por data de lançamento. Cada filme apresenta:
- Nome
- Data de lançamento

### Detalhes do Filme
Ao clicar em um filme, os seguintes detalhes são exibidos:
- Nome
- Número do Episódio
- Sinopse
- Data de Lançamento
- Diretor(a)
- Produtor(es)
- Nome dos Personagens
- Idade do Filme (em anos, meses e dias)

### Logs de Interação
Cada vez que há uma requisição à API Star Wars, os seguintes dados são armazenados no banco de dados:
- Data e Hora
- Status
- Solicitação realizada (endpoint acessado )

---

## Endpoints Internos

### Listar Filmes
**URL:** `/home`

**Método:** GET

**Resposta:**
```json
[
  {
    "id": 1,
    "nome": "A New Hope",
    "data_lancamento": "1977-05-25"
  },
  ...
]
```

### Detalhes do Filme
**URL:** `/films/{id}`

**Método:** GET

**Resposta:**
```json
{
  "nome": "A New Hope",
  "episodio": 4,
  "sinopse": "It is a period of civil war...",
  "data_lancamento": "1977-05-25",
  "diretor": "George Lucas",
  "produtores": ["Gary Kurtz", "George Lucas"],
  "personagens": ["Luke Skywalker", "Leia Organa", ...],
  "idade_filme": {
    "anos": 47,
    "meses": 7,
    "dias": 12
  }
}
```

---

## Considerações Finais
- Certifique-se de que a API Star Wars esteja acessível ([https://swapi.py4e.com/](https://swapi.py4e.com/)).
- Logs podem ser consultados diretamente na tabela `logs` do banco de dados.
- Atualmente, o sistema de logs está registrando entradas duplicadas. Uma solução para isso está sendo investigada.

