USE VoteLogDB;
DROP TABLE IF EXISTS StationVotes;
CREATE TABLE StationVotes (
   id INT AUTO_INCREMENT,
   constituency_id INT,
   clerk_id INT,
   poll_division_id INT,
   polling_station_code VARCHAR(16),
   candidate1Votes INT,
   candidate2Votes INT,
   rejectedVotes INT,
   totalVotes INT,
   record_digest VARCHAR(64),
   PRIMARY KEY(id));
