DROP TABLE IF EXISTS `User`;
CREATE TABLE `User` (
  `Account` text NOT NULL PRIMARY KEY,
  `Password` text NOT NULL
);
INSERT INTO `User` VALUES
  ('snakevil', '2c4d9ab198a367cba8b988bc993b7134');

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
