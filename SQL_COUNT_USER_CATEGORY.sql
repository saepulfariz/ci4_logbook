SELECT
    (
        SELECT
            COUNT(id_user)
        FROM
            tb_user
        where
            id_kategori = tb_logbook_kategori.id_kategori
    ) as jumlah,
    nama_kategori
FROM
    tb_logbook_kategori;

SELECT
    count(id_user) as jumlah,
    nama_kategori
FROM
    tb_logbook_kategori
    JOIN tb_user ON tb_user.id_kategori = tb_logbook_kategori.id_kategori
GROUP BY
    nama_kategori;

SELECT
    COUNT(tb_user.id_kategori) as jumlah,
    nama_kategori
FROM
    `tb_user`
    JOIN tb_logbook_kategori ON tb_logbook_kategori.id_kategori = tb_user.id_kategori
GROUP BY
    tb_user.id_kategori;