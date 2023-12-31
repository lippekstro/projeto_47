CREATE DATABASE ondeacontece;

CREATE TABLE categoria_evento(
    id_categoria_evento INT PRIMARY KEY AUTO_INCREMENT, 
    nome_categoria_evento VARCHAR(255) NOT NULL
);

CREATE TABLE eventos (
    id_evento INT PRIMARY KEY AUTO_INCREMENT,
    titulo VARCHAR(255) NOT NULL,
    local_evento VARCHAR(255) NOT NULL, 
    data_evento DATE NOT NULL, 
    descricao_evento TEXT, 
    preco DECIMAL(10,2),
    link_evento VARCHAR(255), 
    img_evento LONGBLOB,
    longitude FLOAT,
    latitude FLOAT,
    curtidas INT NOT NULL DEFAULT 0,
    id_categoria INT NOT NULL,
    FOREIGN KEY (id_categoria) REFERENCES categoria_evento(id_categoria_evento)
);

CREATE TABLE categoria_promo (
    id_categoria_promo INT PRIMARY KEY AUTO_INCREMENT, 
    nome_categoria_promo VARCHAR(255) NOT NULL
);

CREATE TABLE promocoes (
    id_promo INT PRIMARY KEY AUTO_INCREMENT, 
    nome_promo VARCHAR(255) NOT NULL,
    local_promo VARCHAR(255),
    prazo_promo DATE,
    img_promo LONGBLOB,
    descricao_promo varchar(255),
    link_promo varchar(255),
    id_categoria_promo INT NOT NULL,
    cupom VARCHAR(255),
    FOREIGN KEY (id_categoria_promo) REFERENCES categoria_promo(id_categoria_promo)
);

/* CREATE TABLE comentario (
    id_comentario INT PRIMARY KEY AUTO_INCREMENT, 
    nome_autor VARCHAR(255) NOT NULL, 
    conteudo TEXT NOT NULL, 
    id_evento INT NOT NULL,
    FOREIGN KEY (id_evento) REFERENCES eventos(id_evento)
); */

CREATE TABLE admins (
    id_admin INT PRIMARY KEY AUTO_INCREMENT, 
    nome_admin VARCHAR(255) NOT NULL, 
    senha_admin VARCHAR(255) NOT NULL,
    email_admin VARCHAR(255) NOT NULL
);

CREATE TABLE faqs (
    id_faq INT PRIMARY KEY AUTO_INCREMENT,
    faq_pergunta text not null,
    faq_resposta text not null
);