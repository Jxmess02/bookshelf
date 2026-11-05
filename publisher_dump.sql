USE bookshelf;

CREATE TABLE publishers (
    id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL
) ENGINE=InnoDB;

ALTER TABLE books
ADD COLUMN publisher_id BIGINT UNSIGNED NULL,
ADD CONSTRAINT fk_books_publisher
    FOREIGN KEY (publisher_id)
    REFERENCES publishers(id)
    ON DELETE SET NULL;
    
INSERT INTO publishers (name)
VALUES ('Campus Press');

SET @publisher_id = LAST_INSERT_ID();

UPDATE books
SET publisher_id = @publisher_id
WHERE id IN (1, 2);