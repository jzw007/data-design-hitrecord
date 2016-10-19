DROP TABLE IF EXISTS response;
DROP TABLE IF EXISTS challenge;
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user`(
	userId INT UNSIGNED AUTO_INCREMENT NOT NULL,
	userName VARCHAR(32) NOT NULL,
	userEmail VARCHAR(128) NOT NULL,
	INDEX (userId),
	UNIQUE(userEmail),
	PRIMARY KEY(userId)
);
CREATE TABLE challenge(
	challengeId INT UNSIGNED AUTO_INCREMENT NOT NULL,
	challengeUserId int UNSIGNED NOT NULL,
	challengeDateTime DATETIME NOT NULL,
	INDEX (challengeId),
	INDEX (challengeUserId),
	FOREIGN KEY (challengeUserId)REFERENCES user(userId),
	PRIMARY KEY (challengeId)

);
CREATE TABLE response (
	responseId    INT UNSIGNED AUTO_INCREMENT NOT NULL,
	responseUserId  int UNSIGNED            NOT NULL,
	reponseChallengeId INT UNSIGNED                NOT NULL,
	INDEX (responseUserId),
	INDEX (responseId),
	FOREIGN KEY (responseUserId) REFERENCES user(userId),
	FOREIGN KEY (responseChallengeId) REFERENCES challenge(challengeId),
	PRIMARY KEY (responseId)
);
