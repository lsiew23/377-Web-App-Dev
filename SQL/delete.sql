-- this is a file for testng DELETE statements

SELECT *
	from students
    where stu_first_name LIKE 'Matt%'
;

SELECT *
	from students
    where stu_id ='stdX2000001008'
;

DELETE from students
	where stu_id = 'stdX2000001008'
;

DELETE from attendance
	where att_stu_id = 'stdX2000001008'
;

DELETE from transcripts
	where trn_stu_id = 'stdX2000001008'
;

DELETE from schedules
	where ssc_stu_id = 'stdX2000001008'
;

-- Scavaging for children with no parents
SELECT * 
	from attendance
    join students on stu_id <> att_stu_id
;

-- students with perfect attendance with 'le' in last name
SELECT stu_id, stu_first_name, stu_last_name, count(*)
	from students
    left outer join attendance ON stu_id = att_stu_id
    where stu_last_name LIKE 'Le%'
    and stu_grade_level = '12'
    group by stu_id, stu_first_name, stu_last_name
;

SELECT *
	from attendance
    left outer join students ON stu_id = att_stu_id
    where stu_id is NULL
;

DELETE from students where stu_last_name like 'Z%';

-- standard in operator
SELECT *
	from students
	where stu_grade_level IN ('01', '02')
;
    
-- using the the in operatror based on a sub-select
SELECT * 
	from students
    where stu_skl_id in (SELECT skl_id from schools where skl_name like '%Elementary%')
;

-- identifying orphans using in (sub-select) clause
SELECT *
	from attendance
    where att_stu_id not in (SELECT stu_id from students)
;

-- delete ^^^
DELETE
	from attendance
    where att_stu_id not in (SELECT stu_id from students)
;


