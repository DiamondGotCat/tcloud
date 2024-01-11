# tCloud Next
Open source secure file storage system

# Setup
The database and PHP server should be on the same computer and accessible via localhost.

## Create 'tCloud' DB

```sql

create database tCloud;

```

## Select 'tCloud' DB

```sql

use tCloud;

```

## Setup or Reset 'tCloud' DB

```sql
drop table IF EXISTS user_project_map;
drop table IF EXISTS project;
drop table IF EXISTS user;

-- プロジェクト名と説明がたくさんあるよ
-- * RestoreFromTempTable
create table project (
  name char(15) not null comment 'プロジェクト名'
  , detail text comment 'プロジェクト詳細'
  , constraint project_PKC primary key (name)
) comment 'プロジェクト名と説明がたくさんあるよ' ;

-- ユーザーのID、パスワードを管理する。ownerかどうかもわかる。
-- * RestoreFromTempTable
create table user (
  username char(10) not null comment 'ユーザー名'
  , password TEXT not null comment 'パスワード'
  , isowner int default 0 not null comment 'オーナーかどうか。１ならオーナー。'
  , constraint user_PKC primary key (username)
) comment 'ユーザーのID、パスワードを管理する。ownerかどうかもわかる。' ;

-- UserとProjectの紐づけを行います。
-- * RestoreFromTempTable
create table user_project_map (
  username char(10) not null comment 'アクセス権がある人'
  , projectname char(15) not null comment 'アクセスできるプロジェクト'
  , constraint user_project_map_PKC primary key (username,projectname)
) comment 'UserとProjectの紐づけを行います。' ;

alter table user_project_map
  add constraint user_project_map_FK1 foreign key (projectname) references project(name)
  on delete cascade
  on update cascade;

alter table user_project_map
  add constraint user_project_map_FK2 foreign key (username) references user(username)
  on delete cascade
  on update cascade;
```