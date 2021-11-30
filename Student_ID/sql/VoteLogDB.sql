 DROP DATABASE IF EXISTS VoteLogDB;
-- CREATE DATABASE VoteLogDB;
-- USE VoteLogDB;
-- GRANT SELECT, INSERT, UPDATE, DELETE, CREATE, DROP, INDEX, ALTER ON VoteLogDB.* TO 'comp2190SA'@'localhost' IDENTIFIED BY '2020Sem1';

-- DROP TABLE IF EXISTS VoteLog;
-- CREATE TABLE VoteLog(id INT AUTO_INCREMENT, constituency_id INT, clerk_id INT, poll_division_id INT, polling_station_code VARCHAR(8), candidate1Votes INT, candidate2Votes INT, rejectedVotes INT, totalVotes INT, record_digest VARCHAR(64), PRIMARY KEY(id));
