DELIMITER $$

CREATE TRIGGER `doc_remont_after_insert` AFTER INSERT ON `doc_remont`
FOR EACH ROW

BEGIN

  UPDATE doc_reg SET status_id=1 WHERE id=NEW.doc_reg_id;

END $$

DELIMITER;