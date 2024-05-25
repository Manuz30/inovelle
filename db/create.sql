CREATE TABLE Usuario (
    idUsuario       INT PRIMARY KEY AUTO_INCREMENT,  
    nome            VARCHAR(100) not null,
    email           VARCHAR(100) not null,
    senha           VARCHAR(100) not null
);


DELIMITER //
CREATE PROCEDURE piUsuario (
    IN _id              INt,
    IN _nome            VARCHAR(100),
    IN _email           VARCHAR(100),
    IN _senha			VARCHAR(100)

)
BEGIN
    INSERT INTO usuario (id, nome, email, senha)
    VALUES (_id,_nome, _email, _senha );
END //
 

 DELIMITER //
CREATE PROCEDURE psLoginUsuario
(
	IN	_email		VARCHAR(100),
    IN	_senha			VARCHAR(100)
)
SELECT * FROM Usuario WHERE email = _email AND senha = _senha


DELIMITER  //
CREATE PROCEDURE pddeletarUsuario
(
in _id 		int
)
BEGIN
	DELETE FROM usuario WHERE idusuario = _id;
END  // 	