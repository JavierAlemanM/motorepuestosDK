DELIMITER //
    CREATE PROCEDURE getProducts(
            IN pageNum INT,
            IN pageSize INT
    )BEGIN
        DECLARE startIndex INT;
        SET startIndex = (pageNum - 1) * pageSize;
        SET @@SESSION.sql_mode = '';  
        PREPARE stmt FROM
        'SELECT * FROM products LIMIT ?, ?';      
        EXECUTE stmt USING startIndex, pageSize;
        SET @@SESSION.sql_mode = 'STRICT_ALL_TABLES';   
        DEALLOCATE PREPARE stmt;
    END;
// DELIMITER ;



DELIMITER //
CREATE PROCEDURE getProductsCategories(
    IN categoryId INT,
    IN pageNum INT,
    IN pageSize INT
)
BEGIN
    DECLARE startIndex INT;
    SET startIndex = (pageNum - 1) * pageSize;
    SET @@SESSION.sql_mode = '';
    
    PREPARE stmt FROM
    'SELECT * FROM products WHERE category = ? LIMIT ?, ?';
    EXECUTE stmt USING categoryId, startIndex, pageSize;
    SET @@SESSION.sql_mode = 'STRICT_ALL_TABLES';
    DEALLOCATE PREPARE stmt;
END;
//DELIMITER ;



DELIMITER //
CREATE PROCEDURE getProductsProducts(
    IN productName VARCHAR(255),
    IN pageNum INT,
    IN pageSize INT
)
BEGIN
    DECLARE startIndex INT;
    SET startIndex = (pageNum - 1) * pageSize;
    SET @@SESSION.sql_mode = '';
    PREPARE stmt FROM
    'SELECT * FROM products WHERE product LIKE ? LIMIT ?, ?';
    SET @productName = CONCAT('%', productName, '%');
    EXECUTE stmt USING @productName, startIndex, pageSize;
    SET @@SESSION.sql_mode = 'STRICT_ALL_TABLES';
    DEALLOCATE PREPARE stmt;
END;
//DELIMITER ;