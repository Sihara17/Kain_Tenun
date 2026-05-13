
CREATE DATABASE kain_tenun;

USE kain_tenun;

-- Tabel User
CREATE TABLE user (
    id_user INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50),
    password VARCHAR(255),
    role ENUM('admin')
);

-- Tabel Produk
CREATE TABLE produk (
    id_produk INT AUTO_INCREMENT PRIMARY KEY,
    nama_produk VARCHAR(100),
    motif VARCHAR(100),
    harga INT,
    stok INT,
    foto VARCHAR(255)
);

-- Tabel Transaksi
CREATE TABLE transaksi (
    id_transaksi INT AUTO_INCREMENT PRIMARY KEY,
    id_produk INT,
    nama_pembeli VARCHAR(100),
    jumlah INT,
    total_harga INT,
    tanggal DATETIME DEFAULT CURRENT_TIMESTAMP
);

-- Admin Default
INSERT INTO user(username,password,role)
VALUES(
    'admin',
    MD5('admin123'),
    'admin'
);
