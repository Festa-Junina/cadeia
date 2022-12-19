CREATE TABLE funcao (
    idFuncao INT PRIMARY KEY,
    nome VARCHAR(100) not null
);

CREATE TABLE usuario (
    idUsuario INT PRIMARY KEY AUTO_INCREMENT,
    idFuncao INT not null,
    login VARCHAR(100) UNIQUE not null,
    senha VARCHAR(200) not null,
    nome VARCHAR(100) not null,
    telefone VARCHAR(50),
    ativo BOOLEAN not null,
    FOREIGN key (idFuncao) REFERENCES
    funcao(idFuncao)
);

CREATE TABLE perguntaCategoria (
    idCategoria INT PRIMARY KEY,
    nome VARCHAR(100) not null
);

CREATE TABLE pergunta (
    idPergunta INT PRIMARY KEY AUTO_INCREMENT,
    idCategoria INT not null,
    enunciado VARCHAR(200) not null,
    resposta VARCHAR(100) not null,
    alternativa1 VARCHAR(100) not null,
    alternativa2 VARCHAR(100) not null,
    alternativa3 VARCHAR(100) not null,
    FOREIGN key (idCategoria) REFERENCES
    perguntaCategoria(idCategoria)
);

CREATE TABLE tipoMeliante (
    idTipoMeliante INT PRIMARY KEY,
    nome VARCHAR(100) not null
);

CREATE TABLE turmaMeliante (
    idTurmaMeliante INT PRIMARY KEY,
    nome VARCHAR(100) not null
);

CREATE TABLE statusOrdem (
    idStatusOrdem INT PRIMARY KEY,
    nome VARCHAR(100) not null
);

CREATE TABLE ticket (
    idTicket INT PRIMARY KEY AUTO_INCREMENT,
    ticket INT UNIQUE not null,
    valido BOOLEAN not null
);

CREATE TABLE ordemPrisao (
    idOrdem INT PRIMARY KEY AUTO_INCREMENT,
    idTicket INT not null,
    idTipoMeliante INT not null,
    idTurmaMeliante INT,
    idStatusOrdem INT not null,
    nomeMeliante VARCHAR(100) not null,
    descricaoMeliante VARCHAR(200) not null,
    localVisto VARCHAR(100) not null,
    nomeDenunciante VARCHAR(100) not null,
    telefoneDenunciante VARCHAR(50) not null,
    assumidaPor int,
    presoPor int,
    horaOrdem TIMESTAMP not null,
    FOREIGN key (idTicket) REFERENCES
    ticket(idTicket),
    FOREIGN key (idTipoMeliante) REFERENCES
    tipoMeliante(idTipoMeliante),
    FOREIGN key (idTurmaMeliante) REFERENCES
    turmaMeliante(idTurmaMeliante),
    FOREIGN key (idStatusOrdem) REFERENCES
    statusOrdem(idStatusOrdem),
    FOREIGN key (assumidaPor) REFERENCES
    usuario(idUsuario),
    FOREIGN key (presoPor) REFERENCES
    usuario(idUsuario)
); 

CREATE TABLE statusPrisao (
    idStatusPrisao INT PRIMARY KEY,
    nome VARCHAR(100) not null
);

CREATE TABLE prisao (
    idPrisao INT PRIMARY KEY AUTO_INCREMENT,
    idOrdemPrisao INT not null,
    idStatusPrisao INT not null,
    horaPrisao TIMESTAMP not null,
    quantidadePerguntasRespondidas INT not null,
    atualizacaoStatus TIMESTAMP not null default CURRENT_TIMESTAMP,
    FOREIGN key (idOrdemPrisao) REFERENCES
    ordemPrisao(idOrdem),
    FOREIGN key (idStatusPrisao) REFERENCES
    statusPrisao(idStatusPrisao)
);



#TRIGGERS

DELIMITER $$
CREATE TRIGGER tr_desvalidarTicket 
AFTER INSERT ON ordemPrisao
 FOR EACH ROW 
BEGIN
	UPDATE ticket SET valido=false WHERE idTicket = NEW.idTicket;
END$$
DELIMITER ;
