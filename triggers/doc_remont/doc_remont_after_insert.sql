DELIMITER $$

DROP TRIGGER IF EXISTS `doc_remont_after_update` $$
CREATE TRIGGER `doc_remont_after_update` AFTER UPDATE ON `doc_remont`
FOR EACH ROW

BEGIN

  UPDATE doc_reg_list SET notes=NEW.notes, summa=NEW.summa WHERE id=NEW.doc_reg_list_id;

  UPDATE doc_reg SEt summa=(SELECT SUM(summa) FROM doc_reg_list WHERE reg_id=NEW.doc_reg_id) WHERE id=NEW.doc_reg_id;

  INSERT INTO svod_qarz(doc_reg_id, sana, summa) VALUES(NEW.doc_reg_id, CURDATE(), (SELECT -1*SUM(summa) FROM doc_reg_list WHERE reg_id=NEW.doc_reg_id));

END $$

DELIMITER;