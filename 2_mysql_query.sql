SELECT tb_matakuliah.mk_nama, tb_mahasiswa_nilai.nilai, tb_mahasiswa.mhs_nama FROM tb_mahasiswa_nilai
JOIN tb_matakuliah ON tb_matakuliah.mk_id = tb_mahasiswa_nilai.mk_id
JOIN tb_mahasiswa ON tb_mahasiswa.mhs_id = tb_mahasiswa_nilai.mhs_id
WHERE tb_matakuliah.mk_kode = 'MK303'
ORDER BY tb_mahasiswa_nilai.nilai DESC
LIMIT 1