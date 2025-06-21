
# 🥋 Sistema Administrativo - Projeto Hapkido Social

<p align="center">
<img src="img/tela-home-admin.png" width="600px" alt="Tela de Login do Sistema Administrativo Hapkido">
</p>

## 👥 Integrantes do Projeto:

- Gabrielly Penasso Luiz  
- Giovana Ramos da Costa Pessoa  
- Hebert dos Reis Esteves  
- Kevin dos Santos Silva Marinho  
- Marcelo Abreu Monteiro  

## 👨‍🏫 Professores Orientadores:

- Matheus Nardes Rodrigues  
- Nilza Feliciano Bezerra  

---

## 📌 Introdução

O Sistema Administrativo do Projeto Hapkido Social foi desenvolvido com o objetivo de facilitar a gestão de turmas, alunos, professores, listas de presença e funções administrativas do projeto. Com uma interface simples e eficaz, o sistema busca apoiar os instrutores e coordenadores na organização do projeto.

---

## 🔐 Funcionalidades Principais

- Login e autenticação de usuários
- Cadastro e gerenciamento de alunos e professores
- Registro e controle de presenças
- Upload de fotos dos alunos
- Logout com segurança
- Painéis separados para diferentes perfis de acesso:
  - `painel-adm/`: Área exclusiva para administradores
  - `painel-professor/`: Acesso para professores visualizarem suas turmas e presenças

---

## 🧠 Tecnologias Utilizadas

| Categoria            | Ferramentas                         |
|----------------------|-------------------------------------|
| Linguagens           | PHP, HTML5, CSS3, JavaScript        |
| Banco de Dados       | MySQL (Script: `escolarhap.sql`)    |
| Autenticação         | Sessões com `session_start()`       |
| Template             | SB Admin 2 (Bootstrap)              |
| Ambiente de Testes   | WAMPServer                          |
| Versionamento        | Git + GitHub                        |

---

## 📁 Estrutura do Projeto

```
sistema-admin-hapkido/
├── index.php             # Tela de login
├── autenticar.php        # Verificação do login
├── conexao.php           # Conexão com banco de dados
├── config.php            # Configurações globais
├── logout.php            # Finalização da sessão
├── recuperar.php         # Em construção
├── escolarhap.sql        # Banco de dados
├── painel-adm/           # Painel do administrador
│   ├── alunos.php
│   ├── professores.php
│   ├── turmas.php
│   └── presencas.php
├── painel-professor/     # Painel dos professores
│   ├── turmas.php
│   └── presencas.php
├── img/                  # Imagens do sistema e alunos
│   └── alunos/
├── css/                  # Estilo personalizado
└── js/                   # Scripts de validação e interação
```

---

## 🛠️ Como Executar o Projeto Localmente

### Requisitos:
- [WAMPServer](https://www.wampserver.com/en/) instalado com Apache e MySQL ativos
- Navegador atualizado

### Passo a Passo:
1. Coloque a pasta `sistema-admin-hapkido` dentro do diretório `www` do WAMPServer
2. Inicie o Apache e MySQL no WAMPServer
3. Acesse o [phpMyAdmin](http://localhost/phpmyadmin)
4. Crie o banco com nome `escolarhap` e importe o arquivo `escolarhap.sql`
5. Acesse no navegador:  
   `http://localhost/sistema-admin-hapkido/index.php` 

---

## 👤 Usuário de Teste

> Após importar o banco, você pode inserir um usuário manualmente via phpMyAdmin:

- **Usuário:** admin  
- **Senha:** admin123  
- **Nível:** admin

---

## 💡 Possibilidades de Melhorias

- Criptografar senhas com `password_hash()`
- Validação de campos via JavaScript e PHP
- Sistema de permissões mais robusto
- Painel exclusivo para coordenadores do projeto
- Exportação de relatórios em PDF ou Excel
- Responsividade aprimorada

---

## 📜 Licença

Este é um projeto educacional desenvolvido para fins acadêmicos como parte do TCC do curso técnico em Desenvolvimento de Sistemas da Etec Raposo Tavares. Livre para uso e estudo com os devidos créditos.

---

## ✨ Desenvolvido por

<p align="center"><b>Grupo do Projeto Hapkido Social</b><br>
Curso Técnico em Desenvolvimento de Sistemas – Etec Raposo Tavares
</p>
