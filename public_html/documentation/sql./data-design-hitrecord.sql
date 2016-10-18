DROP TABLE IF EXISTS response;
DROP TABLE IF EXISTS challenge;
DROP TABLE IF EXISTS `user`;
CREATE TABLE user(
	userId INTEGER UNSIGNED AUTO_INCREMENT NOT NULL,
	userName VARCHAR(32) NOT NULL,
	userEmail VARCHAR(128) NOT NULL,
	UNIQUE(userId),
	UNIQUE(userEmail),
	PRIMARY KEY(userId)
);
CREATE TABLE challenge(
	challengeId INTEGER UNSIGNED AUTO_INCREMENT NOT NULL,
	challengeAuthor VARCHAR(32) NOT NULL,
	challengeDateTime DATETIME NOT NULL,
	INDEX (challengeId),
	PRIMARY KEY (challengeId)
);
CREATE TABLE response (
	responseUserId    INT UNSIGNED AUTO_INCREMENT NOT NULL,
	responseUserName  VARCHAR(32)                 NOT NULL,
	reponseUser INT UNSIGNED                NOT NULL,
	responseUserEmail VARCHAR(128)              NOT NULL,
	INDEX (responseUserId),
	FOREIGN KEY (responseUserId) REFERENCES user(userId),
	FOREIGN KEY (responseChallengeId) REFERENCES challenge(challengeId)
);
