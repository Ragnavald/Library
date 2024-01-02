USE Library;
SET FOREIGN_KEY_CHECKS=0; -- to disable them


DROP TABLE IF EXISTS Clientes;
CREATE TABLE Clientes(
IdCliente INT NOT NULL PRIMARY KEY auto_increment,
nome VARCHAR(255) NOT NULL,
idade INT NOT NULL,
cpf CHAR(11)
);

DROP TABLE IF EXISTS Livros;
CREATE TABLE Livros(
IdLivro INT NOT NULL PRIMARY KEY auto_increment,
nome VARCHAR(255) NOT NULL,
CodBarras CHAR(11),
Autor VARCHAR(255)
);

DROP TABLE IF EXISTS Emprestimos;
CREATE TABLE Emprestimos(
IdEmprestimo INT NOT NULL PRIMARY KEY auto_increment,
FKCliente INT,
FKLivro INT,
DataEmprestimo date,
DataRecebida date,
DataVencimento date
);

ALTER TABLE Emprestimos
ADD FOREIGN KEY (FKCliente)
REFERENCES Clientes(IdCliente);

ALTER TABLE Emprestimos
ADD FOREIGN KEY (FKLivro)
REFERENCES Livros(IdLivro);

/*VIEWS*/
DROP VIEW IF EXISTS livrosDisponiveis;
CREATE VIEW livrosDisponiveis AS SELECT * FROM Livros WHERE IdLivro NOT IN (SELECT li.IdLivro FROM Livros as li INNER JOIN Emprestimos as emp ON li.IdLivro = emp.FkLivro WHERE emp.DataRecebida IS NULL);

DROP VIEW IF EXISTS listaEmprestimos;
CREATE VIEW listaEmprestimos AS SELECT emp.idEmprestimo, emp.DataEmprestimo, emp.DataRecebida, emp.DataVencimento, cli.nome as "Cliente", li.nome as "Livro", li.CodBarras FROM Emprestimos as emp INNER JOIN Clientes AS cli ON emp.FKCliente = cli.IdCliente INNER JOIN Livros AS li ON emp.FKLivro = li.IdLivro;

DROP VIEW IF EXISTS listaEmprestimosDevolver;
CREATE VIEW listaEmprestimosDevolver AS SELECT emp.idEmprestimo, emp.DataEmprestimo, emp.DataRecebida, emp.DataVencimento, cli.nome as "Cliente", li.nome as "Livro", li.CodBarras FROM Emprestimos as emp INNER JOIN Clientes AS cli ON emp.FKCliente = cli.IdCliente INNER JOIN Livros AS li ON emp.FKLivro = li.IdLivro WHERE emp.DataRecebida IS NULL;

DROP VIEW IF EXISTS clientesDisponiveis;
CREATE VIEW clientesDisponiveis AS SELECT * FROM Clientes WHERE IdCliente NOT IN (SELECT cli.IdCliente FROM Clientes AS cli INNER JOIN Emprestimos AS emp ON cli.IdCliente = emp.FkCliente WHERE emp.DataRecebida IS NULL);


