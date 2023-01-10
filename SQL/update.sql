SELECT *
	from teachers
    where tch_first_name = 'Catherine'
    and tch_last_name = 'Bennett'
;

UPDATE teachers
	set tch_last_name = 'Polk'
    where tch_last_name = 'Bennett'
    and tch_first_name = 'Catherine'
;

SELECT * from schools;
;

UPDATE schools
	set skl_level = '18+'
    where skl_name LIKE '%Adult%'
;