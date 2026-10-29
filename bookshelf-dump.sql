

CREATE TABLE books (
    id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(150) NOT NULL,
    author VARCHAR(100) NOT NULL,
    genre VARCHAR(50) NOT NULL,
    cover VARCHAR(2048) NULL
);

INSERT INTO books (title, author, genre, cover) VALUES
('Noli Me Tangere', 'Jose Rizal', 'Novel', 'https://placehold.co/300x450/png?text=Noli+Me+Tangere'),
('El Filibusterismo', 'Jose Rizal', 'Novel', 'https://placehold.co/300x450/png?text=El+Filibusterismo'),
('The Little Prince', 'Antoine de Saint-Exupery', 'Fable', 'https://placehold.co/300x450/png?text=The+Little+Prince'),
('Pride and Prejudice', 'Jane Austen', 'Romance', 'https://placehold.co/300x450/png?text=Pride+and+Prejudice'),
('Frankenstein', 'Mary Shelley', 'Science Fiction', 'https://placehold.co/300x450/png?text=Frankenstein'),
('The Adventures of Sherlock Holmes', 'Arthur Conan Doyle', 'Mystery', 'https://placehold.co/300x450/png?text=Sherlock+Holmes');