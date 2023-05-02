SELECT
    MONTHNAME(created_at) as nama_bulan,
    count(cid) as jumlah_nulis
FROM
    tb_logbook
GROUP BY
    MONTH(created_at);

SELECT
    MONTHNAME(created_at) as nama_bulan,
    SUM(
        LENGTH(penjelasan) - LENGTH(REPLACE(penjelasan, ' ', '')) + 1
    ) as count_word
FROM
    tb_logbook
GROUP BY
    MONTH(created_at);