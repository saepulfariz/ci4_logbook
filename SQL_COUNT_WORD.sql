SELECT
    penjelasan,
    LENGTH(penjelasan) - LENGTH(REPLACE(penjelasan, ' ', '')) + 1 as count_word
FROM
    tb_logbook;

--- JUMLAH TERBANYAK USER
SELECT
    SUM(
        LENGTH(penjelasan) - LENGTH(REPLACE(penjelasan, ' ', '')) + 1
    ) as count_word,
    nama_lengkap
FROM
    tb_logbook
    JOIN tb_user ON tb_user.id_user = tb_logbook.cid
GROUP BY
    tb_logbook.cid
ORDER BY
    count_word DESC;

-- https://softhints.com/mysql-count-words-column/