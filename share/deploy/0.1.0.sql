DROP TABLE IF EXISTS `User`;
CREATE TABLE `User` (
  `Account` text NOT NULL PRIMARY KEY,
  `Password` text NOT NULL,
  `Articles` integer NOT NULL DEFAULT 0
);
CREATE INDEX `UserArticles` on `User` (`Articles`);
INSERT INTO `User` VALUES
  ('snakevil', '2c4d9ab198a367cba8b988bc993b7134', 0);

DROP TABLE IF EXISTS `Article`;
CREATE TABLE `Article` (
  `ArticleID` text NOT NULL PRIMARY KEY,
  `Title` text NOT NULL,
  `Author` text NOT NULL,
  `Briefing` text NOT NULL DEFAULT '',
  `Content` text NOT NULL DEFAULT '',
  `Time` integer NOT NULL DEFAULT (datetime('now', 'localtime')),
  `Markdown` text NOT NULL DEFAULT ''
);
CREATE INDEX `ArticleAuthor` on `Article` (`Author`, `Time`);
CREATE INDEX `ArticleTime` on `Article` (`Time`);
CREATE TRIGGER `UserArticlesIncrease` AFTER INSERT ON `Article` BEGIN
  UPDATE `User` SET `Articles` = 1 + `Articles` WHERE `Account` = NEW.`Author`;
END;

DROP TABLE IF EXISTS `Tag`;
CREATE TABLE `Tag` (
  `TagID` text NOT NULL PRIMARY KEY,
  `Title` text NOT NULL
);

DROP TABLE IF EXISTS `_ArticleTag`;
CREATE TABLE `_ArticleTag` (
  `ArticleID` text NOT NULL,
  `TagID` text NOT NULL,
  PRIMARY KEY (`ArticleID`, `TagID`)
);
