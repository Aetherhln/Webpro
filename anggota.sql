CREATE TABLE IF NOT EXISTS anggota (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nama_lengkap VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL,
    telepon VARCHAR(20) NOT NULL,
    usia INT NOT NULL,
    jenis_kelamin VARCHAR(20) NOT NULL,
    tinggi_badan INT NOT NULL,
    posisi VARCHAR(50) NOT NULL,
    pengalaman TEXT NOT NULL,
    tanggal_daftar TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
