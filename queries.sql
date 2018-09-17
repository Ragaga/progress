-- Студенты с оценкой от и до и имененм %name%
select s.id from students s
where s.name like '%a%'
group by s.id
having( select avg(grade) from grades where student_id = s.id) between 4 and 5;

--Студенты с одного ip, имеющего хотя бы один отзыв научрука
with students_with_review as (
  select registration_ip as ip from students where advisor_review is not null
  group by registration_ip having(count(1)) > 1
)
select * from students where registration_ip in (
  select ip from students_with_review
);

--Список предметов с оценками и среднее
select
  s.name,
  string_agg(grade::TEXT, ',') grades,
  avg(grade) over (partition by student_id) average_grade
from grades
  join subjects s on grades.subject_id = s.id
where
  student_id = :student_id
  group by s.name, grade, student_id
