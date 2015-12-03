1.
mysql> select * from category where left(name, 4) like '%авто%' and parent_category_id is NULL;

2.
mysql> select a.id, a.name from category a join category b on a.id = b.parent_category_id group by b.parent_category_id having count(b.parent_category_id)<=3;

3.
mysql> select a.id, a.name from category a  left join category b on a.id = b. parent_category_id where b.id is NULL;
 
alter table category add index (name);
alter table category add index (parent_category_id);
