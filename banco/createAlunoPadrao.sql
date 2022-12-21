-- Script para remover erro de Group by no MySQL Unix
SET GLOBAL sql_mode=(SELECT REPLACE(@@sql_mode,'ONLY_FULL_GROUP_BY',''));

-- Script para criar usuário padrão "aluno" com senha "aluno"
CREATE USER IF NOT EXISTS 'aluno'@'localhost' IDENTIFIED BY 'aluno';
GRANT ALL PRIVILEGES ON `cadeia-app`.* TO 'aluno'@'localhost';