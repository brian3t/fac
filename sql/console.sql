SELECT *
FROM `event`
WHERE (`updated_at` is null or `updated_at` >= DATE_SUB(CURDATE(), INTERVAL 7 DAY));

update event
set website = null
where source = 'sdr';

update event
set source = 'sdr'
where system_note like '%https://www.sandiegoreader.com%';

delete
from venue
WHERE id > 2;

update `venue`
set system_note = replace(system_note, 'https://www.sandiegoreader.comhttps://www.sandiegoreader.com/', 'https://www.sandiegoreader.com/');

update event
set sdr_name = replace(sdr_name, 'https://www.sandiegoreader.com', '');


select *
from venue
where not (sdr_name is null);


select *
FROM (select distinct band_id
      FROM (SELECT * FROM event WHERE date >= DATE_SUB(CURDATE(), INTERVAL :event_date_start DAY) AND date <= DATE_ADD(CURDATE(), INTERVAL :event_date_end DAY)) ev
             INNER JOIN (SELECT distinct band_id, event_id FROM band_event) band_event on band_event.event_id = ev.id)
         band_performing
       INNER JOIN band b on band_performing.band_id = b.id;


DELETE
from band
where logo is null or logo = '';

######## assign random lno ratings for bands #########
update band
set lno_score = FLOOR(5 + RAND() * 5)
WHERE lno_score is null;

##########
#test
SELECT REGEXP_REPLACE(system_note, '(?<!https:)//', '/')
FROM event
WHERE id = 2;

UPDATE event
set `test` = CAST(REGEXP_REPLACE(system_note, '(?<!https:)//', '/') AS CHAR)
WHERE id = 2;

UPDATE event
SET test = CAST(REGEXP_REPLACE(system_note, '(?<!https:)//', '/') AS CHAR);

SELECT id, system_note, test
from event
WHERE id = 2;
#end TEST

##09/17 FIX event url
update event
set system_note = CONCAT('https://www.sandiegoreader.com/', system_note)
WHERE system_note like '/events/%';
## END FIX event url

##09/17 set event source
update event
set source = 'sdr'
WHERE website like 'https://www.sandiegoreader.com%';
##end set event source

###09/17 AFTER add short_desc: make desc -> shortdesc
update event
set short_desc = description
where source = 'sdr';
###end AFTER add short_desc: make desc -> shortdesc
alter table venue add source enum('sdr', 'ticketfly', 'other', 'unknown', 'reverb') default 'unknown' null;

# INSERT INTO `band` (`name`, `logo`, `genre`, `similar_to`, `hometown_city`, `hometown_state`, `description`, `website`, `facebook`, `type`, `lno_score`) VALUES ('dj artistic', NULL, NULL, NULL, 'San Diego', 'CA', NULL, NULL, NULL, 'originals', 10);
###10 05 testing reverb
delete from venue where `source` = 'reverb';
delete from venue where created_at >= '2018-10-05';
delete from event where id >= 272;


select *
from event
where venue_id = 221
and source='reverb';

## delete events without band
select * FROM band_event join event e on band_event.event_id = e.id;

# create temporary table ev_wo_band (select e.id from event e left outer join band_event be on e.id = be.event_id WHERE be.id is null);
select * from ev_wo_band;
# delete from event WHERE id in (select id FROM ev_wo_band);

select * from event inner join band_event be on event.id = be.event_id;

select count(*) from event;

#11/01
#remove dates from events
UPDATE event SET name = TRIM(REGEXP_REPLACE(name,'[:digit:]{4}\-[:digit:]{2}\-[:digit:]{2}',''));
# SELECT name FROM event;
