# 🗄️ PHP + PDO + SQLite: CRUD e mais!  

Este repositório contém um projeto em andamento onde exploro a integração do PHP com bancos de dados SQLite usando PDO. Além das operações básicas de CRUD (Create, Read, Update, Delete), também estou implementando outras funcionalidades para manipulação eficiente de dados.  
Projeto realizado no curso de PHP da Alura

## 🚀 Tecnologias utilizadas  

- 🐘 **PHP 8+**  
- 🗂 **SQLite**  
- 🔗 **PDO (PHP Data Objects)**  

## 📌 Funcionalidades  

- ✅ CRUD completo (inserção, leitura, atualização e exclusão de dados)  
- 🔄 Exploração de funções avançadas do PDO  
- 🛠️ Conexão segura e tratamento de erros  

## 📚 O que aprendi neste curso de PHP com PDO

Durante este curso, aprofundei meus conhecimentos em **PHP com PDO (PHP Data Objects)** para interação segura e estruturada com bancos de dados relacionais. Aqui estão os principais aprendizados:

### ✅ Conexão com o banco de dados
- Criação de conexões simples com `PDO`
- Uso do arquivo `conexao.php` para centralizar a configuração do banco
- Migração entre bancos (ex: SQLite → MySQL) com facilidade

### ✅ Execução de comandos SQL
- Uso do método `exec()` para executar comandos diretos
- Criação de tabelas e inserção de dados via SQL

### ✅ Segurança e boas práticas
- Uso de `prepare()` e `bindValue()` para evitar SQL Injection
- Diferença entre parâmetros **posicionais (`?`)** e **nomeados (`:nome`)**
- Separação da lógica de conexão em classes reutilizáveis

### ✅ Padrão de Projeto: Repository
- Criação de um repositório (`PdoStudentRepository`) para gerenciar dados de alunos
- Implementação de métodos de persistência e recuperação
- Aplicação do princípio de **Injeção de Dependência**, facilitando testes e mudanças de banco

### ✅ Controle de transações
- Agrupamento de múltiplas ações em uma mesma transação (`beginTransaction`, `commit`, `rollBack`)

### ✅ Tratamento de erros
- Lançamento e captura de exceções (`PDOException`)
- Configuração de atributos do PDO para exibir erros corretamente (`ERRMODE_EXCEPTION`)

### ✅ Padrão de Projeto: Aggregate
- Implementação de buscas que relacionam entidades (ex: alunos e seus telefones)
- Manipulação de dados relacionados em memória (uso de objetos compostos)

---

💡 Ao final, discutimos como **ORMs** (Object-Relational Mappers) podem facilitar esses relacionamentos complexos e valem ser estudados como próximos passos.


## 🤝 Contribuição
Se tiver sugestões, pode abrir uma issue ou enviar um pull request! 😃

## 📌 Autor: Wallace Henrique

⭐ Dá um star no repositório se este projeto te ajudou! 
