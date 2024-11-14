CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) UNIQUE NOT NULL,
    password VARCHAR(255) NOT NULL
);

-- Registro de un nuevo usuario
DELIMITER //
CREATE PROCEDURE RegisterUser(
    IN username VARCHAR(50),
    IN user_password VARCHAR(255)
)
BEGIN
    INSERT INTO users (username, password)
    VALUES (username, user_password);
END //
DELIMITER ;

-- Obtener todos los usuarios
DELIMITER //
CREATE PROCEDURE GetUsers()
BEGIN
    SELECT id, username FROM users;
END //
DELIMITER ;

-- Actualizar usuario
DELIMITER //
CREATE PROCEDURE UpdateUser(
    IN user_id INT,
    IN new_username VARCHAR(50)
)
BEGIN
    UPDATE users SET username = new_username WHERE id = user_id;
END //
DELIMITER ;

-- Eliminar usuario
DELIMITER //
CREATE PROCEDURE DeleteUser(
    IN user_id INT
)
BEGIN
    DELETE FROM users WHERE id = user_id;
END //
DELIMITER ;
