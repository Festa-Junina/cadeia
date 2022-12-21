SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;


INSERT INTO `funcao` (`idFuncao`, `nome`) VALUES
(0, 'Administrador'),
(1, 'Carcereiro'),
(2, 'Policial');

INSERT INTO `perguntacategoria` (`idCategoria`, `nome`) VALUES
(1, 'Matemática'),
(2, 'Português'),
(3, 'Biologia'),
(4, 'Física'),
(5, 'História'),
(6, 'Inglês'),
(7, 'Química'),
(8, 'Informática'),
(9, 'Lógica'),
(10, 'Filosofia'),
(11, 'Sociologia'),
(12, 'Geografia'),
(13, 'IFRS');

INSERT INTO `statusordem` (`idStatusOrdem`, `nome`) VALUES
(0, 'Aberto'),
(1, 'Perseguição'),
(2, 'Preso'),
(3, 'Liberado');

INSERT INTO `statusprisao` (`idStatusPrisao`, `nome`) VALUES
(0, 'Ativo'),
(1, 'Aguardando Pergunta 1'),
(2, 'Aguardando Resposta 1'),
(3, 'Aguardando Pergunta 2'),
(4, 'Aguardando Resposta 2'),
(5, 'Aguardando Pergunta 3'),
(6, 'Aguardando Resposta 3'),
(7, 'Respondeu Corretamente'),
(8, 'Errou a última');


INSERT INTO `ticket` (`idTicket`, `ticket`, `valido`) VALUES
(1, 0, 1),
(2, 1, 1),
(3, 2, 1),
(4, 3, 1),
(5, 4, 0),
(6, 5, 0),
(7, 6, 1);

INSERT INTO `tipomeliante` (`idTipoMeliante`, `nome`) VALUES
(0, 'Aluno'),
(1, 'Servidor'),
(2, 'Visitante');


INSERT INTO `turmameliante` (`idTurmaMeliante`, `nome`) VALUES
(0, 'TI-1'),
(1, 'TI-2'),
(2, 'TI-3'),
(3, 'TI-4'),
(4, 'TQ-1'),
(5, 'TQ-2'),
(6, 'TQ-3'),
(7, 'TQ-4'),
(8, 'TMA-1'),
(9, 'TMA-2'),
(10, 'TMA-3'),
(11, 'TMA-4'),
(12, 'TA-1'),
(13, 'TA-2'),
(14, 'TA-3'),
(15, 'TA-4');

-- A SENHA É O PRÓPRIO LOGIN
INSERT INTO `usuario` (`idUsuario`, `idFuncao`, `login`, `senha`, `nome`, `telefone`, `ativo`) VALUES
(1, 0, 'administrador@teste123.com', '$2y$10$dpFX4m8TcIMDzOf.JKK.kOp2ReRpkEkJZnW1aWCPOG42kUtEpfQ4.', 'Fabio Bastian', '51 986254753', 1),
(2, 1, 'carcereiro@teste123.com', '$2y$10$gRo4dwQ4Tptakt.WeO2ZtuFNF5nVBK9MXtsPA19IRfmMk3i9y.slO', 'Murilo Mouthinho', '(54) 85254-7536', 1),
(3, 2, 'policial@teste123.com', '$2y$10$Y8Rmi68j8NEjP5v18A.wIe.bTqkgL4YV0h4bvKRzHS8P6955ha3um', 'Pedro Rhoden', '(51) 9993-0586', 1),
(10, 1, 'carcereiro', '$2y$10$9Ureuxs.Co1/Ah1hu.WEKuNuNwkzWsYfzK/brRScnvf8n.2m9iZhq', 'carcereiro', '(11) 11111-1111', 1);

INSERT INTO `pergunta` (`idPergunta`, `idCategoria`, `enunciado`, `alternativaA`, `alternativaB`, `alternativaC`, `alternativaD`, `alternativaCorreta`) VALUES
(1, 9, 'Quem veio primeiro ?', 'A galinha', 'O ovo', 'O galo', 'O pinto', 'A'),
(2, 1, 'Quanto é 1 + 1 ?', '2', '3', '1', '11', 'A'),
(3, 2, '(FCC) A ocorrência de interferências ___ -nos a concluir que ___ uma relação profunda entre homem e sociedade que os ___ mutuamente dependentes', 'leva, existe, torna', 'levam, existe, tornam', 'levam, existem, tornam', 'levam, existem, torna', 'A');

INSERT INTO `ordemprisao` (`idOrdem`, `idTicket`, `idTipoMeliante`, `idTurmaMeliante`, `idStatusOrdem`, `nomeMeliante`, `descricaoMeliante`, `localVisto`, `nomeDenunciante`, `telefoneDenunciante`, `assumidaPor`, `presoPor`, `horaOrdem`) VALUES
(1, 5, 0, 0, 0, 'shaolin matador de porco', 'menino forte, 1.80, moreno de 22 anos', 'na sua casa', 'Luisa Mell', '0800-776', 3, NULL, '2022-12-20 03:22:03'),
(2, 6, 2, NULL, 2, 'Diogo Defante', 'Youtuber, humorista, repórter doidão, humor escrachado e nonsense que faz pegadinhas e entrevistas inusitadas com quem passa nas ruas.', 'Qatar', 'Hamad bin Khalifa', '0800-999', 3, 2, '2022-12-21 06:28:32'),
(3, 4, 2, NULL, 2, 'Magno Carlos', 'Magnânimo.', 'Cordilheira.', 'Jesus', '(51) 99181-7878', 3, 3, '2022-12-21 06:28:36');



INSERT INTO `prisao` (`idPrisao`, `idOrdemPrisao`, `idStatusPrisao`, `horaPrisao`, `quantidadePerguntasRespondidas`, `atualizacaoStatus`) VALUES
(1, 2, 2, '2022-12-21 06:15:00', 0, '2022-12-21 06:31:02'),
(2, 3, 2, '2022-12-21 06:28:07', 0, '2022-12-21 06:31:21');





COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
